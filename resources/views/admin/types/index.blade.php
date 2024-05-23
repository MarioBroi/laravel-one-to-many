@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-primary">
        <div class="container d-flex justify-content-between align-items-center">
            <h1 class="text-white">Types</h1>
            <a href="{{ route('admin.types.create') }}" class="btn btn-dark"><i class="fa fa-pencil" aria-hidden="true"></i>
                Create new type</a>
        </div>
    </header>

    <section class="py-5">
        <div class="container">

            <h3>All types</h3>

            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    {{ session('message') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Name</th>
                            <th scope="col" class="text-center">Slug</th>
                            <th scope="col" class="text-center">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($types as $type)
                            <tr class="">
                                <td scope="row" class="text-center">{{ $type->id }}</td>
                                <td class="text-center">{{ $type->name }}</td>
                                <td class="text-center">{{ $type->slug }}</td>
                                <td class="text-center">
                                    <a href="" class="btn btn-primary">Show <i class="fa fa-eye"
                                            aria-hidden="true"></i></a>

                                    <a href="" class="btn btn-primary">Edit <i
                                            class="fa-solid fa-pen-to-square"></i></a>

                                    <a href="" class="btn btn-danger">Delete</a>

                            </tr>
                        @empty
                            <tr class="">
                                <td scope="row" colspan="5">Nothing to display</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- /.table -->
        </div>
        <!-- /.container -->
    </section>
@endsection
