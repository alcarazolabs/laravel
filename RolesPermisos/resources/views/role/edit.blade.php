@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Edit Role</h2> </div>

                <div class="card-body">

                  @include('custom.message')

                <form action="{{ route('role.update', $role->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="container">
                <h3>Required Data<h3>
                <div class="form-group">
                    <input type="text" class="form-control" value="{{ old('name', $role->name) }}" name="name" id="name" placeholder="Name">
                </div>
                
                <div class="form-group">
                <input type="text" class="form-control" value="{{ old('slug', $role->slug) }}" name="slug" id="slug" placeholder="slug">
                </div>

                <div class="form-group">
                    <textarea class="form-control" name="description" id="description" placeholder="description" rows="3">{{ old('description', $role->description) }}</textarea>
                </div>
                
                <hr>
             <h3>Full Access</h3>

             <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="fullaccessyes" value="yes" name="full-access"
             class="custom-control-input"
             @if ($role['full-access']=="yes")
                checked
             @elseif (old('full-access')=="yes")
                checked
             @endif
             >
            <label class="custom-control-label" for="fullaccessyes">Yes</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
            <input type="radio" id="fullaccessno" value="no"  
            @if ($role['full-access']=="no")
                checked
             @elseif (old('full-access')=="no")
                checked
             @endif
            name="full-access" class="custom-control-input">
            <label class="custom-control-label" for="fullaccessno">No</label>
            </div>

                <hr>
                <h3>Permissions List</h3>
                @foreach($permissions as $permission)
                <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input"
                 id="permission_{{$permission->id}}"
                 value="{{$permission->id}}"
                 name="permission[]"
            @if(is_array(old('permission')) && in_array("$permission->id", old('permission')))
                    checked
            @elseif(is_array($permission_role) && in_array("$permission->id", $permission_role))
              checked
            @endif
            >
                <label class="custom-control-label" for="permission_{{$permission->id}}">
                 {{ $permission->id }}
                 -
                 {{ $permission->name }}
                 <em>( {{ $permission->description }} ) </em>
                </label>
                </div>
                @endforeach
                <hr>
                <input type="submit" class="btn btn-primary" value="Save">
                <a class="btn btn-danger" href="{{ route('role.index') }}"> Back </a>
              </div>
            </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
