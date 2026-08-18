@extends('layouts.app')

@section('title', $notice->title . ' - गुन्जनगर खानेपानी आयोजना')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h1>{{ $notice->title }}</h1>
                    <small class="text-muted">
                        प्रकाशन मिति: {{ $notice->publish_date->format('Y-m-d') }}
                        @if($notice->expiry_date) | समाप्ति मिति: {{ $notice->expiry_date->format('Y-m-d') }} @endif
                    </small>
                    <hr>
                    <div class="content">
                        {!! $notice->description !!}
                    </div>
                    @if($notice->attachment)
                    <div class="mt-4">
                        <a href="{{ asset('storage/' . $notice->attachment) }}" class="btn btn-primary" download>
                            <i class="fas fa-download me-2"></i>डाउनलोड गर्नुहोस्
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
