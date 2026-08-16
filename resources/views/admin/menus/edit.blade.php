@extends('admin.layouts.app')

@section('title', 'Edit Menu - Admin')

@section('page-title', 'मेनु सम्पादन गर्नुहोस्')

@section('content')
<div class="card">
    <div class="card-header">मेनु सम्पादन</div>
    <div class="card-body">
        <form method="POST" action="{{ route('admin.menus.update', $menu) }}">
            @csrf
            @method('PUT')
            
            <div class="mb-3">
                <label class="form-label">नाम *</label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $menu->name) }}" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">स्थान *</label>
                <select class="form-control" name="location" required>
                    <option value="header" {{ old('location', $menu->location) === 'header' ? 'selected' : '' }}>Header</option>
                    <option value="footer" {{ old('location', $menu->location) === 'footer' ? 'selected' : '' }}>Footer</option>
                </select>
            </div>
            
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">क्रम</label>
                    <input type="number" class="form-control" name="order" value="{{ old('order', $menu->order) }}">
                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label">स्थिति</label>
                    <select class="form-control" name="is_active">
                        <option value="1" {{ old('is_active', $menu->is_active) ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('is_active', $menu->is_active) ? '' : 'selected' }}>Inactive</option>
                    </select>
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>अपडेट गर्नुहोस्
            </button>
            <a href="{{ route('admin.menus.index') }}" class="btn btn-secondary">रद्द गर्नुहोस्</a>
        </form>
    </div>
</div>

<div class="card mt-4">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>मेनु आइटमहरू</span>
        <a href="{{ route('admin.menus.items.create', $menu) }}" class="btn btn-sm btn-primary">
            <i class="fas fa-plus me-2"></i>नयाँ आइटम
        </a>
    </div>
    <div class="card-body">
        @if($menu->items->count() > 0)
        <table class="table">
            <thead>
                <tr>
                    <th>शीर्षक</th>
                    <th>URL</th>
                    <th>क्रम</th>
                    <th>स्थिति</th>
                    <th>कार्यहरू</th>
                </tr>
            </thead>
            <tbody>
                @foreach($menu->items as $item)
                <tr>
                    <td>{{ $item->title }}</td>
                    <td>{{ $item->url }}</td>
                    <td>{{ $item->order }}</td>
                    <td>
                        @if($item->is_active)
                        <span class="badge bg-success">Active</span>
                        @else
                        <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.menu-items.edit', $item) }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p class="text-muted">कुनै आइटम छैन।</p>
        @endif
    </div>
</div>
@endsection
