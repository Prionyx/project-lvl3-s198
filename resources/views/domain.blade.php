@extends('layouts.app')

@section('content')
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Updated_at</th>
                <th>Created_at</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{ $domain->id }}</th>
                <th>{{ $domain->name }}</th>
                <th>{{ $domain->updated_at }}</th>
                <th>{{ $domain->created_at }}</th>
            </tr>
        </tbody>
    </table>
@endsection
