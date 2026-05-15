-- Hizmetlerimiz sayfası içerikleri
SET NAMES utf8mb4;
USE navexmar;

-- Sayfa başlığını düzelt
UPDATE pages SET title_tr = 'Hizmetlerimiz', title_en = 'Our Services' WHERE page_key = 'services';

-- Ana başlık
INSERT INTO page_sections (page_key, section_key, title_tr, title_en, content_tr, content_en, section_order, is_active) VALUES
('services', 'main_title', 'Hizmetlerimiz', 'Our Services', '', '', 1, 1),

-- Gemi Acenteliği Hizmetleri
('services', 'agency_title', 'Gemi Acenteliği Hizmetleri', 'Ship Agency Services', '', '', 10, 1),
('services', 'agency_item_1', 'Liman giriş ve çıkış işlemleri', 'Port entry and exit procedures', '', '', 11, 1),
('services', 'agency_item_2', 'Yerel otoritelerle resmi prosedürlerin yürütülmesi', 'Official procedures with local authorities', '', '', 12, 1),
('services', 'agency_item_3', 'Gemi operasyonlarının koordinasyonu', 'Coordination of ship operations', '', '', 13, 1),
('services', 'agency_item_4', 'Liman, rıhtım ve terminal organizasyonu', 'Port, quay and terminal organization', '', '', 14, 1),
('services', 'agency_item_5', 'Evrak ve raporlama süreçleri', 'Documentation and reporting processes', '', '', 15, 1),

-- Operasyon ve Koordinasyon
('services', 'operation_title', 'Operasyon ve Koordinasyon', 'Operation and Coordination', '', '', 20, 1),
('services', 'operation_item_1', 'Yükleme ve tahliye süreçlerinin takibi', 'Monitoring loading and unloading processes', '', '', 21, 1),
('services', 'operation_item_2', 'Gemi–liman–yük sahibi koordinasyonu', 'Ship–port–cargo owner coordination', '', '', 22, 1),
('services', 'operation_item_3', 'Zaman ve maliyet optimizasyonu', 'Time and cost optimization', '', '', 23, 1),
('services', 'operation_item_4', 'Operasyonel risklerin yönetimi', 'Management of operational risks', '', '', 24, 1),

-- Personel & Teknik Destek
('services', 'personnel_title', 'Personel & Teknik Destek', 'Personnel & Technical Support', '', '', 30, 1),
('services', 'personnel_item_1', 'Gemi personel değişimi organizasyonu', 'Crew change organization', '', '', 31, 1),
('services', 'personnel_item_2', 'Sağlık, vize ve transfer işlemleri', 'Health, visa and transfer procedures', '', '', 32, 1),
('services', 'personnel_item_3', 'Teknik ihtiyaçların yerel temini', 'Local supply of technical needs', '', '', 33, 1),
('services', 'personnel_item_4', 'Tedarik ve servis koordinasyonu', 'Supply and service coordination', '', '', 34, 1),

-- Brokerlik & Ticari Destek
('services', 'broker_title', 'Brokerlik & Ticari Destek', 'Brokerage & Commercial Support', '', '', 40, 1),
('services', 'broker_item_1', 'Piyasa takibi ve ticari danışmanlık', 'Market monitoring and commercial consultancy', '', '', 41, 1),
('services', 'broker_item_2', 'Gemi–yük eşleştirme desteği', 'Ship–cargo matching support', '', '', 42, 1),
('services', 'broker_item_3', 'Güvenilir bağlantı ve doğru yönlendirme', 'Reliable connection and accurate routing', '', '', 43, 1),

-- Neden Biz?
('services', 'why_title', 'Neden Biz?', 'Why Us?', '', '', 50, 1),
('services', 'why_item_1', 'Güvenilirlik', 'Reliability', 'Söz verdiğimiz işi, söz verdiğimiz şekilde yaparız', 'We do what we promise, the way we promise', 51, 1),
('services', 'why_item_2', 'Şeffaflık', 'Transparency', 'Süreçlerin her aşamasında açık iletişim', 'Clear communication at every stage of the process', 52, 1),
('services', 'why_item_3', 'Hız', 'Speed', 'Denizcilikte zamanın değerini biliriz', 'We know the value of time in maritime', 53, 1),
('services', 'why_item_4', 'Tecrübe', 'Experience', 'Sahada kazanılmış gerçek operasyon bilgisi', 'Real operational knowledge gained in the field', 54, 1),
('services', 'why_item_5', 'Uzun Vadeli Bakış', 'Long-Term Vision', 'Tek seferlik değil, sürdürülebilir iş birlikleri', 'Not one-time, but sustainable collaborations', 55, 1),

-- Sonuç metni
('services', 'conclusion', '', '', 'Bizim için başarı; sorunsuz tamamlanan bir operasyon ve memnun bir iş ortağıdır.', 'For us, success means a smoothly completed operation and a satisfied business partner.', 60, 1)

ON DUPLICATE KEY UPDATE 
    title_tr = VALUES(title_tr),
    title_en = VALUES(title_en),
    content_tr = VALUES(content_tr),
    content_en = VALUES(content_en),
    is_active = 1;

SELECT 'Hizmetler içerikleri eklendi!' as SONUC;
