@extends('layouts.admin')

@section('content')
    <section class="py-5 admin_section">
        <div class="container">
            <h2 class="title_section">Edit type</h2>
            <div class="d-flex justify-content-end pb-2">
                <a class="btn btn-secondary" href="{{ route('admin.types.index') }}">Types list</a>
            </div>

            @include('partials.alert-error-form')

            <form class="my_form" action="{{ route('admin.types.update', $type) }}" method="post">
                @csrf
                @method('put')

                <div class="mb-3 py-2">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                        id="name" aria-describedby="nameHelper" placeholder="Type name here"
                        value="{{ old('name', $type->name) }}" />
                    <small id="nameHelper" class="form-text text-secondary">Insert the type name</small>
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3 py-2 border-top">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                        cols="30" rows="10" aria-describedby="descriptionHelper" placeholder="Project description here">{{ old('description', $type->description) }}</textarea>
                    <small id="descriptionHelper" class="form-text text-secondary">Insert the project description</small>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn my_success" type="submit">Edit type</button>

            </form>
        </div>
    </section>
@endsection
