@extends('admin.layouts.app')

@section('title', 'Pages - Admin')

@section('page-title', 'पृष्ठहरू')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>पृष्ठहरू</span>
        <a href="{{ route('admin.pages.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>नयाँ पृष्ठ
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>शीर्षक</th>
                        <th>Slug</th>
                        <th>क्रम</th>
                        <th>स्थिति</th>
                        <th>कार्यहरू</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pages as $page)
                    <tr>
                        <td>{{ $page->title }}</td>
                        <td>{{ $page->slug }}</td>
                        <td>{{ $page->order }}</td>
                        <td>
                            @if($page->is_published)
                            <span class="badge bg-success">Published</span>
                            @else
                            <span class="badge bg-secondary">Draft</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.pages.edit', $page) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.pages.destroy', $page) }}" method="POST" class="d-inline">
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
        {{ $pages->links() }}
    </div>
</div>
@endsection
