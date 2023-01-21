@extends('layouts.master')

@section('content-body')
    <div class="container">
        <h1 class="my-2">History</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Result</th>
                    <th scope="col">Number</th>
                    <th scope="col">Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($histories as $index => $history)
                <tr>
                    <td>{{ ++$index }}</td>
                    <td>{{ $history->result }}</td>
                    <td>{{ $history->number }}</td>
                    <td>{{ $history->amount }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a class="btn btn-sm btn-secondary" href="{{ route('a.index', $token) }}">
            Back
        </a>
    </div>
@endsection
