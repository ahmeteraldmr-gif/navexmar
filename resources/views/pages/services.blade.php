@extends('layouts.app')

@section('title', $page->{'title_' . app()->getLocale()} ?? 'Hizmetlerimiz')

@php
    $lang = app()->getLocale();
    function getServiceContent($sections, $key, $lang, $field = 'title') {
        $section = $sections->where('section_key', $key)->first();
        return $section ? $section->{$field . '_' . $lang} : '';
    }
@endphp

@section('content')
@include('components.page-header')

<!-- Services Detail Section -->
@if (isset($services) && $services->count() > 0)
<section class="services-detail" style="padding: 2rem 0; background: white;">
    <div class="container">
        <h2 style="text-align: center; font-size: 2rem; margin-bottom: 2rem; color: #2c3e50;">
            {{ $lang === 'tr' ? 'Detaylı Hizmet Bilgileri' : 'Detailed Service Information' }}
        </h2>
        
        @foreach ($services as $service)
            <div class="service-detail-card" id="{{ $service->slug ?? '' }}" style="background: #f8f9fa; padding: 2rem; margin-bottom: 1.5rem; border-radius: 10px; box-shadow: 0 2px 10px rgba(0,0,0,0.08);">
                <div style="display: flex; align-items: flex-start; gap: 2rem;">
                    <div style="font-size: 3rem; color: #0066cc;">
                        <i class="{{ $service->icon ?? 'fas fa-ship' }}"></i>
                    </div>
                    <div style="flex: 1;">
                        <h3 style="color: #2c3e50; margin-bottom: 1rem; font-size: 1.5rem;">
                            {{ $service->{'name_' . $lang} ?? $service->name ?? '' }}
                        </h3>
                        <p style="color: #555; line-height: 1.8; margin-bottom: 1rem;">
                            {!! nl2br(e($service->{'description_' . $lang} ?? $service->description ?? '')) !!}
                        </p>
                        
                        @if (isset($service->features) && !empty($service->features))
                            <div style="margin-top: 1.5rem;">
                                <h4 style="color: #0066cc; margin-bottom: 1rem;">
                                    {{ $lang === 'tr' ? 'Özellikler' : 'Features' }}
                                </h4>
                                <ul style="list-style: none; padding: 0;">
                                    @php
                                        $features = $lang === 'tr' ? $service->features : ($service->features_en ?? $service->features ?? []);
                                    @endphp
                                    @if (is_array($features))
                                        @foreach ($features as $feature)
                                            <li style="padding: 0.5rem 0; color: #555;">
                                                <i class="fas fa-check-circle" style="color: #00cc66; margin-right: 0.5rem;"></i>
                                                {{ $feature }}
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        @endif
                        
                        <a href="{{ url('/contact') }}" class="btn btn-primary" style="margin-top: 1.5rem; display: inline-block;">
                            {{ $lang === 'tr' ? 'Teklif Alın' : 'Get Quote' }}
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endif

<!-- Neden Biz? Section -->
<section style="padding: 3rem 0; background: #f8f9fa;">
    <div class="container" style="max-width: 1200px; margin: 0 auto;">
        <h2 style="text-align: center; margin-bottom: 2.5rem; font-size: 2.5rem; font-weight: 700; color: #2c3e50;">
            {{ getServiceContent($sections, 'why_title', $lang) }}
        </h2>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
            @php 
                $icons = ['fa-handshake', 'fa-eye', 'fa-bolt', 'fa-trophy', 'fa-chart-line'];
            @endphp
            @for ($i = 1; $i <= 5; $i++)
                @if (!empty(getServiceContent($sections, 'why_item_' . $i, $lang)))
                <div style="background: white; padding: 1.5rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); transition: transform 0.3s ease;">
                    <div style="display: flex; align-items: flex-start; gap: 1.5rem;">
                        <div style="font-size: 2.5rem; color: #0066cc; flex-shrink: 0;">
                            <i class="fas {{ $icons[$i-1] ?? 'fa-check' }}"></i>
                        </div>
                        <div>
                            <h3 style="color: #2c3e50; font-size: 1.2rem; margin-bottom: 0.8rem; font-weight: 600;">
                                {{ getServiceContent($sections, 'why_item_' . $i, $lang) }}
                            </h3>
                            <p style="color: #666; font-size: 0.95rem; line-height: 1.6; margin: 0;">
                                {{ getServiceContent($sections, 'why_item_' . $i, $lang, 'content') }}
                            </p>
                        </div>
                    </div>
                </div>
                @endif
            @endfor
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2>{{ $lang === 'tr' ? 'Hizmetlerimiz Hakkında Detaylı Bilgi Almak İster Misiniz?' : 'Would You Like More Information About Our Services?' }}</h2>
        <a href="{{ url('/contact') }}" class="btn btn-light">{{ $lang === 'tr' ? 'Bize Ulaşın' : 'Contact Us' }}</a>
    </div>
</section>
@endsection
