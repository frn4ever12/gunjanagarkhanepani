@extends('layouts.app')

@section('title', 'कार्यालय समय - गुन्जनगर खानेपानी आयोजना')

@section('content')
<x-page-banner title="कार्यालय समय" :breadcrumb="['हाम्रो बारेमा', 'कार्यालय समय']" />

<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>कार्यालय समय</h2>
                <div class="office-hours-table">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>दिन</th>
                                <th>समय</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>आइतबार</td>
                                <td>बिदा</td>
                            </tr>
                            <tr>
                                <td>सोमबार - शुक्रबार</td>
                                <td>१०:०० - १७:००</td>
                            </tr>
                            <tr>
                                <td>शनिबार</td>
                                <td>१०:०० - १४:००</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <p><strong>जरुरी सेवाहरू २४/७ उपलब्ध छन्।</strong></p>
            </div>
        </div>
    </div>
</section>
@endsection
