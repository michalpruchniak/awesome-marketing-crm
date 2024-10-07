@extends('layouts.panel')
@section('content')
<div class="row">
    <div class="card col-12 col-md-3 mr-4">
        <div class="card-body">
        <h2 class="card-title mb-2"><strong>Details</strong></h2>
        <p class="card-text">
            <p><strong>Name:</strong> {{ $customer->name }}</p>
            <p><strong>Manager:</strong> {{ $customer->user->name }}</p>
            <p><strong>Lead:</strong> @if($customer->lead === 1) Yes @else No @endif</p>
            <p><strong>Active:</strong> @if($customer->active === 1) Yes @else No @endif</p>
        </p>
        @can("add new customer")
            <a href="{{ route('customers.edit', ['id' => $customer->id]) }}" class="btn btn-primary">Edit</a>
        @endcan

        </div>
    </div>
    <div class="card col-12 col-md-5">
        <div class="card-body">
        <h2 class="card-title mb-2"><strong>History</strong></h2>
        <div class="mb-2"style="width: 100%; max-height: 100px; overflow-y: auto;">
            @foreach ($customer->latestHistories(5) as $history)
                <p class="card-text">{{ $history->message }}</p>
            @endforeach
        </div>
        <a href="{{ route('histories.show', ['id' => $customer->id]) }}" class="btn btn-primary">Show all</a>
        </div>
    </div>
</div>
@endsection
