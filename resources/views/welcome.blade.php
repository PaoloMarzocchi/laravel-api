@extends('layouts.app')
@section('content')
    <section class="guest_section">
        <div class="jumbotron p-5 pb-4 rounded-3">
            <div class="container py-5 d-flex flex-column gap-2">
                <div class="my_logo">
                    <img width="400" class="img-fluid" src="{{ Vite::asset('resources/img/logo-pm.png') }}" alt="my logo">
                </div>
                <h1 class="display-5 fw-bold">
                    Welcome to My Portfolio
                </h1>

                <p class="col-md-8 fs-4">
                    I'm Paolo Marzocchi, a Junior Full-Stack Developer eager to build dynamic and responsive web
                    applications.
                </p>
                <p class="fs-5 w-50 text-secondary">
                    Explore my projects to see how I am learning and applying modern technologies to bring ideas to life.
                </p>
                <a style="width: fit-content" href="#" class="btn my_danger btn-lg" type="button">See my
                    projects</a>
            </div>
        </div>
    </section>
@endsection
