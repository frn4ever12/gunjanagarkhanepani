@extends('layouts.app')

@section('title', 'धारा मर्मत - गुन्जनगर खानेपानी आयोजना')

@section('content')
<x-page-banner title="धारा मर्मत" :breadcrumb="['सेवाहरू', 'धारा मर्मत']" />

<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>धारा मर्मत</h2>
                <p>खानेपानी धारा मर्मत सेवाका बारेमा जानकारी:</p>
                <ul>
                    <li>पाइपलाइन मर्मत</li>
                    <li>मिटर मर्मत</li>
                    <li>लिकेज मर्मत</li>
                    <li>अन्य मर्मत सेवाहरू</li>
                </ul>
                <p>मर्मतका लागि कार्यालयमा सम्पर्क गर्नुहोस् वा हटलाइनमा कल गर्नुहोस्।</p>
            </div>
        </div>
    </div>
</section>
@endsection
