@extends('admin.layouts.app')

@php
use Illuminate\Support\Str;
@endphp

@section('title', 'Dashboard - Admin')

@section('page-title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-3">
        <div class="stat-card primary">
            <i class="fas fa-bullhorn icon"></i>
            <h3>{{ $stats['notices'] }}</h3>
            <p>Total Notices</p>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="stat-card secondary">
            <i class="fas fa-newspaper icon"></i>
            <h3>{{ $stats['news'] }}</h3>
            <p>Total News</p>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="stat-card success">
            <i class="fas fa-download icon"></i>
            <h3>{{ $stats['downloads'] }}</h3>
            <p>Downloads</p>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="stat-card warning">
            <i class="fas fa-images icon"></i>
            <h3>{{ $stats['gallery_images'] }}</h3>
            <p>Gallery Images</p>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-3">
        <div class="stat-card info">
            <i class="fas fa-cogs icon"></i>
            <h3>{{ $stats['services'] }}</h3>
            <p>Services</p>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="stat-card danger">
            <i class="fas fa-user-tie icon"></i>
            <h3>{{ $stats['officials'] }}</h3>
            <p>Officials</p>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="stat-card primary">
            <i class="fas fa-file-alt icon"></i>
            <h3>{{ $stats['pages'] }}</h3>
            <p>Pages</p>
        </div>
    </div>
    
    <div class="col-md-3">
        <div class="stat-card success">
            <i class="fas fa-envelope icon"></i>
            <h3>{{ $stats['messages'] }}</h3>
            <p>New Messages</p>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Recent Notices</span>
                <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="card-body">
                @if($recentNotices->count() > 0)
                <div class="list-group list-group-flush">
                    @foreach($recentNotices as $notice)
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-1">{{ Str::limit($notice->title, 30) }}</h6>
                            <small class="text-muted">{{ $notice->publish_date->format('Y-m-d') }}</small>
                        </div>
                        @if($notice->is_pinned)
                        <span class="badge bg-danger">Pinned</span>
                        @endif
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-muted text-center mb-0">No notices found</p>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Recent News</span>
                <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="card-body">
                @if($recentNews->count() > 0)
                <div class="list-group list-group-flush">
                    @foreach($recentNews as $news)
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-1">{{ Str::limit($news->title, 30) }}</h6>
                            <small class="text-muted">{{ $news->publish_date->format('Y-m-d') }}</small>
                        </div>
                        @if($news->is_featured)
                        <span class="badge bg-warning">Featured</span>
                        @endif
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-muted text-center mb-0">No news found</p>
                @endif
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span>Recent Messages</span>
                <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
            </div>
            <div class="card-body">
                @if($recentMessages->count() > 0)
                <div class="list-group list-group-flush">
                    @foreach($recentMessages as $message)
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-1">{{ Str::limit($message->subject, 25) }}</h6>
                            <small class="text-muted">{{ $message->name }}</small>
                        </div>
                        <span class="badge bg-{{ $message->status === 'new' ? 'danger' : ($message->status === 'processing' ? 'warning' : 'success') }}">
                            {{ ucfirst($message->status) }}
                        </span>
                    </div>
                    @endforeach
                </div>
                @else
                <p class="text-muted text-center mb-0">No messages found</p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
