@extends('layouts.master')

@section('content-body')
<div class="container">
    @if(session()->has('warning'))
    <div class="my-2 alert alert-warning" role="alert">
        {{ session()->get('warning') }}
    </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="font-weight-bold" for="username">Username</label>
            <input class="form-control"
                   id="username"
                   type="text"
                   name="username"
                   required>
        </div>
        <div class="form-group">
            <label class="font-weight-bold" for="phone">Phone</label>
            <input class="form-control"
                   id="phone"
                   type="phone"
                   name="phone"
                   required>
        </div>
        <button class="btn btn-primary" type="submit">Register</button>
    </form>
</div>
@endsection
