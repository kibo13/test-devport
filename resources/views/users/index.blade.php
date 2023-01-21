@extends('layouts.master')

@section('content-body')
<section class="container overflow-auto">
    <h3>Users</h3>

    <div class="my-2 btn-group">
        <a class="btn btn-primary" href="{{ route('users.create') }}">
            New record
        </a>
    </div>

    @if(session()->has('success'))
    <div class="my-2 alert alert-success" role="alert">
        {{ session()->get('success') }}
    </div>
    @endif

    <table class="table table-bordered table-hover table-responsive">
        <thead class="thead-light">
            <tr>
                <th>#</th>
                <th class="w-25">Username</th>
                <th class="w-25">Phone</th>
                <th class="w-25">Expired date</th>
                <th class="w-25">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $index => $user)
            <tr>
                <td>{{ ++$index }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ dth_date($user->expired_at, 'Y-m-d') }}</td>
                <td>
                    <div class="d-flex align-items-start" style="gap: 5px;">
                        <a class="btn btn-sm btn-warning"
                           href="{{ route('users.edit', $user) }}" >
                            Update
                        </a>
                        <form action="{{ route('users.destroy', $user) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</section>
@endsection
