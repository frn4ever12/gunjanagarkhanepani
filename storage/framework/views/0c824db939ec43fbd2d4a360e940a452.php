<?php $__env->startSection('title', 'गुन्जनगर खानेपानी आयोजना - गृहपृष्ठ'); ?>

<?php $__env->startSection('content'); ?>
<?php
use App\Models\Setting;
use Illuminate\Support\Str;
?>
<!-- Hero Section with Slider and Officials -->
<section class="hero-split-section">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <!-- Left: Hero Slider (67%) -->
            <div class="col-lg-8 col-md-8 col-12">
                <?php if($heroSliders && $heroSliders->count() > 0): ?>
                <div id="heroSlider" class="hero-slider" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php $__currentLoopData = $heroSliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="carousel-item <?php echo e($index === 0 ? 'active' : ''); ?>">
                            <?php if($slider->image): ?>
                            <?php if(str_starts_with($slider->image, 'http://') || str_starts_with($slider->image, 'https://')): ?>
                            <img src="<?php echo e($slider->image); ?>" alt="<?php echo e($slider->title); ?>" class="d-block w-100">
                            <?php else: ?>
                            <img src="<?php echo e(asset('storage/' . $slider->image)); ?>" alt="<?php echo e($slider->title); ?>" class="d-block w-100">
                            <?php endif; ?>
                            <?php endif; ?>
                            <div class="slider-overlay">
                                <div class="slider-content">
                                    <h2><?php echo e($slider->title); ?></h2>
                                    <p><?php echo e($slider->subtitle ?? ''); ?></p>
                                    <?php if($slider->button_text && $slider->button_url): ?>
                                    <a href="<?php echo e($slider->button_url); ?>" class="btn btn-hero-cta"><?php echo e($slider->button_text); ?></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                        <span id="currentSlide">01</span> / <span id="totalSlides"><?php echo e(str_pad($heroSliders->count(), 2, '0', STR_PAD_LEFT)); ?></span>
                    </div>
                    <div class="carousel-indicators">
                        <?php $__currentLoopData = $heroSliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <button type="button" data-bs-target="#heroSlider" data-bs-slide-to="<?php echo e($index); ?>" class="<?php echo e($index === 0 ? 'active' : ''); ?>" aria-label="Slide <?php echo e($index + 1); ?>"></button>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            
            <!-- Right: Officials Panel (33%) -->
            <div class="col-lg-4 col-md-4 col-12">
                <div class="officials-panel">
                    <div class="officials-header">
                        <h3>हाम्रा पदाधिकारीहरू</h3>
                    </div>
                    <div class="officials-list">
                        <?php if($homepageOfficials && $homepageOfficials->count() > 0): ?>
                        <?php $__currentLoopData = $homepageOfficials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $official): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="official-card-new">
                            <div class="official-card-left">
                                <?php if($official->photo): ?>
                                <img src="<?php echo e(asset('storage/' . $official->photo)); ?>" alt="<?php echo e($official->name); ?>" class="official-photo">
                                <?php else: ?>
                                <div class="official-photo-placeholder">
                                    <?php echo e(substr($official->name, 0, 1)); ?>

                                </div>
                                <?php endif; ?>
                            </div>
                            <div class="official-card-right">
                                <h4><?php echo e($official->name); ?></h4>
                                <p class="designation"><?php echo e($official->position); ?></p>
                                <?php if($official->email): ?>
                                <p class="contact-info">
                                    <i class="fas fa-envelope"></i>
                                    <a href="mailto:<?php echo e($official->email); ?>"><?php echo e($official->email); ?></a>
                                </p>
                                <?php endif; ?>
                                <?php if($official->phone): ?>
                                <p class="contact-info">
                                    <i class="fas fa-phone"></i>
                                    <?php echo e($official->phone); ?>

                                </p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
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
                <p><?php echo e(Setting::get('about_description', 'गुन्जनगर खानेपानी आयोजना गुन्जनगरका बासिन्दाहरूलाई गुणस्तरीय खानेपानी उपलब्ध गराउने उद्देश्यले स्थापना गरिएको हो। हामी स्वच्छ र सुरक्षित पानीको आपूर्ति गर्ने, पाइपलाइनको निर्माण र मर्मत गर्ने, र खानेपानी सम्बन्धी सेवाहरू प्रदान गर्ने कार्यमा संलग्न छौं।')); ?></p>
                <p>हाम्रो मुख्य उद्देश्यहरू:</p>
                <ul class="list-unstyled">
                    <li><i class="fas fa-check-circle text-success me-2"></i>गुणस्तरीय खानेपानी आपूर्ति</li>
                    <li><i class="fas fa-check-circle text-success me-2"></i>पाइपलाइनको विस्तार र मर्मत</li>
                    <li><i class="fas fa-check-circle text-success me-2"></i>ग्राहक सेवा सुधार</li>
                    <li><i class="fas fa-check-circle text-success me-2"></i>पानी स्रोतको संरक्षण</li>
                </ul>
            </div>
            <div class="col-lg-6">
                <?php if($sliders && $sliders->count() > 0): ?>
                <div id="aboutSlider" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="carousel-item <?php echo e($index === 0 ? 'active' : ''); ?>">
                            <?php if($slider->image): ?>
                            <?php if(str_starts_with($slider->image, 'http://') || str_starts_with($slider->image, 'https://')): ?>
                            <img src="<?php echo e($slider->image); ?>" alt="<?php echo e($slider->title); ?>" class="d-block w-100" style="height: 300px; object-fit: cover;">
                            <?php else: ?>
                            <img src="<?php echo e(asset('storage/' . $slider->image)); ?>" alt="<?php echo e($slider->title); ?>" class="d-block w-100" style="height: 300px; object-fit: cover;">
                            <?php endif; ?>
                            <?php endif; ?>
                            <?php if($slider->show_overlay): ?>
                            <div class="carousel-caption d-none d-md-block">
                                <h5><?php echo e($slider->title); ?></h5>
                                <p><?php echo e($slider->subtitle); ?></p>
                                <?php if($slider->button_text && $slider->button_url): ?>
                                <a href="<?php echo e($slider->button_url); ?>" class="btn btn-primary"><?php echo e($slider->button_text); ?></a>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php if($sliders->count() > 1): ?>
                    <button class="carousel-control-prev" type="button" data-bs-target="#aboutSlider" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#aboutSlider" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Statistics Section -->
