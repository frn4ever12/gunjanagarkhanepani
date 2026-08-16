@extends('admin.layouts.app')

@section('title', 'Create FAQ - Admin')

@section('page-title', 'नयाँ FAQ सिर्जना गर्नुहोस्')

@section('content')
<div class="card">
    <div class="card-header">नयाँ FAQ</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.faqs.store') }}">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">प्रश्न *</label>
                <input type="text" class="form-control" name="question" value="{{ old('question') }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">उत्तर *</label>
                <textarea class="form-control" name="answer" rows="5" required>{{ old('answer') }}</textarea>
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">श्रेणी</label>
                    <input type="text" class="form-control" name="category" value="{{ old('category') }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">क्रम</label>
                    <input type="number" class="form-control" name="order" value="{{ old('order', 0) }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">स्थिति</label>
                    <select class="form-control" name="is_published">
                        <option value="1" {{ old('is_published', true) ? 'selected' : '' }}>Published</option>
                        <option value="0" {{ old('is_published', true) ? '' : 'selected' }}>Draft</option>
                    </select>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>सुरक्षा गर्नुहोस्
            </button>
            <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">रद्द गर्नुहोस्</a>
        </form>
    </div>
</div>
@endsection
