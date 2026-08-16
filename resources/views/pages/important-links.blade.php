@extends('layouts.app')

@section('title', 'महत्वपूर्ण लिंकहरू - गुन्जनगर खानेपानी आयोजना')

@section('content')
<x-page-banner title="महत्वपूर्ण लिंकहरू" :breadcrumb="['थप', 'महत्वपूर्ण लिंकहरू']" />

<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>महत्वपूर्ण लिंकहरू</h2>
                
                @if($links && $links->count() > 0)
                <div class="row">
                    @foreach($links as $link)
                    <div class="col-md-4 mb-4">
                        <div class="link-card">
                            <div class="link-icon">
                                <i class="fas fa-external-link-alt"></i>
                            </div>
                            <h4>{{ $link->title }}</h4>
                            <a href="{{ $link->url }}" target="_blank" class="btn btn-link">
                                <i class="fas fa-arrow-right me-2"></i>जानुहोस्
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p>महत्वपूर्ण लिंकहरू उपलब्ध छैन।</p>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
