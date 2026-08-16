@extends('layouts.app')

@section('title', $service->title . ' - गुन्जनगर खानेपानी आयोजना')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    @if($service->image)
                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->title }}" class="img-fluid mb-4">
                    @endif
                    <h1>{{ $service->title }}</h1>
                    <hr>
                    <div class="content">
                        {!! $service->content !!}
                    </div>
                    @if($service->external_link)
                    <div class="mt-4">
                        <a href="{{ $service->external_link }}" target="_blank" class="btn btn-primary">
                            <i class="fas fa-external-link-alt me-2"></i>बाह्य लिंक
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
