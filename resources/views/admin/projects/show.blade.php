@extends('layouts.admin')

@section('content')
    <section class="py-3 admin_section">
        <div class="container">
            <h2 class="title_section">{{ $project->title }}</h2>
            <div class="d-flex justify-content-end gap-2 pb-2">
                <a class="btn btn-secondary" href="{{ route('admin.projects.index') }}">Projects List</a>
                <a class="btn btn-warning" href="{{ route('admin.projects.edit', $project) }}">Edit</a>
            </div>

            @include('partials.confirm-form')

            <div class="row py-3">
                <div class="col-6">
                    @if (Str::startsWith($project->preview, 'https://'))
                        <img class="img-fluid" src="{{ $project->preview }}" alt="{{ $project->title }}">
                    @else
                        <img class="img-fluid" src="{{ asset('storage/' . $project->preview) }}"
                            alt="{{ $project->title }}">
                    @endif
                </div>
                <div class="col-6">
                    <ul class="list-unstyled d-flex flex-column gap-2">
                        <li>
                            <strong>Description: </strong><br>
                            {{ $project->description }}
                        </li>
                        <li>
                            <strong>Type: </strong><br>
                            {{ $project->type ? $project->type->name : 'No type' }}
                        </li>
                        <li>
                            <strong>Project link: </strong><br>
                            <a href="{{ $project->repo_link }}">Go to project</a>
                        </li>
                        <li>
                            <strong>Repository link: </strong><br>
                            <a href="{{ $project->repo_link }}">Check project code</a>
                        </li>
                        <li>
                            <strong>Start Date: </strong><br>
                            {{ $project->start_date }}
                        </li>
                        <li>
                            <strong>End Date: </strong><br>
                            {{ $project->end_date }}
                        </li>
                        <li>
                            <strong>Technologies: </strong>
                            <div class="d-flex flex-wrap gap-2 mt-1">
                                @forelse ($project->technologies as $technology)
                                    <span class="badge text-bg-primary">{{ $technology->name }}</span>
                                @empty
                                    <span class="badge text-bg-secondary">Nothing found</span>
                                @endforelse
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection
