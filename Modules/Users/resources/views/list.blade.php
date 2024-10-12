@extends('layouts.panel')
@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Role</th>
        <th scope="col">Edit</th>
        <th scope="col">Ban</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>
                <ul>
                    @foreach ($user->getRoleNames() as $role)
                        <li>{{ $role }}</li>
                    @endforeach
                </ul>

            </td>
            <td><a href="{{ route('users.edit', ['id' => $user->id]) }}" class="btn btn-primary">Edit</a></td>
            <td><a href="#" class="btn btn-danger">Delete</a></td>
          </tr>
        @endforeach
    </tbody>
  </table>
  <div class="d-flex justify-content-center">
    {{-- {{ $customers->links() }} --}}
</div>
@endsection
