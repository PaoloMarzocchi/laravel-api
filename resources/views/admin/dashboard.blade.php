@extends('layouts.admin')

@section('content')
    <section class="admin_section">
        <div class="container">

            <h2 class="fs-4 title_section py-4 mt-0">
                {{ __('Dashboard') }}
            </h2>
            <div class="row vh-100 justify-content-center">
                <div class="col pt-5">
                    <div class="card mt-5">
                        <div class="card-header">{{ __('User Dashboard') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            {{ __('You are logged in!') }}
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </section>
@endsection
