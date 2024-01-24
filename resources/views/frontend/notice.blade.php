@extends('frontend.header')
@section('title', 'BECC-Notice')
@section('content')

    <!--==============================    Breadcumb   ============================== -->
    <div class="breadcumb-wrapper ">
        <div class="parallax" data-parallax-image="assets/img/breadcurmb/breadcurmb-1-1.jpg"></div>
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Latest Notice</h1>
                <div class="breadcumb-menu-wrap">
                    <i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Latest Notice</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--==============================    Blog Area  ==============================-->
    <section class="vs-blog-wrapper space-top space-md-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <aside class="sidebar-area pl-30">
                        <div class="widget  ">
                            <h3 class="widget_title">Recent Notice</h3>
                            <div class="recent-post-wrap">

                                <div class="thumb-post">
                                    <div class="media-img">
                                        <a href="blog-details.html"><img src="assets/img/widget/thumb-1-1.jpg"
                                                alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body ">
                                        <h4 class="post-title"><a href="blog-details.html">Extend market the driven Extend market the drivenExtend market the driven Extend market the drivenExtend market the drivenExtend market the driven Extend market the drivenExtend market the driven   results</a></h4>
                                        <a class="post-date" href="blog.html"><i class="fal fa-calendar-alt"></i>Mar 21,
                                            2023</a>
                                    </div>
                                </div>

                                <div class="thumb-post">
                                    <div class="media-img">
                                        <a href="blog-details.html"><img src="assets/img/widget/thumb-1-2.jpg"
                                                alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body ">
                                        <h4 class="post-title"><a href="blog-details.html">The purpose lorem ipsum distract
                                            </a></h4>
                                        <a class="post-date" href="blog.html"><i class="fal fa-calendar-alt"></i>Mar 21,
                                            2023</a>
                                    </div>
                                </div>

                                <div class="thumb-post">
                                    <div class="media-img">
                                        <a href="blog-details.html"><img src="assets/img/widget/thumb-1-3.jpg"
                                                alt="Blog Image"></a>
                                    </div>
                                    <div class="media-body ">
                                        <h4 class="post-title"><a href="blog-details.html">Until recently, the prevailing
                                                view</a></h4>
                                        <a class="post-date" href="blog.html"><i class="fal fa-calendar-alt"></i>Mar 21,
                                            2023</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>



@endsection
