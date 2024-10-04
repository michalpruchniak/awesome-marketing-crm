@extends('layouts.panel')
@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">User</th>
        <th scope="col">Message</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($histories as $history)
        <tr>
            <th>{{ $history->user->name }}</th>
            <td>{{ $history->message }}</td>
          </tr>
        @endforeach
    </tbody>
  </table>
@endsection
