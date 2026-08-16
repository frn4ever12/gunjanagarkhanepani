@extends('admin.layouts.app')

@section('title', 'Edit FAQ - Admin')

@section('page-title', 'FAQ सम्पादन गर्नुहोस्')

@section('content')
<div class="card">
    <div class="card-header">FAQ सम्पादन</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.faqs.update', $faq) }}">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label">प्रश्न *</label>
                <input type="text" class="form-control" name="question" value="{{ old('question', $faq->question) }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">उत्तर *</label>
                <textarea class="form-control" name="answer" rows="5" required>{{ old('answer', $faq->answer) }}</textarea>
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-3">
                    <label class="form-label">श्रेणी</label>
                    <input type="text" class="form-control" name="category" value="{{ old('category', $faq->category) }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">क्रम</label>
                    <input type="number" class="form-control" name="order" value="{{ old('order', $faq->order) }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label class="form-label">स्थिति</label>
                    <select class="form-control" name="is_published">
                        <option value="1" {{ old('is_published', $faq->is_published) ? 'selected' : '' }}>Published</option>
                        <option value="0" {{ old('is_published', $faq->is_published) ? '' : 'selected' }}>Draft</option>
                    </select>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>अपडेट गर्नुहोस्
            </button>
            <a href="{{ route('admin.faqs.index') }}" class="btn btn-secondary">रद्द गर्नुहोस्</a>
        </form>
    </div>
</div>
@endsection
