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

        <form class="form-group" action="{{ route('a.generate.link') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $user->token }}">
            <button class="btn btn-sm btn-primary">
                Generate link
            </button>
        </form>

        <form class="form-group" action="{{ route('a.deactivate.link') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $user->token }}">
            <button class="btn btn-sm btn-danger">
                Deactivate link
            </button>
        </form>

        <div class="form-group">
            <a class="btn btn-sm btn-success text-lg" href="">Imfeelinglucky</a>
        </div>

        <div class="form-group">
            <a class="btn btn-sm btn-secondary text-lg" href="">History</a>
        </div>
    </div>
</div>
@endsection
