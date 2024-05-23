@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-primary">
        <div class="container">
            <h1 class="text-white">{{ $project->title }}</h1>
        </div>
    </header>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">

                    @if (Str::startsWith($project->project_img, 'https://'))
                        <img class="img-fluid" loading="lazy" src="{{ $project->project_img }}" alt="{{ $project->title }}">
                    @else
                        <img class="img-fluid" loading="lazy" src="{{ asset('storage/' . $project->project_img) }}"
                            alt="{{ $project->title }}">
                    @endif
                </div>

                <div class="col">
                    <h5 class="text-muted">{{ $project->slug }}</h5>
                    <h3 class="text-muted">{{ $project->title }}</h3>
                    <p>{{ $project->project_link }}</p>
                    <p>{{ $project->project_github }}</p>
                    <p>{{ $project->description }}</p>
                </div>
            </div>
        </div>
        <!-- /.container -->
    </section>
@endsection
