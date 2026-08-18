@extends('layouts.app')

@section('title', $news->title . ' - गुन्जनगर खानेपानी आयोजना')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    @if($news->featured_image)
                    <img src="{{ asset($news->featured_image) }}" alt="{{ $news->title }}" class="img-fluid mb-4">
                    @endif
                    <h1>{{ $news->title }}</h1>
                    <small class="text-muted">{{ $news->publish_date->format('Y-m-d') }}</small>
                    <hr>
                    <div class="content">
                        {!! $news->content !!}
                    </div>
                    @if($news->attachment)
                    <div class="mt-4">
                        <a href="{{ asset($news->attachment) }}" class="btn btn-primary" download>
                            <i class="fas fa-download me-2"></i>डाउनलोड गर्नुहोस्
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header">अन्य समाचारहरू</div>
                <div class="card-body">
                    @foreach($latestNews as $item)
                    <div class="mb-3">
                        <a href="{{ route('news.show', $item->slug) }}" class="text-decoration-none text-dark">
                            <h6>{{ $item->title }}</h6>
                            <small class="text-muted">{{ $item->publish_date->format('Y-m-d') }}</small>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
