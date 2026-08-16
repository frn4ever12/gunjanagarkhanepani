@extends('layouts.app')

@section('title', 'फोटो ग्यालरी - गुन्जनगर खानेपानी आयोजना')

@section('content')
<x-page-banner title="फोटो ग्यालरी" :breadcrumb="['थप', 'फोटो ग्यालरी']" />

<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>फोटो ग्यालरी</h2>
                
                @if($galleryImages && $galleryImages->count() > 0)
                <div class="row">
                    @foreach($galleryImages as $image)
                    <div class="col-md-4 mb-4">
                        <div class="gallery-card">
                            @if($image->image)
                            <img src="{{ asset('uploads/' . $image->image) }}" alt="{{ $image->caption ?? 'ग्यालरी तस्वीर' }}" class="gallery-image">
                            @endif
                            @if($image->caption)
                            <p class="gallery-caption">{{ $image->caption }}</p>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                {{ $galleryImages->links() }}
                @else
                <p>ग्यालरी तस्वीरहरू उपलब्ध छैन।</p>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
