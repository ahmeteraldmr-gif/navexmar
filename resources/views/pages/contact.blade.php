@extends('layouts.app')

@section('title', $page->{'title_' . app()->getLocale()} ?? 'İletişim')

@php
    $lang = app()->getLocale();
@endphp

@section('content')
@include('components.page-header')

<!-- Flash Message -->
@if (session('success'))
    <div class="flash-message flash-success" style="padding: 1rem; margin: 2rem auto 0; max-width: 800px; text-align: center; border-radius: 5px; background: #d4edda; color: #155724; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="flash-message flash-error" style="padding: 1rem; margin: 2rem auto 0; max-width: 800px; text-align: center; border-radius: 5px; background: #f8d7da; color: #721c24; box-shadow: 0 2px 10px rgba(0,0,0,0.05);">
        <ul style="list-style: none; padding: 0; margin: 0;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Contact Section -->
<section class="contact-section">
    <div class="container">
        <div class="contact-grid">
            <!-- Contact Form -->
            <div class="contact-form-wrapper">
                <h2>{{ $lang === 'tr' ? 'Mesaj Gönderin' : 'Send Message' }}</h2>
                <p>{{ $lang === 'tr' ? 'Sorularınız ve talepleriniz için formu doldurun, en kısa sürede size dönüş yapalım.' : 'Fill out the form for your questions and requests, we will get back to you as soon as possible.' }}</p>
                
                <form class="contact-form" method="POST" action="{{ route('contact.store') }}">
                    @csrf
                    
                    <div class="form-group">
                        <label for="name">{{ $lang === 'tr' ? 'Adınız Soyadınız *' : 'Your Full Name *' }}</label>
                        <input type="text" id="name" name="name" required value="{{ old('name') }}">
                    </div>

                    <div class="form-group">
                        <label for="email">{{ $lang === 'tr' ? 'E-posta Adresiniz *' : 'Your Email *' }}</label>
                        <input type="email" id="email" name="email" required value="{{ old('email') }}">
                    </div>

                    <div class="form-group">
                        <label for="phone">{{ $lang === 'tr' ? 'Telefon Numaranız' : 'Your Phone' }}</label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}">
                    </div>

                    <div class="form-group">
                        <label for="company">{{ $lang === 'tr' ? 'Firma Adı' : 'Company Name' }}</label>
                        <input type="text" id="company" name="company" value="{{ old('company') }}">
                    </div>

                    <div class="form-group">
                        <label for="service">{{ $lang === 'tr' ? 'Hizmet Seçimi' : 'Service Selection' }}</label>
                        <select id="service" name="service">
                            <option value="">{{ $lang === 'tr' ? 'Seçiniz...' : 'Select...' }}</option>
                            @foreach ($services as $srv)
                                <option value="{{ $srv->slug }}" {{ old('service') == $srv->slug ? 'selected' : '' }}>
                                    {{ $srv->{'name_' . $lang} ?? $srv->name }}
                                </option>
                            @endforeach
                            <option value="other" {{ old('service') == 'other' ? 'selected' : '' }}>{{ $lang === 'tr' ? 'Diğer' : 'Other' }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">{{ $lang === 'tr' ? 'Mesajınız *' : 'Your Message *' }}</label>
                        <textarea id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> {{ $lang === 'tr' ? 'Gönder' : 'Send' }}
                    </button>
                </form>
            </div>

            <!-- Contact Info -->
            <div class="contact-info-wrapper">
                <h2>{{ $lang === 'tr' ? 'İletişim Bilgileri' : 'Contact Information' }}</h2>
                
                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="contact-info-text">
                        <h3>{{ $lang === 'tr' ? 'Adres' : 'Address' }}</h3>
                        <p>{{ $contactInfo['contact_address'] ?? 'Hatay, Türkiye' }}</p>
                    </div>
                </div>

                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="contact-info-text">
                        <h3>{{ $lang === 'tr' ? 'Telefon' : 'Phone' }}</h3>
                        <p>
                            {{ $contactInfo['contact_phone_1'] ?? '+90 530 379 31 33' }}
                            @if (isset($contactInfo['contact_phone_2']) && !empty($contactInfo['contact_phone_2']))
                                <br>{{ $contactInfo['contact_phone_2'] }}
                            @endif
                        </p>
                    </div>
                </div>

                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="contact-info-text">
                        <h3>{{ $lang === 'tr' ? 'E-posta' : 'Email' }}</h3>
                        <p>
                            {{ $contactInfo['contact_email_1'] ?? 'agency@navexmar.com' }}
                            @if (isset($contactInfo['contact_email_2']) && !empty($contactInfo['contact_email_2']))
                                <br>{{ $contactInfo['contact_email_2'] }}
                            @endif
                            @if (isset($contactInfo['contact_email_3']) && !empty($contactInfo['contact_email_3']))
                                <br>{{ $contactInfo['contact_email_3'] }}
                            @endif
                        </p>
                    </div>
                </div>

                <div class="contact-info-item">
                    <div class="contact-info-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="contact-info-text">
                        <h3>{{ $lang === 'tr' ? 'Çalışma Saatleri' : 'Working Hours' }}</h3>
                        <p>{{ $contactInfo['working_hours'] ?? '7/24 Available' }}</p>
                    </div>
                </div>

                <div class="social-links">
                    <h3>{{ $lang === 'tr' ? 'Sosyal Medya' : 'Social Media' }}</h3>
                    <div class="social-icons">
                        @if (!empty($settings['social_facebook']))
                            <a href="{{ $settings['social_facebook'] }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if (!empty($settings['social_twitter']))
                            <a href="{{ $settings['social_twitter'] }}" target="_blank"><i class="fab fa-twitter"></i></a>
                        @endif
                        @if (!empty($settings['social_linkedin']))
                            <a href="{{ $settings['social_linkedin'] }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        @endif
                        @if (!empty($settings['social_instagram']))
                            <a href="{{ $settings['social_instagram'] }}" target="_blank"><i class="fab fa-instagram"></i></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="map-section">
    <div class="map-placeholder">
        <i class="fas fa-map-marked-alt"></i>
        <p>{{ $lang === 'tr' ? 'Harita entegrasyonu buraya eklenebilir' : 'Map integration can be added here' }}</p>
    </div>
</section>
@endsection
