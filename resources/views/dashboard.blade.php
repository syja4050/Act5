@extends('layouts.app')

@section('content')
    <h1>Welcome, {{Auth::user()->firstname}}</h1>
@endsection