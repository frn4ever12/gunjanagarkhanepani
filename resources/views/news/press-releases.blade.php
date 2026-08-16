@php
use Illuminate\Support\Str;
@endphp

@extends('layouts.app')

@section('title', 'प्रेस विज्ञप्ति - गुन्जनगर खानेपानी आयोजना')

@section('content')
<x-page-banner title="प्रेस विज्ञप्ति" :breadcrumb="['सूचना', 'प्रेस विज्ञप्ति']" />

<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>प्रेस विज्ञप्ति</h2>
                
                @if($news && $news->count() > 0)
                <div class="row">
                    @foreach($news as $newsItem)
                    <div class="col-md-4 mb-4">
                        <div class="news-card">
                            @if($newsItem->image)
                            <img src="{{ asset('uploads/' . $newsItem->image) }}" alt="{{ $newsItem->title }}" class="news-image">
                            @endif
                            <div class="news-content">
                                <h4>{{ $newsItem->title }}</h4>
                                <p class="news-date">{{ date('Y-m-d', strtotime($newsItem->publish_date)) }}</p>
                                <p class="news-excerpt">{{ Str::limit(strip_tags($newsItem->content), 100) }}</p>
                                <a href="{{ route('news.show', $newsItem->slug) }}" class="btn btn-read-more">थप पढ्नुहोस्</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{ $news->links() }}
                @else
                <p>प्रेस विज्ञप्ति उपलब्ध छैन।</p>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
