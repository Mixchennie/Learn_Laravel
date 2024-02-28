@extends('layouts.client');
@section('title')
    {{$title}}
@endsection

@section('sidebar')
    {{-- @parent  --}}
    <h3>Products Sidebar</h3>
@endsection

@section('content')
    <h1>SẢN PHẨM</h1>
    <button type="button" class="show">Show</button>
@endsection

@section('css')
    <style>
        header{
            background:red;
            color: #fff;
        }
    </style>
@endsection
@section('js')
    document.querySelector('.show').onclick = function(){
        alert('Thành công');
    }
@endsection
