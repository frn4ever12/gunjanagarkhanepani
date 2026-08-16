@extends('layouts.app')

@section('title', 'सञ्चालक समिति - गुन्जनगर खानेपानी आयोजना')

@section('content')
<x-page-banner title="सञ्चालक समिति" :breadcrumb="['हाम्रो बारेमा', 'सञ्चालक समिति']" />

<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>सञ्चालक समिति</h2>
                <p>गुन्जनगर खानेपानी आयोजनाको सञ्चालक समितिका सदस्यहरू:</p>
                
                @if($officials && $officials->count() > 0)
                <div class="row">
                    @foreach($officials as $official)
                    <div class="col-md-4 mb-4">
                        <div class="official-card-page">
                            @if($official->photo)
                            <img src="{{ asset('uploads/' . $official->photo) }}" alt="{{ $official->name }}" class="official-photo-page">
                            @else
                            <div class="official-photo-placeholder-page">
                                {{ substr($official->name, 0, 1) }}
                            </div>
                            @endif
                            <h4>{{ $official->name }}</h4>
                            <p class="designation">{{ $official->position }}</p>
                            @if($official->email)
                            <p class="contact-info">
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:{{ $official->email }}">{{ $official->email }}</a>
                            </p>
                            @endif
                            @if($official->phone)
                            <p class="contact-info">
                                <i class="fas fa-phone"></i>
                                {{ $official->phone }}
                            </p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p>सञ्चालक समिति सदस्यहरूको जानकारी उपलब्ध छैन।</p>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
