<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Service;
use App\Models\Page;
use App\Models\Section;
use App\Models\Setting;
use App\Models\PageHeaderSetting;
use Illuminate\Support\Facades\Hash;

class NavexmarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin User
        User::updateOrCreate(
            ['username' => 'admin'],
            [
                'name' => 'Admin User',
                'email' => 'admin@navexmar.com',
                'password' => Hash::make('admin31'),
                'is_active' => true,
            ]
        );

        // Services
        $services = [
            [
                'name' => 'Gemi Üzeri Hizmetler',
                'name_en' => 'Onboard Services',
                'description' => 'Gemilerinizin seferde veya limanda olduğu her durumda, uzman teknisyenlerimiz ile gemi üzerinde tüm bakım ve onarım işlemlerini gerçekleştiriyoruz.',
                'description_en' => 'In every situation where your ships are at sea or in port, we perform all maintenance and repair operations on board with our expert technicians.',
                'icon' => 'fas fa-anchor',
                'features' => ["Acil onarım hizmetleri", "Makine bakım ve servisi", "Elektrik ve elektronik onarımları", "Güverte ekipmanları bakımı", "HVAC sistem servisi", "Yangın söndürme sistemleri"],
                'features_en' => ["Emergency repair services", "Machine maintenance and service", "Electrical and electronic repairs", "Deck equipment maintenance", "HVAC system service", "Fire extinguishing systems"],
                'display_order' => 1,
                'slug' => 'gemi-uzeri-hizmetler'
            ],
            [
                'name' => 'Tedarik Hizmetleri',
                'name_en' => 'Supply Services',
                'description' => 'Geniş tedarikçi ağımız ile gemileriniz için ihtiyaç duyulan tüm yedek parça, malzeme ve ekipmanları en kısa sürede temin ediyoruz.',
                'description_en' => 'With our extensive supplier network, we provide all spare parts, materials and equipment needed for your ships in the shortest time.',
                'icon' => 'fas fa-boxes',
                'features' => ["Yedek parça temini", "Teknik malzeme tedariki", "Lojistik organizasyonu", "Gümrük işlemleri", "Hızlı kargo servisi", "Stok yönetimi"],
                'features_en' => ["Spare parts supply", "Technical material supply", "Logistics organization", "Customs procedures", "Fast cargo service", "Stock management"],
                'display_order' => 2,
                'slug' => 'tedarik-hizmetleri'
            ],
            [
                'name' => 'Öngörücü Bakım',
                'name_en' => 'Predictive Maintenance',
                'description' => 'Modern teknoloji ve veri analitiği kullanarak gemilerinizin ekipmanlarının durumunu sürekli izliyor ve bakım ihtiyaçlarını önceden planlıyoruz.',
                'description_en' => 'Using modern technology and data analytics, we continuously monitor the condition of your ships equipment and plan maintenance needs in advance.',
                'icon' => 'fas fa-chart-line',
                'features' => ["Durum izleme sistemleri", "Titreşim analizi", "Yağ analizi", "Termal görüntüleme", "Veri analitiği ve raporlama", "Bakım planlama optimizasyonu"],
                'features_en' => ["Condition monitoring systems", "Vibration analysis", "Oil analysis", "Thermal imaging", "Data analytics and reporting", "Maintenance planning optimization"],
                'display_order' => 3,
                'slug' => 'ongorucu-bakim'
            ]
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }

        // Pages
        $pages = [
            ['page_key' => 'home', 'title_tr' => 'Ana Sayfa', 'title_en' => 'Home', 'subtitle_tr' => 'OPTİMİZASYONA ADANMIŞ', 'subtitle_en' => 'DEDICATED TO OPTIMIZATION'],
            ['page_key' => 'services', 'title_tr' => 'Hizmetlerimiz', 'title_en' => 'Our Services', 'subtitle_tr' => 'Denizcilik sektöründe kapsamlı çözümler', 'subtitle_en' => 'Comprehensive solutions in maritime industry'],
            ['page_key' => 'contact', 'title_tr' => 'İletişim', 'title_en' => 'Contact', 'subtitle_tr' => 'Bizimle iletişime geçin', 'subtitle_en' => 'Get in touch with us'],
            ['page_key' => 'approach', 'title_tr' => 'Yaklaşımımız', 'title_en' => 'Our Approach', 'subtitle_tr' => 'İş felsefemiz ve değerlerimiz', 'subtitle_en' => 'Our business philosophy and values'],
            ['page_key' => 'policies', 'title_tr' => 'Politikalarımız', 'title_en' => 'Our Policies', 'subtitle_tr' => 'Kurumsal değerler ve ilkelerimiz', 'subtitle_en' => 'Our corporate values and principles']
        ];

        foreach ($pages as $page) {
            Page::updateOrCreate(['page_key' => $page['page_key']], $page);
            PageHeaderSetting::updateOrCreate(['page_key' => $page['page_key']], ['overlay_opacity' => 0.50]);
        }

        // Sections
        $sections = [
            ['page_key' => 'home', 'section_key' => 'hero_title', 'title_tr' => 'EN İYİYİ KEŞFEDİN', 'title_en' => 'DISCOVER THE BEST', 'section_order' => 1],
            ['page_key' => 'home', 'section_key' => 'hero_subtitle', 'title_tr' => 'OPTİMİZASYONA ADANMIŞ', 'title_en' => 'DEDICATED TO OPTIMIZATION', 'section_order' => 2],
            ['page_key' => 'home', 'section_key' => 'hero_description', 'content_tr' => 'Navexmar, sektördeki diğer firmalardan farklı bir yaklaşımla gemi bakım ve uluslararası ticaret hizmetleri sunan bir şirkettir.', 'content_en' => 'Navexmar is a company that provides ship maintenance and international trade services.', 'section_order' => 3],
        ];

        foreach ($sections as $section) {
            Section::updateOrCreate(
                ['page_key' => $section['page_key'], 'section_key' => $section['section_key']],
                $section
            );
        }

        // Settings
        $settings = [
            ['setting_key' => 'site_name', 'setting_value' => 'NAVEXMAR', 'setting_group' => 'general', 'description' => 'Site adı'],
            ['setting_key' => 'contact_email_1', 'setting_value' => 'agency@navexmar.com', 'setting_group' => 'contact', 'description' => 'Birincil e-posta'],
            ['setting_key' => 'contact_phone_1', 'setting_value' => '+90 530 379 31 33', 'setting_group' => 'contact', 'description' => 'Telefon 1 (Olcay)'],
            ['setting_key' => 'contact_address', 'setting_value' => 'Numune Evler Mah/Sahil 1 Nolu Sok/no2/Dörtyol/Hatay', 'setting_group' => 'contact', 'description' => 'Adres'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['setting_key' => $setting['setting_key']], $setting);
        }
    }
}
