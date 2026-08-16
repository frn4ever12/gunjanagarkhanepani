@extends('admin.layouts.app')

@section('title', 'Edit Statistic - Admin')

@section('page-title', 'तथ्याङ्क सम्पादन गर्नुहोस्')

@section('content')
<div class="card">
    <div class="card-header">तथ्याङ्क सम्पादन</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.statistics.update', $statistic) }}">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label">शीर्षक *</label>
                <input type="text" class="form-control" name="title" value="{{ old('title', $statistic->title) }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">मान *</label>
                <input type="text" class="form-control" name="value" value="{{ old('value', $statistic->value) }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">उपशीर्षक</label>
                <input type="text" class="form-control" name="subtitle" value="{{ old('subtitle', $statistic->subtitle) }}">
            </div>
            
            <div class="mb-3">
                <label class="form-label">आइकन (Font Awesome)</label>
                <input type="text" class="form-control" name="icon" value="{{ old('icon', $statistic->icon) }}" placeholder="fa-chart-line">
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">क्रम</label>
                    <input type="number" class="form-control" name="order" value="{{ old('order', $statistic->order) }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">देखिने</label>
                    <select class="form-control" name="is_visible">
                        <option value="1" {{ old('is_visible', $statistic->is_visible) ? 'selected' : '' }}>Visible</option>
                        <option value="0" {{ old('is_visible', $statistic->is_visible) ? '' : 'selected' }}>Hidden</option>
                    </select>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>अपडेट गर्नुहोस्
            </button>
            <a href="{{ route('admin.statistics.index') }}" class="btn btn-secondary">रद्द गर्नुहोस्</a>
        </form>
    </div>
</div>
@endsection
