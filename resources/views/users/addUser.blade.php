@extends('layout')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between">
            <h4>Add User</h4>
            <a href="{{route('record.sale')}}" class="btn btn-success ">Record Sale</a>
            </div>
            @if(session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
            @elseif(session('Error'))
            <div class="alert alert-danger">
                {{session('Error')}}
                </div>
                @endif
           
        </div>
        <div class="card-body">
            <form action="{{route('users.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}" id="name" name="name" required>
                @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}" id="email" name="email" required>
                    @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}" id="password" name="password" required>
                    @error('password')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                </div>
                <div class="form-group">
                    <label for="parent">Parent ID:</label>
                    <select class="form-control @error('parent_id') is-invalid @enderror" id="parent_id" name="parent_id" >
                        <option value="">--Select--</option>
                        @foreach($users as $user)
                        <option value="{{$user->id}}" {{old('parent_id')==$user->id ? 'selected':''}}>{{$user->name}}-{{$user->email}}</option>
                        @endforeach
                    </select>
                  
                    @error('parent_id')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                </div>
                <button type="submit" name="submit" class="btn btn-primary mt-3">Add User</button>
            </form>
        </div>
    </div>
</div>
@endsection