@extends('layouts.app')

@section('title', $page->{'title_' . app()->getLocale()} ?? 'Ana Sayfa')

@php
    use Illuminate\Support\Str;
    $lang = app()->getLocale();
    $heroImageUrl = asset('assets/uploads/headers/header_home_69788db2347d7.jpeg');
    if (isset($headerImage) && !empty($headerImage->image_path)) {
        $heroImageUrl = asset('assets/' . $headerImage->image_path);
    }
    
    $heroStyle = "background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('$heroImageUrl') !important; background-size: cover !important; background-position: center !important; background-repeat: no-repeat !important;";

    function getContent($sections, $key, $lang, $field = 'title') {
        $section = $sections->where('section_key', $key)->first();
        return $section ? $section->{$field . '_' . $lang} : '';
    }
@endphp

@section('content')
<!-- Hero Section -->
<section class="hero" style="{!! $heroStyle !!}">
    <div class="hero-content">
        <div class="container">
            <h1 class="hero-title">
                {{ getContent($sections, 'hero_title', $lang) ?: getContent($sections, 'hero_subtitle', $lang) }}
            </h1>
            <a href="{{ url('/approach') }}" class="btn btn-primary">
                {{ getContent($sections, 'hero_button', $lang) ?: ($lang == 'tr' ? 'Keşfedin' : 'Discover') }}
            </a>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <i class="fas fa-ship"></i>
                <h3 class="stat-number" data-target="{{ getContent($sections, 'stat_1_number', $lang) ?: '150' }}">0</h3>
                <p>{{ getContent($sections, 'stat_1_label', $lang) ?: ($lang == 'tr' ? 'Mutlu Müşteri' : 'Happy Clients') }}</p>
            </div>
            <div class="stat-item">
                <i class="fas fa-wrench"></i>
                <h3 class="stat-number" data-target="{{ getContent($sections, 'stat_2_number', $lang) ?: '500' }}">0</h3>
                <p>{{ getContent($sections, 'stat_2_label', $lang) ?: ($lang == 'tr' ? 'Tamamlanan Proje' : 'Projects Done') }}</p>
            </div>
            <div class="stat-item">
                <i class="fas fa-cogs"></i>
                <h3 class="stat-number" data-target="{{ getContent($sections, 'stat_3_number', $lang) ?: '24' }}">0</h3>
                <p>{{ getContent($sections, 'stat_3_label', $lang) ?: ($lang == 'tr' ? '7/24 Destek' : '7/24 Support') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2>
            {{ getContent($sections, 'cta_title', $lang) ?: ($lang == 'tr' ? 'Sorularınız mı var?' : 'Have Questions?') }}
        </h2>
        <a href="{{ url('/contact') }}" class="btn btn-light">
            {{ getContent($sections, 'cta_button', $lang) ?: ($lang == 'tr' ? 'İletişime Geç' : 'Contact Us') }}
        </a>
    </div>
</section>

<!-- FLOKI Section -->
<section class="floki-section">
    <div class="container">
        <div class="floki-grid">
            <div class="floki-item">
                <h3>N</h3>
                <p>{{ getContent($sections, 'floki_n', $lang) ?: 'Navigation' }}</p>
            </div>
            <div class="floki-item">
                <h3>A</h3>
                <p>{{ getContent($sections, 'floki_a', $lang) ?: 'Assistance' }}</p>
            </div>
            <div class="floki-item">
                <h3>V</h3>
                <p>{{ getContent($sections, 'floki_v', $lang) ?: 'Value' }}</p>
            </div>
            <div class="floki-item">
                <h3>E</h3>
                <p>{{ getContent($sections, 'floki_e', $lang) ?: 'Expertise' }}</p>
            </div>
            <div class="floki-item">
                <h3>X</h3>
                <p>{{ getContent($sections, 'floki_x', $lang) ?: 'Excellence' }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-section">
    <div class="container">
        <h2 class="section-title">{{ getContent($sections, 'services_title', $lang) ?: ($lang === 'tr' ? 'Hizmetlerimiz' : 'Our Services') }}</h2>
        <div class="services-grid">
            @if (isset($services) && $services->count() > 0)
                @foreach ($services as $service)
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="{{ $service->icon ?? 'fas fa-ship' }}"></i>
                        </div>
                        <h3>{{ $service->{'name_' . $lang} ?? $service->name }}</h3>
                        <p>{{ Str::limit($service->{'description_' . $lang} ?? $service->description, 120) }}</p>
                        <a href="{{ url('/services/' . $service->slug) }}" class="btn btn-secondary">
                            {{ getContent($sections, 'service_detail_button', $lang) ?: ($lang === 'tr' ? 'Detaylar' : 'Details') }}
                        </a>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about-section">
    <div class="container">
        <div class="about-content">
            <p>
                {{ getContent($sections, 'about_description', $lang, 'content') }}
            </p>
        </div>
    </div>
</section>
@endsection
