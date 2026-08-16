@extends('admin.layouts.app')

@section('title', 'Create Menu - Admin')

@section('page-title', 'नयाँ मेनु सिर्जना गर्नुहोस्')

@section('content')
<div class="card">
    <div class="card-header">नयाँ मेनु</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.menus.store') }}">
            @csrf
            
            <div class="mb-3">
                <label class="form-label">नाम *</label>
                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">स्थान *</label>
                <select class="form-control" name="location" required>
                    <option value="header" {{ old('location') === 'header' ? 'selected' : '' }}>Header</option>
                    <option value="footer" {{ old('location') === 'footer' ? 'selected' : '' }}>Footer</option>
                </select>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">क्रम</label>
                    <input type="number" class="form-control" name="order" value="{{ old('order', 0) }}">
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>सुरक्षा गर्नुहोस्
            </button>
            <a href="{{ route('admin.menus.index') }}" class="btn btn-secondary">रद्द गर्नुहोस्</a>
        </form>
    </div>
</div>
@endsection
