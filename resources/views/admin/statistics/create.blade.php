@extends('admin.layouts.app')

@section('title', 'Create Statistic - Admin')

@section('page-title', 'नयाँ तथ्याङ्क सिर्जना गर्नुहोस्')

@section('content')
<div class="card">
    <div class="card-header">नयाँ तथ्याङ्क</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.statistics.store') }}">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">शीर्षक *</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">मान *</label>
                <input type="text" class="form-control" name="value" value="{{ old('value') }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">उपशीर्षक</label>
                <input type="text" class="form-control" name="subtitle" value="{{ old('subtitle') }}">
            </div>
            
            <div class="mb-3">
                <label class="form-label">आइकन (Font Awesome)</label>
                <input type="text" class="form-control" name="icon" value="{{ old('icon', 'fa-chart-line') }}" placeholder="fa-chart-line">
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">क्रम</label>
                    <input type="number" class="form-control" name="order" value="{{ old('order', 0) }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">देखिने</label>
                    <select class="form-control" name="is_visible">
                        <option value="1" {{ old('is_visible', true) ? 'selected' : '' }}>Visible</option>
                        <option value="0" {{ old('is_visible', true) ? '' : 'selected' }}>Hidden</option>
                    </select>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>सुरक्षा गर्नुहोस्
            </button>
            <a href="{{ route('admin.statistics.index') }}" class="btn btn-secondary">रद्द गर्नुहोस्</a>
        </form>
    </div>
</div>
@endsection
