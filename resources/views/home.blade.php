@extends('layouts.app')

@section('content')
    <section class="jumbotron text-center">
        <div class="container">
            <h1>Sandwicher</h1>
            <br/>
            <p class="lead text-muted">Sandwicher is an app that will make any sandwich lover's live easier. Right now everybody that wants to have a sandwich from their favourite local sandwich shop needs to write down their preferred choice, and when you have a large group this app might come in handy to manage your group's meals and orders. </p>
            <p class="lead text-muted">
                The main goal behind this app is to apply some engineering and development concepts
            </p>
        </div>
    </section>
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
    </div>
@endsection
