@extends('admin.master')
@section('content')
<!-- Page Inner -->
<div class="content-wrapper">
  <div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">@lang('Form product')</h4>
          <form action="{{$action}}" method="post" enctype="multipart/form-data">
            <p class="card-description"> </p>
            <div class="row">
              <div class="col-md-12">
                <div class="panel panel-white">
                  <div class="panel-heading clearfix">
                    <h4 class="panel-title">@lang('Form product')</h4>
                  </div>
                  <div class="panel-body">
                    <div class="form-group">
                      <label for="">@lang('Name')</label>
                      <input type="text" class="form-control" id="name" name="name" placeholder="@lang('Name Product')"
                        value="{{$item->name??old('name')}}">
                      @error('name')
                      <div class="text-danger">
                        {{$message}}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="">@lang('Price')</label>
                      <input type="number" class="form-control" id="price" name="price" placeholder="@lang('Price')"
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
                          <label for="">@lang('Qty')</label>
                          <input type="number" class="form-control" class="col-md-5" id="qty" name="qty"
                            placeholder="@lang('Qty')" value="{{$item->qty??old('qty')}}">
                          @error('qty')
                          <div class="text-danger">
                            {{$message}}
                          </div>
                          @enderror </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label>@lang('Status')</label>
                          <div>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="membershipRadios1"
                                  @if(isset($item) && $item->status!=1)
                                checked @endif value="0" checked=""> @lang('Hide') <i class="input-helper"></i></label>
                            </div>
                          </div>
                          <div>
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="status" id="membershipRadios2"
                                  @if(isset($item) && $item->status==1)
                                checked @endif value="1"> @lang('Present') <i class="input-helper"></i></label>
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

                    <div class="input-group">
                      <span class="input-group-btn">
                        <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-primary">
                          <i class="fa fa-picture-o"></i> Choose
                        </a>
                      </span>
                      <input id="thumbnail" class="form-control" type="text" name="url">
                    </div>
                    <img id="holder" style="margin-top:15px;max-height:100px;">

                    <div class="row">
                      <div class="col-md-12">
                        <h1 style="text-align: center;">@lang('Description')
                        </h1>
                        <div class="col-md-12">
                          <textarea name="desc"
                            id="desc"> <?php echo $item->description??old('description') ?></textarea>
                        </div>
                      </div>
                    </div>
            
                    <script>
                      var options = {
                        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
                      };
                    </script>
                    <script>
                      CKEDITOR.replace('desc', options);
                    </script>
                    <div class="form-group">
                      <label for="">@lang('Detail')</label>
                      <input type="text" name="detail" id="detail" class="form-control" placeholder="@lang('Detail')"
                        aria-describedby="Detail" value="{{$item->detail??old('detail')}}">
                      @error('detail')
                      <div class="text-danger">
                        {{$message}}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="">@lang('Note')</label>
                      <input type="text" name="note" id="note" class="form-control" value="{{$item->note??old('note')}}"
                        placeholder="@lang('Note')" aria-describedby="Detail">
                      @error('note')
                      <div class="text-danger">
                        {{$message}}
                      </div>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="">@lang('Category')</label>
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
                        <button type="submit" class="btn btn-primary">@lang('Submit')</button>
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
  (function( $ ){

$.fn.filemanager = function(type, options) {
type = type || 'file';

this.on('click', function(e) {
var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
var target_input = $('#' + $(this).data('input'));
var target_preview = $('#' + $(this).data('preview'));
window.open(route_prefix + '?type=' + type, 'FileManager', 'width=900,height=600');
window.SetUrl = function (items) {
var file_path = items.map(function (item) {
return item.url;
}).join(',');

// set the value of the desired input to image url
target_input.val('').val(file_path).trigger('change');

// clear previous preview
target_preview.html('');

// set or change the preview image src
items.forEach(function (item) {
target_preview.append(
$('<img>').css('height', '5rem').attr('src', item.thumb_url)
);
});

// trigger change event
target_preview.trigger('change');
};
return false;
});
}

})(jQuery);

</script>
<script>
  $('#lfm').filemanager('image');



</script>
@endsection
<!-- Page Inner -->