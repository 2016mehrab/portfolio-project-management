@extends('layouts.app')
@section('title', 'Add project')
@section('content')
    <h1 class="text-2xl mb-4">Add project</h1>
    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data"
        class="bg-white p-4 rounded border">
        @csrf
        <div class="mb-4">
            <label for="title" class="form-label">Title</label>
            <input name="title" id="title" type='text' value="{{ old('title') }}"
                class="form-control @error('title') border-red-500 @enderror">
            @error('title')

                <p class="alert alert-danger d-flex align-items-center" role="alert">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-4 ">

            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea>
        </div>
        <div class="mb-4">
            <label for="project_url" class="form-label">Project URL</label>
            <input type="url" id="project_url" name='project_url' value="{{ old('project_url') }}"
                class="form-control @error('project_url') border-red-500 @enderror">
            @error('project_url')
                <p class="alert alert-danger d-flex align-items-center" role="alert">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="image_path" class="form-label">Image</label>
            <input type="file" id="image_path" name='image_path' value="{{ old('image_path') }}"
                class="form-control @error('image_path') border-red-500 @enderror">
            <div class="form-text">Maximum file size 2MB.</div>
            @error('image_path')
                <p class="alert alert-danger d-flex align-items-center" role="alert">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-4">
            <label for="status" class="form-label">Status</label>
            <select id="status" name='status' 
                class="form-select @error('status') border-red-500 @enderror">
                <option value="draft" {{ old('status','draft') == 'draft' ? 'selected' : '' }}> Draft</option>
                <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}> Published</option>
            </select>
            @error('status')
                <p class="alert alert-danger d-flex align-items-center" role="alert">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="d-flex justify-content-end">

            <button type="submit" class="btn btn-primary">Save</button>
        </div>

    </form>
@endsection
