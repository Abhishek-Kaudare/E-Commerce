@extends('layouts.adminLayout.master') @section('styles')
<link rel="stylesheet" href="{{ asset('css/Backend_css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/Backend_css/bootstrap-responsive.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/Backend_css/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('css/Backend_css/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('css/Backend_css/matrix-style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/Backend_css/matrix-media.css') }}" />
<link href="{{ asset('fonts/Backend_fonts/css/font-awesome.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/Backend_css/jquery.gritter.css') }}" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'> @endsection @section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb">
            <a href="index.html" title="Go to Home" class="tip-bottom">
                <i class="icon-home"></i> Home</a>
            <a href="#">Products</a>
            <a href={{ url( '/admin/add-product') }} class="current">Add Product</a>
        </div>
        <h1>Products</h1>
        @if(Session::has('flash_message_error'))
        <div class="alert alert-error alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{!! session('flash_message_error') !!}</strong>
        </div>
        @endif @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{!! session('flash_message_success') !!}</strong>
        </div>
        @endif
    </div>
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon">
                            <i class="icon-info-sign"></i>
                        </span>
                        <h5>Add Product</h5>
                    </div>
                    <div class="widget-content nopadding">
                        <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/edit-product/'.$product->id) }}" name="edit_product"
                            id="edit_product" novalidate="novalidate"> {{ csrf_field() }}
                            <div class="control-group">
                                <label class="control-label">Under Category</label>
                                <div class="controls">
                                    <select name="category_id" id="category_id" style="width: 220px;">
                                        <?php echo $categories_dropdown; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Name</label>
                                <div class="controls">
                                    <input type="text" name="product_name" id="product_name" value="{{ $product->product_name }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Code</label>
                                <div class="controls">
                                    <input type="text" name="product_code" id="product_code" value="{{ $product->product_code }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Product Color</label>
                                <div class="controls">
                                    <input type="text" name="product_color" id="product_color" value="{{ $product->product_color }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                    <textarea name="description" id="description">{{ $product->description }}</textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Price</label>
                                <div class="controls">
                                    <input type="text" name="price" id="price" value="{{ $product->price }}">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Image</label>
                                <div class="controls">
                                    <input type="file" name="image" id="image">
                                <input type="hidden" name="current_image" value="{{ $product->image }}">
                                    @if(!empty($product->image))
                                        <img style ="width:60px;" src="{{ asset('/images/backend_images/products/small/'.$product->image) }}" >
                                        |<a href="{{ url('/admin/delete-product-image/'.$product->id) }}" class="btn btn-danger btn-mini">Delete</a>

                                    @else
                                        <label class="strong">No Image Uploaded</label>
                                    @endif
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" value="Edit Product" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection @section('scripts')
<script src="{{ asset('js/Backend_js/jquery.min.js') }}"></script>
<script src="{{ asset('js/Backend_js/jquery.ui.custom.js') }}"></script>
<script src="{{ asset('js/Backend_js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/Backend_js/jquery.uniform.js') }}"></script>
<script src="{{ asset('js/Backend_js/select2.min.js') }}"></script>
<script src="{{ asset('js/Backend_js/jquery.validate.js') }}"></script>
<script src="{{ asset('js/Backend_js/matrix.js') }}"></script>
<script src="{{ asset('js/Backend_js/matrix.form_validation.js') }}"></script> @endsection



