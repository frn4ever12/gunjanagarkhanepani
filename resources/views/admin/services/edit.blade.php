@extends('admin.layouts.app')

@section('title', 'Edit Service - Admin')

@section('page-title', 'सेवा सम्पादन गर्नुहोस्')

@section('content')
<div class="card">
    <div class="card-header">सेवा सम्पादन</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.services.update', $service) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label">शीर्षक *</label>
                <input type="text" class="form-control" name="title" value="{{ old('title', $service->title) }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">विवरण *</label>
                <textarea class="form-control" name="description" rows="3" required>{{ old('description', $service->description) }}</textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">सामग्री</label>
                <textarea class="form-control" name="content" rows="5">{{ old('content', $service->content) }}</textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">आइकन (Font Awesome)</label>
                <input type="text" class="form-control" name="icon" value="{{ old('icon', $service->icon) }}" placeholder="fa-tint">
            </div>
            
            <div class="mb-3">
                <label class="form-label">चित्र</label>
                <input type="file" class="form-control" name="image">
                @if($service->image)
                <small class="text-muted">Current: <a href="{{ asset('storage/' . $service->image) }}" target="_blank">View Image</a></small>
                @endif
            </div>
            
            <div class="mb-3">
                <label class="form-label">बाह्य लिंक</label>
                <input type="url" class="form-control" name="external_link" value="{{ old('external_link', $service->external_link) }}">
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">क्रम</label>
                    <input type="number" class="form-control" name="order" value="{{ old('order', $service->order) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">SEO Title</label>
                    <input type="text" class="form-control" name="seo_title" value="{{ old('seo_title', $service->seo_title) }}">
                </div>
            </div>
            
            <div class="mb-3">
                <label class="form-label">SEO Description</label>
                <textarea class="form-control" name="seo_description" rows="2">{{ old('seo_description', $service->seo_description) }}</textarea>
            </div>
            
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="is_active" id="is_active" {{ old('is_active', $service->is_active) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">Active</label>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>अपडेट गर्नुहोस्
            </button>
            <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">रद्द गर्नुहोस्</a>
        </form>
    </div>
</div>
@endsection
