-- Türkçe karakterleri düzelt
SET NAMES utf8mb4;

USE navexmar;

-- Ana sayfa içerikleri
UPDATE page_sections SET title_tr = 'EN İYİYİ KEŞFEDİN' WHERE section_key = 'hero_title';
UPDATE page_sections SET title_tr = 'OPTİMİZASYONA ADANMIŞ' WHERE section_key = 'hero_subtitle';
UPDATE page_sections SET title_tr = 'Şimdi Bizimle İletişime Geçin!' WHERE section_key = 'cta_title';
UPDATE page_sections SET title_tr = 'İletişim' WHERE section_key = 'cta_button';
UPDATE page_sections SET title_tr = 'Daha Fazla Bilgi' WHERE section_key = 'hero_button';
UPDATE page_sections SET title_tr = 'HİZMETLERİMİZ' WHERE section_key = 'services_title';
UPDATE page_sections SET title_tr = 'Detayları Gör' WHERE section_key = 'service_detail_button';

-- İstatistikler
UPDATE page_sections SET title_tr = 'Kuru Havuzlama' WHERE section_key = 'stat_1_label';
UPDATE page_sections SET title_tr = 'Yüzer Onarım' WHERE section_key = 'stat_2_label';
UPDATE page_sections SET title_tr = 'BWTS Kurulumu' WHERE section_key = 'stat_3_label';

-- NAVEXMAR açılımları
UPDATE page_sections SET title_tr = 'Navigasyon' WHERE section_key = 'floki_n';
UPDATE page_sections SET title_tr = 'Azimli' WHERE section_key = 'floki_a';
UPDATE page_sections SET title_tr = 'Verimli' WHERE section_key = 'floki_v';
UPDATE page_sections SET title_tr = 'Enerjik' WHERE section_key = 'floki_e';
UPDATE page_sections SET title_tr = 'Mükemmel' WHERE section_key = 'floki_x';

-- İçerikler
UPDATE page_sections SET 
    content_tr = 'Navexmar, sektördeki diğer firmalardan farklı bir yaklaşımla gemi bakım ve uluslararası ticaret hizmetleri sunan bir şirkettir. Kuruluşumuzdan bu yana, insan odaklı, tüm ortaklarımızı kapsayan ve her yönüyle entegre bir şirket olmaya çalışıyoruz.'
WHERE section_key = 'hero_description';

UPDATE page_sections SET 
    content_tr = 'Navexmar, sektördeki diğer firmalardan farklı bir yaklaşımla gemi bakım hizmetleri sunan bir şirkettir.'
WHERE section_key = 'about_description';

SELECT 'Türkçe karakterler düzeltildi!' as SONUC;
