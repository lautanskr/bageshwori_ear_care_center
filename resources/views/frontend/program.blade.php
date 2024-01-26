@extends('frontend.header')
@section('title', 'BECC-About')
@section('content')

    <!--==============================    Breadcumb    ============================== -->
    <div class="breadcumb-wrapper ">
        <div class="parallax" data-parallax-image="assets/img/breadcurmb/breadcurmb-1-1.jpg"></div>
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Latest Program</h1>
                <div class="breadcumb-menu-wrap">
                    <i class="far fa-home-lg"></i>
                    <ul class="breadcumb-menu">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Program</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--==============================
                Blog Area
            ==============================-->
    <section class="vs-blog-wrapper space-top space-md-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    @foreach ($programs as $program)
                        <div class="vs-blog blog-single">
                            <div class="blog-img">
                                <a href="blog-details.html"><img src="documents/programs/{{ $program->image }}"
                                        alt="Blog Image"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <a href="#"><i class="fal fa-eye"></i>Posted date: {{ $program->created_at }}</a>
                                </div>
                                <h2 class="blog-title h3"><a href="blog-details.html">{{ $program->title }}</a></h2>
                                <p>{!! $program->description !!}</p>
                                <a href="" class="link-btn">Read More<i class="fal fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    @endforeach

                    
                    <div class="vs-pagination pb-30">
                        <ul>
                            <li>{{ $programs->links('frontend/css/custom-pagination') }}</li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4">
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
                                        <h4 class="post-title"><a href="blog-details.html">Extend market the driven
                                                results</a></h4>
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
