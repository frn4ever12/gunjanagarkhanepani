@extends('layouts.app')

@section('title', 'वेबसाइट नक्सा - गुन्जनगर खानेपानी आयोजना')

@section('content')
<x-page-banner title="वेबसाइट नक्सा" :breadcrumb="['थप', 'वेबसाइट नक्सा']" />

<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>वेबसाइट नक्सा</h2>
                <div class="sitemap">
                    <div class="row">
                        <div class="col-md-4">
                            <h3>हाम्रो बारेमा</h3>
                            <ul>
                                <li><a href="{{ route('about') }}">हाम्रो बारेमा</a></li>
                                <li><a href="{{ route('board-of-directors') }}">सञ्चालक समिति</a></li>
                                <li><a href="{{ route('organizational-structure') }}">संगठनात्मक संरचना</a></li>
                                <li><a href="{{ route('staff') }}">कर्मचारी विवरण</a></li>
                                <li><a href="{{ route('office-hours') }}">कार्यालय समय</a></li>
                                <li><a href="{{ route('citizen-charter') }}">नागरिक वडापत्र</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h3>सेवाहरू</h3>
                            <ul>
                                <li><a href="{{ route('services') }}">खानेपानी सेवा</a></li>
                                <li><a href="{{ route('services.new-connection') }}">नयाँ धारा जडान</a></li>
                                <li><a href="{{ route('services.transfer') }}">धारा स्थानान्तरण</a></li>
                                <li><a href="{{ route('services.maintenance') }}">धारा मर्मत</a></li>
                                <li><a href="{{ route('services.water-quality') }}">पानीको गुणस्तर</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h3>ई-सेवाहरू</h3>
                            <ul>
                                <li><a href="{{ route('e-services.forms') }}">अनलाइन फारमहरू</a></li>
                                <li><a href="{{ route('downloads') }}">डाउनलोड केन्द्र</a></li>
                                <li><a href="{{ route('complaint') }}">गुनासो / सुझाव</a></li>
                                <li><a href="{{ route('contact') }}">सम्पर्क गर्नुहोस्</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <h3>श्रोतहरू</h3>
                            <ul>
                                <li><a href="{{ route('downloads') }}">डाउनलोड</a></li>
                                <li><a href="{{ route('forms') }}">फारमहरू</a></li>
                                <li><a href="{{ route('annual-reports') }}">वार्षिक प्रतिवेदन</a></li>
                                <li><a href="{{ route('rules-regulations') }}">नियमावली</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h3>सूचना</h3>
                            <ul>
                                <li><a href="{{ route('notices') }}">सूचना</a></li>
                                <li><a href="{{ route('news') }}">समाचार</a></li>
                                <li><a href="{{ route('press-releases') }}">प्रेस विज्ञप्ति</a></li>
                                <li><a href="{{ route('vacancy') }}">रोजगारी सूचना</a></li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h3>थप</h3>
                            <ul>
                                <li><a href="{{ route('faq') }}">FAQ</a></li>
                                <li><a href="{{ route('gallery') }}">फोटो ग्यालरी</a></li>
                                <li><a href="{{ route('videos') }}">भिडियो ग्यालरी</a></li>
                                <li><a href="{{ route('important-links') }}">महत्वपूर्ण लिंकहरू</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
