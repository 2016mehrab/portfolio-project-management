@extends('layouts.app')
@section('title', 'All Projects')

@section('content')
    <div class="container my-4">
        <h1 class="mb-4">All Projects</h1>


        @if ($projects->isEmpty())
            <p class="text-muted">No projects found.</p>
        @else
            <div class="row">
                @foreach ($projects as $project)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow-sm">
                            <a href="{{ route('projects.show', $project) }}" class="text-decoration-none text-dark">

                                @if ($project->image_path)
                                    <div style="height: 400px; overflow: hidden;">
                                        <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->title }}"
                                            class="w-100" style="height: 100%; object-fit: cover;">
                                    </div>
                                @endif

                                <div class="card-body">
                                    <h5 class="card-title">{{ $project->title }}</h5>
                                    <p class="card-text">{{ Str::limit($project->description, 100) }}</p>
                                </div>
                                <div
                                    class="card-footer bg-transparent border-0 d-flex justify-content-between align-items-center">

                                    @if ($project->status == 'published')
                                        <span class="badge text-bg-success text-capitalize">{{ $project->status }}</span>
                                    @else
                                        <span class="badge text-bg-secondary text-capitalize">{{ $project->status }}</span>
                                    @endif
                                    @if ($project->project_url && $project->status == 'published')
                                        <a href="{{ $project->project_url }}" class="btn btn-sm btn-outline-primary"
                                            target="_blank">Visit</a>
                                    @else
                                    @endif
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $projects->links() }}
            </div>
            <a href="{{ route('projects.create') }}"
                class="btn btn-primary rounded-circle shadow position-fixed bottom-0 end-0 m-4 p-0 d-flex align-items-center justify-content-center"
                style="width: 60px; height: 60px;">
                <span class="fs-2">+</span>
            </a>
        @endif
    </div>
@endsection
