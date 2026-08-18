@extends('admin.layouts.app')

@section('title', 'Edit Tariff - Admin')

@section('page-title', 'दर सम्पादन गर्नुहोस्')

@section('content')
<div class="card">
    <div class="card-header">दर सम्पादन</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.tariffs.update', $tariff) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label">श्रेणी *</label>
                <input type="text" class="form-control" name="category" value="{{ old('category', $tariff->category) }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">शीर्षक *</label>
                <input type="text" class="form-control" name="title" value="{{ old('title', $tariff->title) }}" required>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">एकाइ</label>
                    <input type="text" class="form-control" name="unit" value="{{ old('unit', $tariff->unit) }}" placeholder="e.g., per month, per unit">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">मूल्य *</label>
                    <input type="number" class="form-control" name="price" value="{{ old('price', $tariff->price) }}" step="0.01" min="0" required>
                </div>
            </div>
            
            <div class="mb-3">
                <label class="form-label">विवरण</label>
                <textarea class="form-control" name="description" rows="3">{{ old('description', $tariff->description) }}</textarea>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">प्रभावकारी मिति *</label>
                    <input type="date" class="form-control" name="effective_date" value="{{ old('effective_date', $tariff->effective_date->format('Y-m-d')) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">संलग्नक</label>
                    <input type="file" class="form-control" name="attachment">
                    @if($tariff->attachment)
                <small class="text-muted">Current: <a href="{{ asset($tariff->attachment) }}" target="_blank">View File</a></small>
                    @endif
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">क्रम</label>
                    <input type="number" class="form-control" name="order" value="{{ old('order', $tariff->order) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">स्थिति</label>
                    <select class="form-control" name="is_active">
                        <option value="1" {{ old('is_active', $tariff->is_active) ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('is_active', $tariff->is_active) ? '' : 'selected' }}>Inactive</option>
                    </select>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>अपडेट गर्नुहोस्
            </button>
            <a href="{{ route('admin.tariffs.index') }}" class="btn btn-secondary">रद्द गर्नुहोस्</a>
        </form>
    </div>
</div>
@endsection
