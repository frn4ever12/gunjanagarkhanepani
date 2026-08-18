@extends('admin.layouts.app')

@section('title', 'Edit Official - Admin')

@section('page-title', 'पदाधिकारी सम्पादन गर्नुहोस्')

@section('content')
<div class="card">
    <div class="card-header">पदाधिकारी सम्पादन</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.officials.update', $official) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label">नाम *</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $official->name) }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">पद *</label>
                <input type="text" class="form-control" name="position" value="{{ old('position', $official->position) }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Designation</label>
                <input type="text" class="form-control" name="designation" value="{{ old('designation', $official->designation) }}">
            </div>
            
            <div class="mb-3">
                <label class="form-label">फोटो</label>
                <input type="file" class="form-control" name="photo">
                @if($official->photo)
                <small class="text-muted">Current: <a href="{{ asset($official->photo) }}" target="_blank">View Photo</a></small>
                @endif
            </div>
            
            <div class="mb-3">
                <label class="form-label">जीवनी</label>
                <textarea class="form-control" name="bio" rows="3">{{ old('bio', $official->bio) }}</textarea>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">फोन</label>
                    <input type="text" class="form-control" name="phone" value="{{ old('phone', $official->phone) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">इमेल</label>
                    <input type="email" class="form-control" name="email" value="{{ old('email', $official->email) }}">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">क्रम</label>
                    <input type="number" class="form-control" name="order" value="{{ old('order', $official->order) }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">गृहपृष्ठमा देखाउनुहोस्</label>
                    <select class="form-control" name="show_on_homepage">
                        <option value="1" {{ old('show_on_homepage', $official->show_on_homepage) ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ old('show_on_homepage', $official->show_on_homepage) ? '' : 'selected' }}>No</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">स्थिति</label>
                    <select class="form-control" name="is_active">
                        <option value="1" {{ old('is_active', $official->is_active) ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('is_active', $official->is_active) ? '' : 'selected' }}>Inactive</option>
                    </select>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>अपडेट गर्नुहोस्
            </button>
            <a href="{{ route('admin.officials.index') }}" class="btn btn-secondary">रद्द गर्नुहोस्</a>
        </form>
    </div>
</div>
@endsection
