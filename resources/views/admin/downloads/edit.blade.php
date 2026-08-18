@extends('admin.layouts.app')

@section('title', 'Edit Download - Admin')

@section('page-title', 'डाउनलोड सम्पादन गर्नुहोस्')

@section('content')
<div class="card">
    <div class="card-header">डाउनलोड सम्पादन</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.downloads.update', $download) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label">शीर्षक *</label>
                <input type="text" class="form-control" name="title" value="{{ old('title', $download->title) }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">विवरण</label>
                <textarea class="form-control" name="description" rows="3">{{ old('description', $download->description) }}</textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">श्रेणी</label>
                <select class="form-control" name="category_id">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $download->category_id) == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label class="form-label">फाइल</label>
                <input type="file" class="form-control" name="file">
                @if($download->file)
                <small class="text-muted">Current: <a href="{{ asset($download->file) }}" target="_blank">View File</a></small> ({{ $download->file_size_formatted }})
                @endif
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">क्रम</label>
                    <input type="number" class="form-control" name="order" value="{{ old('order', $download->order) }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Featured</label>
                    <select class="form-control" name="is_featured">
                        <option value="1" {{ old('is_featured', $download->is_featured) ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ old('is_featured', $download->is_featured) ? '' : 'selected' }}>No</option>
                    </select>
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">स्थिति</label>
                    <select class="form-control" name="is_active">
                        <option value="1" {{ old('is_active', $download->is_active) ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('is_active', $download->is_active) ? '' : 'selected' }}>Inactive</option>
                    </select>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>अपडेट गर्नुहोस्
            </button>
            <a href="{{ route('admin.downloads.index') }}" class="btn btn-secondary">रद्द गर्नुहोस्</a>
        </form>
    </div>
</div>
@endsection
