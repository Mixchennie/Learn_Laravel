<h1>Trang chủ Unicode</h1>
<h2>{{ !empty(request()->keyword)?request()->keyword:'Không có gì'}}</h2>
<div class="container">
    {!! !empty($content)?$content:false !!}
</div>
<hr>
@php
    // $message = "Đặt hàng thành công";
@endphp   
@include('parts.notice');
