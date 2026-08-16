@extends('layouts.app')

@section('title', 'हाम्रो बारेमा - गुन्जनगर खानेपानी आयोजना')

@section('content')
<x-page-banner title="हाम्रो बारेमा" :breadcrumb="['हाम्रो बारेमा']" />

<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if($page)
                    <h2>{{ $page->title_np ?? 'हाम्रो बारेमा' }}</h2>
                    <div class="page-body">
                        {!! $page->content_np ?? $page->content ?? '' !!}
                    </div>
                @else
                    <h2>हाम्रो बारेमा</h2>
                    <p>गुन्जनगर खानेपानी आयोजनाले गुन्जनगर नगरपालिकाका नागरिकहरूलाई गुणस्तरीय खानेपानी सेवा उपलब्ध गराउने प्रमुख उद्देश्य राखेको छ।</p>
                    <p>हाम्रो संगठनले सबै नागरिकलाई सुरक्षित, सरसफा र पर्याप्त खानेपानी आपूर्ति गर्ने प्रतिबद्धता व्यक्त गर्दछ।</p>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
