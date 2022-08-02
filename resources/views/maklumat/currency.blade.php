@extends('layouts.main')

@section('content')
<div class="container">
<table class="table table-dark">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($currencyResponse as $curr )
      <tr>
        <td >{{ $loop->iteration }}</td>
        <td>{{ $curr->currency_code }}</td>
        <td>{{ $curr->unit }}</td>
        <td>{{ $curr->rate->buying_rate }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>
@endsection