<?php if($statistics && $statistics->count() > 0): ?>
<section class="statistics-section">
    <div class="container">
        <div class="row">
            <?php $__currentLoopData = $statistics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-6 col-md-2">
                <div class="stat-item">
                    <div class="icon">
                        <i class="fas <?php echo e($stat->icon ?? 'fa-chart-line'); ?>"></i>
                    </div>
                    <h3><?php echo e($stat->value); ?></h3>
                    <p><?php echo e($stat->title); ?></p>
                    <?php if($stat->subtitle): ?>
                    <small><?php echo e($stat->subtitle); ?></small>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Services Section -->
<?php if($services && $services->count() > 0): ?>
<section class="py-5" id="services">
    <div class="container">
        <div class="section-title">
            <h2>हाम्रा सेवाहरू</h2>
            <div class="divider"></div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 mb-4">
                <div class="service-card">
                    <div class="icon">
                        <i class="fas <?php echo e($service->icon ?? 'fa-tint'); ?>"></i>
                    </div>
                    <h4><?php echo e($service->title); ?></h4>
                    <p><?php echo e(Str::limit($service->description, 100)); ?></p>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Notices & News Section -->
<?php if($latestNotices && $latestNotices->count() > 0 || $latestNews && $latestNews->count() > 0): ?>
<section class="py-5 bg-light" id="notices">
    <div class="container">
        <div class="section-title">
            <h2>सूचना तथा समाचार</h2>
            <div class="divider"></div>
        </div>
        <div class="row">
            <?php if($latestNotices && $latestNotices->count() > 0): ?>
            <div class="col-lg-6 mb-4">
                <h3 class="mb-4 text-primary">सूचनाहरू</h3>
                <?php $__currentLoopData = $latestNotices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="content-card mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h4 class="mb-0"><?php echo e($notice->title); ?></h4>
                            <?php if($notice->is_pinned): ?>
                            <span class="badge bg-danger">Pinned</span>
                            <?php endif; ?>
                        </div>
                        <p class="mb-2"><?php echo e(Str::limit($notice->description, 150)); ?></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="fas fa-calendar me-1"></i><?php echo e($notice->publish_date->format('Y-m-d')); ?>

                            </small>
                            <?php if($notice->attachment): ?>
                            <a href="<?php echo e(asset('storage/' . $notice->attachment)); ?>" class="btn btn-sm btn-outline-primary" download>
                                <i class="fas fa-download me-1"></i>Download
                            </a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>
            
            <?php if($latestNews && $latestNews->count() > 0): ?>
            <div class="col-lg-6 mb-4">
                <h3 class="mb-4 text-primary">समाचारहरू</h3>
                <?php $__currentLoopData = $latestNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $news): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="content-card mb-3">
                    <?php if($news->featured_image): ?>
                    <div class="card-image" style="background-image: url('<?php echo e(asset('storage/' . $news->featured_image)); ?>')"></div>
                    <?php endif; ?>
                    <div class="card-body">
                        <h4><?php echo e($news->title); ?></h4>
                        <p><?php echo e(Str::limit($news->excerpt ?? strip_tags($news->content), 100)); ?></p>
                        <a href="<?php echo e(route('news.show', $news->slug)); ?>" class="btn-read-more">
                            पढ्नुहोस् <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Tariff/Rates Section -->
