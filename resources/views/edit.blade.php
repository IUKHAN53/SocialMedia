@extends('layouts.app')

@section('content')
    <main class="mt-5 pt-5">
        <div class="container">

            <section class=" wow fadeIn" style="padding-top: 70px;">
                <!-- Material form contact -->
                <h4 style="text-align: center;">Edit Post</h4>
                <!--Card content-->
                <div class="card-body px-lg-5 pt-0 col-sm-8" style="margin: auto">

                    <!-- Form -->
                    <form class="text-center" style="color: #757575;" method="POST" action="{{ route('post.update', $post->id) }}">
                    @method('PATCH')
                    @csrf
                        <!-- Name -->
                        <div class="md-form mt-3">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control" value = {{ $post->title }}>
                        </div>
                        <!-- Username -->
                        <div class="md-form">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" value = {{ $post->username }}>
                        </div>

                        <!--Message-->
                        <div class="md-form">
                            <label>Message</label>
                            <textarea name= "message" class="form-control md-textarea" rows="5" value = {{ $post->description }}></textarea>
                        </div>
                        <!-- Send button -->
                        <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect"
                                type="submit">Update
                        </button>
                    </form>
                    <!-- Form -->
                </div>
                <!-- Material form contact -->
            </section>
        </div>
    </main>
    <!--Main layout-->
@endsection