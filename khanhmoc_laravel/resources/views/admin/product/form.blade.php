@extends('admin.master')
@section('content')
<!-- Page Inner -->
<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Horizontal Two column</h4>
          @if (session('msg'))
          <div class="col-12 alert alert-{{session('status')}}">
            {{session('msg')}}
          </div>
          @endif</p>
          <form action="{{$action}}" method="post" enctype="multipart/form-data">
            <p class="card-description"> Personal info </p>
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-white">
                  <div class="panel-heading clearfix">
                    <h4 class="panel-title">Form Product</h4>
                  </div>
                  <div class="panel-body">
                    <div class="form-group">
                      <label for="">Name</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="Name Product"
                        value="{{$item->name??old('name')}}">
                      @error('name')
                      <div class="text-danger">
                        {{$message}}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="">Price</label>
                      <input type="number" class="form-control" id="price" name="price" placeholder="price"
                        value="{{$item->price??old('price')}}">
                      @error('price')
                      <div class="text-danger">
                        {{$message}}
                      </div>
                      @enderror
                    </div>

                    <div class="form-group">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Qty</label>
                          <input type="number" class="form-control" class="col-md-5" id="qty" name="qty"
                            placeholder="Qty" value="{{$item->qty??old('qty')}}">
                          @error('qty')
                          <div class="text-danger">
                            {{$message}}
                          </div>
                          @enderror </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label>Trạng thái</label>
                          <div>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="membershipRadios1"
                                  @if(isset($item) && $item->status!=1)
                                checked @endif value="0" checked=""> Ẩn <i class="input-helper"></i></label>
                            </div>
                          </div>
                          <div>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="membershipRadios2"
                                  @if(isset($item) && $item->status==1)
                                checked @endif value="1"> Hiện <i class="input-helper"></i></label>
                            </div>
                          </div>
                          @error('status')
                          <div class="text-danger">
                            {{$message}}
                          </div>
                          @enderror
                        </div>
                      </div>
                    </div>
                    <div class="form-group" class="col-sm-12">
                      <label for="">IMG</label>
                      <div class="input-group">
                        <span class="input-group-btn">
                          <a id="lfm" data-input="url" data-preview="holder" class="btn btn-primary">
                            <i class="fa fa-picture-o"></i> Choose
                          </a>
                        </span>
                        <input id="url" class="form-control" type="text" name="url" value="<?php if(isset($item)){ foreach ($item->ProductImgs as $key) {
                                              echo($key->url);
                                          }}?>">
                        <img width="100px" height="100px" src="<?php if(isset($item)){ foreach ($item->ProductImgs as $key) {
                                              echo($key->url);
                                          }}?>" alt="<?php if(isset($item)){ foreach ($item->ProductImgs as $key) {
                                              echo($key->alt);
                                          }}?>">
                      </div>
                      @error('url')
                      <div class="text-danger">
                        {{$message}}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="">Description</label>
                      <textarea class="form-control" name="desc" id="desc" rows="7"></textarea>
                      @error('desc')
                      <div class="text-danger">
                        {{$message}}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="">Detail</label>
                      <input type="text" name="detail" id="detail" class="form-control" placeholder="Detail"
                        aria-describedby="Detail" value="{{$item->detail??old('detail')}}">
                      @error('detail')
                      <div class="text-danger">
                        {{$message}}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="">Note</label>
                      <input type="text" name="note" id="note" class="form-control" value="{{$item->note??old('note')}}"
                        placeholder="Note" aria-describedby="Detail">
                      @error('note')
                      <div class="text-danger">
                        {{$message}}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="">Category</label>
                      <select class="form-control" name="category_id" id="category_id">
                        <option>Choose</option>
                        @foreach ($categorys as $items)
                        <option value="{{$items->id}}" @if(isset($item) && $item->id_category=$items->id) selected
                          @endif>{{$items->name}}</option>
                        @endforeach
                      </select>
                      @error('category_id')
                      <div class="text-danger">
                        {{$message}}
                      </div>
                      @enderror
                    </div>
                    {{-- ///////////////// --}}
                    @csrf
                    @method($method)
                    <div class="form-group">
                      <div class="col-sm-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(function(){
    // Define function to open filemanager window
    var lfm = function(options, cb) {
    var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
    window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
    window.SetUrl = cb;
    };
    // Define LFM summernote button
    var LFMButton = function(context) {
    var ui = $.summernote.ui;
    var button = ui.button({
        contents: '<i class="note-icon-picture"></i> ',
        tooltip: 'Insert image with filemanager',
        click: function() {
        lfm({type: 'image', prefix: '/laravel-filemanager'}, function(lfmItems, path) {
            lfmItems.forEach(function (lfmItem) {
            context.invoke('insertImage', lfmItem.url);
            });
        });
        }
    });
    return button.render();
    };

    // Initialize summernote with LFM button in the popover button group
    // Please note that you can add this button to any other button group you'd like
    var markupStr = '{{$item->desc??old('desc')}}';
    $('#desc').summernote('desc');
    $('#lfm').filemanager('image');
});
</script>
@endsection
<!-- Page Inner -->