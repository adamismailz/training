@extends('layouts.main')

@section('content')
<div class="container">
   <h1>List</h1>
   <a class="btn btn-success" href="{{route('maklumat.pelanggan')}}"> Add </a>

   @foreach ($maklumats as $maklumat )
   <div class="card" >
  <p> {{ $maklumat->nama }}</p>
  <p> {{ $maklumat->desc }}</p>
   
  
    <a class="btn btn-primary" href="{{route('maklumat.pelanggan.edit' , ['id' => $maklumat->id])}}"> Update </a>
   

<form action="{{ route('maklumat.pelanggan.padam' , ['id' => $maklumat->id]) }}" method="POST">
@method('DELETE')
@csrf
<button class="btn btn-danger" type="submit"> Padam </button>
</form>

@endforeach
</div>
</div>

@endsection