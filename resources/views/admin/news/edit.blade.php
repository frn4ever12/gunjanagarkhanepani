@extends('admin.layouts.app')

@section('title', 'Edit News - Admin')

@section('page-title', 'समाचार सम्पादन गर्नुहोस्')

@section('content')
<div class="card">
    <div class="card-header">समाचार सम्पादन</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label">शीर्षक *</label>
                <input type="text" class="form-control" name="title" value="{{ old('title', $news->title) }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">अंश</label>
                <textarea class="form-control" name="excerpt" rows="2">{{ old('excerpt', $news->excerpt) }}</textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">सामग्री *</label>
                <textarea class="form-control" name="content" rows="10" required>{{ old('content', $news->content) }}</textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">विशेष चित्र</label>
                <input type="file" class="form-control" name="featured_image">
                @if($news->featured_image)
                <small class="text-muted">Current: <a href="{{ asset('storage/' . $news->featured_image) }}" target="_blank">View Image</a></small>
                @endif
            </div>
            
            <div class="mb-3">
                <label class="form-label">संलग्नक</label>
                <input type="file" class="form-control" name="attachment">
                @if($news->attachment)
                <small class="text-muted">Current: <a href="{{ asset('storage/' . $news->attachment) }}" target="_blank">View File</a></small>
                @endif
            </div>
            
            <div class="mb-3">
                <label class="form-label">प्रकाशन मिति *</label>
                <input type="date" class="form-control" name="publish_date" value="{{ old('publish_date', $news->publish_date->format('Y-m-d')) }}" required>
            </div>
            
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="is_featured" id="is_featured" {{ old('is_featured', $news->is_featured) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_featured">Featured</label>
            </div>
            
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="is_published" id="is_published" {{ old('is_published', $news->is_published) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_published">Published</label>
            </div>
            
            <div class="mb-3">
                <label class="form-label">SEO Title</label>
                <input type="text" class="form-control" name="seo_title" value="{{ old('seo_title', $news->seo_title) }}">
            </div>
            
            <div class="mb-3">
                <label class="form-label">SEO Description</label>
                <textarea class="form-control" name="seo_description" rows="2">{{ old('seo_description', $news->seo_description) }}</textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">SEO Keywords</label>
                <input type="text" class="form-control" name="seo_keywords" value="{{ old('seo_keywords', $news->seo_keywords) }}">
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>अपडेट गर्नुहोस्
            </button>
            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">रद्द गर्नुहोस्</a>
        </form>
    </div>
</div>
@endsection
