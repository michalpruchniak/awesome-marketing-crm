@extends('layouts.panel')
@section('content')
<form action=@if(isset($customer)) {{ route('customers.update', ['id' => $customer->id]) }} @else {{ route('customers.store') }} @endif method="post">
    @csrf
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="form-group">
      <label
        for="name"
      >Name</label>
      <input
        type="string"
        name="name"
        class="form-control"
        id="name"
        placeholder="Name"
        value=
            @if(isset($customer))
             "{{ $customer->name }}"
            @else
             "{{ old('name') }}"
            @endif>
    </div>
    @can('add user to customer')
        <div class="form-group">
            <label for="user">Customer manager</label>
            <select id="user" name="user" class="form-control">
            @foreach ($users as $user)
                <option
                    value=
                    {{ $user->id }}
                    @if(isset($customer) && $customer->user_id === $user->id)
                        selected
                    @elseif(Auth::id() === $user->id)
                        selected
                    @elseif(old('user') === $user->id)
                        selected
                    @endif>
                    {{ $user->name }}
                    </option>
            @endforeach
            </select>
        </div>
        <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" value="1" id="lead" name="lead" @if(isset($customer) && $customer->load === 1) checked @elseif (empty($customer)) checked @else {{ old('lead') }} @endif>
            <label class="form-check-label" for="lead">
              Lead
            </label>
        </div>
        <div class="form-check mb-2">
            <input class="form-check-input" type="checkbox" value="1" id="active" name="active" @if(isset($customer) && $customer->active === 1) checked @elseif (empty($customer)) checked @else {{ old('active') }} @endif>
            <label class="form-check-label" for="active">
              Active
            </label>
        </div>
      @endcan
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
