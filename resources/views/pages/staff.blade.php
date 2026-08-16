@extends('layouts.app')

@section('title', 'कर्मचारी विवरण - गुन्जनगर खानेपानी आयोजना')

@section('content')
<x-page-banner title="कर्मचारी विवरण" :breadcrumb="['हाम्रो बारेमा', 'कर्मचारी विवरण']" />

<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>कर्मचारी विवरण</h2>
                <p>गुन्जनगर खानेपानी आयोजनाका कर्मचारीहरू:</p>
                
                @if($staff && $staff->count() > 0)
                <div class="row">
                    @foreach($staff as $staffMember)
                    <div class="col-md-4 mb-4">
                        <div class="official-card-page">
                            @if($staffMember->photo)
                            <img src="{{ asset('uploads/' . $staffMember->photo) }}" alt="{{ $staffMember->name }}" class="official-photo-page">
                            @else
                            <div class="official-photo-placeholder-page">
                                {{ substr($staffMember->name, 0, 1) }}
                            </div>
                            @endif
                            <h4>{{ $staffMember->name }}</h4>
                            <p class="designation">{{ $staffMember->position }}</p>
                            @if($staffMember->email)
                            <p class="contact-info">
                                <i class="fas fa-envelope"></i>
                                <a href="mailto:{{ $staffMember->email }}">{{ $staffMember->email }}</a>
                            </p>
                            @endif
                            @if($staffMember->phone)
                            <p class="contact-info">
                                <i class="fas fa-phone"></i>
                                {{ $staffMember->phone }}
                            </p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p>कर्मचारी विवरण उपलब्ध छैन।</p>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
