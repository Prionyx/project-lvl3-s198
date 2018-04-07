@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Updated_at</th>
                <th>Created_at</th>
                <th>HTTP status code</th>
                <th>Content Length</th>

            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{ $domain->id }}</th>
                <th><a href="{{ $domain->name }}">{{ $domain->name }}</a></th>
                <th>{{ $domain->updated_at }}</th>
                <th>{{ $domain->created_at }}</th>
                <th>{{ $domain->code }}</th>
                <th>{{ $domain->content_length }}</th>
            </tr>
        </tbody>
    </table>
@endsection
