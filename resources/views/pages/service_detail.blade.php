@extends('layouts.app')

@section('title', $service->{'name_' . app()->getLocale()} ?? $service->name)

@php
    $lang = app()->getLocale();
@endphp

@section('content')
@include('components.page-header')

<!-- Service Detail Section -->
<section class="service-detail" style="padding: 4rem 0; background: white;">
    <div class="container" style="max-width: 1000px; margin: 0 auto;">
        <div style="background: white; padding: 3rem; border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.1);">
            <!-- Service Icon & Title -->
            <div style="text-align: center; margin-bottom: 3rem;">
                <div style="font-size: 4rem; color: #0066cc; margin-bottom: 1.5rem;">
                    <i class="{{ $service->icon ?? 'fas fa-ship' }}"></i>
                </div>
                <h1 style="font-size: 2.5rem; color: #2c3e50; margin-bottom: 1rem;">
                    {{ $service->{'name_' . $lang} ?? $service->name ?? '' }}
                </h1>
            </div>
            
            <!-- Service Description -->
            <div style="margin-bottom: 3rem;">
                <p style="font-size: 1.1rem; line-height: 1.8; color: #555; text-align: justify;">
                    {!! nl2br(e($service->{'description_' . $lang} ?? $service->description ?? '')) !!}
                </p>
            </div>
            
            <!-- Service Features -->
            @if (isset($service->features) && !empty($service->features))
            <div style="margin-bottom: 3rem;">
                <h3 style="font-size: 1.8rem; color: #2c3e50; margin-bottom: 1.5rem; border-bottom: 3px solid #0066cc; padding-bottom: 0.5rem;">
                    <i class="fas fa-check-double" style="color: #0066cc; margin-right: 0.5rem;"></i>
                    {{ $lang === 'tr' ? 'Özellikler' : 'Features' }}
                </h3>
                <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem;">
                    @php 
                        $features = $lang === 'tr' ? $service->features : ($service->features_en ?? $service->features ?? []);
                    @endphp
                    @if (is_array($features))
                        @foreach ($features as $feature)
                            <div style="display: flex; align-items: center; background: #f8f9fa; padding: 1rem 1.5rem; border-radius: 8px; border-left: 4px solid #00cc66;">
                                <i class="fas fa-check-circle" style="color: #00cc66; font-size: 1.5rem; margin-right: 1rem; flex-shrink: 0;"></i>
                                <span style="color: #555; font-size: 1rem;">{{ $feature }}</span>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
            @endif
            
            <!-- CTA Button -->
            <div style="text-align: center; padding-top: 2rem; border-top: 2px solid #f0f0f0;">
                <a href="{{ url('/contact') }}" class="btn btn-primary" style="font-size: 1.2rem; padding: 1rem 3rem;">
                    <i class="fas fa-envelope" style="margin-right: 0.5rem;"></i>
                    {{ $lang === 'tr' ? 'Teklif Alın' : 'Get Quote' }}
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Other Services Section -->
@if (isset($otherServices) && $otherServices->count() > 0)
<section style="padding: 4rem 0; background: #f8f9fa;">
    <div class="container">
        <h2 style="text-align: center; font-size: 2rem; margin-bottom: 3rem; color: #2c3e50;">
            {{ $lang === 'tr' ? 'Diğer Hizmetlerimiz' : 'Our Other Services' }}
        </h2>
        
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 2rem;">
            @foreach ($otherServices as $otherService)
                <div style="background: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); text-align: center; transition: transform 0.3s ease;">
                    <div style="font-size: 3rem; color: #0066cc; margin-bottom: 1rem;">
                        <i class="{{ $otherService->icon ?? 'fas fa-ship' }}"></i>
                    </div>
                    <h3 style="color: #2c3e50; font-size: 1.3rem; margin-bottom: 1rem;">
                        {{ $otherService->{'name_' . $lang} ?? $otherService->name ?? '' }}
                    </h3>
                    <p style="color: #666; font-size: 0.95rem; margin-bottom: 1.5rem; line-height: 1.6;">
                        {{ mb_substr($otherService->{'description_' . $lang} ?? $otherService->description ?? '', 0, 100) }}...
                    </p>
                    <a href="{{ url('/services/' . ($otherService->slug ?? '')) }}" class="btn btn-secondary">
                        {{ $lang === 'tr' ? 'Detayları Gör' : 'View Details' }}
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2>{{ $lang === 'tr' ? 'Hizmetlerimiz Hakkında Detaylı Bilgi Almak İster Misiniz?' : 'Would You Like More Information About Our Services?' }}</h2>
        <a href="{{ url('/contact') }}" class="btn btn-light">{{ $lang === 'tr' ? 'Bize Ulaşın' : 'Contact Us' }}</a>
    </div>
</section>
@endsection
