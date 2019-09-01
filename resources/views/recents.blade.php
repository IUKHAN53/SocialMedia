@extends('layouts.app')

@section('content')
    <!--Main layout-->
    <main class="mt-5">
        <div class="container">

            <hr class="my-5">

            <!--Section: Cards-->
            <section class="text-center">

                <!--Grid row-->
                <div class="row mb-4 wow fadeIn">
                @if(count($posts)>=1)
                    @foreach($posts as $post)
                        <!--Grid column-->
                            <div class="col-lg-4 col-md-12 mb-4">

                                <!--Card-->

                                <div class="card">

                                    <!--Card image-->
                                    <div class="view overlay">
                                        <a href="/post/{{$post->id}}">
                                            <img src="img/post.jpeg" class="card-img-top"
                                                 alt="">

                                            <div class="mask rgba-white-slight"></div>
                                        </a>
                                    </div>

                                    <!--Card content-->
                                    <div class="card-body">
                                        <!--Title-->
                                        <h4 class="card-title">{{$post->title}}</h4>
                                        <!--Text-->
                                        <p class="card-text">{{$post->description}}</p>

                                        <hr>
                                        <p style="text-align: center; font-size:14px; color:lightgray"> Posted By: <a href="">{{$post->username}}</a></p>
                                    </div>

                                </div>

                                <!--/.Card-->
                            </div>
                        @endforeach
                    @else
                        <p>No Posts Found</p>
                    @endif
                </div>
            </section>
        </div>
    </main>
    <!--Main layout-->
@endsection
