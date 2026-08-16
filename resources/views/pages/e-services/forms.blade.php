@extends('layouts.app')

@section('title', 'अनलाइन फारमहरू - गुन्जनगर खानेपानी आयोजना')

@section('content')
<x-page-banner title="अनलाइन फारमहरू" :breadcrumb="['ई-सेवाहरू', 'अनलाइन फारमहरू']" />

<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>अनलाइन फारमहरू</h2>
                <p>निम्न फारमहरू डाउनलोड गर्नुहोस्:</p>
                
                @if($downloads && $downloads->count() > 0)
                <div class="row">
                    @foreach($downloads as $download)
                    <div class="col-md-4 mb-3">
                        <div class="download-card">
                            <div class="download-icon">
                                <i class="fas fa-file-pdf"></i>
                            </div>
                            <h4>{{ $download->title }}</h4>
                            <a href="{{ asset('uploads/' . $download->file) }}" class="btn btn-download" download>
                                <i class="fas fa-download me-2"></i>डाउनलोड
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p>फारमहरू उपलब्ध छैन।</p>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
