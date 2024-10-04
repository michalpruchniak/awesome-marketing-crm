@extends('layouts.panel')
@section('content')
<div class="row">
    <div class="card col-12 col-md-3 mr-4" style="width: 18rem;">
        <div class="card-body">
        <h2 class="card-title mb-2"><strong>Details</strong></h2>
        <p class="card-text">
            <p><strong>Name:</strong> {{ $customer->name }}</p>
            <p><strong>Manager:</strong> {{ $customer->user->name }}</p>
        </p>
        <a href="{{ route('customers.edit', ['id' => $customer->id]) }}" class="btn btn-primary">Edit</a>
        </div>
    </div>
</div>
@endsection
