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
   @include('clients.contents.slide')
   @include('clients.contents.about')

@endsection

@section('css')
    
@endsection
@section('js')
   
@endsection