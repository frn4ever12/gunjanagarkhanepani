@php
use Illuminate\Support\Str;
@endphp
@extends('layouts.app')

@section('title', 'सेवाहरू - गुन्जनगर खानेपानी आयोजना')

@section('content')
<div class="container py-5">
    <div class="section-title">
        <h2>हाम्रा सेवाहरू</h2>
        <div class="divider"></div>
    </div>
    <div class="row">
        @forelse($services as $service)
        <div class="col-md-4 mb-4">
            <div class="card service-card">
                <div class="card-body">
                    <div class="icon">
                        <i class="fas {{ $service->icon ?? 'fa-tint' }}"></i>
                    </div>
                    <h4>{{ $service->title }}</h4>
                    <p>{{ Str::limit($service->description, 100) }}</p>
                    <a href="{{ route('service.show', $service->id) }}" class="btn btn-primary">
                        विस्तृत हेर्नुहोस्
                    </a>
                    @if($service->external_link)
                    <a href="{{ $service->external_link }}" target="_blank" class="btn btn-outline-primary ms-2">
                        <i class="fas fa-external-link-alt"></i>
                    </a>
                    @endif
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info">हाल सेवाहरू छैनन्।</div>
        </div>
        @endforelse
    </div>
    {{ $services->links() }}
</div>
@endsection
