@extends('layouts.client')

@section('title', $title)

@section('content')
    <h1>SẢN PHẨM</h1>
    <x-package-alert />
    <x-package-alert />
@endsection

@push('scripts')
    <script>
        console.log('Push lần 2')
    </script>
@endpush

@section('css')
    {{-- Add your CSS code here if needed --}}
@endsection

@section('js')
    @prepend('scripts')
        <script>
            console.log('Push lần 1')
        </script>
    @endprepend
@endsection
