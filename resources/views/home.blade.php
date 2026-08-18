@extends('layouts.app')

@section('title', 'गुन्जनगर खानेपानी आयोजना - गृहपृष्ठ')

@section('content')
@php
use App\Models\Setting;
use Illuminate\Support\Str;
@endphp
<!-- Hero Section with Slider and Officials -->
<section class="hero-split-section">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <!-- Left: Hero Slider (67%) -->
            <div class="col-lg-8 col-md-8 col-12">
                @if($heroSliders && $heroSliders->count() > 0)
                <div id="heroSlider" class="hero-slider" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($heroSliders as $index => $slider)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            @if($slider->image)
                            @if(str_starts_with($slider->image, 'http://') || str_starts_with($slider->image, 'https://'))
                            <img src="{{ $slider->image }}" alt="{{ $slider->title }}" class="d-block w-100">
                            @else
                            <img src="{{ asset($slider->image) }}" alt="{{ $slider->title }}" class="d-block w-100">
                            @endif
                            @endif
                            <div class="slider-overlay">
                                <div class="slider-content">
                                    <h2>{{ $slider->title }}</h2>
                                    <p>{{ $slider->subtitle ?? '' }}</p>
                                    @if($slider->button_text && $slider->button_url)
                                    <a href="{{ $slider->button_url }}" class="btn btn-hero-cta">{{ $slider->button_text }}</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#heroSlider" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#heroSlider" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    <div class="slider-counter">
                        <span id="currentSlide">01</span> / <span id="totalSlides">{{ str_pad($heroSliders->count(), 2, '0', STR_PAD_LEFT) }}</span>
                    </div>
                    <div class="carousel-indicators">
                        @foreach($heroSliders as $index => $slider)
                        <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="{{ $index }}" class="{{ $index === 0 ? 'active' : '' }}" aria-label="Slide {{ $index + 1 }}"></button>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            
            <!-- Right: Officials Panel (33%) -->
            <div class="col-lg-4 col-md-4 col-12">
                <div class="officials-panel">
                    <div class="officials-header">
                        <h3>हाम्रा पदाधिकारीहरू</h3>
                    </div>
                    <div class="officials-list">
                        @if($homepageOfficials && $homepageOfficials->count() > 0)
                        @foreach($homepageOfficials as $official)
                        <div class="official-card-new">
                            <div class="official-card-left">
                                @if($official->photo)
                                <img src="{{ asset($official->photo) }}" alt="{{ $official->name }}" class="official-photo">
                                @else
                                <div class="official-photo-placeholder">
                                    {{ substr($official->name, 0, 1) }}
                                </div>
                                @endif
                            </div>
                            <div class="official-card-right">
                                <h4>{{ $official->name }}</h4>
                                <p class="designation">{{ $official->position }}</p>
                                @if($official->email)
                                <p class="contact-info">
                                    <i class="fas fa-envelope"></i>
                                    <a href="mailto:{{ $official->email }}">{{ $official->email }}</a>
                                </p>
                                @endif
                                @if($official->phone)
                                <p class="contact-info">
                                    <i class="fas fa-phone"></i>
                                    {{ $official->phone }}
                                </p>
                                @endif
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="py-5 bg-light" id="about">
    <div class="container">
        <div class="section-title">
            <h2>हाम्रो बारेमा</h2>
            <div class="divider"></div>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-6">
                <p>{{ Setting::get('about_description', 'गुन्जनगर खानेपानी आयोजना गुन्जनगरका बासिन्दाहरूलाई गुणस्तरीय खानेपानी उपलब्ध गराउने उद्देश्यले स्थापना गरिएको हो। हामी स्वच्छ र सुरक्षित पानीको आपूर्ति गर्ने, पाइपलाइनको निर्माण र मर्मत गर्ने, र खानेपानी सम्बन्धी सेवाहरू प्रदान गर्ने कार्यमा संलग्न छौं।') }}</p>
                <p>हाम्रो मुख्य उद्देश्यहरू:</p>
                <ul class="list-unstyled">
                    <li><i class="fas fa-check-circle text-success me-2"></i>गुणस्तरीय खानेपानी आपूर्ति</li>
                    <li><i class="fas fa-check-circle text-success me-2"></i>पाइपलाइनको विस्तार र मर्मत</li>
                    <li><i class="fas fa-check-circle text-success me-2"></i>ग्राहक सेवा सुधार</li>
                    <li><i class="fas fa-check-circle text-success me-2"></i>पानी स्रोतको संरक्षण</li>
                </ul>
            </div>
            <div class="col-lg-6">
                @if($sliders && $sliders->count() > 0)
                <div id="aboutSlider" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($sliders as $index => $slider)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            @if($slider->image)
                            @if(str_starts_with($slider->image, 'http://') || str_starts_with($slider->image, 'https://'))
                            <img src="{{ $slider->image }}" alt="{{ $slider->title }}" class="d-block w-100" style="height: 300px; object-fit: cover;">
                            @else
                            <img src="{{ asset($slider->image) }}" alt="{{ $slider->title }}" class="d-block w-100" style="height: 300px; object-fit: cover;">
                            @endif
                            @endif
                            @if($slider->show_overlay)
                            <div class="carousel-caption d-none d-md-block">
                                <h5>{{ $slider->title }}</h5>
                                <p>{{ $slider->subtitle }}</p>
                                @if($slider->button_text && $slider->button_url)
                                <a href="{{ $slider->button_url }}" class="btn btn-primary">{{ $slider->button_text }}</a>
                                @endif
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    @if($sliders->count() > 1)
                    <button class="carousel-control-prev" type="button" data-bs-target="#aboutSlider" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#aboutSlider" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    @endif
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
@if($statistics && $statistics->count() > 0)
<section class="statistics-section">
    <div class="container">
        <div class="row">
            @foreach($statistics as $stat)
            <div class="col-6 col-md-2">
                <div class="stat-item">
                    <div class="icon">
                        <i class="fas {{ $stat->icon ?? 'fa-chart-line' }}"></i>
                    </div>
                    <h3>{{ $stat->value }}</h3>
                    <p>{{ $stat->title }}</p>
                    @if($stat->subtitle)
                    <small>{{ $stat->subtitle }}</small>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Services Section -->
