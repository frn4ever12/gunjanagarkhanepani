@extends('admin.layouts.app')

@section('title', 'Sliders - Admin')

@section('page-title', 'स्लाइडरहरू')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>स्लाइडरहरू</span>
        <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>नयाँ स्लाइडर
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>चित्र</th>
                        <th>शीर्षक</th>
                        <th>क्रम</th>
                        <th>स्थिति</th>
                        <th>कार्यहरू</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sliders as $slider)
                    <tr>
                        <td>
                            @if($slider->image)
                            @if(str_starts_with($slider->image, 'http://') || str_starts_with($slider->image, 'https://'))
                            <img src="{{ $slider->image }}" alt="{{ $slider->title }}" style="width: 100px; height: 50px; object-fit: cover;">
                            @else
                            <img src="{{ asset($slider->image) }}" alt="{{ $slider->title }}" style="width: 100px; height: 50px; object-fit: cover;">
                            @endif
                            @else
                            <span class="badge bg-secondary">No Image</span>
                            @endif
                        </td>
                        <td>{{ $slider->title }}</td>
                        <td>{{ $slider->order }}</td>
                        <td>
                            @if($slider->is_active)
                            <span class="badge bg-success">Active</span>
                            @else
                            <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.sliders.edit', $slider) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.sliders.destroy', $slider) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
