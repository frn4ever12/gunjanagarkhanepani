@extends('layouts.app')

@section('title', $page->title . ' - गुन्जनगर खानेपानी आयोजना')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    @if($page->featured_image)
                    <img src="{{ asset('storage/' . $page->featured_image) }}" alt="{{ $page->title }}" class="img-fluid mb-4">
                    @endif
                    <h1>{{ $page->title }}</h1>
                    <hr>
                    <div class="content">
                        {!! $page->content !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
