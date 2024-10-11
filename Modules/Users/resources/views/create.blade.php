@extends('layouts.panel')
@section('content')
<form action=@if(isset($user)) {{ route('users.update', ['id' => $user->id]) }} @else {{ route('users.store') }} @endif method="post">
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
            @if(isset($user))
             "{{ $user->name }}"
            @else
             "{{ old('name') }}"
            @endif>
    </div>
    <div class="form-group">
      <label
        for="email"
      >Email</label>
      <input
        type="email"
        name="email"
        class="form-control"
        id="email"
        placeholder="Email address"
        value=
            @if(isset($user))
             "{{ $user->email }}"
            @else
             "{{ old('email') }}"
            @endif>
    </div>
    <div class="form-group">
      <label
        for="password"
      >Password</label>
      <input
        type="password"
        name="password"
        class="form-control"
        id="password">
    </div>
        <div class="form-group">
            <label for="role">Roles</label>
            <select id="role" name="role" class="form-control">
                @foreach ($roles as $role)
                    <option
                        value={{ $role->id }}
                        @if(isset($user) && $user->hasRole($role->name))
                        selected
                    @elseif(old('role') === $role->id)
                        selected
                    @endif>
                        {{ $role->name }}
                        </option>
                @endforeach
            </select>
        </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
