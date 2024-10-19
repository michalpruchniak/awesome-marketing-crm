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
    <tr>
        <th>Type</th>
        <th style="width: 50%">Description</th>
        <th>Duration</th>
        <th>Added</th>
        <th>User</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($activities as $activity)
        <tr>
            <td>Solve technical problem</td>
            <td style="width: 50%">{{ $activity->description }}</td>
            <td>{{ \Carbon\CarbonInterval::minutes($activity->duration)->cascade()->forHumans(['short' => true]) }}</td>
            <td>{{ \Carbon\Carbon::parse($activity->created_at)->diffForHumans() }}</td>
            <td>{{ $activity->user->name }}</td>
        </tr>
    @endforeach
    </tbody>
  </table>
  <div class="d-flex justify-content-center">
    {{ $activities->links() }}
</div>
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
