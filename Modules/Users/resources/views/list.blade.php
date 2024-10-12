@extends('layouts.panel')
@section('content')
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
        <tr @if($user->ban === 1) class="table-danger" @endif>
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
            <td>
                @if($user->ban === 1)
                    <a href="{{ route('users.deleteBan', ['id' => $user->id]) }}" class="btn btn-success">Delete ban</a>

                @else
                    <button type="button" class="ban-button btn btn-danger" data-toggle="modal" data-target="#BanModal" data-id={{ $user->id }}>Add ban</button>
                @endif
            </td>
          </tr>
        @endforeach
    </tbody>
  </table>
  <div class="d-flex justify-content-center">
</div>

  <div class="modal fade" id="BanModal" tabindex="-1" role="dialog" aria-labelledby="BanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="BanModalLabel">Ban for user</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            Are you sure you want to ban this user?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <form id="ban-form" method="post">
            @csrf
            @method('DELETE')
          <button type="submit" class="btn btn-danger">Ban</button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('scripts')
<script>
$(document).ready(function() {
    $(document).ready(function() {
    const banButtons = $('.ban-button');
    const banForm = $('#ban-form');

    banButtons.each(function() {
        $(this).on("click", function() {
            const userId = $(this).data('id');
            const actionUrl = "{{ route('users.destroy', ['id' => ':id']) }}".replace(':id', userId);

            banForm.attr('action', actionUrl)

        });
    });
});
});
</script>
@endsection
