@extends('layouts.app')

@section('title', 'नागरिक वडापत्र - गुन्जनगर खानेपानी आयोजना')

@section('content')
<x-page-banner title="नागरिक वडापत्र" :breadcrumb="['हाम्रो बारेमा', 'नागरिक वडापत्र']" />

<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>नागरिक वडापत्र</h2>
                <p>गुन्जनगर खानेपानी आयोजनाको नागरिक वडापत्र:</p>
                <ul>
                    <li>गुणस्तरीय खानेपानी सेवा प्रदान गर्ने</li>
                    <li>समयमै सेवा दिने</li>
                    <li>पारदर्शिता बनाउने</li>
                    <li>जनविश्वास अर्जन गर्ने</li>
                    <li>ग्राहक सन्तुष्टि सुनिश्चित गर्ने</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
