@extends('admin.layouts.app')

@section('title', 'Statistics - Admin')

@section('page-title', 'तथ्याङ्कहरू')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>गृहपृष्ठ तथ्याङ्कहरू</span>
        <a href="{{ route('admin.statistics.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>नयाँ तथ्याङ्क
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>शीर्षक</th>
                        <th>मान</th>
                        <th>उपशीर्षक</th>
                        <th>आइकन</th>
                        <th>क्रम</th>
                        <th>स्थिति</th>
                        <th>कार्यहरू</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($statistics as $stat)
                    <tr>
                        <td>{{ $stat->title }}</td>
                        <td>{{ $stat->value }}</td>
                        <td>{{ $stat->subtitle ?? '-' }}</td>
                        <td><i class="fas {{ $stat->icon ?? 'fa-chart-line' }}"></i></td>
                        <td>{{ $stat->order }}</td>
                        <td>
                            @if($stat->is_visible)
                            <span class="badge bg-success">Visible</span>
                            @else
                            <span class="badge bg-secondary">Hidden</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.statistics.edit', $stat) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.statistics.destroy', $stat) }}" method="POST" class="d-inline">
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
