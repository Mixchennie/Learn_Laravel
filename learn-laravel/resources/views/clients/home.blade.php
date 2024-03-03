@extends('layouts.client')
@section('title')
    {{ $title }}
@endsection
@section('sidebar')
    @parent 
    <h3>Home Sidebar</h3>
@endsection
@section('content')
    <h1>Trang Chủ</h1>
    @include('clients.contents.slide')
    @include('clients.contents.about')
    @env('production')
    <p>Môi trường production</p>
    @elseenv('test')
    <p>Môi trường test</p>
    @else
    <p>Môi trường dev</p>
    @endenv

    <x-alert type="info" :content="$message" data-icon="youtube"/>
    <p><img src="https://cdn.pixabay.com/photo/2016/07/11/15/43/woman-1509959_640.jpg" alt=""></p>
    <p><a href="{{ route('download-image') }}'?image='. public_path('storage/image-01.jpg')}}" class="btn btn-primary">Download ảnh</a></p>
    <p><a href="{{ route('download-doc') }}.'?file='.public_path('storage/Group report Universe pink.pdf')}}" class="btn btn-primary">Download tài liệu</a></p>
@endsection
@section('css')  
    <style>
        img{
            max-width: 100%;
            height: auto;
        }
    </style>
@endsection
@section('js') 
@endsection
