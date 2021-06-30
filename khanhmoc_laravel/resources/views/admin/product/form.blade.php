@extends('admin.master')
@section('content')
<!-- Page Inner -->
<div class="page-inner">
  <div class="page-title">
    <h3 class="breadcrumb-header">Form Elements</h3>
    @if (session('msg'))
    <div class="col-12 alert alert-{{session('status')}}">
      {{session('msg')}}
    </div>
    @endif
  </div>
  <div id="main-wrapper">
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-white">
          <div class="panel-heading clearfix">
            <h4 class="panel-title">Form Elements</h4>
          </div>
          <div class="panel-body">
            <form action="{{$action}}" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Name Product"
                  value="{{$item->name??old('name')}}">
                <small id="helpId" class="text-muted">Help text</small>
              </div>
              <div class="form-group">
                <label for="">Price</label>
                <input type="number" class="form-control" id="price" name="price" placeholder="price"
                  value="{{$item->price??old('price')}}">
                <small id="helpId" class="text-muted">Help text</small>
              </div>
              
              <div class="form-group">
                <div class="col-md-6">
                  <div class="form-group" >
                    <label for="">Qty</label>
                    <input type="number" class="form-control" class="col-md-5" id="qty" name="qty" placeholder="Qty"
                      value="{{$item->qty??old('qty')}}">
                    <small id="helpId" class="text-muted">Help text</small>
                  </div>
                  </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label>Trạng thái</label>
                        <div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="status"
                                        id="membershipRadios1" @if(isset($item) && $item->status!=1)
                                    checked @endif value="0" checked=""> Ẩn <i
                                        class="input-helper"></i></label>
                            </div>
                        </div>
                        <div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="status"
                                        id="membershipRadios2" @if(isset($item) && $item->status==1)
                                    checked @endif value="1"> Hiện <i class="input-helper"></i></label>
                            </div>
                        </div>
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
                  <img src="<?php if(isset($item)){ foreach ($item->ProductImgs as $key) {
                                      echo($key->url);
                                  }}?>" alt="<?php if(isset($item)){ foreach ($item->ProductImgs as $key) {
                                      echo($key->alt);
                                  }}?>">
                </div>
              </div>
              <div class="form-group">
                <label for="">Description</label>
                <textarea class="form-control" name="desc" id="desc" rows="7"
                  value="{{$item->desc??old('desc')}}"></textarea>
              </div>
              <div class="form-group">
                <label for="">Detail</label>
                <input type="text" name="detail" id="detail" class="form-control" placeholder="Detail"
                  aria-describedby="Detail" value="{{$item->detail??old('detail')}}">
                <small id="helpId" class="text-muted">Help text</small>
              </div>
              <div class="form-group">
                <label for="">Note</label>
                <input type="text" name="note" id="note" class="form-control" value="{{$item->note??old('note')}}"
                  placeholder="Note" aria-describedby="Detail">
                <small id="helpId" class="text-muted">Help text</small>
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
              </div>
              {{-- ///////////////// --}}


              @csrf
              @method($method)
              <div class="form-group">
                <div class="col-sm-12">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div><!-- Row -->
  </div><!-- Main Wrapper -->
  <div class="page-footer">
    <p>Made with <i class="fa fa-heart"></i> by skcats</p>
  </div>
</div><!-- /Page Inner -->

<!-- markup -->


<!-- summernote config -->

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
                                $('#desc').summernote({
                                
                                })
                                $('#lfm').filemanager('image');
                            });
</script>
@endsection