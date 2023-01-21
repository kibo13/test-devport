@extends('layouts.master')

@section('content-body')
<div class="container">
    <h1 class="my-2">Page А</h1>
    <div class="my-4">
        <h3>Link</h3>

        <h5 class="p-4 border overflow-auto">
            <a href="{{ $link }}">
                {{ $link }}
            </a>
        </h5>

        <form class="form-group" action="{{ route('generate.link') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $user->token }}">
            <button class="btn btn-sm btn-primary">
                Generate link
            </button>
        </form>

        <form class="form-group" action="{{ route('deactivate.link') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $user->token }}">
            <button class="btn btn-sm btn-danger">
                Deactivate link
            </button>
        </form>

        @if(session()->has('game'))
        <div class="my-2 alert alert-{{ session()->get('game') == 'win' ? 'success' : 'danger' }}" role="alert">
            <ul class="m-0 p-0" style="list-style-type: none;">
                <li>
                    <strong>Result:</strong> {{ session()->get('game') }}
                </li>
                <li>
                    <strong>Random number:</strong> {{ session()->get('number') }}
                </li>
                <li>
                    <strong>Winning amount:</strong> {{ session()->get('amount') }}
                </li>
            </ul>
        </div>
        @endif

        <form class="form-group" action="{{ route('imfeelinglucky') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $user->token }}">
            <button class="btn btn-sm btn-success text-lg">
                Imfeelinglucky
            </button>
        </form>

        <form class="form-group" action="{{ route('history') }}" method="GET">
            <input type="hidden" name="token" value="{{ $user->token }}">
            <button class="btn btn-sm btn-secondary">
                History
            </button>
        </form>
    </div>
</div>
@endsection
