@extends('layouts.app')

@section('title', 'गुनासो / सुझाव - गुन्जनगर खानेपानी आयोजना')

@section('content')
<x-page-banner title="गुनासो / सुझाव" :breadcrumb="['ई-सेवाहरू', 'गुनासो / सुझाव']" />

<section class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>गुनासो / सुझाव</h2>
                <p>कृपया तलको फारम भरेर आफ्नो गुनासो वा सुझाव पठाउनुहोस्:</p>
                
                <form action="{{ route('contact.submit') }}" method="POST" class="contact-form">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">नाम</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">इमेल</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">फोन</label>
                            <input type="text" class="form-control" id="phone" name="phone">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="subject" class="form-label">विषय</label>
                            <input type="text" class="form-control" id="subject" name="subject" required>
                        </div>
                        <div class="col-12 mb-3">
                            <label for="message" class="form-label">सन्देश</label>
                            <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-submit">पठाउनुहोस्</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
