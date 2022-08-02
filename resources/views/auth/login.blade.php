@extends('layouts.main')

@section('content')
<div class="container">
    <h1>Login Page</h1>

<form method="POST" action="{{route('login.attempt')}}">
    @csrf
    <label for="inputName" class="form-label">Username :</label>
    <input type="text" class="form-control" id="email" name="email" >
    <label for="inputName" class="form-label">Password :</label>
          <input type="password" class="form-control" id="password" name="password">
<br>
          <button type="submit" class="btn btn-primary">Login</button>

</form>   
</div>
@endsection