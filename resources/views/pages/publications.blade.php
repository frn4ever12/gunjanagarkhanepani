@extends('layouts.app')

@section('title', 'प्रकाशनहरू - गुन्जनगर खानेपानी आयोजना')

@section('content')
<x-page-banner title="प्रकाशनहरू" :breadcrumb="['श्रोतहरू', 'प्रकाशनहरू']" />

<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>प्रकाशनहरू</h2>
                <p>गुन्जनगर खानेपानी आयोजनाका प्रकाशनहरू:</p>
                <ul>
                    <li>सूचना पत्रिका</li>
                    <li>वार्षिक प्रतिवेदन</li>
                    <li>सूचना बुलेटिन</li>
                    <li>जनचेतना सामग्री</li>
                </ul>
                <p>प्रकाशनहरू उपलब्ध गराउने कार्य भइरहेको छ।</p>
            </div>
        </div>
    </div>
</section>
@endsection
