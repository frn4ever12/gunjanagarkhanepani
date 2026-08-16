@php
use Illuminate\Support\Str;
@endphp
@extends('layouts.app')

@section('title', 'सूचनाहरू - गुन्जनगर खानेपानी आयोजना')

@section('content')
<div class="container py-5">
    <div class="section-title">
        <h2>सूचनाहरू</h2>
        <div class="divider"></div>
    </div>
    <div class="row">
        @forelse($notices as $notice)
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <h4>{{ $notice->title }}</h4>
                    <small class="text-muted">{{ $notice->publish_date->format('Y-m-d') }}</small>
                    @if($notice->is_pinned)
                    <span class="badge bg-warning ms-2">पिन गरिएको</span>
                    @endif
                    <hr>
                    <p>{{ Str::limit(strip_tags($notice->description), 150) }}</p>
                    <a href="{{ route('notice.show', $notice->id) }}" class="btn btn-primary">
                        विस्तृत हेर्नुहोस्
                    </a>
                    @if($notice->attachment)
                    <a href="{{ asset('storage/' . $notice->attachment) }}" class="btn btn-outline-primary ms-2" download>
                        <i class="fas fa-download"></i>
                    </a>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info">हाल सूचनाहरू छैनन्।</div>
        </div>
        @endforelse
    </div>
    {{ $notices->links() }}
</div>
@endsection
