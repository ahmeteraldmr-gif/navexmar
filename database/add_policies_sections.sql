-- Politikalar sayfası içeriklerini ekle
SET NAMES utf8mb4;
USE navexmar;

-- Politikalar sayfası içerikleri
INSERT INTO page_sections (page_key, section_key, title_tr, title_en, content_tr, content_en, section_order, is_active) VALUES
-- Giriş
('policies', 'intro_title', 'Kurumsal Politikalarımız', 'Our Corporate Policies', '', '', 1, 1),
('policies', 'intro_description', '', '', 
 'Navexmar olarak, tüm faaliyetlerimizde uluslararası standartlara uygun, etik ve sorumlu bir yaklaşım benimsiyoruz. Politikalarımız, sürdürülebilir başarı için yol haritamızdır.',
 'As Navexmar, we adopt an ethical and responsible approach in all our activities in accordance with international standards. Our policies are our roadmap for sustainable success.', 2, 1),

-- Kalite Politikası
('policies', 'quality_title', 'Kalite Politikası', 'Quality Policy', '', '', 10, 1),
('policies', 'quality_content', '', '',
 'Müşteri memnuniyetini ön planda tutarak, uluslararası kalite standartlarına uygun, güvenilir ve sürdürülebilir hizmetler sunmayı taahhüt ediyoruz.',
 'We are committed to providing reliable and sustainable services in accordance with international quality standards, keeping customer satisfaction at the forefront.', 11, 1),

-- İş Sağlığı ve Güvenliği
('policies', 'safety_title', 'İş Sağlığı ve Güvenliği', 'Occupational Health and Safety', '', '', 20, 1),
('policies', 'safety_content', '', '',
 'Çalışanlarımızın ve iş ortaklarımızın sağlığı ve güvenliği bizim için en önemli önceliktir. Sıfır kaza hedefiyle çalışıyoruz.',
 'The health and safety of our employees and business partners is our top priority. We work with a zero accident target.', 21, 1),

-- Çevre Politikası
('policies', 'environment_title', 'Çevre Politikası', 'Environmental Policy', '', '', 30, 1),
('policies', 'environment_content', '', '',
 'Çevreye duyarlı çalışma prensiplerimizle, gelecek nesillere yaşanabilir bir çevre bırakmayı hedefliyoruz.',
 'With our environmentally sensitive working principles, we aim to leave a livable environment for future generations.', 31, 1),

-- Etik ve Uyum
('policies', 'ethics_title', 'Etik ve Uyum', 'Ethics and Compliance', '', '', 40, 1),
('policies', 'ethics_content', '', '',
 'Tüm iş süreçlerimizde dürüstlük, şeffaflık ve adil rekabet ilkelerine bağlı kalıyoruz.',
 'We adhere to the principles of honesty, transparency and fair competition in all our business processes.', 41, 1)

ON DUPLICATE KEY UPDATE 
    title_tr = VALUES(title_tr),
    title_en = VALUES(title_en),
    content_tr = VALUES(content_tr),
    content_en = VALUES(content_en),
    is_active = 1;

SELECT 'Politikalar içerikleri eklendi!' as SONUC;
