@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h2>Show User</h2> </div>

                <div class="card-body">

                  @include('custom.message')

                <form action="{{ route('user.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="container">
                <h3>Required Data<h3>
                <div class="form-group">
                    <input disabled type="text" class="form-control" value="{{ old('name', $user->name) }}" name="name" id="name" placeholder="Name">
                </div>
                
                <div class="form-group">
                <input disabled type="email" class="form-control" value="{{ old('email', $user->email) }}" name="email" id="email" placeholder="email">
                </div>

                <div class="form-group">
                <select disabled name="roles" id="roles" class="form-control">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}"
                        @isset($user->roles[0]->name)
                            @if($role->name == $user->roles[0]->name)
                              selected
                            @endif
                        @endisset
                        >
                        {{$role->name}} </option>
                        @endforeach
                    </select>
                </div>
                <a class="btn btn-success" href="{{ route('user.edit', $user->id) }}"> Edit </a>
                
                <a class="btn btn-danger" href="{{ route('user.index') }}"> Back </a>
              </div>
            </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
