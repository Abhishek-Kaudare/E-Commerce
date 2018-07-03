@extends('layouts.adminLayout.master') @section('styles')
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
@endsection @section('content')
<div id="content">
    <div id="content-header">
        <div id="breadcrumb">
            <a href={{ url( '/admin/dashboard') }} class="tip-bottom" data-original-title="Go to Home">
                <i class="icon-home"></i> Home</a>
            <a href="#">Category</a>
            <a href={{ url( '/admin/view-category') }} class="current">View Category</a>
        </div>
        <h1>Tables</h1>
    </div>
    <hr> @if(Session::has('flash_message_error'))
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
    <div class="container-fluid">
        <hr>
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon">
                            <i class="icon-th"></i>
                        </span>
                        <h5>View Categories</h5>
                        <a href={{ url( '/admin/add-category') }}  class="btn btn-info pull-right" >Add Category</a>

                    </div>
                    <div class="widget-content nopadding">
                        <table class="table table-bordered data-table">
                            <thead>
                                <tr>
                                    <th>Category ID</th>
                                    <th>Category Name</th>
                                    <th>Description</th>
                                    <th>Category Levels</th>
                                    <th>Category URL</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($categories as $category)
                                <tr class="gradeU">
                                    <td id="id">{{ $category->id }}</td>
                                    <td id="name">{{ $category->name }}</td>
                                    <td id="name">{{ $category->description }}</td>
                                    <td id="name">{{ $category->parent_id }}</td>
                                    <td id="url">{{ $category->url }}</td>
                                    <td class="center">
                                        <a href={{ url( '/admin/edit-category/'.$category->id ) }}  class="btn btn-primary btn-mini center">Edit</a>|
                                        <a rel={{ $category->id }} rel1="delete-category" href="javascript:"  class="btn btn-danger btn-mini deleteRecord">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
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
<script src="{{ asset('js/Backend_js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/Backend_js/matrix.js') }}"></script>
<script src="{{ asset('js/Backend_js/matrix.tables.js') }}"></script>
<script src="{{ asset('js/Backend_js/matrix.form_validation.js') }}"></script>
<script>
    $(".deleteRecord").click(function () {
        var id = $(this).attr('rel');
        var deleteFunction = $(this).attr('rel1');
        swal({
            title: "Are you Sure?",
            text: "Every Product Under this Category Will be deleted!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it"

        },
            function () {
                window.location.href = "/admin/" + deleteFunction + "/" + id;
            });
    });
</script>
@endsection
