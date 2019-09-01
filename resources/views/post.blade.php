@extends('layouts.app')

@section('content')
    <!--Main layout-->
    <main class="mt-8 pt-5">
        <div class="container">

            <!--Section: Post-->
            <section class="mt-7">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12 mb-4">
                        <div class="pull-right">
                            <a href="/post/{{$post->id}}/edit" class="btn-floating btn-sm btn-secondary"><i class="fas fa-edit"></i></a>
                            <form action="{{url('post', [$post->id])}}" method="POST">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn-floating btn-sm btn-danger" value="Delete"/>
                            </form>
                        </div>

                        <!--Featured Image-->
                        <div class="card mb-4 h-25 wow fadeIn">

                            <img src="/img/post.jpeg" class="img-fluid w-auto h-100" alt="">

                        </div>
                        <!--/.Featured Image-->

                        <!--Card-->
                        <div class="card mb-4 wow fadeIn">

                            <!--Card content-->
                            <div class="card-body">

                                <p class="h5 my-4">{{$post->title}}</p>

                                <p>{{$post->description}}</p>

                            </div>

                        </div>
                        <!--/.Card-->

                        <!--Card-->
                        <div class="card mb-4 wow fadeIn">

                            <div class="card-header font-weight-bold">
                                <span>About author</span>
                                <span class="pull-right">
                  <a href="">
                    <i class="fab fa-facebook-f mr-2"></i>
                  </a>
                  <a href="">
                    <i class="fab fa-twitter mr-2"></i>
                  </a>
                  <a href="">
                    <i class="fab fa-instagram mr-2"></i>
                  </a>
                  <a href="">
                    <i class="fab fa-linkedin-in mr-2"></i>
                  </a>
                </span>
                            </div>

                            <!--Card content-->
                            <div class="card-body">

                                <div class="media d-block d-md-flex mt-3">
                                    <img class="d-flex mb-3 mx-auto z-depth-1" src="/img/user.jpg"
                                         alt="Generic placeholder image" style="width: 100px;">
                                    <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                        <h5 class="mt-0 font-weight-bold">{{$post->username}}
                                        </h5>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!--/.Card-->

                        <!--Comments-->
                        @if(count($comments)>0)
                        <div class="card card-comments mb-3 wow fadeIn">
                            <div class="card-header font-weight-bold">{{count($comments)}} comments</div>
                            @foreach($comments as $comment)
                            <div class="card-body">
                                <div class="media d-block d-md-flex mt-4">
                                    <img class="d-flex mb-3 mx-auto " src="/img/user.jpg" alt="Generic placeholder image"
                                         style="width: 4rem;">
                                    <div class="media-body text-center text-md-left ml-md-3 ml-0">
                                        <h5 class="mt-0 font-weight-bold">{{$comment->user}}
                                            <a href="" class="pull-right">
                                                <form action="/post/comment/delete" method="POST">
                                                    <input type="hidden" name="id" value="{{$comment->id}}">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn-floating btn-sm btn-danger" value="Delete"/>
                                                </form>
                                            </a>
                                        </h5>
                                        {{$comment->message}}
                                    </div>
                                </div>
                            </div>
                        </div>
                            @endforeach
                        @else
                            <p>No comments here</p>
                        @endif
                        <!--/.Comments-->

                        <!--Reply-->
                        <div class="card mb-3 wow fadeIn">
                            <div class="card-header font-weight-bold">Leave a reply</div>
                            <div class="card-body">

                                <!-- Default form reply -->
                                <form Method="POST" action="/post/comment">
                                {{csrf_field()}}
                                    <!-- Name -->
                                    <div class="md-form mt-3">
                                        <input type="text" name="name" class="form-control">
                                        <label for="name">Name</label>
                                    </div>
                                    <input type="text" name="id" value="{{$post->id}}" hidden>
                                    <!--Message-->
                                    <div class="md-form">
                                        <textarea name="comment" class="form-control md-textarea" rows="3"></textarea>
                                        <label for="comment">Comment</label>
                                    </div>

                                    <div class="text-center mt-4">
                                        <button class="btn btn-info btn-md" type="submit">Post</button>
                                    </div>
                                </form>
                                <!-- Default form reply -->


                            </div>
                        </div>
                        <!--/.Reply-->

                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->

            </section>
            <!--Section: Post-->

        </div>
    </main>
    <!--Main layout-->
@endsection