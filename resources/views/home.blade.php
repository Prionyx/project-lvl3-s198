@extends('layouts.app')

@section('content')
  <div class="jumbotron">
    <h1 class="display-4">Page speed optimization</h1>
    <br>
    <form action="{{ route('domains') }}" method="post">
      <div class="form-group">
        <input type="text" class="form-control" name='url' id="inputDomain" aria-describedby="domainHelp" placeholder="Enter webpage URL">
        <br>
        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
    </form>
  </div>
@endsection
