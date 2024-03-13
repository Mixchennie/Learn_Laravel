@extends('layouts.client')

@section('title')
    {{$title}}
@endsection

@section('content')
    @if(session('smg'))
    <div class="alert alert-success">{{session('smg')}}</div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">Dữ liệu nhập không hợp lệ, vui lòng kiểm tra lại</div>
    @endif
    <h1>{{$title}}</h1>

    <form action="" method="POST">
        <div class="mb-3">
            <label for="" class="form-label">Họ và tên</label>
            <input type="text" class="form-control" name="fullname" placeholder="Họ và tên..." value="{{old('fullname')}}">
            @error('fullname')
                <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Email</label>
            <input type="text" class="form-control" name="fullname" placeholder="Họ và tên" value="{{old('email')}}">
            @error('email')
                <span style="color: red;">{{$message}}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Thêm mới</button>
        <a href="{{route('users.index')}}" class="btn btn-warning">Quay lại</a>
        @csrf
    </form>
@endsection

