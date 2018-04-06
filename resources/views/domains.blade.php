@extends('layouts.app')

@section('content')
    @if (empty($domains))
        No domains for display
    @else
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
                @foreach ($domains as $domain)
                    <tr>
                        <th scope="row">{{ $domain->id }}</th>
                        <th><a href="{{ $domain->name }}">{{ $domain->name }}</a></th>
                        <th>{{ $domain->updated_at }}</th>
                        <th>{{ $domain->created_at }}</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $domains->links() }}
    @endif
@endsection
