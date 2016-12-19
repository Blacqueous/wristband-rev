
@extends('template.admin', ['type' => 1, 'menu' => 2])

@section('title', 'Dashboard')

@section('css')
<!--  -->
        <link href="{{ URL::asset('css/admin.pages.css') }}" rel="stylesheet">
@endsection

@section('js')
@endsection

@section('content')
    <h1>Manage Images</h1>
    <br/>
@endsection
