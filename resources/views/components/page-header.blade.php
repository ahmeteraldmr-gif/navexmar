@php
    $headerStyle = '';
    $defaultImages = [
        'services' => 'assets/uploads/headers/header_services_default.jpeg',
        'contact' => 'assets/uploads/headers/header_contact_default.jpeg',
        'approach' => 'assets/uploads/headers/header_approach_default.jpeg',
        'policies' => 'assets/uploads/headers/header_policies_default.jpeg',
    ];
    
    $pageKey = $page->page_key ?? 'default';
    $headerImageUrl = isset($defaultImages[$pageKey]) ? asset($defaultImages[$pageKey]) : asset('assets/uploads/headers/header_home_69788db2347d7.jpeg');
    
    if (isset($headerImage) && !empty($headerImage->image_path)) {
        $headerImageUrl = asset('assets/' . $headerImage->image_path);
    }

    $overlayOpacity = 0.5;
    $overlayColor = '#000000';
@endphp

<section class="page-header" style="background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)), url('{{ $headerImageUrl }}') !important; background-size: cover !important; background-position: center !important; background-repeat: no-repeat !important;">
    <div class="page-header-overlay" style="background-color: {{ $overlayColor }}; opacity: {{ $overlayOpacity }};"></div>
    <div class="container">
        <h1>{{ $page->{'title_' . app()->getLocale()} ?? 'Sayfa Başlığı' }}</h1>
        @if (isset($page->{'subtitle_' . app()->getLocale()}) && !empty($page->{'subtitle_' . app()->getLocale()}))
            <p>{{ $page->{'subtitle_' . app()->getLocale()} }}</p>
        @endif
    </div>
</section>
