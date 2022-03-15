<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
        ================================================== -->
        <meta charset="utf-8">
        <title>Blog</title>
        <meta name="description" content="">
        <meta name="author" content="">

   <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
        ================================================== -->
        <link rel="stylesheet" href="{{ asset('front/css/styles.css') }}">
        <link rel="stylesheet" href="{{ asset('front/css/vendor.css') }}">

    <!-- script
        ================================================== -->
        <script src="{{ asset('front/js/modernizr.js') }}"></script>

    <!-- favicons
        ================================================== -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('front/apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('front/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('front/favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('front/site.webmanifest') }}">

        <style type="text/css">
            .log_description_div img {
                width: 100%;
                margin-left: 1%;
            }
        </style>

    </head>

    <body id="top">


    <!-- preloader
        ================================================== -->
        <div id="preloader">
            <div id="loader"></div>
        </div>


    <!-- header
        ================================================== -->
        <header class="s-header">

            <div class="row s-header__content">

                <div class="s-header__logo">
                    <a class="logo" href="index.html">
                        <img src="{{ asset('front/images/logo.svg') }}" alt="Homepage">
                    </a>
                </div>

                <nav class="s-header__nav-wrap">

                    <h2 class="s-header__nav-heading h6">Site Navigation</h2>

                    <ul class="s-header__nav">
                        
                    </ul> <!-- end header__nav -->

                    <a href="#0" title="Close Menu" class="s-header__overlay-close close-mobile-menu">Close</a>

                </nav> <!-- end header__nav-wrap -->
                
                <a class="s-header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>

            </div> <!-- end s-header__content -->

        </header> <!-- end header -->

        @yield('content')

    <!-- footer
        ================================================== -->
        <footer class="s-footer">
            <hr>
            <div class="s-footer__bottom">
                <div class="row">
                    <div class="column">
                        <div class="ss-copyright">
                            <span>© Copyright Amcodr {{ date('Y') }}</span> 
                        </div> <!-- end ss-copyright -->
                    </div>
                </div> 

                <div class="ss-go-top">
                    <a class="smoothscroll" title="Back to Top" href="#top">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M6 4h12v2H6zm5 10v6h2v-6h5l-6-6-6 6z"/></svg>
                    </a>
                </div> <!-- end ss-go-top -->
            </div> <!-- end s-footer__bottom -->

        </footer> <!-- end s-footer -->


   <!-- Java Script
     ================================================== -->
     <script src="{{ asset('front/js/jquery-3.2.1.min.js') }}"></script>
     <script src="{{ asset('front/js/plugins.js') }}"></script>
     <script src="{{ asset('front/js/main.js') }}"></script>

 </body>

 </html>