<?php
/**
 * Türkçe karakter encoding düzeltme scripti
 * Bir kere çalıştırın, sonra silin
 */

// Database bağlantısı
$db = new PDO(
    'mysql:host=localhost;dbname=navexmar;charset=utf8mb4',
    'root',
    '',
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4"
    ]
);

// Düzeltilecek veriler
$fixes = [
    ['key' => 'hero_title', 'title_tr' => 'EN İYİYİ KEŞFEDİN', 'title_en' => 'DISCOVER THE BEST'],
    ['key' => 'hero_subtitle', 'title_tr' => 'OPTİMİZASYONA ADANMIŞ', 'title_en' => 'DEDICATED TO OPTIMIZATION'],
    ['key' => 'hero_button', 'title_tr' => 'Daha Fazla Bilgi', 'title_en' => 'Read More'],
    ['key' => 'cta_title', 'title_tr' => 'Şimdi Bizimle İletişime Geçin!', 'title_en' => 'Contact Us Now!'],
    ['key' => 'cta_button', 'title_tr' => 'İletişim', 'title_en' => 'Contact'],
    ['key' => 'services_title', 'title_tr' => 'HİZMETLERİMİZ', 'title_en' => 'OUR SERVICES'],
    ['key' => 'service_detail_button', 'title_tr' => 'Detayları Gör', 'title_en' => 'View Details'],
    
    // İstatistikler
    ['key' => 'stat_1_label', 'title_tr' => 'Kuru Havuzlama', 'title_en' => 'Drydock'],
    ['key' => 'stat_2_label', 'title_tr' => 'Yüzer Onarım', 'title_en' => 'Floating Repair'],
    ['key' => 'stat_3_label', 'title_tr' => 'BWTS Kurulumu', 'title_en' => 'BWTS Installation'],
    
    // NAVEXMAR açılımları
    ['key' => 'floki_n', 'title_tr' => 'Navigasyon', 'title_en' => 'Navigation'],
    ['key' => 'floki_a', 'title_tr' => 'Azimli', 'title_en' => 'Determined'],
    ['key' => 'floki_v', 'title_tr' => 'Verimli', 'title_en' => 'Efficient'],
    ['key' => 'floki_e', 'title_tr' => 'Enerjik', 'title_en' => 'Energetic'],
    ['key' => 'floki_x', 'title_tr' => 'Mükemmel', 'title_en' => 'Excellent'],
];

$count = 0;

foreach ($fixes as $fix) {
    $sql = "UPDATE page_sections SET title_tr = ?, title_en = ? WHERE section_key = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$fix['title_tr'], $fix['title_en'], $fix['key']]);
    $count += $stmt->rowCount();
}

// İçerikleri düzelt
$contentFixes = [
    [
        'key' => 'hero_description',
        'content_tr' => 'Navexmar, sektördeki diğer firmalardan farklı bir yaklaşımla gemi bakım ve uluslararası ticaret hizmetleri sunan bir şirkettir. Kuruluşumuzdan bu yana, insan odaklı, tüm ortaklarımızı kapsayan ve her yönüyle entegre bir şirket olmaya çalışıyoruz.',
        'content_en' => 'Navexmar is a company that provides ship maintenance and international trade services with a different approach from other companies in the industry. Since our establishment, we have been striving to be a human-oriented company that includes all our partners and is integrated in every aspect.'
    ],
    [
        'key' => 'about_description',
        'content_tr' => 'Navexmar, sektördeki diğer firmalardan farklı bir yaklaşımla gemi bakım hizmetleri sunan bir şirkettir.',
        'content_en' => 'Navexmar is a company that provides ship maintenance services with a different approach from other companies in the industry.'
    ]
];

foreach ($contentFixes as $fix) {
    $sql = "UPDATE page_sections SET content_tr = ?, content_en = ? WHERE section_key = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$fix['content_tr'], $fix['content_en'], $fix['key']]);
    $count += $stmt->rowCount();
}

// Politikalar sayfası düzeltmeleri
$policiesFixes = [
    ['key' => 'intro_title', 'title_tr' => 'Kurumsal Politikalarımız', 'title_en' => 'Our Corporate Policies'],
    ['key' => 'quality_title', 'title_tr' => 'Kalite Politikası', 'title_en' => 'Quality Policy'],
    ['key' => 'safety_title', 'title_tr' => 'İş Sağlığı ve Güvenliği', 'title_en' => 'Occupational Health and Safety'],
    ['key' => 'environment_title', 'title_tr' => 'Çevre Politikası', 'title_en' => 'Environmental Policy'],
    ['key' => 'ethics_title', 'title_tr' => 'Etik ve Uyum', 'title_en' => 'Ethics and Compliance'],
];

foreach ($policiesFixes as $fix) {
    $sql = "UPDATE page_sections SET title_tr = ?, title_en = ? WHERE section_key = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$fix['title_tr'], $fix['title_en'], $fix['key']]);
    $count += $stmt->rowCount();
}

$policiesContent = [
    ['key' => 'intro_description', 'content_tr' => 'Navexmar olarak, tüm faaliyetlerimizde uluslararası standartlara uygun, etik ve sorumlu bir yaklaşım benimsiyoruz. Politikalarımız, sürdürülebilir başarı için yol haritamızdır.'],
    ['key' => 'quality_content', 'content_tr' => 'Müşteri memnuniyetini ön planda tutarak, uluslararası kalite standartlarına uygun, güvenilir ve sürdürülebilir hizmetler sunmayı taahhüt ediyoruz.'],
    ['key' => 'safety_content', 'content_tr' => 'Çalışanlarımızın ve iş ortaklarımızın sağlığı ve güvenliği bizim için en önemli önceliktir. Sıfır kaza hedefiyle çalışıyoruz.'],
    ['key' => 'environment_content', 'content_tr' => 'Çevreye duyarlı çalışma prensiplerimizle, gelecek nesillere yaşanabilir bir çevre bırakmayı hedefliyoruz.'],
    ['key' => 'ethics_content', 'content_tr' => 'Tüm iş süreçlerimizde dürüstlük, şeffaflık ve adil rekabet ilkelerine bağlı kalıyoruz.'],
];

foreach ($policiesContent as $fix) {
    $sql = "UPDATE page_sections SET content_tr = ? WHERE section_key = ?";
    $stmt = $db->prepare($sql);
    $stmt->execute([$fix['content_tr'], $fix['key']]);
    $count += $stmt->rowCount();
}

?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Encoding Düzeltildi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background: #ecf0f1;
        }
        .success {
            background: #27ae60;
            color: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
        }
        h1 { margin: 0 0 15px 0; font-size: 2rem; }
        p { margin: 10px 0; font-size: 1.1rem; }
        .btn {
            display: inline-block;
            background: white;
            color: #27ae60;
            padding: 12px 30px;
            border-radius: 6px;
            text-decoration: none;
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="success">
        <h1>✓ Başarılı!</h1>
        <p><?php echo $count; ?> kayıt düzeltildi</p>
        <p>Türkçe karakterler artık düzgün görünecek</p>
        <a href="/navexmar/public/admin/pages" class="btn">Admin Panele Git</a>
    </div>
</body>
</html>
