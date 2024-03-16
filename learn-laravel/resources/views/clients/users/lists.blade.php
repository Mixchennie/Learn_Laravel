@extends('layouts.client')

@section('title')
    {{$title}}
@endsection

@section('content')
    @if(session('msg'))
    <div class="alert alert-success">{{session('msg')}}</div>
    @endif
    <h1>{{$title}}</h1>

    <a href="{{route('users.add')}}" class="btn btn-primary">Thêm người dùng</a>
    <hr/>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width='5%'>STT</th>
                <th >Name</th>           
                <th >Email</th>           
                <th width='15%'>Time</th>  
                <th width='5%'>Edit</th>     
                <th width='5%'>Delete</th>         
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
                <td>
                    <a href="{{route('users.edit', ['id'=>$item])}}" class="btn btn-warning btn-sm">Edit</a>
                </td>
                <td>
                    <a href="#" class="btn btn-warning btn-sm">Delete</a>
                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <td colspan="6">Không có người dùng</td>
            </tr>
        </tbody>
    </table>
@endsection

