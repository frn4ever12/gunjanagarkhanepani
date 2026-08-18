@extends('admin.layouts.app')

@section('title', 'Edit Notice - Admin')

@section('page-title', 'सूचना सम्पादन गर्नुहोस्')

@section('content')
<div class="card">
    <div class="card-header">सूचना सम्पादन</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.notices.update', $notice) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label">शीर्षक *</label>
                <input type="text" class="form-control" name="title" value="{{ old('title', $notice->title) }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">विवरण</label>
                <textarea class="form-control" name="description" rows="4">{{ old('description', $notice->description) }}</textarea>
            </div>
            
            <div class="mb-3">
                <label class="form-label">संलग्नक</label>
                <input type="file" class="form-control" name="attachment">
                @if($notice->attachment)
                <small class="text-muted">Current: <a href="{{ asset($notice->attachment) }}" target="_blank">View File</a></small>
                @endif
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">प्रकाशन मिति *</label>
                    <input type="date" class="form-control" name="publish_date" value="{{ old('publish_date', $notice->publish_date->format('Y-m-d')) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">समाप्ति मिति</label>
                    <input type="date" class="form-control" name="expiry_date" value="{{ old('expiry_date', $notice->expiry_date? $notice->expiry_date->format('Y-m-d') : null) }}">
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">प्राथमिकता</label>
                    <input type="number" class="form-control" name="priority" value="{{ old('priority', $notice->priority) }}" min="0" max="10">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">क्रम</label>
                    <input type="number" class="form-control" name="order" value="{{ old('order', $notice->order) }}">
                </div>
            </div>
            
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="is_pinned" id="is_pinned" {{ old('is_pinned', $notice->is_pinned) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_pinned">Pin to Top</label>
            </div>
            
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="show_in_ticker" id="show_in_ticker" {{ old('show_in_ticker', $notice->show_in_ticker) ? 'checked' : '' }}>
                <label class="form-check-label" for="show_in_ticker">Show in Ticker</label>
            </div>
            
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="is_published" id="is_published" {{ old('is_published', $notice->is_published) ? 'checked' : '' }}>
                <label class="form-check-label" for="is_published">Published</label>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>अपडेट गर्नुहोस्
            </button>
            <a href="{{ route('admin.notices.index') }}" class="btn btn-secondary">रद्द गर्नुहोस्</a>
        </form>
    </div>
</div>
@endsection
