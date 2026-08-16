@extends('admin.layouts.app')

@section('title', 'Edit Page - Admin')

@section('page-title', 'पृष्ठ सम्पादन गर्नुहोस्')

@section('content')
<div class="card">
    <div class="card-header">पृष्ठ सम्पादन</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.pages.update', $page) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label">शीर्षक *</label>
                <input type="text" class="form-control" name="title" value="{{ old('title', $page->title) }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Slug</label>
                <input type="text" class="form-control" name="slug" value="{{ old('slug', $page->slug) }}" placeholder="Auto-generated if empty">
            </div>
            
            <div class="mb-3">
                <label class="form-label">अंश</label>
                <textarea class="form-control" name="excerpt" rows="2">{{ old('excerpt', $page->excerpt) }}</textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">सामग्री *</label>
                <textarea class="form-control" name="content" rows="10" required>{{ old('content', $page->content) }}</textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">विशेष चित्र</label>
                <input type="file" class="form-control" name="featured_image">
                @if($page->featured_image)
                <small class="text-muted">Current: <a href="{{ asset('storage/' . $page->featured_image) }}" target="_blank">View Image</a></small>
                @endif
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">क्रम</label>
                    <input type="number" class="form-control" name="order" value="{{ old('order', $page->order) }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">SEO Title</label>
                    <input type="text" class="form-control" name="seo_title" value="{{ old('seo_title', $page->seo_title) }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">स्थिति</label>
                    <select class="form-control" name="is_published">
                        <option value="1" {{ old('is_published', $page->is_published) ? 'selected' : '' }}>Published</option>
                        <option value="0" {{ old('is_published', $page->is_published) ? '' : 'selected' }}>Draft</option>
                    </select>
                </div>
            </div>
            
            <div class="mb-3">
                <label class="form-label">SEO Description</label>
                <textarea class="form-control" name="seo_description" rows="2">{{ old('seo_description', $page->seo_description) }}</textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">SEO Keywords</label>
                <input type="text" class="form-control" name="seo_keywords" value="{{ old('seo_keywords', $page->seo_keywords) }}">
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>अपडेट गर्नुहोस्
            </button>
            <a href="{{ route('admin.pages.index') }}" class="btn btn-secondary">रद्द गर्नुहोस्</a>
        </form>
    </div>
</div>
@endsection
