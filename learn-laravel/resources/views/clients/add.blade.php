@extends('layouts.client')

@section('title')
    {{$title}}
@endsection

@section('content')
    @parent 
    <h1>Thêm sản phẩm</h1>
    <form action="{{route('post-add')}}" method="POST" id="product-form">

            <div class="alert alert-danger text-center msg" style="display: none;"></div>

        <div class="mb-3">
            <label for="product_name">Tên sản phẩm</label>
            <input type="text" class="form-control" name="product_name" placeholder="Tên sản phẩm..." value="{{old('product_name')}}">

                <span style="color: red" class="error product_name_error"></span>

        </div>

        <div class="mb-3">
            <label for="product_price">Giá sản phẩm</label>
            <input type="text" class="form-control" name="product_price" placeholder="Giá sản phẩm..." value="{{old('product_price')}}">

                <span style="color: red" class="error product_price_error"></span>

        </div>
        <button type="submit" class="btn btn-primary">Thêm mới</button>
        @csrf
    </form>
@endsection

@section('css')
    
@endsection

@section('js')
   <script>
    $(document).ready(function(){
        $('product-form').on('submit', function(e){
            e.preventDefault();

            let produceName = $('input[name="produce_name"]').val().trim();
            let producePrice = $('input[name="produce_price"]').val().trim();
            let actionUrl = $(this).attr('action');
            let csrfToken = $(this).find('input[name="_token"]').val();
            $('.error').text('');
            $.ajax({
                url: actionUrl,
                type: 'POST',
                data:{
                    product_name: productName;
                    product_price: productPrice;
                    _token: csrfToken

                },
                dataType: 'json',
                success: function(response){
                    console.log(response);

                },
                error: function(error){
                    $('.msg').show();
                    let responseJSON = error.responseJSON.errors;
                    console.log(responseJSON);
                    if (Object.keys(responseJSON).length>0){
                        $('.msg').text(responseJSON.msg);
                        for (let key in responseJSON){
                            $('.'+key+'_error').text(responseJSON[key][0]);
                    }
                    }
                }
            })
        })
    })
   </script>
@endsection