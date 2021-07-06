<div id="search_ajax">
<div class="row">
    @foreach ($product as $item)
    <a class="list-group-item" href="{{route('f.detailProduct',$item->id)}}">{{$item->name}}</a>
    @endforeach
        
        
    </div>
</div>