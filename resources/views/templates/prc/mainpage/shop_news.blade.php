@extends('templates.prc.layouts.prcapp')
@section('customstyle')
    <style type="text/css">
        .single-hentry-blog-post {
            position: relative;
            max-height: 417px;
            margin-bottom: 25px;
            transform-style: preserve-3d;
            -webkit-border-radius: 30px;
            -khtml-border-radius: 30px;
            -moz-border-radius: 30px;
            -ms-border-radius: 30px;
            -o-border-radius: 30px;
            border-radius: 30px;
            overflow: hidden;
            color: #fff;
            padding: 0px;
        }

        .single-hentry-blog-post .post-image {
            min-height: 417px;
            max-width: none;
            background-size: cover !important;
            background-position: center center !important;
            background-repeat: no-repeat !important;
            -webkit-border-radius: 30px;
            -khtml-border-radius: 30px;
            -moz-border-radius: 30px;
            -ms-border-radius: 30px;
            -o-border-radius: 30px;
            border-radius: 30px;
            position: relative;
            -webkit-transition: all ease-in-out 0.5s;
            -khtml-transition: all ease-in-out 0.5s;
            -moz-transition: all ease-in-out 0.5s;
            -ms-transition: all ease-in-out 0.5s;
            -o-transition: all ease-in-out 0.5s;
            transition: all ease-in-out 0.5s;

        }


        img.wp-smiley, img.emoji {
            display: inline !important;
            border: none !important;
            box-shadow: none !important;
            height: 1em !important;
            width: 1em !important;
            margin: 0 .07em !important;
            vertical-align: -0.1em !important;
            background: none !important;
            padding: 0 !important;
        }
    </style>
    <style id='woocommerce-inline-inline-css' type='text/css'>
        .woocommerce form .form-row .required {
            visibility: visible;
        }
    </style>
    <style id='tekhfixers-theme-inline-css' type='text/css'>

        @media screen and(max-width:991px) {
        }

        .primary-menu>li>a {
            color: #b3bec8
        }

        .primary-menu>li>a:hover {
            color: #32eb9a
        }

        .primary-menu>li.current_page_item>a, .primary-menu>li.current-menu-item>a,
        .primary-menu>li.current_page_ancestor>a, .primary-menu>li.current-menu-ancestor>a
        {
            color: #32eb9a
        }

        #site-header-wrap.header-layout .headroom--pinned:not (.headroom--top ) .primary-menu>li>a
        {
            color: #b3bec8
        }

        #site-header-wrap.header-layout .headroom--pinned:not (.headroom--top ) .primary-menu>li>a:hover
        {
            color: #32eb9a
        }

        #site-header-wrap.header-layout .headroom--pinned:not (.headroom--top ) .primary-menu>li.current_page_item>a,
        .headroom--pinned:not (.headroom--top ) .primary-menu>li.current-menu-item>a,
        .headroom--pinned:not (.headroom--top ) .primary-menu>li.current_page_ancestor>a,
        .headroom--pinned:not (.headroom--top ) .primary-menu>li.current-menu-ancestor>a
        {
            color: #32eb9a !important
        }

        @media screen and(max-width:991px) {
            body #pagetitle {
                padding-top: 16px;
                padding-bottom: 46px
            }
        }

        @media screen and(min-width:1280px) {
            .content-row {
                margin-left: -25px
            }
            .content-row {
                margin-right: -25px
            }
            .content-row #primary, .content-row #secondary {
                padding-left: 25px !important
            }
            .content-row #primary, .content-row #secondary {
                padding-right: 25px !important
            }
        }

        @media screen and(min-width:992px) {
        }


    </style>

@endsection
@section('title')

    <title>Service : Phone Repair Shop &amp; Services | Phone Repair Centre</title>

