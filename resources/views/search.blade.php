@extends('layouts.app')

@section('title', 'खोज परिणाम - गुन्जनगर खानेपानी आयोजना')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="section-title">
            <h2>खोज परिणाम: "{{ $query }}"</h2>
            <div class="divider"></div>
        </div>
        
        @if($notices->count() > 0)
        <div class="mb-5">
            <h3 class="text-primary mb-3">सूचनाहरू ({{ $notices->count() }})</h3>
            @foreach($notices as $notice)
            <div class="content-card mb-3">
                <div class="card-body">
                    <h4>{{ $notice->title }}</h4>
                    <p>{{ Str::limit($notice->description, 150) }}</p>
                    <small class="text-muted">{{ $notice->publish_date->format('Y-m-d') }}</small>
                </div>
            </div>
            @endforeach
        </div>
        @endif
        
        @if($news->count() > 0)
        <div class="mb-5">
            <h3 class="text-primary mb-3">समाचारहरू ({{ $news->count() }})</h3>
            @foreach($news as $newsItem)
            <div class="content-card mb-3">
                <div class="card-body">
                    <h4>{{ $newsItem->title }}</h4>
                    <p>{{ Str::limit($newsItem->excerpt ?? strip_tags($newsItem->content), 150) }}</p>
                    <small class="text-muted">{{ $newsItem->publish_date->format('Y-m-d') }}</small>
                </div>
            </div>
            @endforeach
        </div>
        @endif
        
        @if($services->count() > 0)
        <div class="mb-5">
            <h3 class="text-primary mb-3">सेवाहरू ({{ $services->count() }})</h3>
            @foreach($services as $service)
            <div class="content-card mb-3">
                <div class="card-body">
                    <h4>{{ $service->title }}</h4>
                    <p>{{ Str::limit($service->description, 150) }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @endif
        
        @if($downloads->count() > 0)
        <div class="mb-5">
            <h3 class="text-primary mb-3">डाउनलोडहरू ({{ $downloads->count() }})</h3>
            @foreach($downloads as $download)
            <div class="download-card mb-3">
                <div class="file-icon">
                    <i class="fas fa-file-{{ $download->file_type === 'pdf' ? 'pdf' : 'alt' }}"></i>
                </div>
                <div>
                    <h5>{{ $download->title }}</h5>
                    <span class="file-type">{{ strtoupper($download->file_type) }}</span>
                </div>
                <a href="{{ asset($download->file) }}" class="btn btn-download" download>
                    <i class="fas fa-download"></i>
                </a>
            </div>
            @endforeach
        </div>
        @endif
        
        @if($faqs->count() > 0)
        <div class="mb-5">
            <h3 class="text-primary mb-3">FAQ ({{ $faqs->count() }})</h3>
            @foreach($faqs as $faq)
            <div class="card mb-3">
                <div class="card-body">
                    <h5>{{ $faq->question }}</h5>
                    <p>{{ Str::limit($faq->answer, 200) }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @endif
        
        @if($notices->count() === 0 && $news->count() === 0 && $services->count() === 0 && $downloads->count() === 0 && $faqs->count() === 0)
        <div class="text-center py-5">
            <i class="fas fa-search fa-3x text-muted mb-3"></i>
            <p class="text-muted">कुनै परिणाम फेला परेन।</p>
        </div>
        @endif
    </div>
</section>
@endsection
