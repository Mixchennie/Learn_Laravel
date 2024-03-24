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
    <form action="" method="get" class="mb-3">
        <div class="row">
           
            <div class="col-3">
                <select class="form-control">
                    <option value="0">Tất cả trạng thái</option>
                    <option value="active" {{request()->status=='active'?'selected':false}}>Kích hoạt</option>
                    <option value="inactive"{{request()->status=='inactive'?'selected':false}} >Chưa kích hoạt</option>
                </select>
            </div>
            <div class="col-3">
                <select class="form-control">
                    <option value="0">Tất cả nhóm</option>
                    @if (!empty(getAllGroups()))
                        @foreach (getAllGroups() as $item)
                            <option value="{{$item->id}}"
                            {{request()->group_id==$item->id?'selected':false}}>
                                {{$item->name}}</option>
                        @endforeach
                    @endif
                </select>

            </div>
            <div class="col-4">
                <input type="search" name="keyword" class="form-control" placeholder="Từ khóa tìm kiếm..." value="{{request()->keywords}}">
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-primary btn-block">Tìm kiếm</button>
            </div>
        </div>
    </form>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width='5%'>STT</th>
                <th <a href="?sort-by='fullname&sort-type={{$sortType}}'">>Name</th>           
                <th <a href="?sort-by='email&sort-type={{$sortType}}'">>Email</th>
                <th>Group</th>
                <th>Status</th>           
                <th width='15%' <a href="?sort-by='create_at&sort-type={{$sortType}}'">>Time</th>  
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
                <td>{{$item->group_name}}</td>
                <td>{{!!$item->status==0?'<button class="btn btn-danger btn-sm">
                    Chưa kích hoạt</button>': '<button class="btn btn-success btn-sm" />
                    Kích hoạt</button>'}}!!</td>
                <td>{{$item->create_at}}</td>
                <td>
                    <a href="{{route('users.edit', ['id'=>$item])}}" class="btn btn-warning btn-sm">Edit</a>
                </td>
                <td>
                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')" href="{{route('users.delete'.['id'=>$item->id])}}" class="btn btn-warning btn-sm">Delete</a>
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

