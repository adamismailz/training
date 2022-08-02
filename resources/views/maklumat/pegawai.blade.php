@extends('layouts.main')

@section('content')
<div class="container">
   <h1>List</h1>
   <a class="btn btn-success" href="{{route('maklumat.pelanggan')}}"> Add </a>
@foreach ($currencyResponse as $curr )
<p> {{ $curr->currency_code }}</p>

@endforeach
   @foreach ($maklumats as $maklumat )
   <div class="card" >
  @if ( $maklumat->user)

  <p> {{ $maklumat->user->email }}</p>
  @endif
   

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
{{$maklumats->links("pagination::bootstrap-5")}}
</div>

@endsection