@extends('layouts.app')

@section('title', $page->{'title_' . app()->getLocale()} ?? 'Yaklaşımımız')

@php
    $lang = app()->getLocale();
    function getApproachContent($sections, $key, $lang, $field = 'title') {
        $section = $sections->where('section_key', $key)->first();
        return $section ? $section->{$field . '_' . $lang} : '';
    }
@endphp

@section('content')
@include('components.page-header')

<!-- Approach Content -->
<section class="approach-content">
    <div class="container">
        <div class="approach-intro">
            <h2>{{ getApproachContent($sections, 'approach_intro', $lang) }}</h2>
            <p>{{ getApproachContent($sections, 'approach_intro', $lang, 'content') }}</p>
        </div>

        <div class="approach-grid">
            <div class="approach-card">
                <i class="fas fa-users"></i>
                <h3>{{ getApproachContent($sections, 'card_1_title', $lang) }}</h3>
                <p>{{ getApproachContent($sections, 'card_1_title', $lang, 'content') }}</p>
            </div>

            <div class="approach-card">
                <i class="fas fa-handshake"></i>
                <h3>{{ getApproachContent($sections, 'card_2_title', $lang) }}</h3>
                <p>{{ getApproachContent($sections, 'card_2_title', $lang, 'content') }}</p>
            </div>

            <div class="approach-card">
                <i class="fas fa-cogs"></i>
                <h3>{{ getApproachContent($sections, 'card_3_title', $lang) }}</h3>
                <p>{{ getApproachContent($sections, 'card_3_title', $lang, 'content') }}</p>
            </div>

            <div class="approach-card">
                <i class="fas fa-lightbulb"></i>
                <h3>{{ getApproachContent($sections, 'card_4_title', $lang) }}</h3>
                <p>{{ getApproachContent($sections, 'card_4_title', $lang, 'content') }}</p>
            </div>

            <div class="approach-card">
                <i class="fas fa-award"></i>
                <h3>{{ getApproachContent($sections, 'card_5_title', $lang) }}</h3>
                <p>{{ getApproachContent($sections, 'card_5_title', $lang, 'content') }}</p>
            </div>

            <div class="approach-card">
                <i class="fas fa-globe"></i>
                <h3>{{ getApproachContent($sections, 'card_6_title', $lang) }}</h3>
                <p>{{ getApproachContent($sections, 'card_6_title', $lang, 'content') }}</p>
            </div>
        </div>
    </div>
</section>

<!-- Mission Vision Section -->
<section class="about-section">
    <div class="container">
        <div class="about-content">
            <h2 style="color: white; text-align: center; margin-bottom: 3rem; font-size: 2rem;">
                {{ getApproachContent($sections, 'mission_vision_title', $lang) }}
            </h2>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; max-width: 1200px; margin: 0 auto;">
                <!-- Misyon -->
                <div style="text-align: center;">
                    <div style="font-size: 5rem; color: white; margin-bottom: 1.5rem;">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3 style="color: white; font-size: 1.5rem; margin-bottom: 1.5rem; font-weight: 600;">
                        {{ getApproachContent($sections, 'approach_mission', $lang) }}
                    </h3>
                    <p style="color: white; line-height: 1.8; font-size: 1rem;">
                        {{ getApproachContent($sections, 'approach_mission', $lang, 'content') }}
                    </p>
                </div>
                
                <!-- Vizyon -->
                <div style="text-align: center;">
                    <div style="font-size: 5rem; color: white; margin-bottom: 1.5rem;">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3 style="color: white; font-size: 1.5rem; margin-bottom: 1.5rem; font-weight: 600;">
                        {{ getApproachContent($sections, 'approach_vision', $lang) }}
                    </h3>
                    <p style="color: white; line-height: 1.8; font-size: 1rem;">
                        {{ getApproachContent($sections, 'approach_vision', $lang, 'content') }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2>{{ getApproachContent($sections, 'cta_title', $lang) ?: ($lang === 'tr' ? 'Bizimle Çalışmak İster Misiniz?' : 'Would You Like to Work With Us?') }}</h2>
        <a href="{{ url('/contact') }}" class="btn btn-light">
            {{ getApproachContent($sections, 'cta_button', $lang) ?: ($lang === 'tr' ? 'İletişime Geçin' : 'Get in Touch') }}
        </a>
    </div>
</section>
@endsection
