@extends('admin.layouts.app')

@section('title', 'Gallery - Admin')

@section('page-title', 'फोटो ग्यालरी')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span>फोटो ग्यालरी एल्बमहरू</span>
        <a href="{{ route('admin.gallery.create-album') }}" class="btn btn-primary">
            <i class="fas fa-plus me-2"></i>नयाँ एल्बम
        </a>
    </div>
    <div class="card-body">
        <div class="row">
            @foreach($albums as $album)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if($album->cover_image)
                    <img src="{{ asset($album->cover_image) }}" alt="{{ $album->name }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                    @else
                    <div class="card-img-top bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                        <i class="fas fa-images fa-3x text-muted"></i>
                    </div>
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $album->name }}</h5>
                        <p class="card-text small text-muted">{{ $album->images_count }} images</p>
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('admin.gallery.upload-images', $album) }}" class="btn btn-sm btn-primary">
                                <i class="fas fa-upload me-1"></i>Upload
                            </a>
                            <div>
                                <a href="{{ route('admin.gallery.edit-album', $album) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.gallery.destroy-album', $album) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
