@extends('layouts.app')

@section('title', 'डाउनलोड - गुन्जनगर खानेपानी आयोजना')

@section('content')
<x-page-banner title="डाउनलोड" :breadcrumb="['श्रोतहरू', 'डाउनलोड']" />

<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>डाउनलोड</h2>
                <p>निम्न फाइलहरू डाउनलोड गर्नुहोस्:</p>
                
                @if($downloads && $downloads->count() > 0)
                <div class="row">
                    @foreach($downloads as $download)
                    <div class="col-md-4 mb-3">
                        <div class="download-card">
                            <div class="download-icon">
                                <i class="fas fa-file-download"></i>
                            </div>
                            <h4>{{ $download->title }}</h4>
                            <a href="{{ asset('uploads/' . $download->file) }}" class="btn btn-download" download>
                                <i class="fas fa-download me-2"></i>डाउनलोड
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{ $downloads->links() }}
                @else
                <p>डाउनलोडहरू उपलब्ध छैन।</p>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
