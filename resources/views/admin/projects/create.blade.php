@extends('layouts.admin')
@section('content')
    <header class="bg-primary text-white py-3">
        <div class="container">
            <h1>New project</h1>
        </div>
    </header>
    <div class="container py-3">

        @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" @error('title') is-invalid @enderror name="title"
                    id="title" aria-describedby="titleHelper" placeholder="Project title" value="{{ old('title') }}" />
                <small id="titleHelper" class="form-text text-muted">Type a title for this project</small>
                @error('title')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!-- /title -->

            <div class="mb-3">
                <label for="project_link" class="form-label">Project link</label>
                <input type="text" class="form-control" @error('project_link') is-invalid @enderror name="project_link"
                    id="project_link" aria-describedby="project_linkHelper" placeholder="Project project_link"
                    value="{{ old('project_link') }}" />
                <small id="project_linkHelper" class="form-text text-muted">Type a link for this project</small>
                @error('project_link')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!-- /project link -->

            <div class="mb-3">
                <label for="project_github" class="form-label">Project GitHub</label>
                <input type="text" class="form-control" @error('project_github') is-invalid @enderror
                    name="project_github" id="project_github" aria-describedby="project_githubHelper"
                    placeholder="Project project_github" value="{{ old('project_github') }}" />
                <small id="project_githubHelper" class="form-text text-muted">Type a link for this project</small>
                @error('project_github')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!-- /project link -->

            <div class="mb-3">
                <label for="project_img" class="form-label">Project image</label>
                <input type="file" class="form-control" @error('project_img') is-invalid @enderror name="project_img"
                    id="project_img" aria-describedby="project_imgHelper" placeholder="https://" />
                <small id="project_imgHelper" class="form-text text-muted">Select the project image</small>
                @error('project_img')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" @error('description') is-invalid @enderror name="description" id="description"
                    rows="5">{{ old('description') }}</textarea>
                @error('description')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
@endsection
