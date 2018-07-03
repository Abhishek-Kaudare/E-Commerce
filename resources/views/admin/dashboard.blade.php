@extends('layouts.adminLayout.master')
@section('styles')
    @include('layouts.adminLayout.inc.style')
@endsection
@section('content')


<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->

    <div id="content-header">
        <div id="breadcrumb">
            <a href={{ url('/admin/dashboard') }} title="Go to Home" class="tip-bottom">
                <i class="icon-home"></i> Home</a>
        </div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">
        <hr>
        <div id="widget-content">
            @if(Session::has('flash_message_error1'))
            <div class="alert alert-error">
                <button class="close" data-dismiss="alert">×</button>
                <strong>{{ Session('flash_message_error1') }}</strong>
            </div>
            @endif
        </div>

    <!-- Changes to be made in this part -->

        <!--Chart-box-->
        <div class="row-fluid">
            <div class="widget-box">
                <div class="widget-title bg_lg">
                    <span class="icon">
                        <i class="icon-signal"></i>
                    </span>
                    <h5>Site Analytics</h5>
                </div>
                <div class="widget-content">
                    <div class="row-fluid">
                        <div class="span9">
                            <div class="chart"></div>
                        </div>
                        <div class="span3">
                            <ul class="site-stats">
                                <li class="bg_lh">
                                    <i class="icon-user"></i>
                                    <strong>2540</strong>
                                    <small>Total Users</small>
                                </li>
                                <li class="bg_lh">
                                    <i class="icon-plus"></i>
                                    <strong>120</strong>
                                    <small>New Users </small>
                                </li>
                                <li class="bg_lh">
                                    <i class="icon-shopping-cart"></i>
                                    <strong>656</strong>
                                    <small>Total Shop</small>
                                </li>
                                <li class="bg_lh">
                                    <i class="icon-tag"></i>
                                    <strong>9540</strong>
                                    <small>Total Orders</small>
                                </li>
                                <li class="bg_lh">
                                    <i class="icon-repeat"></i>
                                    <strong>10</strong>
                                    <small>Pending Orders</small>
                                </li>
                                <li class="bg_lh">
                                    <i class="icon-globe"></i>
                                    <strong>8540</strong>
                                    <small>Online Orders</small>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--End-Chart-box-->
        <hr/>
        <div class="row-fluid">
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2">
                        <span class="icon">
                            <i class="icon-chevron-down"></i>
                        </span>
                        <h5>Latest Posts</h5>
                    </div>
                    <div class="widget-content nopadding collapse in" id="collapseG2">
                        <ul class="recent-posts">
                            <li>
                                <div class="user-thumb">
                                    <img width="40" height="40" alt="User" src="{{ asset('images/Backend_images/demo/av1.jpg') }}"> </div>
                                <div class="article-post">
                                    <span class="user-info"> By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM </span>
                                    <p>
                                        <a href="#">This is a much longer one that will go on for a few lines.It has multiple paragraphs
                                            and is full of waffle to pad out the comment.</a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="user-thumb">
                                    <img width="40" height="40" alt="User" src="{{ asset('images/Backend_images/demo/av2.jpg') }}"> </div>
                                <div class="article-post">
                                    <span class="user-info"> By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM </span>
                                    <p>
                                        <a href="#">This is a much longer one that will go on for a few lines.It has multiple paragraphs
                                            and is full of waffle to pad out the comment.</a>
                                    </p>
                                </div>
                            </li>
                            <li>
                                <div class="user-thumb">
                                    <img width="40" height="40" alt="User" src="{{ asset('images/Backend_images/demo/av4.jpg') }}"> </div>
                                <div class="article-post">
                                    <span class="user-info"> By: john Deo / Date: 2 Aug 2012 / Time:09:27 AM </span>
                                    <p>
                                        <a href="#">This is a much longer one that will go on for a few lines.Itaffle to pad out the
                                            comment.</a>
                                    </p>
                                </div>
                                <li>
                                    <button class="btn btn-warning btn-mini">View All</button>
                                </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="span6">
                <div class="widget-box">
                    <div class="widget-title">
                        <span class="icon">
                            <i class="icon-user"></i>
                        </span>
                        <h5>Our Partner (Box with Fix height)</h5>
                    </div>
                    <div class="widget-content nopadding ">
                        <ul class="recent-posts">
                            <li>
                                <div class="user-thumb">
                                    <img width="40" height="40" alt="User" src="{{ asset('images/Backend_images/demo/av1.jpg') }}"> </div>
                                <div class="article-post">
                                    <span class="user-info">John Deo</span>
                                    <p>Web Desginer &amp; creative Front end developer</p>
                                </div>
                            </li>
                            <li>
                                <div class="user-thumb">
                                    <img width="40" height="40" alt="User" src="{{ asset('images/Backend_images/demo/av2.jpg') }}"> </div>
                                <div class="article-post">
                                    <span class="user-info">John Deo</span>
                                    <p>Web Desginer &amp; creative Front end developer</p>
                                </div>
                            </li>
                            <li>
                                <div class="user-thumb">
                                    <img width="40" height="40" alt="User" src="{{ asset('images/Backend_images/demo/av4.jpg') }}"> </div>
                                <div class="article-post">
                                    <span class="user-info">John Deo</span>
                                    <p>Web Desginer &amp; creative Front end developer</p>
                                </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end-main-container-part-->
@endsection

@section('scripts')

@include('layouts.adminLayout.inc.script')

<script type="text/javascript">
    // This function is called from the pop-up menus to transfer to
    // a different page. Ignore if the value returned is a null string:
    function goPage(newURL) {

        // if url is empty, skip the menu dividers and reset the menu selection to default
        if (newURL != "") {

            // if url is "-", it is this page -- reset the menu:
            if (newURL == "-") {
                resetMenu();
            }
            // else, send page to designated URL
            else {
                document.location.href = newURL;
            }
        }
    }

    // resets the menu selection upon entry to this page:
    function resetMenu() {
        document.gomenu.selector.selectedIndex = 2;
    }
</script>

@endsection
