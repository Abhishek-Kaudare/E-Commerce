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
            <a href={{ url( '/admin/add-attributes/'.$productDetails->id) }} class="current">Add Product</a>
        </div>
        <h1 class="span9">Add Attributes to {{ $productDetails->product_name }}</h1>
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
                <div class="accordion" id="collapse-group">
                    <div class="accordion-group widget-box">
                        <div class="accordion-heading">
                            <div class="widget-title">
                                <a data-parent="#collapse-group" href="#collapseGOne" data-toggle="collapse">
                                    <span class="icon">
                                        <i class="icon-magnet"></i>
                                    </span>
                                    <h5>Products Details</h5>
                                </a>
                            </div>
                        </div>
                        <div class="accordion-body in collapse" id="collapseGOne" style="height: auto;">
                            <div class="widget-content span9">
                                <div class="todo">
                                    <ul>
                                        <li class="clearfix">
                                            Product id: <strong>{{ $productDetails->id }}</strong>
                                        </li>
                                        <li class="clearfix">
                                            Product name: <strong>{{ $productDetails->product_name }}</strong>
                                        </li>
                                        <li class="clearfix">
                                            Product code: <strong>{{ $productDetails->product_code }}</strong>
                                        </li>
                                        <li class="clearfix">
                                            Product colour: <strong>{{ $productDetails->product_color }}</strong>
                                        </li>
                                        <li class="clearfix">
                                            Product image:
                                            @if(!empty($productDetails->image))
                                                <img src="{{ asset('/images/backend_images/products/large/'.$productDetails->image) }}" style="width:60px;">
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-group widget-box">
                        <div class="accordion-heading">
                            <div class="widget-title">
                                <a data-parent="#collapse-group" href="#collapseGTwo" data-toggle="collapse">
                                    <span class="icon">
                                        <i class="icon-magnet"></i>
                                    </span>
                                    <h5>Add Attributes</h5>
                                </a>
                            </div>
                        </div>
                        <div class="accordion-body collapse" id="collapseGTwo" style="height: 0px;">
                            <div class="widget-content">
                                <table class="table table-bordered data-table">
                                    <thead>
                                        <tr>
                                            <th>Product ID</th>
                                            <th>Attribute ID</th>
                                            <th>SKU</th>
                                            <th>Size</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($productDetails['attributes'] as $attribute)
                                        <tr class="gradeX">
                                            <td>{{ $attribute->product_id }}</td>
                                            <td>{{ $attribute->id }}</td>
                                            <td>{{ $attribute->sku }}</td>
                                            <td>{{ $attribute->size }}</td>
                                            <td>{{ $attribute->price }}</td>
                                            <td>{{ $attribute->stock }}</td>
                                            <td class="center">
                                                <a rel="{{$attribute->id }}" rel1="delete-attributes" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <form enctype="multipart/form-data" class="form-horizontal" method="post" action="{{ url('/admin/add-attributes/'.$productDetails->id) }}" name="add_product"
                                    id="add_product" > {{ csrf_field() }}
                                   <div class="control-group">
                                        <label class="control-label">Attributes</label>
                                        <div class="controls">
                                            <div class="field_wrapper">
                                                <div>
                                                    <div class="input-prepend">
                                                        <span class="add-on">{{ $productDetails->product_code }}-</span>
                                                        <input type="text" name="sku[]" id="sku" placeholder="SKU" style="width: 120px;" value="" required/>
                                                    </div>
                                                    <input type="text" name="size[]" id="size" placeholder="Size" style="width: 120px;" value="" required/>
                                                    <input type="text" name="price[]" id="price" placeholder="Price" style="width: 120px;" value="" required/>
                                                    <input type="text" name="stock[]" id="stock" placeholder="Stock" style="width: 120px;" value="" required/>
                                                    <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <input type="submit" value="Add Attributes" class="btn btn-success">
                                    </div>
                                </form>
                            </div>
                        </div>
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
<script src="{{ asset('js/Backend_js/matrix.form_validation.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function () {
        var maxField = 10; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div style="margin-top: 5px;"><div class="input-prepend"><span class="add-on">{{ $productDetails->product_code }}-</span><input type="text" name="sku[]" id="sku" placeholder="SKU" style="width: 120px; margin-right:3px;" value="" required /></div><input type="text" name="size[]" id="size" placeholder="Size" style="width: 120px; margin-right:3px;" value="" required /><input type = "text" name = "price[]" id = "price" placeholder = "Price" style = "width: 120px; margin-right:3px;" value = "" required /><input type="text" name="stock[]" id="stock" placeholder="Stock" style="width: 120px; margin-right:3px;" value="" required /><a href="javascript:void(0);" class="remove_button">Remove</a></div>'; //New input field html
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function () {
            //Check maximum number of input fields
            if (x < maxField) {
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function (e) {
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
</script>
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
