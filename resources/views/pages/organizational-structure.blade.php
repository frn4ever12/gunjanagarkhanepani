@extends('layouts.app')

@section('title', 'संगठनात्मक संरचना - गुन्जनगर खानेपानी आयोजना')

@section('content')
<x-page-banner title="संगठनात्मक संरचना" :breadcrumb="['हाम्रो बारेमा', 'संगठनात्मक संरचना']" />

<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if($page)
                    <h2>{{ $page->title_np ?? 'संगठनात्मक संरचना' }}</h2>
                    <div class="page-body">
                        {!! $page->content_np ?? $page->content ?? '' !!}
                    </div>
                @else
                    <h2>संगठनात्मक संरचना</h2>
                    <p>गुन्जनगर खानेपानी आयोजनाको संगठनात्मक संरचना:</p>
                    <ul>
                        <li>सञ्चालक समिति</li>
                        <li>प्रमुख कार्यकारी अधिकृत</li>
                        <li>प्रबन्ध निर्देशक</li>
                        <li>विभागहरू</li>
                        <li>कर्मचारीहरू</li>
                    </ul>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection
