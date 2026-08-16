@extends('admin.layouts.app')

@section('title', 'Edit Video - Admin')

@section('page-title', 'भिडियो सम्पादन गर्नुहोस्')

@section('content')
<div class="card">
    <div class="card-header">भिडियो सम्पादन</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.videos.update', $video) }}">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label">शीर्षक *</label>
                <input type="text" class="form-control" name="title" value="{{ old('title', $video->title) }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">विवरण</label>
                <textarea class="form-control" name="description" rows="3">{{ old('description', $video->description) }}</textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">भिडियो URL *</label>
                <input type="url" class="form-control" name="video_url" value="{{ old('video_url', $video->video_url) }}" required placeholder="https://youtube.com/watch?v=...">
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">भिडियो प्रकार *</label>
                    <select class="form-control" name="video_type" required>
                        <option value="youtube" {{ old('video_type', $video->video_type) === 'youtube' ? 'selected' : '' }}>YouTube</option>
                        <option value="vimeo" {{ old('video_type', $video->video_type) === 'vimeo' ? 'selected' : '' }}>Vimeo</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">थम्बनेल URL</label>
                    <input type="url" class="form-control" name="thumbnail" value="{{ old('thumbnail', $video->thumbnail) }}">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">श्रेणी</label>
                    <input type="text" class="form-control" name="category" value="{{ old('category', $video->category) }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">क्रम</label>
                    <input type="number" class="form-control" name="order" value="{{ old('order', $video->order) }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">स्थिति</label>
                    <select class="form-control" name="is_published">
                        <option value="1" {{ old('is_published', $video->is_published) ? 'selected' : '' }}>Published</option>
                        <option value="0" {{ old('is_published', $video->is_published) ? '' : 'selected' }}>Draft</option>
                    </select>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>अपडेट गर्नुहोस्
            </button>
            <a href="{{ route('admin.videos.index') }}" class="btn btn-secondary">रद्द गर्नुहोस्</a>
        </form>
    </div>
</div>
@endsection
