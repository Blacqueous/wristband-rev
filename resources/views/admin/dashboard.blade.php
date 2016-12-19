
@extends('template.admin', ['type' => 1, 'menu' => 1])

@section('title', 'Dashboard')

@section('css')
@endsection

@section('js')
@endsection

@section('content')
    <?php $user = Auth::guard('admin')->user(); ?>
    <h1>Admin Controls</h1>
@endsection
