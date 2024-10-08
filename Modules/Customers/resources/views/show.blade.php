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

    <div class="card col-12 col-md-7 mr-4">
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
    <div class="card col-12 col-md-4 mr-4">
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
</div>

<div class="row">
    <div class="card col-12 col-md-5 mr-4">
        <div class="card-body">
        <h2 class="card-title mb-2"><strong>Passwords</strong></h2>
        <div class="mb-2" style="width: 100%; max-height: 230px; overflow-y: auto;">
            @can("got password")

            @foreach ($customer->passwords as $password)
            <p class="password-line pb-0 mb-0">
                @switch($password->type->value)
                @case(3)
                    <i class="fa-solid fa-earth-americas"></i>
                    @break

                @case(2)
                    <i class="fa-solid fa-lock"></i>
                    @break

                @default
                    <i class="fa-solid fa-question-circle"></i>
            @endswitch
                <strong>{{ $password->name }}</strong> <button class="btn btn-light btn-sm password-show"  data-password-id={{ $password->id }}>Show</button> </p>
                <p>{{ $password->notes }}</p>
            <table class="table table-responsive password-table" data-password-table-id={{ $password->id }} style="display: none;">
                <tbody>
                  <tr>
                    <td><strong>Host</strong></td>
                    <td class="password-host"></td>
                  </tr>
                  <tr>
                    <td><strong>Login</strong></td>
                    <td class="password-login"></td>
                  </tr>
                  <tr>
                    <td><strong>Password</strong></td>
                    <td class="password-password"></td>
                  </tr>
                  <tr>
                    <td><strong>Port</strong></td>
                    <td class="password-port"></td>
                  </tr>
                </tbody>
              </table>
            @endforeach
            @else
            <p>You don't have permission to get passwords.</p>
            @endcan
        </div>
        @can("add new password")
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Add new password
          </button>
        @endcan

        </div>
    </div>
    <div class="card col-12 col-md-6">
        <div class="card-body">
        <h2 class="card-title mb-2"><strong>History</strong></h2>
        <div class="mb-2" style="width: 100%; max-height: 230px; overflow-y: auto;">
            @foreach ($customer->latestHistories(15) as $history)
                <p class="card-text">{{ $history->message }}</p>
            @endforeach
        </div>
        <a href="{{ route('histories.show', ['id' => $customer->id]) }}" class="btn btn-primary">Show all</a>
        </div>
    </div>
</div>

  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add new password</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action={{ route('passwords.store') }}>
                @csrf
                <input
                type="hidden"
                name="customer"
                class="form-control"
                id="customer"
                value="{{ $customer->id }}"
                />
                <div class="form-group">
                    <label
                    for="name"
                    >Name <span class="text-danger">*</span></label>
                    <input
                    type="string"
                    name="name"
                    class="form-control"
                    id="name"
                    placeholder="Name"
                    />
                </div>
            <div class="form-group">
                <label for="type" class="form-label">Type <span class="text-danger">*</span></label>
                <select id="type" name="type" class="form-control">
                    <option value=2>Website Panel</option>
                    <option value=3>FTP</option>
                    <option value=1>Other</option>
                </select>
            </div>
            <div class="form-group">
                <label
                for="host"
                >Host <span class="text-danger">*</span></label>
                <input
                type="string"
                name="host"
                class="form-control"
                id="host"
                placeholder="https://"
                />
            </div>
            <div class="form-group">
                <label
                for="login"
                >Login <span class="text-danger">*</span></label>
                <input
                type="string"
                name="login"
                class="form-control"
                id="login"
                placeholder="Login"
                />
            </div>
            <div class="form-group">
                <label
                for="password"
                >Password <span class="text-danger">*</span></label>
                <input
                type="password"
                name="password"
                class="form-control"
                id="password"
                placeholder="password"
                />
            </div>
            <div class="form-group col-6 col-md-3">
                <label
                for="port"
                >Port</label>
                <input
                type="number"
                name="port"
                class="form-control"
                id="port"
                />
            </div>
            <div class="form-group">
                <label
                for="notes"
                >Notes</label>
                <textarea class="form-control"
                id="notes"
                name="notes"
                rows="3"></textarea>
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </form>
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
@section('scripts')
@can("got password")

<script>
$(document).ready(function() {
    setTimeout(() => {
        $('.password-show').on('click', function() {
            const passwordId = $(this).data('password-id');
            const $passwordTable = $(`.password-table[data-password-table-id="${passwordId}"]`);

            if (!$passwordTable.hasClass('got-pass')) {
                const url = `/passwords/get-password/${passwordId}`;

                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $passwordTable.find('.password-host').text(data.host);
                        $passwordTable.find('.password-login').text(data.login);
                        $passwordTable.find('.password-password').text(data.password);
                        $passwordTable.find('.password-port').text(data.port);

                        $passwordTable.addClass('got-pass');
                    }
                });
            }

            $passwordTable.toggle();
        });
    }, 500);

});
</script>
@endcan

@endsection
