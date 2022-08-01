@extends('layouts.main')

@section('content')
   <h1>List</h1>

   @foreach ($maklumats as $maklumat )
   <div class="card" >
  <p> {{ $maklumat->nama }}</p>
  <p> {{ $maklumat->desc }}</p>
   </div>
  
    <a class="btn btn-primary" href="{{route('maklumat.pelanggan.edit' , ['id' => $maklumat->id])}}"> Update </a>
   

<form action="{{ route('maklumat.pelanggan.padam' , ['id' => $maklumat->id]) }}" method="POST">
@method('DELETE')
@csrf
<button class="btn btn-danger" type="submit"> Padam </button>
</form>
   @endforeach
@endsection