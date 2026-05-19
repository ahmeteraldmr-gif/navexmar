@extends('layouts.app')

@section('title', $page->{'title_' . app()->getLocale()} ?? 'Politikalarımız')

@php
    $lang = app()->getLocale();
    function getPolicyContent($sections, $key, $lang, $field = 'title') {
        $section = $sections->where('section_key', $key)->first();
        return $section ? $section->{$field . '_' . $lang} : '';
    }
@endphp

@section('content')
@include('components.page-header')

<!-- Policies Content -->
<section class="policies-content">
    <div class="container">
        <div class="content-intro">
            <h2>{{ getPolicyContent($sections, 'intro_title', $lang) }}</h2>
            <p>{{ getPolicyContent($sections, 'intro_description', $lang, 'content') }}</p>
        </div>

        <div class="policies-grid">
            <div class="policy-card">
                <i class="fas fa-star"></i>
                <h3>{{ getPolicyContent($sections, 'quality_title', $lang) }}</h3>
                <p>{{ getPolicyContent($sections, 'quality_content', $lang, 'content') }}</p>
            </div>

            <div class="policy-card">
                <i class="fas fa-shield-alt"></i>
                <h3>{{ getPolicyContent($sections, 'safety_title', $lang) }}</h3>
                <p>{{ getPolicyContent($sections, 'safety_content', $lang, 'content') }}</p>
            </div>

            <div class="policy-card">
                <i class="fas fa-leaf"></i>
                <h3>{{ getPolicyContent($sections, 'environment_title', $lang) }}</h3>
                <p>{{ getPolicyContent($sections, 'environment_content', $lang, 'content') }}</p>
            </div>

            <div class="policy-card">
                <i class="fas fa-balance-scale"></i>
                <h3>{{ getPolicyContent($sections, 'ethics_title', $lang) }}</h3>
                <p>{{ getPolicyContent($sections, 'ethics_content', $lang, 'content') }}</p>
            </div>

            <div class="policy-card">
                <i class="fas fa-user-shield"></i>
                <h3>{{ $lang === 'tr' ? 'Kişisel Verilerin Korunması' : 'Data Protection' }}</h3>
                <p>{{ $lang === 'tr' 
                    ? 'KVKK kapsamında, kişisel verilerin korunmasına azami özen gösteriyoruz.'
                    : 'We take utmost care in the protection of personal data within the scope of GDPR.'
                }}</p>
            </div>

            <div class="policy-card">
                <i class="fas fa-lock"></i>
                <h3>{{ $lang === 'tr' ? 'Bilgi Güvenliği' : 'Information Security' }}</h3>
                <p>{{ $lang === 'tr' 
                    ? 'Kurumsal ve müşteri bilgilerinin gizliliği, bütünlüğü ve erişilebilirliğini korumak için modern güvenlik sistemleri uyguluyoruz.'
                    : 'We implement modern security systems to protect the confidentiality, integrity and accessibility of corporate and customer information.'
                }}</p>
            </div>
        </div>

        <!-- Commitments Section -->
        <div style="background: var(--light-color, #f8f9fa); padding: 3rem; border-radius: 15px; margin-top: 4rem;">
            <h3 style="color: var(--primary-color, #1a4d7d); text-align: center; margin-bottom: 2rem;">
                {{ $lang === 'tr' ? 'Taahhütlerimiz' : 'Our Commitments' }}
            </h3>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 2rem;">
                <div style="text-align: center;">
                    <i class="fas fa-check-circle" style="font-size: 3rem; color: var(--secondary-color, #ff6b35); margin-bottom: 1rem;"></i>
                    <h4 style="margin-bottom: 0.5rem;">{{ $lang === 'tr' ? 'Sıfır Kaza' : 'Zero Accidents' }}</h4>
                    <p>{{ $lang === 'tr' ? 'Tüm operasyonlarımızda güvenlik önceliğimiz' : 'Safety is our priority in all operations' }}</p>
                </div>
                <div style="text-align: center;">
                    <i class="fas fa-check-circle" style="font-size: 3rem; color: var(--secondary-color, #ff6b35); margin-bottom: 1rem;"></i>
                    <h4 style="margin-bottom: 0.5rem;">{{ $lang === 'tr' ? '%100 Müşteri Memnuniyeti' : '100% Customer Satisfaction' }}</h4>
                    <p>{{ $lang === 'tr' ? 'Her projede mükemmellik arayışı' : 'Pursuit of excellence in every project' }}</p>
                </div>
                <div style="text-align: center;">
                    <i class="fas fa-check-circle" style="font-size: 3rem; color: var(--secondary-color, #ff6b35); margin-bottom: 1rem;"></i>
                    <h4 style="margin-bottom: 0.5rem;">{{ $lang === 'tr' ? 'Çevreye Saygı' : 'Respect for Environment' }}</h4>
                    <p>{{ $lang === 'tr' ? 'Sürdürülebilir denizcilik için çalışıyoruz' : 'Working for sustainable maritime' }}</p>
                </div>
                <div style="text-align: center;">
                    <i class="fas fa-check-circle" style="font-size: 3rem; color: var(--secondary-color, #ff6b35); margin-bottom: 1rem;"></i>
                    <h4 style="margin-bottom: 0.5rem;">{{ $lang === 'tr' ? 'Etik Değerler' : 'Ethical Values' }}</h4>
                    <p>{{ $lang === 'tr' ? 'Dürüstlük ve şeffaflık her zaman' : 'Honesty and transparency always' }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2>{{ $lang === 'tr' ? 'Politikalarımız Hakkında Daha Fazla Bilgi Almak İster Misiniz?' : 'Would You Like More Information About Our Policies?' }}</h2>
        <a href="{{ url('/contact') }}" class="btn btn-light">{{ $lang === 'tr' ? 'Bizimle İletişime Geçin' : 'Contact Us' }}</a>
    </div>
</section>
@endsection
