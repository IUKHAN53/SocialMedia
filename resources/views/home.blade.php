@extends('layouts.app')

@section('content')
    <!--Main layout-->
    <main class="mt-5">
        <div class="container">

            <section class="wow fadeIn pb-4">
                <a href="/post/create" class="btn btn-primary btn-lg">Create New Post</a>
            </section>
            <!--Section: Jumbotron-->
            <section class="card wow fadeIn"
                     style="background-image: url(https://mdbootstrap.com/img/Photos/Others/gradient1.jpg);">

                <!-- Content -->
                <div class="card-body text-white text-center py-5 px-5 my-5">

                    <h1 class="mb-4">
                        <strong>The Social Media</strong>
                    </h1>
                    <p>
                        <strong>Best & free guideline for you problem</strong>
                    </p>
                    <p class="mb-4">
                        <strong>The most comprehensive solution platform for the any time of questions & problems uses
                            by almost 4,000,000 users. Create you
                            own post and describe your problem in the post. Expert here will help you by commenting on
                            it.
                        </strong>
                    </p>

                </div>
                <!-- Content -->
            </section>
            <!--Section: Jumbotron-->

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
                                <i class="fas fa-comments"></i><strong>{{count($comments->where('post_id',$post->id))}}  Comments</strong>
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
                <nav class="d-flex justify-content-center wow fadeIn">
                    <ul class="pagination pg-blue">

                        <!--Arrow left-->
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>

                        <li class="page-item active">
                            <a class="page-link" href="#">1
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">4</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">5</a>
                        </li>

                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!--Pagination-->

            </section>
        </div>
    </main>
    <!--Main layout-->
@endsection
