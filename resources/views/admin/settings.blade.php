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
            <a href={{ url('/admin/dashboard') }} class="tip-bottom" data-original-title="Go to Home">
                <i class="icon-home"></i> Home</a>
            <a href={{ url('/admin/settings') }}>Settings</a>
        </div>
        <h1>Settings</h1>
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
        @endif @if(Session::has('flash_message_success'))
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
                        <h5>Update Password</h5>
                    </div>
                    <div class="widget-content nopadding">
                            <form class="form-horizontal" method="post" action="{{ url('/admin/update-pwd') }}" name="password_validate" id="password_validate" novalidate="novalidate">{{ csrf_field() }}                            <div class="control-group">
                                <label class="control-label">Current Password</label>
                                <div class="controls">
                                    <input type="password" name="current_pwd" id="current_pwd">
                                    <span id="chkPwd"></span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">New Password</label>
                                <div class="controls">
                                    <input type="password" name="new_pwd" id="new_pwd">
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">Confirm password</label>
                                <div class="controls">
                                    <input type="password" name="confirm_pwd" id="confirm_pwd">
                                </div>
                            </div>
                            <div class="form-actions">
                                <input type="submit" value="Update" class="btn btn-success">
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
