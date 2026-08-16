@extends('layouts.app')

@section('title', 'भिडियो ग्यालरी - गुन्जनगर खानेपानी आयोजना')

@section('content')
<x-page-banner title="भिडियो ग्यालरी" :breadcrumb="['थप', 'भिडियो ग्यालरी']" />

<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>भिडियो ग्यालरी</h2>
                <p>गुन्जनगर खानेपानी आयोजनाका भिडियोहरू:</p>
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="video-card">
                            <div class="video-placeholder">
                                <i class="fas fa-play-circle"></i>
                            </div>
                            <h4>खानेपानी आयोजनाको परिचय</h4>
                            <p>गुन्जनगर खानेपानी आयोजनाको बारेमा जानकारी</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="video-card">
                            <div class="video-placeholder">
                                <i class="fas fa-play-circle"></i>
                            </div>
                            <h4>सेवा वितरण प्रक्रिया</h4>
                            <p>खानेपानी सेवा कसरी प्रदान गरिन्छ</p>
                        </div>
                    </div>
                </div>
                <p>थप भिडियोहरू उपलब्ध गराउने कार्य भइरहेको छ।</p>
            </div>
        </div>
    </div>
</section>
@endsection
