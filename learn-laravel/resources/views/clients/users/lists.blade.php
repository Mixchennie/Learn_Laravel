@extends('layouts.client')

@section('title')
    {{$title}}
@endsection

@section('content')
    @if(session('smg'))
    <div class="alert alert-success">{{session('smg')}}</div>
    @endif
    <h1>{{$title}}</h1>

    <a href="{{route('users.add')}}" class="btn btn-primary">Thêm người dùng</a>
    <hr/>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width='5%'>ID</th>
                <th >Name</th>           
                <th >Email</th>           
                <th width='10%'>Time</th>           
            </tr>
        </thead>
        <tbody>
            @if (!empty($usersList))
                @foreach ($usersList as $key => $item)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$item->fullname}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->create_at}}</td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="4">Không có người dùng</td>
            </tr>
        </tbody>
    </table>
@endsection

