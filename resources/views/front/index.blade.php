@extends('layouts.front')

@section('content')

    <!-- masonry
        ================================================== -->
        <section class="s-bricks">

            <div class="masonry">
                <div class="bricks-wrapper h-group">

                    <div class="grid-sizer"></div>

                    @foreach($blogs as $blog)
                    <article class="brick entry format-standard animate-this">

                        <div class="entry__thumb">
                            <a href="{{ url('post/'.$blog->id) }}" class="thumb-link">
                                <img src="{{ asset('admin-assets/blog-images/'.$blog->image) }}" style="width:100%; height: 100%;" alt="">
                            </a>
                        </div>  <!-- end entry__thumb -->

                        <div class="entry__text">
                            <div class="entry__header">

                                <div class="entry__meta">
                                    <span class="entry__cat-links">
                                        {{ $blog->tags }}
                                    </span>
                                </div>

                                <h1 class="entry__title"><a href="{{ url('post/'.$blog->id) }}">{{ $blog->title }}</a></h1>

                            </div>
                            <div class="entry__excerpt">
                                <p>
                                    {{ substr($blog->short_description,0,300).'...' }}
                                </p>
                            </div>
                        </div> <!-- end entry__text -->

                    </article> <!-- end article -->
                    @endforeach

                </div> <!-- end brick-wrapper --> 

            </div> <!-- end masonry -->
            

        </section> <!-- end s-bricks -->

        @endsection