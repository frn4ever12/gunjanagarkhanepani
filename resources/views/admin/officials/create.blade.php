@extends('admin.layouts.app')

@section('title', 'Create Official - Admin')

@section('page-title', 'नयाँ पदाधिकारी सिर्जना गर्नुहोस्')

@section('content')
<div class="card">
    <div class="card-header">नयाँ पदाधिकारी</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.officials.store') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">नाम *</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">पद *</label>
                <input type="text" class="form-control" name="position" value="{{ old('position') }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Designation</label>
                <input type="text" class="form-control" name="designation" value="{{ old('designation') }}">
            </div>
            
            <div class="mb-3">
                <label class="form-label">फोटो *</label>
                <input type="file" class="form-control" name="photo" required>
                <small class="text-muted">JPEG, JPG, PNG, GIF, WEBP (Max: 5MB)</small>
            </div>
            
            <div class="mb-3">
                <label class="form-label">जीवनी</label>
                <textarea class="form-control" name="bio" rows="3">{{ old('bio') }}</textarea>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">फोन</label>
                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">इमेल</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">क्रम</label>
                    <input type="number" class="form-control" name="order" value="{{ old('order', 0) }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">गृहपृष्ठमा देखाउनुहोस्</label>
                    <select class="form-control" name="show_on_homepage">
                        <option value="1" {{ old('show_on_homepage', true) ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ old('show_on_homepage', true) ? '' : 'selected' }}>No</option>
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
            <a href="{{ route('admin.officials.index') }}" class="btn btn-secondary">रद्द गर्नुहोस्</a>
        </form>
    </div>
</div>
@endsection
