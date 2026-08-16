@extends('admin.layouts.app')

@section('title', 'Videos - Admin')

@section('page-title', 'भिडियोहरू')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>भिडियोहरू</span>
        <a href="{{ route('admin.videos.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>नयाँ भिडियो
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>शीर्षक</th>
                        <th>प्रकार</th>
                        <th>श्रेणī</th>
                        <th>क्रम</th>
                        <th>स्थिति</th>
                        <th>कार्यहरू</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($videos as $video)
                    <tr>
                        <td>{{ $video->title }}</td>
                        <td>
                            <span class="badge bg-info">{{ strtoupper($video->video_type) }}</span>
                        </td>
                        <td>{{ $video->category ?? '-' }}</td>
                        <td>{{ $video->order }}</td>
                        <td>
                            @if($video->is_published)
                            <span class="badge bg-success">Published</span>
                            @else
                            <span class="badge bg-secondary">Draft</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.videos.edit', $video) }}" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.videos.destroy', $video) }}" method="POST" class="d-inline">
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
        {{ $videos->links() }}
    </div>
</div>
@endsection
