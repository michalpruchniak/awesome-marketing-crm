@extends('layouts.panel')
@section('content')
<form method="get">
    <div class="row mb-3">
        <div class="col-12 col-md-4">
            <input type="string" name="name" class="form-control" placeholder="Name of customer...">
        </div>
        <div class="col-12 col-md-3">
            <select id="user" name="manager" class="form-control">
                <option value="">---</option>
                @foreach ($users as $user)
                    <option
                        value={{ $user->id }}>{{ $user->name }}</option>
                @endforeach
                </select>
        </div>
        <div class="col-12 col-md-2">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </div>
</form>
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Manager</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($customers as $customer)
        <tr>
            <th scope="row">{{ $customer->id }}</th>
            <td>{{ $customer->name }}</td>
            <td>{{ $customer->user->name }}</td>
          </tr>
        @endforeach
    </tbody>
  </table>
  <div class="d-flex justify-content-center">
    {{ $customers->links() }}
</div>
@endsection