@endsection
@section('content')
    <div class="page-title-container">
        <div id="pagetitle" class="page-title page-title-layout1 ">
            <div class="container">
                <div class="page-title-inner">
                    <div class="page-title-content clearfix">
                        <h1 class="page-title ft-heading-b">Latest News</h1>   </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <div id="content" class="site-content">
        <div class="content-inner" >
            <svg
                    style="fill: #B8F6DB; top:0px;bottom:"
                    id="svg-top" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    preserveAspectRatio="xMidYMid" width="195.875" height="1318.28" viewBox="0 0 195.875 1318.28">
                <defs>
                    <filter id="gradient-overlay-2" filterUnits="userSpaceOnUse">
                        <feImage x="-829.406" y="0" width="1025.281" height="1318.2800000000002" preserveAspectRatio="none"
                                 xlink:href="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB3aWR0aD0iMTAyNS4yODEiIGhlaWdodD0iMTMxOC4yODAwMDAwMDAwMDAyIj48bGluZWFyR3JhZGllbnQgaWQ9ImdyYWQiIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIiB5MT0iMTQ2LjUiIHgyPSIxMDI1LjI4IiB5Mj0iMTE3MS43OCI+CiAgPHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjMWJkZDg4Ii8+CiAgPHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjMzJlYjlhIi8+CjwvbGluZWFyR3JhZGllbnQ+CjxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiLz48L3N2Zz4="/>
                        <feComposite operator="in" in2="SourceGraphic"/>
                        <feBlend in2="SourceGraphic" result="gradientFill"/>
                    </filter>
                </defs>
                <path style="fill: #fad33c"
                      d="M-540.968,20.684 C-540.968,20.684 -687.378,86.487 -694.760,174.843 C-702.142,263.200 -643.186,274.374 -667.132,338.769 C-691.079,403.164 -765.483,413.324 -785.981,496.763 C-807.750,585.376 -722.107,571.956 -727.171,690.819 C-732.235,809.683 -978.187,852.597 -688.556,1167.735 C-398.925,1482.874 -139.906,1235.432 -115.898,1040.448 C-91.891,845.463 42.695,803.563 95.851,754.793 C149.006,706.023 316.246,497.102 46.140,203.210 C-223.966,-90.683 -540.968,20.684 -540.968,20.684 Z"
                      class="cls-2"/>
            </svg>

            <svg
                    style="top:;bottom:0px"
                    id="svg-bottom" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    preserveAspectRatio="xMidYMid" width="446.28" height="1030.78" viewBox="0 0 446.28 1030.78">
                <defs>
                    <filter id="gradient-overlay-3" filterUnits="userSpaceOnUse">
                        <feImage x="0" y="0" width="1318.16" height="1030.7800000000002" preserveAspectRatio="none"
                                 xlink:href="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB3aWR0aD0iMTMxOC4xNiIgaGVpZ2h0PSIxMDMwLjc4MDAwMDAwMDAwMDIiPjxsaW5lYXJHcmFkaWVudCBpZD0iZ3JhZCIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiIHgxPSIxNDMuNjkiIHgyPSIxMTc0LjQ3IiB5Mj0iMTAzMC43OCI+CiAgPHN0b3Agb2Zmc2V0PSIwIiBzdG9wLWNvbG9yPSIjMDIyMjQzIi8+CiAgPHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjMDgzMjYwIi8+CjwvbGluZWFyR3JhZGllbnQ+CjxyZWN0IHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIGZpbGw9InVybCgjZ3JhZCkiLz48L3N2Zz4="/>
                        <feComposite operator="in" in2="SourceGraphic"/>
                        <feBlend in2="SourceGraphic" result="gradientFill"/>
                    </filter>
                </defs>
                <path style="fill: #fad33c;"
                      d="M1299.583,301.566 C1299.583,301.566 1235.945,154.230 1147.697,145.545 C1059.449,136.859 1047.402,195.631 983.361,170.740 C919.320,145.850 910.260,71.319 827.122,49.594 C738.831,26.523 750.985,112.336 632.195,105.517 C513.405,98.698 474.127,-147.810 154.703,137.070 C-164.720,421.950 78.893,684.543 273.525,711.425 C468.157,738.308 508.066,873.470 556.051,927.329 C604.035,981.187 810.485,1151.462 1108.374,885.787 C1406.264,620.113 1299.583,301.566 1299.583,301.566 Z"
                      class="cls-3"/>
            </svg>
            <div class="container content-container">
                <div class="row">
                    <div id="primary" class="content-area col-12">

                    <main id="main" class="site-main">
                        @foreach($news as $blog)
                            <article
                                    id="post-{{$blog->id}}" class="single-hentry-blog-post blog-post post-72 post type-post status-publish format-standard has-post-thumbnail hentry category-tips-tricks tag-protector">
                                <div class="entry-featured ">

                                    <a href="/blog/{{$blog->alias}}">
                                        <div class="post-image" style="background: url({{$blog->image}})"></div>
                                    </a>
                                </div><!-- .entry-featured -->
                                <div class="overlay"></div>
                                <div class="entry-holder">
                                    <div class="post-meta">
                                        <h1 class="entry-title">
                                        <a href="/blog/{{$blog->alias}}">{{$blog->descriptions->first()->title}}</a>
                                        </h1>
                                    </div>
                                    <div class="entry-content">
                                    </div>
                                    <div class="entry-more">
                                        <a class="read-more"
                                           href="/blog/{{$blog->alias}}">Read Story</a>
                                    </div>
                                </div>

                            </article><!-- #post -->
                        @endforeach
                        </main><!-- #main -->

                        {{--<nav class="navigation posts-pagination">
                            <div class="posts-page-links"><span class="page-numbers current">1</span>
                                <a class="page-numbers" href="https://demo.cmssuperheroes.com/themeforest/wp-tekhfixers/blog/page/2/">2</a>
                                <a class="next page-numbers" href="https://demo.cmssuperheroes.com/themeforest/wp-tekhfixers/blog/page/2/"><i class="fa fa-angle-right"></i></a></div>
                        </nav>--}}
                    </div><!-- #primary -->
            </div>
        </div>
    </div><!-- #content inner -->
    </div><!-- #content -->
        @endsection

        @section('afterBottom')
            <script type="text/javascript">
                jQuery(function($) {
                    $('.menu-page-title').removeClass('page-title-non-bg');
                    $('.menu-page-title').removeClass('transparent');
                    $('.menu-page-title').addClass('has-page-title');
                    $('body').addClass('single-services');

                });

            </script>
@endsection