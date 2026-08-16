@extends('admin.layouts.app')

@section('title', 'Create Tariff - Admin')

@section('page-title', 'नयाँ दर सिर्जना गर्नुहोस्')

@section('content')
<div class="card">
    <div class="card-header">नयाँ दर</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.tariffs.store') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">श्रेणी *</label>
                <input type="text" class="form-control" name="category" value="{{ old('category') }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">शीर्षक *</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">एकाइ</label>
                    <input type="text" class="form-control" name="unit" value="{{ old('unit') }}" placeholder="e.g., per month, per unit">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">मूल्य *</label>
                    <input type="number" class="form-control" name="price" value="{{ old('price') }}" step="0.01" min="0" required>
                </div>
            </div>
            
            <div class="mb-3">
                <label class="form-label">विवरण</label>
                <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">प्रभावकारी मिति *</label>
                    <input type="date" class="form-control" name="effective_date" value="{{ old('effective_date', now()->format('Y-m-d')) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">संलग्नक</label>
                    <input type="file" class="form-control" name="attachment">
                    <small class="text-muted">PDF, DOC, DOCX (Max: 10MB)</small>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">क्रम</label>
                    <input type="number" class="form-control" name="order" value="{{ old('order', 0) }}">
                </div>
                <div class="col-md-6 mb-3">
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
            <a href="{{ route('admin.tariffs.index') }}" class="btn btn-secondary">रद्द गर्नुहोस्</a>
        </form>
    </div>
</div>
@endsection
