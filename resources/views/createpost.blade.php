@extends('layouts.app')

@section('content')
    <main class="mt-5 pt-5">
        <div class="container">

            <section class=" wow fadeIn" style="padding-top: 70px;">
                <!-- Material form contact -->
                <h4 style="text-align: center;">Create new Post Here</h4>
                <!--Card content-->
                <div class="card-body px-lg-5 pt-0 col-sm-8" style="margin: auto">

                    <!-- Form -->
                    <form class="text-center" style="color: #757575;" method="POST" action="/post">
                        {{csrf_field()}}
                        <!-- Name -->
                        <div class="md-form mt-3">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control">
                        </div>
                        <!-- Username -->
                        <div class="md-form">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>

                        <!--Message-->
                        <div class="md-form">
                            <label>Message</label>
                            <textarea name= "message" class="form-control md-textarea" rows="5"></textarea>
                        </div>
                        <!-- Send button -->
                        <button class="btn btn-outline-info btn-rounded btn-block z-depth-0 my-4 waves-effect"
                                type="submit">Create
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