<?php if($tariffs && $tariffs->count() > 0): ?>
<section class="py-5" id="tariffs">
    <div class="container">
        <div class="section-title">
            <h2>महसुल / दररेट</h2>
            <div class="divider"></div>
        </div>
        <div class="row justify-content-center">
            <?php $__currentLoopData = $tariffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tariff): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 mb-4">
                <div class="content-card">
                    <div class="card-body text-center">
                        <h4 class="text-primary"><?php echo e($tariff->title); ?></h4>
                        <h2 class="display-4 fw-bold text-success mb-3">
                            Rs. <?php echo e(number_format($tariff->price, 2)); ?>

                        </h2>
                        <?php if($tariff->unit): ?>
                        <p class="text-muted">प्रति <?php echo e($tariff->unit); ?></p>
                        <?php endif; ?>
                        <p class="small text-muted"><?php echo e($tariff->description); ?></p>
                        <?php if($tariff->attachment): ?>
                        <a href="<?php echo e(asset('storage/' . $tariff->attachment)); ?>" class="btn btn-outline-primary btn-sm" download>
                            <i class="fas fa-download me-1"></i>Download Details
                        </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Forms/Downloads Section -->
<?php if($downloads && $downloads->count() > 0): ?>
<section class="py-5 bg-light" id="downloads">
    <div class="container">
        <div class="section-title">
            <h2>फारमहरू / डाउनलोड</h2>
            <div class="divider"></div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $downloads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $download): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6 mb-3">
                <div class="download-card">
                    <div class="file-icon">
                        <i class="fas fa-file-<?php echo e($download->file_type === 'pdf' ? 'pdf' : 'alt'); ?>"></i>
                    </div>
                    <div>
                        <h5><?php echo e($download->title); ?></h5>
                        <span class="file-type"><?php echo e(strtoupper($download->file_type)); ?> - <?php echo e($download->file_size_formatted); ?></span>
                    </div>
                    <a href="<?php echo e(asset('storage/' . $download->file)); ?>" class="btn btn-download" download>
                        <i class="fas fa-download"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Photo Gallery Section -->
<?php if($galleryImages && $galleryImages->count() > 0): ?>
<section class="py-5" id="gallery">
    <div class="container">
        <div class="section-title">
            <h2>फोटो ग्यालरी</h2>
            <div class="divider"></div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $galleryImages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 mb-4">
                <div class="gallery-item">
                    <img src="<?php echo e(asset('storage/' . $image->image)); ?>" alt="<?php echo e($image->title); ?>">
                    <div class="overlay">
                        <h5><?php echo e($image->title); ?></h5>
                        <?php if($image->album): ?>
                        <small><?php echo e($image->album->name); ?></small>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- Important Links Section -->
