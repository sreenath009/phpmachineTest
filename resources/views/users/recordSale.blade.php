@extends('layout')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
        <div class="d-flex justify-content-between">        
            <h4>Record Sales</h4>
            <a href="{{route('add.user')}}" class="btn btn-secondary ">Back</a>
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
            <form action="{{route('sales.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <label for="user_id">User ID:</label>
                    <select class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id" required>
                        <option value="">--Select--</option>
                        @foreach($users as $user)
                        <option value="{{$user->id}}" {{old('user_id')==$user->id ? 'selected':''}}>{{$user->name}}-{{$user->email}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="amount">Amount:</label>
                    <input type="number" class="form-control @error('amount') is-invalid @enderror" id="amount" name="amount" required>
                    @error('amount')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                </div>
                <button type="submit" name="submit" class="btn btn-primary mt-3">Record Sale</button>
            </form>
        </div>
    </div>
</div>
@endsection