@if($services && $services->count() > 0)
<section class="py-5" id="services">
    <div class="container">
        <div class="section-title">
            <h2>हाम्रा सेवाहरू</h2>
            <div class="divider"></div>
        </div>
        <div class="row">
            @foreach($services as $service)
            <div class="col-md-4 mb-4">
                <div class="service-card">
                    <div class="icon">
                        <i class="fas {{ $service->icon ?? 'fa-tint' }}"></i>
                    </div>
                    <h4>{{ $service->title }}</h4>
                    <p>{{ Str::limit($service->description, 100) }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Notices & News Section -->
@if($latestNotices && $latestNotices->count() > 0 || $latestNews && $latestNews->count() > 0)
<section class="py-5 bg-light" id="notices">
    <div class="container">
        <div class="section-title">
            <h2>सूचना तथा समाचार</h2>
            <div class="divider"></div>
        </div>
        <div class="row">
            @if($latestNotices && $latestNotices->count() > 0)
            <div class="col-lg-6 mb-4">
                <h3 class="mb-4 text-primary">सूचनाहरू</h3>
                @foreach($latestNotices as $notice)
                <div class="content-card mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h4 class="mb-0">{{ $notice->title }}</h4>
                            @if($notice->is_pinned)
                            <span class="badge bg-danger">Pinned</span>
                            @endif
                        </div>
                        <p class="mb-2">{{ Str::limit($notice->description, 150) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="fas fa-calendar me-1"></i>{{ $notice->publish_date->format('Y-m-d') }}
                            </small>
                            @if($notice->attachment)
                            <a href="{{ asset($notice->attachment) }}" class="btn btn-sm btn-outline-primary" download>
                                <i class="fas fa-download me-1"></i>Download
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
            
            @if($latestNews && $latestNews->count() > 0)
            <div class="col-lg-6 mb-4">
                <h3 class="mb-4 text-primary">समाचारहरू</h3>
                @foreach($latestNews as $news)
                <div class="content-card mb-3">
                    @if($news->featured_image)
                    <div class="card-image" style="background-image: url('{{ asset($news->featured_image) }}')"></div>
                    @endif
                    <div class="card-body">
                        <h4>{{ $news->title }}</h4>
                        <p>{{ Str::limit($news->excerpt ?? strip_tags($news->content), 100) }}</p>
                        <a href="{{ route('news.show', $news->slug) }}" class="btn-read-more">
                            पढ्नुहोस् <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</section>
@endif

<!-- Tariff/Rates Section -->
@if($tariffs && $tariffs->count() > 0)
<section class="py-5" id="tariffs">
    <div class="container">
        <div class="section-title">
            <h2>महसुल / दररेट</h2>
            <div class="divider"></div>
        </div>
        <div class="row justify-content-center">
            @foreach($tariffs as $tariff)
            <div class="col-md-4 mb-4">
                <div class="content-card">
                    <div class="card-body text-center">
                        <h4 class="text-primary">{{ $tariff->title }}</h4>
                        <h2 class="display-4 fw-bold text-success mb-3">
                            Rs. {{ number_format($tariff->price, 2) }}
                        </h2>
                        @if($tariff->unit)
                        <p class="text-muted">प्रति {{ $tariff->unit }}</p>
                        @endif
                        <p class="small text-muted">{{ $tariff->description }}</p>
                        @if($tariff->attachment)
                        <a href="{{ asset($tariff->attachment) }}" class="btn btn-outline-primary btn-sm" download>
                            <i class="fas fa-download me-1"></i>Download Details
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Forms/Downloads Section -->
@if($downloads && $downloads->count() > 0)
<section class="py-5 bg-light" id="downloads">
    <div class="container">
        <div class="section-title">
            <h2>फारमहरू / डाउनलोड</h2>
            <div class="divider"></div>
        </div>
        <div class="row">
            @foreach($downloads as $download)
            <div class="col-md-6 mb-3">
                <div class="download-card">
                    <div class="file-icon">
                        <i class="fas fa-file-{{ $download->file_type === 'pdf' ? 'pdf' : 'alt' }}"></i>
                    </div>
                    <div>
                        <h5>{{ $download->title }}</h5>
                        <span class="file-type">{{ strtoupper($download->file_type) }} - {{ $download->file_size_formatted }}</span>
                    </div>
                    <a href="{{ asset($download->file) }}" class="btn btn-download" download>
                        <i class="fas fa-download"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Photo Gallery Section -->
@if($galleryImages && $galleryImages->count() > 0)
<section class="py-5" id="gallery">
    <div class="container">
        <div class="section-title">
            <h2>फोटो ग्यालरी</h2>
            <div class="divider"></div>
        </div>
        <div class="row">
            @foreach($galleryImages as $image)
            <div class="col-md-4 mb-4">
                <div class="gallery-item">
                    <img src="{{ asset($image->image) }}" alt="{{ $image->title }}">
                    <div class="overlay">
                        <h5>{{ $image->title }}</h5>
                        @if($image->album)
                        <small>{{ $image->album->name }}</small>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- Important Links Section -->
@if($importantLinks && $importantLinks->count() > 0)
<section class="py-5 bg-light">
    <div class="container">
        <div class="section-title">
            <h2>महत्वपूर्ण लिंकहरू</h2>
            <div class="divider"></div>
        </div>
        <div class="row">
            @foreach($importantLinks as $link)
            <div class="col-md-4 mb-4">
                <div class="important-link-card">
                    <div class="icon">
                        <i class="fas {{ $link->icon ?? 'fa-link' }}"></i>
                    </div>
                    <h5>{{ $link->title }}</h5>
                    <a href="{{ $link->url }}" target="{{ $link->opens_in_new_tab ? '_blank' : '_self' }}" class="btn btn-sm btn-outline-primary mt-2">
                        <i class="fas fa-external-link-alt me-1"></i>Visit
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- FAQ Section -->
@if($faqs && $faqs->count() > 0)
<section class="py-5" id="faq">
    <div class="container">
        <div class="section-title">
            <h2>बारम्बार सोधिने प्रश्नहरू (FAQ)</h2>
            <div class="divider"></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">
                    @foreach($faqs as $index => $faq)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading{{ $index }}">
                            <button class="accordion-button {{ $index !== 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $index }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}">
                                {{ $faq->question }}
                            </button>
                        </h2>
                        <div id="collapse{{ $index }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                {{ $faq->answer }}
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Contact Section -->
<section class="contact-section" id="contact">
    <div class="container">
        <div class="section-title">
            <h2>सम्पर्क गर्नुहोस्</h2>
            <div class="divider"></div>
        </div>
        <div class="row">
            <div class="col-lg-5 mb-4">
                <div class="contact-info-item">
                    <div class="icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div>
                        <h5>कार्यालय ठेगाना</h5>
                        <p>{{ Setting::get('office_address', 'गुन्जनगर, नेपाल') }}</p>
                    </div>
                </div>
                
                <div class="contact-info-item">
                    <div class="icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div>
                        <h5>फोन नम्बर</h5>
                        <p>{{ Setting::get('contact_phone', '') }}</p>
                    </div>
                </div>
                
                <div class="contact-info-item">
                    <div class="icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h5>इमेल</h5>
                        <p>{{ Setting::get('contact_email', '') }}</p>
                    </div>
                </div>
                
                <div class="contact-info-item">
                    <div class="icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div>
                        <h5>कार्य समय</h5>
                        <p>{{ Setting::get('office_hours_weekdays', '10:00 AM - 5:00 PM') }}</p>
                        <p class="small text-muted">{{ Setting::get('office_hours_saturday', 'Closed') }}</p>
                    </div>
                </div>
                
                @if(Setting::get('emergency_phone'))
                <div class="contact-info-item">
                    <div class="icon" style="background: var(--notice-red);">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div>
                        <h5>आपतकालीन सम्पर्क</h5>
                        <p>{{ Setting::get('emergency_phone') }}</p>
                    </div>
                </div>
                @endif
            </div>
            
            <div class="col-lg-7">
                <div class="card border-0 shadow">
                    <div class="card-body p-4">
                        <h4 class="mb-4 text-primary">सन्देश पठाउनुहोस्</h4>
                        <form class="contact-form" id="contactForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">नाम *</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">फोन नम्बर *</label>
                                    <input type="text" class="form-control" name="phone" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">इमेल</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">विषय *</label>
                                <input type="text" class="form-control" name="subject" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">सन्देश *</label>
                                <textarea class="form-control" name="message" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-submit">
                                <i class="fas fa-paper-plane me-2"></i>पठाउनुहोस्
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Google Map -->
        @if(Setting::get('google_maps_lat') && Setting::get('google_maps_lng'))
        <div class="row mt-5">
            <div class="col-12">
                <div class="card border-0 shadow">
                    <div class="card-body p-0">
                        <iframe 
                            width="100%" 
                            height="400" 
                            frameborder="0" 
                            scrolling="no" 
                            marginheight="0" 
                            marginwidth="0" 
                            src="https://maps.google.com/maps?q={{ Setting::get('google_maps_lat') }},{{ Setting::get('google_maps_lng') }}&z=14&output=embed">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        
        $.ajax({
            url: '{{ route('contact.submit') }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                alert('सन्देश सफलतापूर्वक पठाइयो। धन्यवाद!');
                $('#contactForm')[0].reset();
            },
            error: function(xhr) {
                alert('सन्देश पठाउनमा समस्या भयो। कृपया पुन: प्रयास गर्नुहोस्।');
            }
        });
    });
});
</script>
@endpush
