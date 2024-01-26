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
                                @foreach ($notices as $notice)
                                    <div class="thumb-post">
                                        <div class="media-img">
                                            <a href="{{route('notice_show',$notice->id)}}" target="_blank"><img src="/documents/logo/document_logo.png" height="50" width="50"
                                                    alt="Blog Image"></a>
                                        </div>
                                        <div class="media-body ">
                                            <p class="post-title"><a href="{{route('notice_show',$notice->id)}}" class="text-dark" target="_blank">{!!$notice->description!!}</a></p>
                                            <a class="post-date" href="{{route('notice_show',$notice->id)}}" target="_blank"><i class="fal fa-calendar-alt"></i>Posted date: {{$notice->published_date}}</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>



@endsection
