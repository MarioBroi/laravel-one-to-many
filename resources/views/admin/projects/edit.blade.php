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

        <form action="{{ route('admin.projects.update', $project) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" @error('title') is-invalid @enderror name="title"
                    id="title" aria-describedby="titleHelper" placeholder="Project title"
                    value="{{ $project->title }}" />
                <small id="titleHelper" class="form-text text-muted">Type a title for this post</small>
                @error('title')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                @if (Str::startsWith($project->project_img, 'https://'))
                    <img width="140" src="{{ $project->project_img }}" alt="{{ $project->title }}">
                @else
                    <img width="140" src="{{ asset('storage/' . $project->project_img) }}" alt="{{ $project->title }}">
                @endif
                <label for="project_img" class="form-label">Project image</label>
                <input type="file" class="form-control" @error('project_img') is-invalid @enderror name="project_img"
                    id="project_img" aria-describedby="project_imgHelper" placeholder="https://" value="" />
                <small id="project_imgHelper" class="form-text text-muted">Put the project image link</small>
                @error('project_img')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" @error('description') is-invalid @enderror name="description" id="description"
                    rows="5">{{ $project->description }}</textarea>
                @error('description')
                    <div class="text-danger py-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
