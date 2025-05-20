@extends('layouts.app')
@section('title', $project->title)

@section('content')
    <div class="container my-4">
        <h1 class="mb-4">{{ $project->title }}</h1>
        <div class="card shadow-sm">
            <div class="card-body">
                <p class="mb-3"><strong>Status:</strong>
                    @if ($project->status === 'published')
                        <span class="badge text-bg-success text-capitalize">{{ $project->status }}</span>
                    @else
                        <span class="badge text-bg-secondary text-capitalize">{{ $project->status }}</span>
                    @endif
                </p>


                <p class="mb-3"><strong>Project URL:</strong>
                    @if ($project->project_url)
                        <a href="{{ $project->project_url }}" class="link-primary"
                            target="_blank">{{ $project->project_url }}</a>
                    @else
                        <span class="text-muted">None</span>
                    @endif
                </p>

                <p class="mb-2"><strong>Image:</strong></p>
                <div class="mb-4 d-flex justify-content-center align-items-center bg-light overflow-hidden"
                    style="max-height: 400px;">
                    <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}" class="img-fluid object-fit-contain"
                        >
                </div>
                <p class="mb-3"><strong>Description:</strong> {{ $project->description ?? 'None' }}</p>
            </div>

            <div class="card-footer d-flex gap-2 flex-wrap">
                <a href="{{ route('projects.index') }}" class="btn btn-outline-secondary">Back to Projects</a>
                <a href="{{ route('projects.edit', $project) }}" class="btn btn-primary">Edit</a>

                <form action="{{ route('projects.destroy', $project) }}" method="POST"
                    onsubmit="return confirm('Are you sure you want to delete this project?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
