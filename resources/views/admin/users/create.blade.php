@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2>Add New Consumer</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="email"><strong>Email:</strong></label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group col-md-6">
                <label for="name"><strong>Name:</strong></label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter Name">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
    </form>
</div>
@endsection