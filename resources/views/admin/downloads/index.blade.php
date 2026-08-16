@extends('admin.layouts.app')

@section('title', 'Downloads - Admin')

@section('page-title', 'डाउनलोडहरू')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>डाउनलोडहरू</span>
        <a href="{{ route('admin.downloads.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>नयाँ डाउनलोड
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>शीर्षक</th>
                        <th>श्रेणी</th>
                        <th>फाइल प्रकार</th>
                        <th>डाउनलोड</th>
                        <th>स्थिति</th>
                        <th>कार्यहरू</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($downloads as $download)
                    <tr>
                        <td>{{ $download->title }}</td>
                        <td>{{ $download->category->name ?? '-' }}</td>
                        <td>
                            <span class="badge bg-info">{{ strtoupper($download->file_type) }}</span>
                        </td>
                        <td>{{ $download->download_count }}</td>
                        <td>
                            @if($download->is_featured)
                            <span class="badge bg-warning">Featured</span>
                            @endif
                            @if($download->is_active)
                            <span class="badge bg-success">Active</span>
                            @else
                            <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.downloads.edit', $download) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.downloads.destroy', $download) }}" method="POST" class="d-inline">
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
        {{ $downloads->links() }}
    </div>
</div>
@endsection
