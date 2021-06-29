@extends('admin.master')
@section('content')
<!-- Page Inner -->
<div class="page-inner">
    <div class="page-title">
        <h3 class="breadcrumb-header">Form Elements</h3>
    </div>
    <div id="main-wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-white">
                    <div class="panel-heading clearfix">
                        <h4 class="panel-title">Form Elements</h4>
                    </div>
                    <div class="panel-body">
                        <form action="{{route('products.store')}}" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="input-Name" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="Name Product">
                                </div>
                            {{-- </div>
                            <div class="form-group">
                                <label for="input-Price" class="col-sm-2 control-label">Price</label>
                                <textarea name="editor" class="ckeditor" id="editor"></textarea>
        <script>
            CKEDITOR.config.filebrowserImageUploadUrl = '{!! route('uploadPhoto').'?_token='.csrf_token() !!}';
        </script>

                            </div> --}}
                            <div class="form-group">
                                <label for="input-Price" class="col-sm-2 control-label">Price</label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="price" name="price" placeholder="Price">
                                </div>
                                <label for="input-Qty" class="col-sm-1 control-label">Qty</label>
                                <div class="col-sm-4">
                                    <input type="number" class="form-control" id="qty" name="qty" placeholder="Qty">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-Description" class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <input type="textarea" class="form-control" id="desc" placeholder="Description"
                                        name="desc">
                                        <script>
                                            CKEDITOR.replace( 'desc', {
                                                filebrowserBrowseUrl: '{{ route('ckfinder_browser') }}',
                                            } );
                                            </script>
                                            @include('ckfinder::setup')
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-Detail" class="col-sm-2 control-label">Detail</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="detail" placeholder="Detail"
                                        name="detail">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-Note" class="col-sm-2 control-label">Note</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="note" placeholder="Note" name="note">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input Category" class="col-sm-6 control-label"> Category </label>
                                <div class="col-sm-6">
                                    <select id="category" name="category" class="form-control">
                                        <option>Choose</option>
                                        @foreach ($categorys as $item)
                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="input-Note" class="col-sm-2 control-label">IMG</label>
                                <div class="col-sm-10">
                                    <input class="cke_dialog_ui_input_text" id="cke_105_textInput" type="text" aria-labelledby="cke_106_label" aria-required="true">
                                    <a id="cke_30" class="cke_button cke_button__image cke_button_off" href="javascript:void('Hình ảnh')" title="Hình ảnh" tabindex="-1" hidefocus="true" role="button" aria-labelledby="cke_30_label" aria-describedby="cke_30_description" aria-haspopup="false" aria-disabled="false" onkeydown="return CKEDITOR.tools.callFunction(35,event);" onfocus="return CKEDITOR.tools.callFunction(36,event);" onclick="CKEDITOR.tools.callFunction(37,this);return false;"><span class="cke_button_icon cke_button__image_icon" style="background-image:url('http://localhost:8000/ckeditor/plugins/icons.png?t=L4KA');background-position:0 -360px;background-size:auto;">&nbsp;</span><span id="cke_30_label" class="cke_button_label cke_button__image_label" aria-hidden="false">Hình ảnh</span><span id="cke_30_description" class="cke_button_label" aria-hidden="false"></span></a>
                                </div>
                            </div>
                            @csrf
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
@endsection