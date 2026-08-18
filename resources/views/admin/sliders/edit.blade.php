@extends('admin.layouts.app')

@section('title', 'Edit Slider - Admin')

@section('page-title', 'स्लाइडर सम्पादन गर्नुहोस्')

@section('content')
<div class="card">
    <div class="card-header">स्लाइडर सम्पादन</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.sliders.update', $slider) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label">शीर्षक *</label>
                <input type="text" class="form-control" name="title" value="{{ old('title', $slider->title) }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">उपशीर्षक</label>
                <input type="text" class="form-control" name="subtitle" value="{{ old('subtitle', $slider->subtitle) }}">
            </div>
            
            <div class="mb-3">
                <label class="form-label">चित्र</label>
                <input type="file" class="form-control" name="image">
                @if($slider->image)
                @if(str_starts_with($slider->image, 'http://') || str_starts_with($slider->image, 'https://'))
                <small class="text-muted">Current: <a href="{{ $slider->image }}" target="_blank">View Image</a></small>
                @else
                <small class="text-muted">Current: <a href="{{ asset('storage/' . $slider->image) }}" target="_blank">View Image</a></small>
                @endif
                @endif
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">बटन पाठ</label>
                    <input type="text" class="form-control" name="button_text" value="{{ old('button_text', $slider->button_text) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">बटन URL</label>
                    <input type="url" class="form-control" name="button_url" value="{{ old('button_url', $slider->button_url) }}">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">क्रम</label>
                    <input type="number" class="form-control" name="order" value="{{ old('order', $slider->order) }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">ओभरले देखाउनुहोस्</label>
                    <select class="form-control" name="show_overlay">
                        <option value="1" {{ old('show_overlay', $slider->show_overlay) ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ old('show_overlay', $slider->show_overlay) ? '' : 'selected' }}>No</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">स्थिति</label>
                    <select class="form-control" name="is_active">
                        <option value="1" {{ old('is_active', $slider->is_active) ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('is_active', $slider->is_active) ? '' : 'selected' }}>Inactive</option>
                    </select>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>अपडेट गर्नुहोस्
            </button>
            <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">रद्द गर्नुहोस्</a>
        </form>
    </div>
</div>
@endsection
