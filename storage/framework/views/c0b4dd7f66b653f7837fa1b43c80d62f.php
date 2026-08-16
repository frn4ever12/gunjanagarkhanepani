<?php
use App\Models\Setting;
?>
<!DOCTYPE html>
<html lang="ne">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'गुन्जनगर खानेपानी आयोजना - स्वच्छ पानी, स्वस्थ जीवन'); ?></title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Devanagari:wght@400;500;600;700;800;900&family=Open+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary-blue: #0d47a1;
            --secondary-blue: #1565c0;
            --bright-blue: #2196f3;
            --water-blue: #00bcd4;
            --water-green: #4caf50;
            --notice-red: #f44336;
            --dark-navy: #1a237e;
            --light-bg: #f5f7fa;
            --white: #ffffff;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Noto Sans Devanagari', 'Open Sans', sans-serif;
            background-color: var(--light-bg);
            color: #333;
            line-height: 1.6;
        }
        
        /* Global Nepali Typography */
        .navbar,
        .navbar a,
        .dropdown-menu,
        .dropdown-menu a,
        .brand-title,
        .logo-text h1,
        .logo-text .tagline,
        .main-nav .nav-link,
        .main-nav .dropdown-item {
            font-family: 'Noto Sans Devanagari', sans-serif;
        }
        
        /* Main Header */
        .main-header {
            background: white;
            padding: 8px 0;
            min-height: 100px;
            max-height: 105px;
            display: flex;
            align-items: center;
        }
        
        .logo-section {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 10px;
        }
        
        .logo-img {
            height: 150px;
            width: auto;
            max-width: 160px;
            object-fit: contain;
            margin-right: 15px;
        }
        
        .logo-placeholder {
            width: 65px;
            height: 65px;
            background: linear-gradient(135deg, var(--primary-blue), var(--water-blue));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 28px;
            margin-right: 15px;
        }
        
        .logo-text {
            display: flex;
            flex-direction: column;
        }
        
        .logo-text h1 {
            font-size: 30px;
            font-weight: 700;
            color: var(--primary-blue);
            margin: 0;
            line-height: 1.1;
            font-family: 'Noto Sans Devanagari', sans-serif;
        }
        
        .logo-text .tagline {
            font-size: 14px;
            color: var(--water-green);
            margin: 3px 0 0 0;
            font-weight: 500;
            font-family: 'Noto Sans Devanagari', sans-serif;
        }
        
        .logo-text .office-address {
            font-size: 12px;
            color: #666;
            margin: 2px 0 0 0;
            font-weight: 400;
            line-height: 1.3;
        }
        
        .logo-text .office-phone {
            font-size: 11px;
            color: #666;
            margin: 2px 0 0 0;
            font-weight: 400;
            line-height: 1.3;
        }
        
        .logo-text .office-phone i {
            color: var(--primary-blue);
            font-size: 10px;
        }
        
        .contact-info-section {
            text-align: center;
            padding: 0 10px;
        }
        
        .contact-info-section .office-address,
        .contact-info-section .office-phone,
        .contact-info-section .office-email {
            font-size: 12px;
            color: #666;
            margin: 3px 0;
            font-weight: 400;
            line-height: 1.3;
        }
        
        .contact-info-section .office-address i,
        .contact-info-section .office-phone i,
        .contact-info-section .office-email i {
            color: var(--primary-blue);
            font-size: 11px;
        }
        
        .header-buttons .btn {
            padding: 8px 16px;
            border-radius: 22px;
            font-size: 13px;
            font-weight: 500;
            margin-left: 6px;
            height: 40px;
            display: inline-flex;
            align-items: center;
            white-space: nowrap;
        }
        
        .nepal-flag {
            height: 50px;
            width: auto;
            object-fit: contain;
        }
        
        .header-contact-info {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            margin-right: 15px;
        }
        
        .header-contact-info p {
            margin: 2px 0;
            font-size: 11px;
            color: #666;
            font-weight: 400;
            line-height: 1.3;
        }
        
        .header-contact-info i {
            color: var(--primary-blue);
            font-size: 10px;
        }
        
        .btn-location {
            background: var(--bright-blue);
            border-color: var(--bright-blue);
            color: white;
        }
        
        .btn-complaint {
            background: var(--water-green);
            border-color: var(--water-green);
            color: white;
        }
        
        .btn-contact {
            background: var(--primary-blue);
            border-color: var(--primary-blue);
            color: white;
        }
        
        /* Navigation */
        .main-nav {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            padding: 0;
            position: sticky;
            top: 0;
            z-index: 1100;
            min-height: 60px;
        }
        
        .main-nav .navbar {
            padding: 0;
            min-height: 65px;
            max-height: 65px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        
        .main-nav .navbar-nav {
            display: flex;
            align-items: center;
            height: 65px;
        }
        
        .main-nav .nav-item {
            position: relative;
            white-space: nowrap;
        }
        
        .main-nav .nav-link {
            color: white;
            padding: 20px 18px;
            font-weight: 700;
            font-size: 18px;
            border-bottom: 3px solid transparent;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            gap: 5px;
            height: 65px;
            white-space: nowrap;
            font-family: 'Noto Sans Devanagari', sans-serif;
            line-height: 1.2;
        }
        
        .main-nav .nav-link:hover,
        .main-nav .nav-link.active {
            background: rgba(255,255,255,0.1);
            border-bottom-color: var(--water-blue);
        }
        
        .main-nav .dropdown-menu {
            border: none;
            border-radius: 8px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
            background: white;
            min-width: 240px;
            max-width: 300px;
            padding: 10px 0;
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1200;
            margin-top: 0;
        }
        
        .main-nav .dropdown-item {
            padding: 12px 20px;
            color: var(--dark-navy);
            border-bottom: 1px solid #eee;
            font-size: 16px;
            font-weight: 700;
            transition: all 0.2s;
            font-family: 'Noto Sans Devanagari', sans-serif;
            line-height: 1.5;
        }
        
        .main-nav .dropdown-item:last-child {
            border-bottom: none;
        }
        
        .main-nav .dropdown-item:hover {
            background: var(--light-bg);
            color: var(--primary-blue);
            padding-left: 25px;
        }
        
        .main-nav .dropdown-toggle::after {
            margin-left: 5px;
            font-size: 10px;
            content: '\f107';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            border: none;
            vertical-align: middle;
        }
        
        .main-nav .dropdown-toggle:hover::after {
            transform: rotate(180deg);
            transition: transform 0.3s ease;
        }
        
        /* Dropdown hover delay */
        .main-nav .dropdown {
            position: relative;
        }
        
        .main-nav .dropdown-menu {
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: all 0.2s ease;
        }
        
        .main-nav .dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        
        /* Language Switcher */
        .language-switcher {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-left: 20px;
            padding-left: 20px;
            border-left: 1px solid rgba(255,255,255,0.2);
        }
        
        .language-switcher .lang-btn {
            background: none;
            border: none;
            color: white;
            padding: 5px 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            border-radius: 4px;
        }
        
        .language-switcher .lang-btn:hover,
        .language-switcher .lang-btn.active {
            background: rgba(255,255,255,0.2);
            border-color: white;
        }
        
        /* Page Banner */
        .page-banner {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            color: white;
            padding: 60px 0;
            position: relative;
        }
        
        .page-banner .breadcrumb {
            background: rgba(255,255,255,0.1);
            border-radius: 25px;
            padding: 10px 20px;
            margin-bottom: 20px;
        }
        
        .page-banner .breadcrumb-item {
            color: rgba(255,255,255,0.8);
        }
        
        .page-banner .breadcrumb-item a {
            color: white;
            text-decoration: none;
        }
        
        .page-banner .breadcrumb-item a:hover {
            color: var(--water-blue);
        }
        
        .page-banner .breadcrumb-item.active {
            color: white;
            font-weight: 600;
        }
        
        .page-banner .page-title {
            font-size: 36px;
            font-weight: 700;
            margin: 0;
        }
        
        /* Page Content */
        .page-content {
            padding: 60px 0;
        }
        
        .page-content h2 {
            color: var(--primary-blue);
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .page-content h3 {
            color: var(--secondary-blue);
            font-size: 22px;
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        .page-content p {
            font-size: 16px;
            line-height: 1.8;
            margin-bottom: 15px;
        }
        
        .page-content ul {
            margin-bottom: 20px;
            padding-left: 20px;
        }
        
        .page-content li {
            margin-bottom: 10px;
        }
        
        /* Official Card Page */
        .official-card-page {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
            text-align: center;
            height: 100%;
        }
        
        .official-photo-page {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 15px;
            border: 4px solid var(--primary-blue);
        }
        
        .official-photo-placeholder-page {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--water-blue), var(--primary-blue));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 48px;
            margin: 0 auto 15px;
            border: 4px solid var(--primary-blue);
        }
        
        .official-card-page h4 {
            color: var(--primary-blue);
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 8px;
        }
        
        .official-card-page .designation {
            color: var(--secondary-blue);
            font-size: 14px;
            margin-bottom: 12px;
        }
        
        .official-card-page .contact-info {
            font-size: 13px;
            color: #666;
            margin-bottom: 5px;
        }
        
        .official-card-page .contact-info a {
            color: var(--primary-blue);
            text-decoration: none;
        }
        
        .official-card-page .contact-info a:hover {
            text-decoration: underline;
        }
        
        /* Download Card */
        .download-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
            text-align: center;
            height: 100%;
        }
        
        .download-card .download-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--water-blue), var(--primary-blue));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            margin: 0 auto 15px;
        }
        
        .download-card h4 {
            color: var(--primary-blue);
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        .download-card .btn-download {
            background: var(--primary-blue);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 14px;
        }
        
        .download-card .btn-download:hover {
            background: var(--secondary-blue);
        }
        
        /* News Card */
        .news-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
            height: 100%;
        }
        
        .news-card .news-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        .news-card .news-content {
            padding: 20px;
        }
        
        .news-card h4 {
            color: var(--primary-blue);
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .news-card .news-date {
            color: #888;
            font-size: 13px;
            margin-bottom: 10px;
        }
        
        .news-card .news-excerpt {
            color: #555;
            font-size: 14px;
            margin-bottom: 15px;
        }
        
        .news-card .btn-read-more {
            background: var(--primary-blue);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 14px;
        }
        
        .news-card .btn-read-more:hover {
            background: var(--secondary-blue);
        }
        
        /* Notice Card */
        .notice-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
            height: 100%;
        }
        
        .notice-card h4 {
            color: var(--primary-blue);
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .notice-card .notice-date {
            color: #888;
            font-size: 13px;
            margin-bottom: 10px;
        }
        
        .notice-card .notice-excerpt {
            color: #555;
            font-size: 14px;
            margin-bottom: 15px;
        }
        
        .notice-card .btn-read-more {
            background: var(--primary-blue);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 14px;
        }
        
        .notice-card .btn-read-more:hover {
            background: var(--secondary-blue);
        }
        
        /* Gallery Card */
        .gallery-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
        }
        
        .gallery-card .gallery-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        .gallery-card .gallery-caption {
            padding: 15px;
            color: #555;
            font-size: 14px;
            margin: 0;
        }
        
        /* Video Card */
        .video-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
        }
        
        .video-card .video-placeholder {
            width: 100%;
            height: 200px;
            background: linear-gradient(135deg, var(--primary-blue), var(--secondary-blue));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 48px;
        }
        
        .video-card h4 {
            color: var(--primary-blue);
            font-size: 16px;
            font-weight: 600;
            margin: 15px 15px 5px;
        }
        
        .video-card p {
            color: #555;
            font-size: 14px;
            margin: 0 15px 15px;
        }
        
        /* Link Card */
        .link-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
            text-align: center;
            height: 100%;
        }
        
        .link-card .link-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--water-blue), var(--primary-blue));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            margin: 0 auto 15px;
        }
        
        .link-card h4 {
            color: var(--primary-blue);
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        .link-card .btn-link {
            background: var(--primary-blue);
            color: white;
            border: none;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 14px;
        }
        
        .link-card .btn-link:hover {
            background: var(--secondary-blue);
        }
        
        /* Sitemap */
        .sitemap h3 {
            color: var(--primary-blue);
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
        }
        
        .sitemap ul {
            list-style: none;
            padding: 0;
        }
        
        .sitemap li {
            margin-bottom: 8px;
        }
        
        .sitemap a {
            color: #555;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .sitemap a:hover {
            color: var(--primary-blue);
        }
        
        /* Notice Bar */
        .notice-bar {
            background: #FFFFFF;
            color: #333;
            padding: 10px 0;
            border-bottom: 1px solid #e0e0e0;
            min-height: 45px;
            max-height: 50px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        
        .notice-bar .row {
            align-items: center;
            white-space: nowrap;
        }
        
        .notice-bar .notice-label {
            background: linear-gradient(135deg, var(--notice-red) 0%, #e53935 100%);
            color: white;
            padding: 6px 15px;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            white-space: nowrap;
            height: 34px;
            display: flex;
            align-items: center;
        }
        
        .notice-bar .notice-ticker {
            overflow: hidden;
            white-space: nowrap;
            padding: 0 15px;
        }
        
        .notice-bar .notice-ticker marquee {
            display: inline-block;
            white-space: nowrap;
        }
        
        .notice-bar .notice-ticker span {
            color: var(--dark-navy);
            font-size: 14px;
            margin: 0 20px;
        }
        
        .notice-bar .view-all {
            color: var(--primary-blue);
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            white-space: nowrap;
            padding: 6px 12px;
            border-radius: 15px;
            background: rgba(13, 71, 161, 0.05);
            transition: all 0.3s;
        }
        
        .notice-bar .view-all:hover {
            background: rgba(13, 71, 161, 0.1);
        }
        
        /* Section spacing */
        section {
            position: relative;
            margin-bottom: 0;
            margin-top: 0;
            width: 100%;
            display: block;
        }
        
        .hero-split-section {
            margin-top: 0;
            padding-top: 0;
        }
        
        .py-5 {
            padding-top: 60px !important;
            padding-bottom: 60px !important;
        }
        
        .bg-light {
            background-color: #f8f9fa !important;
        }
        
        /* Fix carousel positioning */
        .carousel {
            position: relative;
            overflow: hidden;
            width: 100%;
            display: block;
        }
        
        .carousel-inner {
            position: relative;
            overflow: hidden;
            width: 100%;
        }
        
        .carousel-item {
            position: relative;
            width: 100%;
            display: block;
        }
        
        .carousel-item img {
            display: block;
            width: 100%;
        }
        
        .carousel-caption {
            position: absolute;
            bottom: 20px;
            left: 0;
            right: 0;
            z-index: 10;
        }
        
        .carousel-control-prev,
        .carousel-control-next {
            position: absolute;
            top: 0;
            bottom: 0;
            z-index: 15;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 15%;
            color: #fff;
            text-align: center;
            opacity: 0.5;
            transition: opacity 0.15s ease;
        }
        
        /* Hero Split Section */
        .hero-split-section {
            position: relative;
            width: 100%;
            height: 540px;
            margin-bottom: 0;
        }
        
        .hero-slider {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
        }
        
        .hero-slider .carousel-item {
            position: relative;
            height: 100%;
        }
        
        .hero-slider .carousel-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .slider-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, rgba(0, 0, 0, 0.7) 0%, rgba(0, 0, 0, 0.3) 100%);
            display: flex;
            align-items: flex-end;
            padding: 40px 60px;
            padding-bottom: 60px;
        }
        
        .slider-content {
            max-width: 600px;
            color: white;
        }
        
        .slider-content h2 {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.3;
        }
        
        .slider-content p {
            font-size: 18px;
            margin-bottom: 30px;
            opacity: 0.95;
            line-height: 1.6;
        }
        
        .btn-hero-cta {
            background: var(--primary-blue);
            color: white;
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
        }
        
        .btn-hero-cta:hover {
            background: var(--secondary-blue);
            color: white;
            transform: translateY(-2px);
        }
        
        .slider-counter {
            position: absolute;
            bottom: 30px;
            left: 30px;
            color: white;
            font-size: 18px;
            font-weight: 600;
            z-index: 20;
        }
        
        .hero-slider .carousel-control-prev,
        .hero-slider .carousel-control-next {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            top: 50%;
            transform: translateY(-50%);
            opacity: 0.8;
            transition: all 0.3s ease;
        }
        
        .hero-slider .carousel-control-prev:hover,
        .hero-slider .carousel-control-next:hover {
            background: rgba(255, 255, 255, 0.4);
            opacity: 1;
        }
        
        .hero-slider .carousel-control-prev-icon,
        .hero-slider .carousel-control-next-icon {
            width: 20px;
            height: 20px;
        }
        
        .hero-slider .carousel-indicators {
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            margin: 0;
        }
        
        .hero-slider .carousel-indicators button {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            border: none;
            margin: 0 5px;
        }
        
        .hero-slider .carousel-indicators button.active {
            background: white;
        }
        
        /* Officials Panel */
        .officials-panel {
            background: linear-gradient(135deg, #0d47a1 0%, #1565c0 100%);
            height: 540px;
            padding: 25px;
            display: flex;
            flex-direction: column;
        }
        
        .officials-header {
            margin-bottom: 20px;
        }
        
        .officials-header h3 {
            color: white;
            font-size: 22px;
            font-weight: 700;
            margin: 0;
            padding-bottom: 10px;
            border-bottom: 2px solid rgba(255, 255, 255, 0.3);
        }
        
        .officials-list {
            flex: 1;
            overflow-y: auto;
            padding-right: 10px;
        }
        
        .officials-list::-webkit-scrollbar {
            width: 6px;
        }
        
        .officials-list::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 3px;
        }
        
        .officials-list::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 3px;
        }
        
        .official-card-new {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 18px;
            margin-bottom: 15px;
            display: flex;
            gap: 15px;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .official-card-new:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-2px);
        }
        
        .official-card-left {
            flex-shrink: 0;
        }
        
        .official-photo {
            width: 90px;
            height: 90px;
            border-radius: 10px;
            object-fit: cover;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }
        
        .official-photo-placeholder {
            width: 90px;
            height: 90px;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 36px;
            font-weight: 700;
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }
        
        .official-card-right {
            flex: 1;
            min-width: 0;
        }
        
        .official-card-right h4 {
            color: white;
            font-size: 16px;
            font-weight: 700;
            margin: 0 0 5px 0;
            line-height: 1.3;
        }
        
        .official-card-right .designation {
            color: rgba(255, 255, 255, 0.85);
            font-size: 14px;
            margin: 0 0 10px 0;
            line-height: 1.4;
        }
        
        .official-card-right .contact-info {
            color: white;
            font-size: 13px;
            margin: 5px 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .official-card-right .contact-info i {
            opacity: 0.7;
        }
        
        .official-card-right .contact-info a {
            color: white;
            text-decoration: none;
            opacity: 0.9;
            transition: opacity 0.3s ease;
        }
        
        .official-card-right .contact-info a:hover {
            opacity: 1;
            text-decoration: underline;
        }
        
        /* Responsive Design */
        @media (max-width: 991px) {
            .hero-split-section {
                height: auto;
            }
            
            .hero-slider {
                height: 400px;
            }
            
            .officials-panel {
                height: auto;
                min-height: 400px;
            }
            
            .slider-overlay {
                padding: 30px 40px;
            }
            
            .slider-content h2 {
                font-size: 32px;
            }
            
            .slider-content p {
                font-size: 16px;
            }
        }
        
        @media (max-width: 767px) {
            .hero-slider {
                height: 350px;
            }
            
            .slider-overlay {
                padding: 25px 30px;
            }
            
            .slider-content h2 {
                font-size: 28px;
            }
            
            .slider-content p {
                font-size: 15px;
            }
            
            .official-photo {
                width: 70px;
                height: 70px;
            }
            
            .official-photo-placeholder {
                width: 70px;
                height: 70px;
                font-size: 28px;
            }
            
            .official-card-new {
                padding: 15px;
                gap: 12px;
            }
            
            .official-card-right h4 {
                font-size: 15px;
            }
            
            .official-card-right .designation {
                font-size: 13px;
            }
            
            .official-card-right .contact-info {
                font-size: 12px;
            }
        }
        
        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, rgba(13, 71, 161, 0.9) 0%, rgba(33, 150, 243, 0.8) 100%),
                        url('https://images.unsplash.com/photo-1541544741-fa0b16e32b3d?w=1920') center/cover no-repeat;
            color: white;
            padding: 100px 0;
            position: relative;
            margin-bottom: 0;
            background-attachment: scroll;
            min-height: 400px;
        }
        
        .hero-section h2 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .hero-section .hero-title-green {
            color: var(--water-green);
        }
        
        .hero-section p {
            font-size: 18px;
            margin-bottom: 30px;
            opacity: 0.9;
        }
        
        .hero-section .btn-learn-more {
            background: var(--water-green);
            border-color: var(--water-green);
            padding: 12px 30px;
            border-radius: 30px;
            font-weight: 600;
        }
        
        .hero-section .btn-learn-more:hover {
            background: #43a047;
            border-color: #43a047;
        }
        
        /* Officials Section */
        .officials-section {
            background: white;
            padding: 60px 0;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 40px;
        }
        
        .section-title h2 {
            color: var(--primary-blue);
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 10px;
        }
        
        .section-title .divider {
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, var(--primary-blue), var(--water-blue));
            margin: 0 auto;
        }
        
        .official-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            text-align: center;
            padding: 30px 20px;
            height: 100%;
        }
        
        .official-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        
        .official-card .photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 20px;
            border: 4px solid var(--water-blue);
        }
        
        .official-card .photo-placeholder {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: var(--water-blue);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 48px;
            font-weight: bold;
            margin: 0 auto 20px;
            border: 4px solid var(--water-blue);
        }
        
        .official-card h4 {
            color: var(--primary-blue);
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .official-card .position {
            color: var(--water-green);
            font-weight: 500;
            font-size: 14px;
        }
        
        /* Statistics Section */
        .statistics-section {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--secondary-blue) 100%);
            color: white;
            padding: 60px 0;
            margin: 0;
        }
        
        .stat-item {
            text-align: center;
            padding: 20px;
        }
        
        .stat-item .icon {
            font-size: 40px;
            margin-bottom: 15px;
            opacity: 0.9;
        }
        
        .stat-item h3 {
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .stat-item p {
            font-size: 16px;
            opacity: 0.9;
            margin: 0;
        }
        
        /* Cards */
        .content-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            height: 100%;
        }
        
        .content-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        
        .content-card .card-image {
            height: 200px;
            background-size: cover;
            background-position: center;
        }
        
        .content-card .card-body {
            padding: 20px;
        }
        
        .content-card h4 {
            color: var(--primary-blue);
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .content-card p {
            color: #666;
            font-size: 14px;
            margin-bottom: 15px;
        }
        
        .content-card .btn-read-more {
            color: var(--primary-blue);
            font-weight: 600;
            padding: 0;
        }
        
        .content-card .btn-read-more:hover {
            color: var(--secondary-blue);
        }
        
        /* Service Cards */
        .service-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            transition: all 0.3s;
            height: 100%;
        }
        
        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
        }
        
        .service-card .icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, var(--water-blue), var(--primary-blue));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            color: white;
            font-size: 28px;
        }
        
        .service-card h4 {
            color: var(--primary-blue);
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .service-card p {
            color: #666;
            font-size: 14px;
            margin: 0;
        }
        
        /* Download Cards */
        .download-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            display: flex;
            align-items: center;
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
            transition: all 0.3s;
        }
        
        .download-card:hover {
            transform: translateX(5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }
        
        .download-card .file-icon {
            width: 50px;
            height: 50px;
            background: var(--water-blue);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            margin-right: 15px;
        }
        
        .download-card h5 {
            color: var(--primary-blue);
            font-size: 16px;
            font-weight: 600;
            margin: 0;
        }
        
        .download-card .file-type {
            font-size: 12px;
            color: #999;
        }
        
        .download-card .btn-download {
            margin-left: auto;
            background: var(--water-green);
            border-color: var(--water-green);
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 14px;
        }
        
        /* Gallery */
        .gallery-item {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        
        .gallery-item img {
            width: 100%;
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s;
        }
        
        .gallery-item:hover img {
            transform: scale(1.1);
        }
        
        .gallery-item .overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: linear-gradient(transparent, rgba(0,0,0,0.8));
            padding: 20px;
            color: white;
            transform: translateY(100%);
            transition: transform 0.3s;
        }
        
        .gallery-item:hover .overlay {
            transform: translateY(0);
        }
        
        /* Important Links */
        .important-link-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 3px 15px rgba(0,0,0,0.1);
            transition: all 0.3s;
            height: 100%;
        }
        
        .important-link-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 20px rgba(0,0,0,0.15);
        }
        
        .important-link-card .icon {
            font-size: 30px;
            color: var(--primary-blue);
            margin-bottom: 15px;
        }
        
        .important-link-card h5 {
            color: var(--primary-blue);
            font-size: 16px;
            font-weight: 600;
            margin: 0;
        }
        
        /* Contact Section */
        .contact-section {
            background: white;
            padding: 60px 0;
        }
        
        .contact-info-item {
            display: flex;
            align-items: flex-start;
            margin-bottom: 25px;
        }
        
        .contact-info-item .icon {
            width: 50px;
            height: 50px;
            background: var(--water-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 20px;
            margin-right: 15px;
            flex-shrink: 0;
        }
        
        .contact-info-item h5 {
            color: var(--primary-blue);
            font-size: 16px;
            font-weight: 600;
            margin: 0 0 5px;
        }
        
        .contact-info-item p {
            color: #666;
            font-size: 14px;
            margin: 0;
        }
        
        /* Footer */
        .main-footer {
            background: linear-gradient(135deg, var(--dark-navy) 0%, var(--primary-blue) 100%);
            color: white;
            padding: 60px 0 20px;
        }
        
        .footer-section h4 {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid var(--water-blue);
        }
        
        .footer-section ul {
            list-style: none;
            padding: 0;
        }
        
        .footer-section ul li {
            margin-bottom: 10px;
        }
        
        .footer-section ul li a {
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: all 0.3s;
        }
        
        .footer-section ul li a:hover {
            color: white;
            padding-left: 5px;
        }
        
        .footer-section .social-icons a {
            display: inline-flex;
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            align-items: center;
            justify-content: center;
            color: white;
            margin-right: 10px;
            transition: all 0.3s;
        }
        
        .footer-section .social-icons a:hover {
            background: var(--water-blue);
        }
        
        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 20px;
            margin-top: 40px;
            text-align: center;
            font-size: 14px;
            color: rgba(255,255,255,0.8);
        }
        
        /* Contact Form */
        .contact-form .form-control {
            border-radius: 10px;
            padding: 12px 15px;
            border: 1px solid #ddd;
        }
        
        .contact-form .form-control:focus {
            border-color: var(--primary-blue);
            box-shadow: 0 0 0 0.2rem rgba(13, 71, 161, 0.25);
        }
        
        .contact-form .btn-submit {
            background: var(--primary-blue);
            border-color: var(--primary-blue);
            padding: 12px 30px;
            border-radius: 25px;
            font-weight: 600;
        }
        
        .contact-form .btn-submit:hover {
            background: var(--secondary-blue);
            border-color: var(--secondary-blue);
        }
        
        /* Responsive */
        @media (max-width: 991px) {
            .main-header {
                text-align: center;
                padding: 10px 0;
                min-height: auto;
                max-height: none;
            }
            
            .logo-section {
                justify-content: center;
                flex-direction: column;
                gap: 8px;
            }
            
            .logo-img,
            .logo-placeholder {
                margin-right: 0;
                height: 55px;
                width: 55px;
                font-size: 24px;
            }
            
            .logo-text h1 {
                font-size: 20px;
            }
            
            .logo-text .tagline {
                font-size: 12px;
            }
            
            .header-buttons {
                margin-top: 10px;
                justify-content: center;
            }
            
            .header-buttons .btn {
                margin: 3px 5px;
                font-size: 12px;
                padding: 6px 12px;
                height: 36px;
            }
            
            .main-nav .navbar-collapse {
                background: var(--primary-blue);
                padding: 15px 0;
                margin-top: 10px;
                border-radius: 8px;
            }
            
            .main-nav .navbar-nav {
                flex-direction: column;
                align-items: flex-start;
                width: 100%;
                height: auto;
            }
            
            .main-nav .nav-item {
                width: 100%;
                margin-bottom: 2px;
            }
            
            .main-nav .nav-link {
                padding: 12px 15px;
                width: 100%;
                justify-content: space-between;
                height: auto;
            }
            
            .main-nav .dropdown-menu {
                position: static;
                opacity: 1;
                visibility: visible;
                transform: none;
                display: none;
                padding-left: 20px;
                background: rgba(255,255,255,0.1);
                border: none;
                border-radius: 0;
                box-shadow: none;
                max-width: none;
            }
            
            .main-nav .dropdown-menu.show {
                display: block;
            }
            
            .main-nav .dropdown-item {
                color: white;
                padding: 10px 15px;
                border-bottom: 1px solid rgba(255,255,255,0.1);
            }
            
            .main-nav .dropdown-item:hover {
                background: rgba(255,255,255,0.2);
                color: white;
                padding-left: 15px;
            }
            
            .language-switcher {
                margin-left: 0;
                padding-left: 0;
                border-left: none;
                margin-top: 12px;
                padding-top: 12px;
                border-top: 1px solid rgba(255,255,255,0.2);
                height: auto;
            }
            
            .search-box {
                margin-top: 12px;
                width: 100%;
            }
            
            .search-box input {
                width: 100%;
            }
            
            .notice-bar {
                padding: 8px 0;
                min-height: 40px;
                max-height: 45px;
            }
            
            .notice-bar .notice-label {
                height: 30px;
                font-size: 12px;
                padding: 5px 12px;
            }
            
            .notice-bar .notice-ticker span {
                font-size: 13px;
                margin: 0 15px;
            }
            
            .notice-bar .view-all {
                font-size: 12px;
                padding: 5px 10px;
            }
        }
        
        @media (max-width: 768px) {
            .hero-section h2 {
                font-size: 28px;
            }
            
            .hero-section p {
                font-size: 13px;
            }
            
            .official-card {
                margin-bottom: 15px;
            }
            
            .stat-item {
                margin-bottom: 15px;
            }
            
            .page-banner {
                padding: 35px 0;
            }
            
            .page-banner .page-title {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <!-- Main Header -->
    <header class="main-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 logo-section d-flex align-items-center">
                    <?php if(Setting::get('logo')): ?>
                    <img src="<?php echo e(asset('storage/' . Setting::get('logo'))); ?>" alt="<?php echo e(Setting::get('site_name_np', 'गुन्जनगर खानेपानी आयोजना')); ?>" class="logo-img">
                    <?php else: ?>
                    <div class="logo-placeholder">
                        <i class="fas fa-tint"></i>
                    </div>
                    <?php endif; ?>
                    <div class="logo-text">
                        <h1><?php echo e(Setting::get('site_name_np', 'गुन्जनगर खानेपानी आयोजना')); ?></h1>
                        <p class="tagline"><?php echo e(Setting::get('tagline_np', 'स्वच्छ पानी, स्वस्थ जीवन')); ?></p>
                        <?php if(Setting::get('office_address')): ?>
                        <p class="office-address"><i class="fas fa-map-marker-alt me-1"></i><?php echo e(Setting::get('office_address')); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-6 text-end header-buttons">
                    <div class="header-contact-info">
                        <p class="header-time"><i class="fas fa-clock me-1"></i><span id="nepaliTime">Loading...</span></p>
                        <?php if(Setting::get('contact_phone')): ?>
                        <p class="header-phone"><i class="fas fa-phone me-1"></i><?php echo e(Setting::get('contact_phone')); ?></p>
                        <?php endif; ?>
                        <?php if(Setting::get('contact_email')): ?>
                        <p class="header-email"><i class="fas fa-envelope me-1"></i><?php echo e(Setting::get('contact_email')); ?></p>
                        <?php endif; ?>
                        <?php if(Setting::get('office_address')): ?>
                        <p class="header-address"><i class="fas fa-map-marker-alt me-1"></i><?php echo e(Setting::get('office_address')); ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <!-- Navigation -->
    <nav class="main-nav navbar navbar-expand-lg">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="mainNavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('home') ? 'active' : ''); ?>" href="<?php echo e(route('home')); ?>">
                            <i class="fas fa-home me-1"></i>गृहपृष्ठ
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?php echo e(request()->routeIs('about*') ? 'active' : ''); ?>" href="#" role="button" data-bs-toggle="dropdown">
                            हाम्रो बारेमा
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo e(route('about')); ?>">हाम्रो बारेमा</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('board-of-directors')); ?>">सञ्चालक समिति</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('organizational-structure')); ?>">संगठनात्मक संरचना</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('staff')); ?>">कर्मचारी विवरण</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('office-hours')); ?>">कार्यालय समय</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('citizen-charter')); ?>">नागरिक वडापत्र</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?php echo e(request()->routeIs('services*') ? 'active' : ''); ?>" href="#" role="button" data-bs-toggle="dropdown">
                            सेवाहरू
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo e(route('services')); ?>">खानेपानी सेवा</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('services.new-connection')); ?>">नयाँ धारा जडान</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('services.transfer')); ?>">धारा स्थानान्तरण</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('services.maintenance')); ?>">धारा मर्मत</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('services.water-quality')); ?>">पानीको गुणस्तर</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('services.information')); ?>">सेवा सम्बन्धी जानकारी</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?php echo e(request()->routeIs('e-services*') ? 'active' : ''); ?>" href="#" role="button" data-bs-toggle="dropdown">
                            ई-सेवाहरू
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo e(route('e-services.forms')); ?>">अनलाइन फारमहरू</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('downloads')); ?>">डाउनलोड केन्द्र</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('complaint')); ?>">गुनासो / सुझाव</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('contact')); ?>">सम्पर्क गर्नुहोस्</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('notices')); ?>">महत्वपूर्ण सूचना</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?php echo e(request()->routeIs('resources*') ? 'active' : ''); ?>" href="#" role="button" data-bs-toggle="dropdown">
                            श्रोतहरू
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo e(route('downloads')); ?>">डाउनलोड</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('forms')); ?>">फारमहरू</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('annual-reports')); ?>">वार्षिक प्रतिवेदन</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('rules-regulations')); ?>">नियमावली</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('policies')); ?>">नीति तथा निर्देशिका</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('publications')); ?>">प्रकाशनहरू</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?php echo e(request()->routeIs('notices*') || request()->routeIs('news*') ? 'active' : ''); ?>" href="#" role="button" data-bs-toggle="dropdown">
                            सूचना
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo e(route('notices')); ?>">सूचना</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('news')); ?>">समाचार</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('press-releases')); ?>">प्रेस विज्ञप्ति</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('public-notices')); ?>">सार्वजनिक सूचना</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('notice-archive')); ?>">सूचना संग्रह</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?php echo e(request()->routeIs('vacancy*') ? 'active' : ''); ?>" href="#" role="button" data-bs-toggle="dropdown">
                            पदपूर्ति
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo e(route('vacancy')); ?>">रोजगारी सूचना</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('vacancy.notices')); ?>">पदपूर्ति सूचना</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('vacancy.exam-schedule')); ?>">परीक्षा कार्यक्रम</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('vacancy.results')); ?>">नतिजा</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo e(request()->routeIs('contact') ? 'active' : ''); ?>" href="<?php echo e(route('contact')); ?>">
                            सम्पर्क
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle <?php echo e(request()->routeIs('faq') || request()->routeIs('gallery') || request()->routeIs('videos') || request()->routeIs('important-links') || request()->routeIs('sitemap') ? 'active' : ''); ?>" href="#" role="button" data-bs-toggle="dropdown">
                            थप <i class="fas fa-chevron-down ms-1" style="font-size: 10px;"></i>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo e(route('faq')); ?>">FAQ</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('gallery')); ?>">फोटो ग्यालरी</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('videos')); ?>">भिडियो ग्यालरी</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('important-links')); ?>">महत्वपूर्ण लिंकहरू</a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('sitemap')); ?>">वेबसाइट नक्सा</a></li>
                        </ul>
                    </li>
                </ul>
                
                <div class="language-switcher">
                    <button class="lang-btn">EN</button>
                    <button class="lang-btn active">NP</button>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Notice Bar -->
    <?php if($tickerNotices ?? false): ?>
    <div class="notice-bar">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-auto notice-label">
                    <i class="fas fa-bullhorn me-2"></i>सूचना बार
                </div>
                <div class="col notice-ticker">
                    <marquee behavior="scroll" direction="left" onmouseover="this.stop()" onmouseout="this.start()">
                        <?php $__currentLoopData = $tickerNotices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <span class="mx-3"><?php echo e($notice->title); ?></span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </marquee>
                </div>
                <div class="col-auto">
                    <a href="<?php echo e(route('notices')); ?>" class="view-all">
                        सबै सूचना हेर्नुहोस् <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
    
    <!-- Main Content -->
    <main>
        <?php echo $__env->yieldContent('content'); ?>
    </main>
    
    <!-- Footer -->
    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3 footer-section">
                    <h4>हाम्रो बारेमा</h4>
                    <p><?php echo e(Setting::get('tagline_np', 'स्वच्छ पानी, स्वस्थ जीवन')); ?></p>
                    <p class="small"><?php echo e(Setting::get('site_name_np', 'गुन्जनगर खानेपानी आयोजना')); ?> ले गुन्जनगरवासीहरूलाई गुणस्तरीय खानेपानी उपलब्ध गराउनु हाम्रो प्रमुख लक्ष्य हो।</p>
                    <div class="social-icons mt-3">
                        <?php if(Setting::get('facebook_url')): ?>
                        <a href="<?php echo e(Setting::get('facebook_url')); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <?php endif; ?>
                        <?php if(Setting::get('twitter_url')): ?>
                        <a href="<?php echo e(Setting::get('twitter_url')); ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                        <?php endif; ?>
                        <?php if(Setting::get('youtube_url')): ?>
                        <a href="<?php echo e(Setting::get('youtube_url')); ?>" target="_blank"><i class="fab fa-youtube"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
                
                <div class="col-md-3 footer-section">
                    <h4>द्रुत सम्पर्क</h4>
                    <ul>
                        <li><a href="<?php echo e(route('home')); ?>"><i class="fas fa-chevron-right me-2"></i>गृहपृष्ठ</a></li>
                        <li><a href="<?php echo e(route('about')); ?>"><i class="fas fa-chevron-right me-2"></i>हाम्रो बारेमा</a></li>
                        <li><a href="<?php echo e(route('services')); ?>"><i class="fas fa-chevron-right me-2"></i>सेवाहरू</a></li>
                        <li><a href="<?php echo e(route('notices')); ?>"><i class="fas fa-chevron-right me-2"></i>सूचना</a></li>
                        <li><a href="<?php echo e(route('downloads')); ?>"><i class="fas fa-chevron-right me-2"></i>डाउनलोड</a></li>
                    </ul>
                </div>
                
                <div class="col-md-3 footer-section">
                    <h4>सेवाहरू</h4>
                    <ul>
                        <li><a href="<?php echo e(route('services.new-connection')); ?>"><i class="fas fa-chevron-right me-2"></i>नयाँ धारा जडान</a></li>
                        <li><a href="<?php echo e(route('services.transfer')); ?>"><i class="fas fa-chevron-right me-2"></i>धारा स्थानान्तरण</a></li>
                        <li><a href="<?php echo e(route('services.maintenance')); ?>"><i class="fas fa-chevron-right me-2"></i>मर्मत सेवा</a></li>
                        <li><a href="<?php echo e(route('services.water-quality')); ?>"><i class="fas fa-chevron-right me-2"></i>गुणस्तर परीक्षण</a></li>
                        <li><a href="<?php echo e(route('contact')); ?>"><i class="fas fa-chevron-right me-2"></i>सम्पर्क गर्नुहोस्</a></li>
                    </ul>
                </div>
                
                <div class="col-md-3 footer-section">
                    <h4>सम्पर्क</h4>
                    <ul>
                        <li><i class="fas fa-map-marker-alt me-2"></i><?php echo e(Setting::get('office_address', 'गुन्जनगर, नेपाल')); ?></li>
                        <li><i class="fas fa-phone me-2"></i><?php echo e(Setting::get('contact_phone', '')); ?></li>
                        <li><i class="fas fa-envelope me-2"></i><?php echo e(Setting::get('contact_email', '')); ?></li>
                        <li><i class="fas fa-clock me-2"></i><?php echo e(Setting::get('office_hours_weekdays', '10:00 AM - 5:00 PM')); ?></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>© 2082 <?php echo e(Setting::get('site_name_np', 'गुन्जनगर खानेपानी आयोजना')); ?> । सर्वाधिकार सुरक्षित ।</p>
                <p class="small mb-0">Designed & Developed by DMC Group Nepal</p>
            </div>
        </div>
    </footer>
    
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    
    <script>
        // Nepali Time Update
        function updateNepaliTime() {
            const nepaliTimeElement = document.getElementById('nepaliTime');
            if (nepaliTimeElement) {
                const now = new Date();
                const nepaliOffset = 5 * 60 + 45; // Nepal is UTC+5:45
                const utc = now.getTime() + (now.getTimezoneOffset() * 60000);
                const nepaliTime = new Date(utc + (nepaliOffset * 60000));
                
                const hours = nepaliTime.getHours();
                const minutes = nepaliTime.getMinutes();
                const seconds = nepaliTime.getSeconds();
                const ampm = hours >= 12 ? 'PM' : 'AM';
                const displayHours = hours % 12 || 12;
                const displayMinutes = minutes.toString().padStart(2, '0');
                const displaySeconds = seconds.toString().padStart(2, '0');
                
                nepaliTimeElement.textContent = `${displayHours}:${displayMinutes}:${displaySeconds} ${ampm}`;
            }
        }
        
        // Update time every second
        updateNepaliTime();
        setInterval(updateNepaliTime, 1000);
        
        // Smooth Scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Hero Slider Counter Update
        const heroSlider = document.getElementById('heroSlider');
        if (heroSlider) {
            const currentSlideEl = document.getElementById('currentSlide');
            const totalSlidesEl = document.getElementById('totalSlides');
            const totalSlides = heroSlider.querySelectorAll('.carousel-item').length;
            
            heroSlider.addEventListener('slide.bs.carousel', function (event) {
                const currentSlide = event.to + 1;
                currentSlideEl.textContent = String(currentSlide).padStart(2, '0');
            });
            
            // Autoplay with pause on hover
            const carousel = new bootstrap.Carousel(heroSlider, {
                interval: 6000,
                pause: 'hover',
                wrap: true
            });
        }
        
        // Mobile Dropdown Toggle
        if (window.innerWidth < 992) {
            document.querySelectorAll('.main-nav .dropdown-toggle').forEach(function(toggle) {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    const dropdownMenu = this.nextElementSibling;
                    dropdownMenu.classList.toggle('show');
                    this.classList.toggle('active');
                });
            });
        }
        
        // Language Switcher
        document.querySelectorAll('.lang-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.lang-btn').forEach(function(b) {
                    b.classList.remove('active');
                });
                this.classList.add('active');
            });
        });
    </script>
    
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html>
<?php /**PATH C:\Users\Lenovo\CascadeProjects\gunjannagar-khanepani\resources\views/layouts/app.blade.php ENDPATH**/ ?>