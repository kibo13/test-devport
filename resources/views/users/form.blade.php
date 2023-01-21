@extends('layouts.master')

@section('content-body')
<section class="container overflow-auto">
    <h3>{{ isset($user) ? 'Update record' : 'New record' }}</h3>

    <form action="{{ isset($user) ? route('users.update', $user) : route('register') }}" method="POST">
        <div class="bk-form__wrapper">
            @csrf
            @isset($user) @method('PUT') @endisset

            <!-- username -->
            <div class="form-group">
                <label class="font-weight-bold" for="username">Username</label>
                <input class="form-control"
                       id="username"
                       type="text"
                       name="username"
                       value="{{ isset($user) ? $user->username : null }}"
                       required>
            </div>

            <!-- phone -->
            <div class="form-group">
                <label class="font-weight-bold" for="phone">Phone</label>
                <input class="form-control"
                       id="phone"
                       type="phone"
                       name="phone"
                       value="{{ isset($user) ? $user->phone : null }}"
                       required>
            </div>

            <div class="btn-group">
                <button class="btn btn-success" type="submit">Save</button>
                <a class="btn btn-secondary" href="{{ route('users.index') }}">Back</a>
            </div>
        </div>
    </form>
</section>
@endsection
