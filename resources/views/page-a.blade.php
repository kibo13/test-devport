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

        <div class="form-group">
            <a class="btn btn-sm btn-success text-lg" href="">Imfeelinglucky</a>
        </div>

        <form class="form-group" action="{{ route('history') }}" method="GET">
            <input type="hidden" name="token" value="{{ $user->token }}">
            <button class="btn btn-sm btn-secondary">
                History
            </button>
        </form>
    </div>
</div>
@endsection
