@extends('admin.layouts.app')

@section('title', 'Edit Important Link - Admin')

@section('page-title', 'महत्वपूर्ण लिंक सम्पादन गर्नुहोस्')

@section('content')
<div class="card">
    <div class="card-header">महत्वपूर्ण लिंक सम्पादन</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.important-links.update', $link) }}">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label">शीर्षक *</label>
                <input type="text" class="form-control" name="title" value="{{ old('title', $link->title) }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">URL *</label>
                <input type="url" class="form-control" name="url" value="{{ old('url', $link->url) }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">आइकन (Font Awesome)</label>
                <input type="text" class="form-control" name="icon" value="{{ old('icon', $link->icon) }}" placeholder="fa-link">
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">क्रम</label>
                    <input type="number" class="form-control" name="order" value="{{ old('order', $link->order) }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">नयाँ ट्याबमा खोल्नुहोस्</label>
                    <select class="form-control" name="opens_in_new_tab">
                        <option value="1" {{ old('opens_in_new_tab', $link->opens_in_new_tab) ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ old('opens_in_new_tab', $link->opens_in_new_tab) ? '' : 'selected' }}>No</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">स्थिति</label>
                    <select class="form-control" name="is_active">
                        <option value="1" {{ old('is_active', $link->is_active) ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('is_active', $link->is_active) ? '' : 'selected' }}>Inactive</option>
                    </select>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>अपडेट गर्नुहोस्
            </button>
            <a href="{{ route('admin.important-links.index') }}" class="btn btn-secondary">रद्द गर्नुहोस्</a>
        </form>
    </div>
</div>
@endsection
