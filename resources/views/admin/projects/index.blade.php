@extends('layouts.admin')

@section('content')
    <section class="py-3 admin_section">
        <div class="container">
            <h2 class="title_section">Projects list</h2>
            <div class="d-flex justify-content-end pb-2">
                <a class="btn my_success" href="{{ route('admin.projects.create') }}">Add new
                    Project</a>
            </div>


            @include('partials.confirm-form')


            <div class="table-responsive my_table mb-2">
                <table class="table mb-0 table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Preview</th>
                            <th scope="col">Title</th>
                            <th scope="col">Type</th>
                            <th scope="col">Project link</th>
                            <th scope="col">Repository link</th>
                            <th scope="col">Start date</th>
                            <th scope="col">End date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($projects as $project)
                            <tr class="">
                                <td scope="row">

                                    @if (Str::startsWith($project->preview, 'https://'))
                                        <img width="200" loading="lazy" src="{{ $project->preview }}"
                                            alt="{{ $project->title }}">
                                    @else
                                        <img width="200" loading="lazy" src="{{ asset('storage/' . $project->preview) }}"
                                            alt="{{ $project->title }}">
                                    @endif

                                </td>
                                <td>{{ $project->title }}</td>
                                <td>{{ $project->type ? $project->type->name : '' }}</td>
                                <td><a href="{{ $project->project_url }}">Go to Project</a></td>
                                <td>
                                    <a href="{{ $project->repo_url }}">Check project code</a>
                                </td>
                                <td width='100'>{{ $project->start_date }}</td>
                                <td width='100'>{{ $project->end_date }}</td>
                                <td width='150'>
                                    <a class="btn my_success btn-sm" href="{{ route('admin.projects.show', $project) }}">
                                        <i class="fa-solid fa-eye fa-xs fa-fw" style="color: #ffffff;"></i>
                                    </a>
                                    <a class="btn btn-dark btn-sm" href="{{ route('admin.projects.edit', $project) }}">
                                        <i class="fa-solid fa-pen-to-square fa-xs fa-fw" style="color: #ffffff;"></i>
                                    </a>
                                    <!-- Modal trigger button -->
                                    <button type="button" class="btn my_danger btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#modalId-{{ $project->id }}">
                                        <i class="fa-solid fa-trash fa-xs fa-fw" style="color: #ffffff;"></i>
                                    </button>

                                    <!-- Modal Body -->
                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                    <div class="modal fade" id="modalId-{{ $project->id }}" tabindex="-1"
                                        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                        aria-labelledby="modalTitleId" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalTitleId">
                                                        Deleting {{ $project->title }}
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Attention! You are deleting this project, this action is irreversible.
                                                    Do you want to continue?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        No, Go back
                                                    </button>
                                                    <form action="{{ route('admin.projects.destroy', $project) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')

                                                        <button type="submit" class="btn btn-danger">
                                                            Yes, Delete it
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @empty
                            <tr class="">
                                <td scope="row" colspan="8">Nothing Found</td>
                            </tr>
                        @endforelse



                    </tbody>
                </table>
            </div>
            {{ $projects->links('pagination::bootstrap-5') }}
        </div>
    </section>
@endsection
