@extends('layouts.client');
@section('title')
    {{$title}}
@endsection

@section('sidebar')
    @parent 
    <h3>Home Sidebar</h3>
@endsection

@section('content')
    <h1>Trang Chủ</h1>
    @datetime('2024-02-29 05:00:00')
   @include('clients.contents.slide')
   @include('clients.contents.about')
   @datetime('2024-03-29 05:30:00')


@endsection

@section('css')
    
@endsection
@section('js')
   
@endsection