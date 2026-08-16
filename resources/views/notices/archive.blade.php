@php
use Illuminate\Support\Str;
@endphp

@extends('layouts.app')

@section('title', 'सूचना संग्रह - गुन्जनगर खानेपानी आयोजना')

@section('content')
<x-page-banner title="सूचना संग्रह" :breadcrumb="['सूचना', 'सूचना संग्रह']" />

<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>सूचना संग्रह</h2>
                
                @if($notices && $notices->count() > 0)
                <div class="row">
                    @foreach($notices as $notice)
                    <div class="col-md-4 mb-4">
                        <div class="notice-card">
                            <div class="notice-content">
                                <h4>{{ $notice->title }}</h4>
                                <p class="notice-date">{{ date('Y-m-d', strtotime($notice->publish_date)) }}</p>
                                <p class="notice-excerpt">{{ Str::limit(strip_tags($notice->description), 100) }}</p>
                                <a href="{{ route('notice.show', $notice->id) }}" class="btn btn-read-more">थप पढ्नुहोस्</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{ $notices->links() }}
                @else
                <p>सूचना संग्रह उपलब्ध छैन।</p>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
