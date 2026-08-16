@extends('admin.layouts.app')

@section('title', 'Create Service - Admin')

@section('page-title', 'नयाँ सेवा सिर्जना गर्नुहोस्')

@section('content')
<div class="card">
    <div class="card-header">नयाँ सेवा</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.services.store') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">शीर्षक *</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">विवरण *</label>
                <textarea class="form-control" name="description" rows="3" required>{{ old('description') }}</textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">सामग्री</label>
                <textarea class="form-control" name="content" rows="5">{{ old('content') }}</textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">आइकन (Font Awesome)</label>
                <input type="text" class="form-control" name="icon" value="{{ old('icon', 'fa-tint') }}" placeholder="fa-tint">
            </div>
            
            <div class="mb-3">
                <label class="form-label">चित्र</label>
                <input type="file" class="form-control" name="image">
                <small class="text-muted">JPEG, JPG, PNG, GIF, WEBP (Max: 5MB)</small>
            </div>
            
            <div class="mb-3">
                <label class="form-label">बाह्य लिंक</label>
                <input type="url" class="form-control" name="external_link" value="{{ old('external_link') }}">
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">क्रम</label>
                    <input type="number" class="form-control" name="order" value="{{ old('order', 0) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">SEO Title</label>
                    <input type="text" class="form-control" name="seo_title" value="{{ old('seo_title') }}">
                </div>
            </div>
            
            <div class="mb-3">
                <label class="form-label">SEO Description</label>
                <textarea class="form-control" name="seo_description" rows="2">{{ old('seo_description') }}</textarea>
            </div>
            
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="is_active" id="is_active" {{ old('is_active', true) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_active">Active</label>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>सुरक्षा गर्नुहोस्
            </button>
            <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">रद्द गर्नुहोस्</a>
        </form>
    </div>
</div>
@endsection
