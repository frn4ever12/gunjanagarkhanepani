@extends('layouts.app')

@section('title', 'परीक्षा कार्यक्रम - गुन्जनगर खानेपानी आयोजना')

@section('content')
<x-page-banner title="परीक्षा कार्यक्रम" :breadcrumb="['पदपूर्ति', 'परीक्षा कार्यक्रम']" />

<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>परीक्षा कार्यक्रम</h2>
                <p>गुन्जनगर खानेपानी आयोजनाका पदपूर्ति परीक्षा कार्यक्रमहरू:</p>
                <ul>
                    <li>परीक्षा कार्यक्रम उपलब्ध गराउने कार्य भइरहेको छ</li>
                    <li>परीक्षा केन्द्र र समय</li>
                    <li>प्रवेश पत्र</li>
                    <li>परीक्षा नियमावली</li>
                </ul>
                <p>परीक्षा कार्यक्रम उपलब्ध गराउने कार्य भइरहेको छ।</p>
            </div>
        </div>
    </div>
</section>
@endsection
