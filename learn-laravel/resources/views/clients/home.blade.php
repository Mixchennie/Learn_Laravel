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
   @env('production')
   <p>Môi trường production</p>
   @elseenv('test')
   <p>Môi trường test</p>
   @else
   <p>Môi trường dev</p>
   @endenv

   <x-alert type="info" :content="$message" data-icon="youtube"/>
   {{-- <x-inputs.button/>
   <x-forms.button /> --}}
@endsection
@section('css')  
@endsection
@section('js') 
@endsection