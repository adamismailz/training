@extends('layouts.main')

@section('content')
<div class="container">
  <h1>Maklumat Pelanggan</h1>


<div class="card">

      <form action="{{ route('maklumat.pelanggan.update' , ['id' => $maklumat->id]) }}" method="POST">
        @method('PATCH')
        @csrf
        <div class="mb-5">
          <label for="inputName" class="form-label">Name</label>
          <input type="text" class="form-control" id="nama" name="nama" value="{{old('nama' , $maklumat->nama)}}">
          @error('nama')
          <div class="alert alert-danger">
            {{$errors->first('nama')}}
          </div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="inputDesc" class="form-label">Desc</label>
          <input type="text" class="form-control" id="desc" name="desc" value="{{old('desc' , $maklumat->desc)}}">
          @error('desc')
          <div class="alert alert-danger">
            {{$errors->first('desc')}}
          </div>
          @enderror
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>

    @endsection
    
