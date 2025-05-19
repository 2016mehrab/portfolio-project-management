@extends('layouts.app')
@section('title', 'Edit project')
@section('content')
    <h1 class="text-2xl mb-4">Edit project</h1>
    <form action="{{ route('project.update',$project) }}" method="POST" enctype="multipart/form-data"
        class="bg-white p-4 rounded border">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="form-label">Title</label>
            <input name="title" id="title" type='text' value="{{ old('title', $project->title) }}"
                class="form-control @error('title') border-red-500 @enderror">
            @error('title')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-4 ">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="title" type='text' class="form-control">
                {{ old('description',$project->description) }}
            </textarea>
        </div>
        <div class="mb-4">
            <label for="project_url" class="form-label">Project URL</label>
            <input type="url" id="project_url" name='project_url' value="{{ old('project_url',$project->project_url) }}"
                class="form-control @error('project_url') border-red-500 @enderror">
            @error('project_url')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="image_path" class="form-label">Image</label>
            <input type="file" id="image_path" name='image_path' value="{{ old('image_path',$project->image_path) }}"
                class="form-control @error('image_path') border-red-500 @enderror">
            <div class="form-text mb-4">Maximum file size 5MB.</div>
            <p class="">Current: </p>
<img src="{{asset('storage/'.$project->image_path)}}" alt="Current Image" class="">
            @error('image_path')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="status" class="form-label">Status</label>
            <select id="status" name='status' 
                class="form-select @error('status') border-red-500 @enderror">
                <option value="draft" {{ old('status',$project->status) == 'draft' ? 'selected' : '' }}> Draft</option>
                <option value="published" {{ old('status',$project->status) == 'published' ? 'selected' : '' }}> Published</option>
            </select>
            @error('status')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="d-flex justify-content-end">

            <button type="submit" class="btn btn-primary">Update Project</button>
        </div>

    </form>
@endsection
