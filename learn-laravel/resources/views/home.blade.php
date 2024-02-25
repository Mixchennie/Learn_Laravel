<h1>Trang chủ Unicode</h1>
<h2>{{ !empty(request()->keyword)?request()->keyword:'Không có gì'}}</h2>
<div class="container">
    {!! !empty($content)?$content:false !!}
</div>
<hr>
@for ($i =1; $i<=10; $i++)
    @if ($i==5)
        @continue
        @endif
        <p>Phần tử thứ: {{$i}}</p>
@endfor