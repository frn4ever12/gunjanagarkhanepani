@extends('layouts.app')

@section('title', 'पानीको गुणस्तर - गुन्जनगर खानेपानी आयोजना')

@section('content')
<x-page-banner title="पानीको गुणस्तर" :breadcrumb="['सेवाहरू', 'पानीको गुणस्तर']" />

<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>पानीको गुणस्तर</h2>
                <p>गुन्जनगर खानेपानी आयोजनाले प्रदान गर्ने खानेपानीको गुणस्तर:</p>
                <ul>
                    <li>पिउनयोग्य पानी</li>
                    <li>नियमित गुणस्तर परीक्षण</li>
                    <li>WHO मापदण्ड अनुसार</li>
                    <li>प्रयोगशाला परीक्षण</li>
                </ul>
                <p>हाम्रो खानेपानी सुरक्षित र गुणस्तरीय छ।</p>
            </div>
        </div>
    </div>
</section>
@endsection
