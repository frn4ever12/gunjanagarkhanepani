@extends('admin.layouts.app')

@section('title', 'Edit Gallery Album - Admin')

@section('page-title', 'ग्यालरी एल्बम सम्पादन गर्नुहोस्')

@section('content')
<div class="card">
    <div class="card-header">ग्यालरी एल्बम सम्पादन</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.gallery.update-album', $album) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label">नाम *</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $album->name) }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">विवरण</label>
                <textarea class="form-control" name="description" rows="3">{{ old('description', $album->description) }}</textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">कभर चित्र</label>
                <input type="file" class="form-control" name="cover_image">
                @if($album->cover_image)
                <small class="text-muted">Current: <a href="{{ asset('storage/' . $album->cover_image) }}" target="_blank">View Image</a></small>
                @endif
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">क्रम</label>
                    <input type="number" class="form-control" name="order" value="{{ old('order', $album->order) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">स्थिति</label>
                    <select class="form-control" name="is_active">
                        <option value="1" {{ old('is_active', $album->is_active) ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('is_active', $album->is_active) ? '' : 'selected' }}>Inactive</option>
                    </select>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>अपडेट गर्नुहोस्
            </button>
            <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary">रद्द गर्नुहोस्</a>
        </form>
    </div>
</div>
@endsection
