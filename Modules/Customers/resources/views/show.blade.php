@extends('layouts.panel')
@section('content')
<div class="row">
    <div class="col-12">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
</div>
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
    <div class="card col-12 col-md-3 mr-4">
        <div class="card-body">
        <h2 class="card-title mb-2"><strong>Sites</strong></h2>
        <div class="mb-2" style="width: 100%; max-height: 165px; overflow-y: auto;">
           @foreach ($customer->sites as $site)
            <p>{{ $site->url }}</p>
           @endforeach
        </div>
        @can("add new customer")
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newSiteModal">
            Add
          </button>
        @endcan

        </div>
    </div>
    <div class="card col-12 col-md-5">
        <div class="card-body">
        <h2 class="card-title mb-2"><strong>History</strong></h2>
        <div class="mb-2" style="width: 100%; max-height: 165px; overflow-y: auto;">
            @foreach ($customer->latestHistories(5) as $history)
                <p class="card-text">{{ $history->message }}</p>
            @endforeach
        </div>
        <a href="{{ route('histories.show', ['id' => $customer->id]) }}" class="btn btn-primary">Show all</a>
        </div>
    </div>
</div>

  <div class="modal fade" id="newSiteModal" tabindex="-1" role="dialog" aria-labelledby="newSiteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="newSiteModalLabel">Add new site</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action={{ route('sites.store') }}>
                @csrf
                <input
                type="hidden"
                name="customer"
                class="form-control"
                id="customer"
                value="{{ $customer->id }}"
                />
            <label
                for="url"
            >Url address</label>
            <div class="form-group">
                <input
                type="string"
                name="url"
                class="form-control"
                id="url"
                placeholder="Url address"
                />
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit"class="btn btn-primary">Add</button>
        </div>
        </form>

      </div>
    </div>
  </div>
@endsection
