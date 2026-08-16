@extends('layouts.app')

@section('title', 'नियमावली - गुन्जनगर खानेपानी आयोजना')

@section('content')
<x-page-banner title="नियमावली" :breadcrumb="['श्रोतहरू', 'नियमावली']" />

<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>नियमावली</h2>
                <p>गुन्जनगर खानेपानी आयोजनाका नियमावलीहरू:</p>
                <ul>
                    <li>खानेपानी ऐन</li>
                    <li>खानेपानी नियमावली</li>
                    <li>महसुल नियमावली</li>
                    <li>कर्मचारी नियमावली</li>
                    <li>वित्तीय नियमावली</li>
                </ul>
                <p>नियमावलीहरू उपलब्ध गराउने कार्य भइरहेको छ।</p>
            </div>
        </div>
    </div>
</section>
@endsection
