@extends('layouts.app')

@section('title', 'सम्पर्क गर्नुहोस्')

@section('content')
<div class="page-banner">
    <div class="container">
        <h1 class="page-title">सम्पर्क गर्नुहोस्</h1>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <div class="contact-info">
                <h3>सम्पर्क जानकारी</h3>
                <div class="info-item">
                    <i class="fas fa-map-marker-alt"></i>
                    <p>{{ Setting::get('office_address', 'गुन्जनगर, नेपाल') }}</p>
                </div>
                <div class="info-item">
                    <i class="fas fa-phone"></i>
                    <p>{{ Setting::get('contact_phone', '') }}</p>
                </div>
                <div class="info-item">
                    <i class="fas fa-envelope"></i>
                    <p>{{ Setting::get('contact_email', '') }}</p>
                </div>
                <div class="info-item">
                    <i class="fas fa-clock"></i>
                    <p>{{ Setting::get('office_hours_weekdays', '10:00 AM - 5:00 PM') }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="contact-form">
                <h3>सन्देश पठाउनुहोस्</h3>
                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">नाम</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">इमेल</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">फोन नम्बर</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">विषय</label>
                        <input type="text" class="form-control" id="subject" name="subject" required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">सन्देश</label>
                        <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">पठाउनुहोस्</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
