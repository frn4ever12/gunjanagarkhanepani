@extends('admin.layouts.app')

@section('title', 'Create Slider - Admin')

@section('page-title', 'नयाँ स्लाइडर सिर्जना गर्नुहोस्')

@section('content')
<div class="card">
    <div class="card-header">नयाँ स्लाइडर</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.sliders.store') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">शीर्षक *</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">उपशीर्षक</label>
                <input type="text" class="form-control" name="subtitle" value="{{ old('subtitle') }}">
            </div>
            
            <div class="mb-3">
                <label class="form-label">चित्र *</label>
                <input type="file" class="form-control" name="image" required>
                <small class="text-muted">JPEG, JPG, PNG, GIF, WEBP (Max: 5MB)</small>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">बटन पाठ</label>
                    <input type="text" class="form-control" name="button_text" value="{{ old('button_text') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">बटन URL</label>
                    <input type="url" class="form-control" name="button_url" value="{{ old('button_url') }}">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">क्रम</label>
                    <input type="number" class="form-control" name="order" value="{{ old('order', 0) }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">ओभरले देखाउनुहोस्</label>
                    <select class="form-control" name="show_overlay">
                        <option value="1" {{ old('show_overlay') ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ old('show_overlay') ? '' : 'selected' }}>No</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">स्थिति</label>
                    <select class="form-control" name="is_active">
                        <option value="1" {{ old('is_active', true) ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('is_active', true) ? '' : 'selected' }}>Inactive</option>
                    </select>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>सुरक्षा गर्नुहोस्
            </button>
            <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">रद्द गर्नुहोस्</a>
        </form>
    </div>
</div>
@endsection
