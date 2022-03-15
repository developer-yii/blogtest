@extends('layouts.front')
@section('content')
    <!-- content
        ================================================== -->
        <section class="s-content s-content--single">
            <div class="row">
                <div class="column large-12">

                    <article class="s-post entry format-standard">

                        <div class="s-content__media">
                            <div class="s-content__post-thumb">
                                <img src="{{ asset('admin-assets/blog-images/'.$data->image) }}" style="width:100%; height: 100%;" sizes="(max-width: 2100px) 100vw, 2100px" alt="">
                            </div>
                        </div> <!-- end s-content__media -->

                        <div class="s-content__primary">

                            <h2 class="s-content__title s-content__title--post">{{ $data->title }}</h2>

                            <ul class="s-content__post-meta">
                                <li class="date">{{ date('F d, Y', strtotime($data->created_at)) }}</li>
                                <li class="cat">{{ $data->tags }}</li>
                            </ul>

                            <div class="log_description_div">{!! html_entity_decode($data->long_description) !!}</div>

                     </div> <!-- end s-content__primary -->
                 </article>

             </div> <!-- end column -->
         </div> <!-- end row -->


        </section> <!-- end s-content -->
        @endsection