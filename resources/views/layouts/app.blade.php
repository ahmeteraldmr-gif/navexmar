<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ $page['meta_description_' . app()->getLocale()] ?? 'Navexmar - Gemi Bakım ve Lojistik Hizmetleri' }}">
    <title>@yield('title', 'Navexmar') - NAVEXMAR</title>
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages.css') }}">
    @stack('css')
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Favicon -->
    @if (isset($settings['site_favicon']) && !empty($settings['site_favicon']))
        <link rel="icon" href="{{ asset('assets/' . $settings['site_favicon']) }}">
    @endif
    
    <script>
        window.BASE_URL = '{{ url('/') }}';
        window.CURRENT_LANG = '{{ app()->getLocale() }}';
    </script>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
            <div class="nav-wrapper">
                <div class="logo">
                    <a href="{{ url('/') }}">
                        @if (isset($settings['site_logo']) && !empty($settings['site_logo']))
                            <img src="{{ asset('assets/' . $settings['site_logo']) }}" alt="NAVEXMAR Logo" class="logo-img">
                        @endif
                        <h1>{{ $settings['site_name'] ?? 'NAVEXMAR' }}</h1>
                    </a>
                </div>
                <div class="hamburger" id="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <ul class="nav-menu" id="navMenu">
                    <li>
                        <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}" data-i18n="nav.home">
                            Ana Sayfa
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/approach') }}" class="{{ request()->is('approach') ? 'active' : '' }}" data-i18n="nav.approach">
                            Yaklaşımımız
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="{{ url('/services') }}" class="{{ request()->is('services*') ? 'active' : '' }}" data-i18n="nav.services">
                            Hizmetler <i class="fas fa-chevron-down"></i>
                        </a>
                        <ul class="dropdown-menu">
                            @if (isset($services) && $services->count() > 0)
                                @foreach($services->take(5) as $service)
                                    <li>
                                        <a href="{{ url('/services/' . $service->slug) }}">
                                            {{ $service->{'name_' . app()->getLocale()} ?? $service->name }}
                                        </a>
                                    </li>
                                @endforeach
                            @else
                                <li><a href="{{ url('/services') }}" data-i18n="services.view_all">Tümünü Görüntüle</a></li>
                            @endif
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('/policies') }}" class="{{ request()->is('policies') ? 'active' : '' }}" data-i18n="nav.policies">
                            Politikalarımız
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/contact') }}" class="{{ request()->is('contact') ? 'active' : '' }}" data-i18n="nav.contact">
                            İletişim
                        </a>
                    </li>
                    <li class="language-selector">
                        <a href="#" class="lang-toggle">
                            <i class="fas fa-globe"></i> 
                            <span class="lang-text">{{ strtoupper(app()->getLocale()) }}</span> 
                            <i class="fas fa-chevron-down"></i>
                        </a>
                        <ul class="language-menu">
                            <li>
                                <a href="{{ url('/lang/tr') }}" class="lang-option" data-lang="tr">
                                    🇹🇷 Türkçe
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/lang/en') }}" class="lang-option" data-lang="en">
                                    🇬🇧 English
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Ana içerik -->
    @yield('content')
    
    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <!-- Menü -->
                <div class="footer-col">
                    <h4 data-i18n="footer.menu">Menü</h4>
                    <ul>
                        <li><a href="{{ url('/') }}" data-i18n="nav.home">Ana Sayfa</a></li>
                        <li><a href="{{ url('/approach') }}" data-i18n="nav.approach">Yaklaşımımız</a></li>
                        <li><a href="{{ url('/services') }}" data-i18n="nav.services">Hizmetler</a></li>
                        <li><a href="{{ url('/contact') }}" data-i18n="nav.contact">İletişim</a></li>
                    </ul>
                </div>
                
                <!-- İletişim -->
                <div class="footer-col">
                    <h4 data-i18n="footer.contact">İletişim</h4>
                    <ul>
                        <li>
                            <i class="fas fa-envelope"></i> 
                            {!! nl2br(e($settings['contact_email_1'] ?? 'agency@navexmar.com')) !!}
                            @if (isset($settings['contact_email_2'])) <br> {{ $settings['contact_email_2'] }} @endif
                            @if (isset($settings['contact_email_3'])) <br> {{ $settings['contact_email_3'] }} @endif
                        </li>
                        <li>
                            <i class="fas fa-phone"></i> 
                            {{ $settings['contact_phone_1'] ?? '' }}
                            @if (isset($settings['contact_phone_2'])) <br> {{ $settings['contact_phone_2'] }} @endif
                        </li>
                        <li>
                            <i class="fas fa-map-marker-alt"></i> 
                            <span data-i18n="footer.location">
                                {{ $settings['contact_city'] ?? 'Hatay' }}, 
                                {{ $settings['contact_country'] ?? 'Türkiye' }}
                            </span>
                        </li>
                    </ul>
                </div>
                
                <!-- Çalışma Saatleri -->
                <div class="footer-col">
                    <h4 data-i18n="footer.workingHours">Çalışma Saatleri</h4>
                    <ul>
                        <li data-i18n="footer.workingHoursDesc">
                            {{ $settings['working_hours'] ?? 'Zaman Kısıtı Olmaksızın 7/24 Operasyon Takibi ve Her Aşamada Erişilebilir Operasyon Ekibi' }}
                        </li>
                    </ul>
                </div>
                
            </div>
            
            <!-- Social Media Links -->
            @if (isset($settings['social_facebook']) || isset($settings['social_twitter']) || 
                      isset($settings['social_linkedin']) || isset($settings['social_instagram']))
            <div class="footer-social" style="text-align: center; margin-top: 2rem; padding-top: 2rem; border-top: 1px solid rgba(255,255,255,0.1);">
                @if (!empty($settings['social_facebook']))
                    <a href="{{ $settings['social_facebook'] }}" target="_blank" rel="noopener" style="margin: 0 10px;">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                @endif
                @if (!empty($settings['social_twitter']))
                    <a href="{{ $settings['social_twitter'] }}" target="_blank" rel="noopener" style="margin: 0 10px;">
                        <i class="fab fa-twitter"></i>
                    </a>
                @endif
                @if (!empty($settings['social_linkedin']))
                    <a href="{{ $settings['social_linkedin'] }}" target="_blank" rel="noopener" style="margin: 0 10px;">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                @endif
                @if (!empty($settings['social_instagram']))
                    <a href="{{ $settings['social_instagram'] }}" target="_blank" rel="noopener" style="margin: 0 10px;">
                        <i class="fab fa-instagram"></i>
                    </a>
                @endif
            </div>
            @endif
            
            <!-- Copyright -->
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} {{ $settings['site_name'] ?? 'Navexmar' }}. 
                <span data-i18n="footer.copyright">Tüm Hakları Saklıdır.</span></p>
            </div>
        </div>
    </footer>
    
    <!-- Scripts -->
    <script src="{{ asset('assets/js/i18n.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    @stack('js')
</body>
</html>
