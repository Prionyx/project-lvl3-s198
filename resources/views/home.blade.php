@extends('layouts.app')

@section('content')
  <div class="jumbotron">
    <h1 class="display-4">Page speed optimization</h1>
    <br>
    <form action="{{ route('domains') }}" method="post">
      <div class="form-group">
        <input type="text" class="form-control" name='url' id="inputDomain" aria-describedby="domainHelp" placeholder="Enter webpage URL">
        @if (!empty($errors))
            @foreach ($errors as $error)
                <p class = "aler alert-danger" role="alert">{{ $error }}</p>
            @endforeach
        @endif
        <br>
        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
    </form>
  </div>
@endsection
