@extends('layouts.adminLayout.master')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/Backend_css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/Backend_css/bootstrap-responsive.min.css') }}" />
<link rel="stylesheet" href="{{ asset('css/Backend_css/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('css/Backend_css/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('css/Backend_css/matrix-style.css') }}" />
<link rel="stylesheet" href="{{ asset('css/Backend_css/matrix-media.css') }}" />
<link href="{{ asset('fonts/Backend_fonts/css/font-awesome.css') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/Backend_css/jquery.gritter.css') }}" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<style>
    .sweet-alert fieldset input {
        display: none;
    }
</style>


@endsection

@section('content')

<div id="content">
    <div id="content-header">
        <div id="breadcrumb">
            <a href="index.html" title="Go to Home" class="tip-bottom">
                <i class="icon-home"></i> Home</a>
            <a href="#">Products</a>
            <a href={{ url( '/admin/view-category') }} class="current">View Products</a>
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
                            <i class="icon-th"></i>
                        </span>
                        <h5>View Products</h5>
                        <a href={{ url( '/admin/add-product') }} class="btn btn-info pull-right">Add Product</a>
                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Category ID</th>
                                    <th>Category Name</th>
                                    <th>Product Name</th>
                                    <th>Product Code</th>
                                    <th>Product Color</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $product)
                                <tr class="gradeX">
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->category_id }}</td>
                                    <td>{{ $product->category_name }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->product_code }}</td>
                                    <td>{{ $product->product_color }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>
                                        @if(!empty($product->image))
                                        <img src="{{ asset('/images/backend_images/products/small/'.$product->image) }}" style="width:60px;">

                                        @endif
                                    </td>
                                    <td class="center">
                                        <a href="#myModal{{ $product->id }}" data-toggle="modal" class="btn btn-success btn-mini">View</a>
                                        <a href={{ url( '/admin/edit-product/'.$product->id ) }} class="btn btn-primary btn-mini">Edit</a>
                                        <a href={{ url( '/admin/add-attributes/'.$product->id ) }} class="btn btn-info btn-mini">Add</a>
                                        <a rel="{{$product->id }}" rel1="delete-product" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                                    </td>
                                </tr>
                                <div id="myModal{{ $product->id }}" class="modal hide">
                                    <div class="modal-header">
                                        <button data-dismiss="modal" class="close" type="button">×</button>
                                        <h3>{{ $product->product_name }} Full Details</h3>
                                    </div>
                                    <div class="modal-body">
                                        <p>Product ID: {{ $product->id }}</p>
                                        <p>Category ID: {{ $product->category_id }}</p>
                                        <p>Product Code: {{ $product->product_code }}</p>
                                        <p>Product Color: {{ $product->product_color }}</p>
                                        <p>Price: {{ $product->price }}</p>
                                        <p>Fabric: </p>
                                        <p>Material: </p>
                                        <p>Description: {{ $product->description }}</p>
                                    </div>
                                </div>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection



@section('scripts')
<script src="{{ asset('js/Backend_js/jquery.min.js') }}"></script>
<script src="{{ asset('js/Backend_js/jquery.ui.custom.js') }}"></script>
<script src="{{ asset('js/Backend_js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/Backend_js/jquery.uniform.js') }}"></script>
<script src="{{ asset('js/Backend_js/select2.min.js') }}"></script>
<script src="{{ asset('js/Backend_js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/Backend_js/matrix.js') }}"></script>
<script src="{{ asset('js/Backend_js/matrix.tables.js') }}"></script>
<script src="{{ asset('js/Backend_js/matrix.form_validation.js') }}"></script>
<script>
    $(".deleteRecord").click(function(){
        var id=$(this).attr('rel');
        var deleteFunction = $(this).attr('rel1');
        swal({
            title: "Are you Sure?",
            text: "You will not be able to recover this again!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText:"Yes, delete it"
        },
        function(){
            window.location.href="/admin/"+deleteFunction+"/"+id;
        });
    });
</script>
@endsection
