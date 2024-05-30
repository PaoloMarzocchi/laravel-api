@extends('layouts.admin')

@section('content')
    <section class="py-3 admin_section">
        <div class="container">
            <h2 class="title_section">Types list</h2>

            <div class="d-flex justify-content-end pb-2">
                <a class="btn my_success" href="{{ route('admin.types.create') }}">Add new
                    Type</a>
            </div>
            @include('partials.confirm-form')
            <div class="d-flex gap-3">

                <div class="col-4">



                    <form action="{{ route('admin.technologies.store') }}" method="post">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Add new Technology</label>
                            <input width="20" type="text" class="form-control" name="name" id="name"
                                aria-describedby="nameHelper" placeholder="" />
                            <small id="nameHelper" class="form-text text-secondary">Insert name for new
                                Technology</small>
                        </div>
                        <button type="submit" class="btn my_success">
                            Add
                        </button>


                    </form>
                </div>

                <div class="col-6 ms-auto">
                    <div class="table-responsive my_table mb-2">
                        <table class="table mb-0 table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Slug</th>
                                    <th>Number of projects</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse($techs as $tech)
                                    <tr class="">
                                        <td scope="row">
                                            <form action="{{ route('admin.technologies.update', $tech) }}" method="post">
                                                @csrf
                                                @method('put')

                                                <input type="text" style="background-color: inherit; width:100px"
                                                    class="border-0 text-center" name="name" id="name"
                                                    placeholder="" value="{{ $tech->name }}" />



                                            </form>
                                        </td>
                                        <td>{{ $tech->slug }}</td>
                                        <td>

                                            <a class="btn btn-primary px-4" href="{{ route('admin.filtered', $tech) }}">
                                                {{ $tech->projects->count() }}
                                            </a>
                                        </td>

                                        <td width='150'>

                                            <!-- Modal trigger button -->
                                            <button type="button" class="btn my_danger btn-md" data-bs-toggle="modal"
                                                data-bs-target="#modalId--{{ $tech->id }}">
                                                <i class="fa-solid fa-trash fa-xs fa-fw" style="color: #ffffff;"></i>
                                            </button>

                                            <!-- Modal Body -->
                                            <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                            <div class="modal fade" id="modalId--{{ $tech->id }}" tabindex="-1"
                                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                                aria-labelledby="modalTitleId" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
                                                    role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalTitleId">
                                                                Deleting {{ $tech->name }}
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Attention! You are deleting this technology, this action is
                                                            irreversible.
                                                            Do you want to continue?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">
                                                                No, Go back
                                                            </button>
                                                            <form action="{{ route('admin.technologies.destroy', $tech) }}"
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
                                        <td scope="row" colspan="3">Nothing Found</td>
                                    </tr>
                                @endforelse



                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

            {{ $techs->links('pagination::bootstrap-5') }}

        </div>
    </section>
@endsection
