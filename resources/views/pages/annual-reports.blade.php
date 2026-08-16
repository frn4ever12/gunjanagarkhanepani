@extends('layouts.app')

@section('title', 'वार्षिक प्रतिवेदन - गुन्जनगर खानेपानी आयोजना')

@section('content')
<x-page-banner title="वार्षिक प्रतिवेदन" :breadcrumb="['श्रोतहरू', 'वार्षिक प्रतिवेदन']" />

<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>वार्षिक प्रतिवेदन</h2>
                <p>गुन्जनगर खानेपानी आयोजनाका वार्षिक प्रतिवेदनहरू:</p>
                <ul>
                    <li>आर्थिक वर्ष २०७९/०८०</li>
                    <li>आर्थिक वर्ष २०७८/०७९</li>
                    <li>आर्थिक वर्ष २०७७/०७८</li>
                </ul>
                <p>प्रतिवेदनहरू उपलब्ध गराउने कार्य भइरहेको छ।</p>
            </div>
        </div>
    </div>
</section>
@endsection
