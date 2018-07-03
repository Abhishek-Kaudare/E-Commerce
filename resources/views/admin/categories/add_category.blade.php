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
@endsection
@section('content')
<div id="content">
    <!--breadcrumbs-->

    <div id="content-header">
        <div id="breadcrumb">
            <a href={{ url( '/admin/dashboard') }} class="tip-bottom" data-original-title="Go to Home">
                <i class="icon-home"></i> Home</a>
            <a href="#">Category</a>
            <a href={{ url( '/admin/add-category') }} class="current">Add Category</a>
        </div>
        <h1>Add Category</h1>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">
        <hr>
        @if(Session::has('flash_message_error'))
        <div class="alert alert-danger alert-block">
            <button type="button" class="close" data-dismiss="alert">&CircleTimes;</button>
            <strong>{{ Session('flash_message_error') }}</strong>
        </div>
        @endif
        @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">&CircleTimes;</button>
            <strong>{{ Session('flash_message_success') }}</strong>
        </div>
        @endif
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon">
                            <i class="icon-info-sign"></i>
                        </span>
                        <h5>Add Category</h5>
                        <a href={{ url( '/admin/view-category') }} class="btn btn-info pull-right">View Category</a>
                    </div>
                    <div class="widget-content nopadding">
                        <form class="form-horizontal" method="post" action="{{ url('/admin/add-category') }}" name="add_category" id="add_category"
                            novalidate="novalidate"> {{ csrf_field() }}
                            <div class="control-group">
                                <label class="control-label">Category Name</label>
                                <div class="controls">
                                    <input type="text" name="category_name" id="category_name">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Category Level</label>
                                <div class="controls">
                                    <select name="parent_id" style="width: 220px">
                                        <option value="0">Main Category</option>
                                        @foreach($levels as $val)
                                        <option value="{{ $val->id }}">{{ $val->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Description</label>
                                <div class="controls">
                                    <textarea name="description" id="description"></textarea>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">URL</label>
                                <div class="controls">
                                    <input type="text" name="url" id="url">
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" value="Add Category" class="btn btn-success">
                            </div>
                        </form>
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
<script src="{{ asset('js/Backend_js/jquery.validate.js') }}"></script>
<script src="{{ asset('js/Backend_js/matrix.js') }}"></script>
<script src="{{ asset('js/Backend_js/matrix.form_validation.js') }}"></script>
@endsection
