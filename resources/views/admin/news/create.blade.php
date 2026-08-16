@extends('admin.layouts.app')

@section('title', 'Create News - Admin')

@section('page-title', 'नयाँ समाचार सिर्जना गर्नुहोस्')

@section('content')
<div class="card">
    <div class="card-header">नयाँ समाचार</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">शीर्षक *</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">अंश</label>
                <textarea class="form-control" name="excerpt" rows="2">{{ old('excerpt') }}</textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">सामग्री *</label>
                <textarea class="form-control" name="content" rows="10" required>{{ old('content') }}</textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">विशेष चित्र</label>
                <input type="file" class="form-control" name="featured_image">
                <small class="text-muted">JPEG, JPG, PNG, GIF, WEBP (Max: 5MB)</small>
            </div>
            
            <div class="mb-3">
                <label class="form-label">संलग्नक</label>
                <input type="file" class="form-control" name="attachment">
                <small class="text-muted">PDF, DOC, DOCX (Max: 10MB)</small>
            </div>
            
            <div class="mb-3">
                <label class="form-label">प्रकाशन मिति *</label>
                <input type="date" class="form-control" name="publish_date" value="{{ old('publish_date', now()->format('Y-m-d')) }}" required>
            </div>
            
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="is_featured" id="is_featured" {{ old('is_featured') ? 'checked' : '' }}>
                <label class="form-check-label" for="is_featured">Featured</label>
            </div>
            
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="is_published" id="is_published" {{ old('is_published', true) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_published">Published</label>
            </div>
            
            <div class="mb-3">
                <label class="form-label">SEO Title</label>
                <input type="text" class="form-control" name="seo_title" value="{{ old('seo_title') }}">
            </div>
            
            <div class="mb-3">
                <label class="form-label">SEO Description</label>
                <textarea class="form-control" name="seo_description" rows="2">{{ old('seo_description') }}</textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">SEO Keywords</label>
                <input type="text" class="form-control" name="seo_keywords" value="{{ old('seo_keywords') }}">
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>सुरक्षा गर्नुहोस्
            </button>
            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">रद्द गर्नुहोस्</a>
        </form>
    </div>
</div>
@endsection
