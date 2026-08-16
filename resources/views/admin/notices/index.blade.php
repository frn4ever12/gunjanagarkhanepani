@extends('admin.layouts.app')

@section('title', 'Notices - Admin')

@section('page-title', 'सूचनाहरू')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>सूचनाहरू</span>
        <a href="{{ route('admin.notices.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>नयाँ सूचना
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>शीर्षक</th>
                        <th>प्रकाशन मिति</th>
                        <th>प्राथमिकता</th>
                        <th>स्थिति</th>
                        <th>कार्यहरू</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($notices as $notice)
                    <tr>
                        <td>{{ $notice->title }}</td>
                        <td>{{ $notice->publish_date->format('Y-m-d') }}</td>
                        <td>
                            @if($notice->is_pinned)
                            <span class="badge bg-danger">Pinned</span>
                            @endif
                            <span class="badge bg-info">Priority: {{ $notice->priority }}</span>
                        </td>
                        <td>
                            @if($notice->is_published)
                            <span class="badge bg-success">Published</span>
                            @else
                            <span class="badge bg-secondary">Draft</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.notices.edit', $notice) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.notices.destroy', $notice) }}" method="POST" class="d-inline">
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
        {{ $notices->links() }}
    </div>
</div>
@endsection
