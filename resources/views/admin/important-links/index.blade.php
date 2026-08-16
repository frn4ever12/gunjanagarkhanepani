@extends('admin.layouts.app')

@section('title', 'Important Links - Admin')

@section('page-title', 'महत्वपूर्ण लिंकहरू')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>महत्वपूर्ण लिंकहरू</span>
        <a href="{{ route('admin.important-links.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>नयाँ लिंक
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
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
                    @foreach($links as $link)
                    <tr>
                        <td>{{ $link->title }}</td>
                        <td>{{ Str::limit($link->url, 40) }}</td>
                        <td>{{ $link->order }}</td>
                        <td>
                            @if($link->is_active)
                            <span class="badge bg-success">Active</span>
                            @else
                            <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.important-links.edit', $link) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.important-links.destroy', $link) }}" method="POST" class="d-inline">
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
        {{ $links->links() }}
    </div>
</div>
@endsection
