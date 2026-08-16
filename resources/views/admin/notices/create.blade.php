@extends('admin.layouts.app')

@section('title', 'Create Notice - Admin')

@section('page-title', 'नयाँ सूचना सिर्जना गर्नुहोस्')

@section('content')
<div class="card">
    <div class="card-header">नयाँ सूचना</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.notices.store') }}" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">शीर्षक *</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">विवरण</label>
                <textarea class="form-control" name="description" rows="4">{{ old('description') }}</textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">संलग्नक</label>
                <input type="file" class="form-control" name="attachment">
                <small class="text-muted">PDF, DOC, DOCX (Max: 10MB)</small>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">प्रकाशन मिति *</label>
                    <input type="date" class="form-control" name="publish_date" value="{{ old('publish_date', now()->format('Y-m-d')) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">समाप्ति मिति</label>
                    <input type="date" class="form-control" name="expiry_date" value="{{ old('expiry_date') }}">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">प्राथमिकता</label>
                    <input type="number" class="form-control" name="priority" value="{{ old('priority', 0) }}" min="0" max="10">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">क्रम</label>
                    <input type="number" class="form-control" name="order" value="{{ old('order', 0) }}">
                </div>
            </div>
            
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="is_pinned" id="is_pinned" {{ old('is_pinned') ? 'checked' : '' }}>
                <label class="form-check-label" for="is_pinned">Pin to Top</label>
            </div>
            
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="show_in_ticker" id="show_in_ticker" {{ old('show_in_ticker', true) ? 'checked' : '' }}>
                <label class="form-check-label" for="show_in_ticker">Show in Ticker</label>
            </div>
            
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="is_published" id="is_published" {{ old('is_published', true) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_published">Published</label>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>सुरक्षा गर्नुहोस्
            </button>
            <a href="{{ route('admin.notices.index') }}" class="btn btn-secondary">रद्द गर्नुहोस्</a>
        </form>
    </div>
</div>
@endsection
