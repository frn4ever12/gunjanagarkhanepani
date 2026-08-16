@extends('admin.layouts.app')

@section('title', 'Create Download - Admin')

@section('page-title', 'नयाँ डाउनलोड सिर्जना गर्नुहोस्')

@section('content')
<div class="card">
    <div class="card-header">नयाँ डाउनलोड</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.downloads.store') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">शीर्षक *</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">विवरण</label>
                <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">श्रेणी</label>
                <select class="form-control" name="category_id">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label class="form-label">फाइल *</label>
                <input type="file" class="form-control" name="file" required>
                <small class="text-muted">PDF, DOC, DOCX, XLS, XLSX, ZIP (Max: 10MB)</small>
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">क्रम</label>
                    <input type="number" class="form-control" name="order" value="{{ old('order', 0) }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">Featured</label>
                    <select class="form-control" name="is_featured">
                        <option value="1" {{ old('is_featured') ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ old('is_featured') ? '' : 'selected' }}>No</option>
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
            <a href="{{ route('admin.downloads.index') }}" class="btn btn-secondary">रद्द गर्नुहोस्</a>
        </form>
    </div>
</div>
@endsection
