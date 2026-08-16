@extends('layouts.app')

@section('title', 'FAQ - गुन्जनगर खानेपानी आयोजना')

@section('content')
<x-page-banner title="FAQ" :breadcrumb="['थप', 'FAQ']" />

<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>बारम्बार सोधिने प्रश्नहरू (FAQ)</h2>
                
                @if($faqs && $faqs->count() > 0)
                <div class="accordion" id="faqAccordion">
                    @foreach($faqs as $index => $faq)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{ $index }}">
                            <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
                                {{ $faq->question }}
                            </button>
                        </h2>
                        <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {!! $faq->answer !!}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                @else
                <p>FAQ उपलब्ध छैन।</p>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