<?php if($importantLinks && $importantLinks->count() > 0): ?>
<section class="py-5 bg-light">
    <div class="container">
        <div class="section-title">
            <h2>महत्वपूर्ण लिंकहरू</h2>
            <div class="divider"></div>
        </div>
        <div class="row">
            <?php $__currentLoopData = $importantLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 mb-4">
                <div class="important-link-card">
                    <div class="icon">
                        <i class="fas <?php echo e($link->icon ?? 'fa-link'); ?>"></i>
                    </div>
                    <h5><?php echo e($link->title); ?></h5>
                    <a href="<?php echo e($link->url); ?>" target="<?php echo e($link->opens_in_new_tab ? '_blank' : '_self'); ?>" class="btn btn-sm btn-outline-primary mt-2">
                        <i class="fas fa-external-link-alt me-1"></i>Visit
                    </a>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- FAQ Section -->
<?php if($faqs && $faqs->count() > 0): ?>
<section class="py-5" id="faq">
    <div class="container">
        <div class="section-title">
            <h2>बारम्बार सोधिने प्रश्नहरू (FAQ)</h2>
            <div class="divider"></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion" id="faqAccordion">
                    <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading<?php echo e($index); ?>">
                            <button class="accordion-button <?php echo e($index !== 0 ? 'collapsed' : ''); ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo e($index); ?>" aria-expanded="<?php echo e($index === 0 ? 'true' : 'false'); ?>">
                                <?php echo e($faq->question); ?>

                            </button>
                        </h2>
                        <div id="collapse<?php echo e($index); ?>" class="accordion-collapse collapse <?php echo e($index === 0 ? 'show' : ''); ?>" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <?php echo e($faq->answer); ?>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

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
                        <p><?php echo e(Setting::get('office_address', 'गुन्जनगर, नेपाल')); ?></p>
                    </div>
                </div>
                
                <div class="contact-info-item">
                    <div class="icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div>
                        <h5>फोन नम्बर</h5>
                        <p><?php echo e(Setting::get('contact_phone', '')); ?></p>
                    </div>
                </div>
                
                <div class="contact-info-item">
                    <div class="icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h5>इमेल</h5>
                        <p><?php echo e(Setting::get('contact_email', '')); ?></p>
                    </div>
                </div>
                
                <div class="contact-info-item">
                    <div class="icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div>
                        <h5>कार्य समय</h5>
                        <p><?php echo e(Setting::get('office_hours_weekdays', '10:00 AM - 5:00 PM')); ?></p>
                        <p class="small text-muted"><?php echo e(Setting::get('office_hours_saturday', 'Closed')); ?></p>
                    </div>
                </div>
                
                <?php if(Setting::get('emergency_phone')): ?>
                <div class="contact-info-item">
                    <div class="icon" style="background: var(--notice-red);">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div>
                        <h5>आपतकालीन सम्पर्क</h5>
                        <p><?php echo e(Setting::get('emergency_phone')); ?></p>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            
            <div class="col-lg-7">
                <div class="card border-0 shadow">
                    <div class="card-body p-4">
                        <h4 class="mb-4 text-primary">सन्देश पठाउनुहोस्</h4>
                        <form class="contact-form" id="contactForm">
                            <?php echo csrf_field(); ?>
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
        <?php if(Setting::get('google_maps_lat') && Setting::get('google_maps_lng')): ?>
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
                            src="https://maps.google.com/maps?q=<?php echo e(Setting::get('google_maps_lat')); ?>,<?php echo e(Setting::get('google_maps_lng')); ?>&z=14&output=embed">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('scripts'); ?>
<script>
$(document).ready(function() {
    $('#contactForm').on('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        
        $.ajax({
            url: '<?php echo e(route('contact.submit')); ?>',
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
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\Lenovo\CascadeProjects\gunjannagar-khanepani\resources\views/home.blade.php ENDPATH**/ ?>