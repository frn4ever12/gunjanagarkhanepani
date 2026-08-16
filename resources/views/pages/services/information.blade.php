@extends('layouts.app')

@section('title', 'सेवा सम्बन्धी जानकारी - गुन्जनगर खानेपानी आयोजना')

@section('content')
<x-page-banner title="सेवा सम्बन्धी जानकारी" :breadcrumb="['सेवाहरू', 'सेवा सम्बन्धी जानकारी']" />

<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>सेवा सम्बन्धी जानकारी</h2>
                <p>गुन्जनगर खानेपानी आयोजनाले प्रदान गर्ने सेवाहरू:</p>
                <ul>
                    <li>खानेपानी आपूर्ति</li>
                    <li>नयाँ धारा जडान</li>
                    <li>धारा स्थानान्तरण</li>
                    <li>धारा मर्मत</li>
                    <li>गुणस्तर परीक्षण</li>
                    <li>ग्राहक सेवा</li>
                </ul>
                <p>थप जानकारीका लागि कार्यालयमा सम्पर्क गर्नुहोस्।</p>
            </div>
        </div>
    </div>
</section>
@endsection
