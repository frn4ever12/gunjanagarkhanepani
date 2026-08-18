@extends('admin.layouts.app')

@section('title', 'Officials - Admin')

@section('page-title', 'पदाधिकारीहरू')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>पदाधिकारीहरू</span>
        <a href="{{ route('admin.officials.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>नयाँ पदाधिकारी
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>फोटो</th>
                        <th>नाम</th>
                        <th>पद</th>
                        <th>गृहपृष्ठ</th>
                        <th>स्थिति</th>
                        <th>कार्यहरू</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($officials as $official)
                    <tr>
                        <td>
                            @if($official->photo)
                            <img src="{{ asset($official->photo) }}" alt="{{ $official->name }}" class="rounded-circle" width="50" height="50">
                            @else
                            <span class="badge bg-secondary">No Photo</span>
                            @endif
                        </td>
                        <td>{{ $official->name }}</td>
                        <td>{{ $official->position }}</td>
                        <td>
                            @if($official->show_on_homepage)
                            <span class="badge bg-success">Yes</span>
                            @else
                            <span class="badge bg-secondary">No</span>
                            @endif
                        </td>
                        <td>
                            @if($official->is_active)
                            <span class="badge bg-success">Active</span>
                            @else
                            <span class="badge bg-secondary">Inactive</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.officials.edit', $official) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.officials.destroy', $official) }}" method="POST" class="d-inline">
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
        {{ $officials->links() }}
    </div>
</div>
@endsection
