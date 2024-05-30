@extends('layouts.admin')

@section('content')
    <section class="py-3 admin_section">
        <div class="container">
            <h2 class="title_section">{{ $type->name }}</h2>
            <div class="d-flex justify-content-end gap-2 pb-2">
                <a class="btn btn-secondary" href="{{ route('admin.types.index') }}">Types list</a>
                {{-- <a class="btn btn-warning" href="{{ route('admin.types.edit', $project) }}">Edit</a> --}}
            </div>

            @include('partials.confirm-form')

            <div class="row vh-100 py-3 justify-content-center">

                <div class="col-6 text-center">

                    <strong>Description: </strong>
                    <p>{{ $type->description }}</p>

                </div>
            </div>
        </div>
    </section>
@endsection
