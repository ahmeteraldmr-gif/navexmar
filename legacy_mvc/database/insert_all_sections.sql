-- TÜM İÇERİKLERİ EKLE
USE navexmar;

-- ANA SAYFA - HERO VE TEMEL BÖLÜMLER
INSERT INTO page_sections (page_key, section_key, title_tr, title_en, content_tr, content_en, section_order, is_active) VALUES
('home', 'hero_title', 'EN İYİYİ KEŞFEDİN', 'DISCOVER THE BEST', '', '', 1, 1),
('home', 'hero_subtitle', 'OPTİMİZASYONA ADANMIŞ', 'DEDICATED TO OPTIMIZATION', '', '', 2, 1),
('home', 'hero_description', '', '', 'Navexmar, sektördeki diğer firmalardan farklı bir yaklaşımla gemi bakım ve uluslararası ticaret hizmetleri sunan bir şirkettir. Kuruluşumuzdan bu yana, insan odaklı, tüm ortaklarımızı kapsayan ve her yönüyle entegre bir şirket olmaya çalışıyoruz.', 'Navexmar is a company that provides ship maintenance and international trade services with a different approach from other companies in the industry. Since our establishment, we have been striving to be a human-oriented company that includes all our partners and is integrated in every aspect.', 3, 1),
('home', 'hero_button', 'Daha Fazla Bilgi', 'Read More', '', '', 31, 1),
('home', 'cta_title', 'Şimdi Bizimle İletişime Geçin!', 'Contact Us Now!', '', '', 5, 1),
('home', 'cta_button', 'İletişim', 'Contact', '', '', 32, 1),
('home', 'about_description', '', '', 'Navexmar, sektördeki diğer firmalardan farklı bir yaklaşımla gemi bakım hizmetleri sunan bir şirkettir.', 'Navexmar is a company that provides ship maintenance services with a different approach from other companies in the industry.', 4, 1)
ON DUPLICATE KEY UPDATE title_tr = VALUES(title_tr), title_en = VALUES(title_en), content_tr = VALUES(content_tr), content_en = VALUES(content_en), is_active = 1;

-- ANA SAYFA - İSTATİSTİKLER
INSERT INTO page_sections (page_key, section_key, title_tr, title_en, content_tr, content_en, section_order, is_active) VALUES
('home', 'stat_1_number', '15', '15', '', '', 10, 1),
('home', 'stat_1_label', 'Kuru Havuzlama', 'Drydock', '', '', 11, 1),
('home', 'stat_2_number', '30', '30', '', '', 12, 1),
('home', 'stat_2_label', 'Yüzer Onarım', 'Floating Repair', '', '', 13, 1),
('home', 'stat_3_number', '18', '18', '', '', 14, 1),
('home', 'stat_3_label', 'BWTS Kurulumu', 'BWTS Installation', '', '', 15, 1)
ON DUPLICATE KEY UPDATE title_tr = VALUES(title_tr), title_en = VALUES(title_en), is_active = 1;

-- ANA SAYFA - NAVEXMAR AÇILIMI (N-A-V-E-X-M-A-R)
INSERT INTO page_sections (page_key, section_key, title_tr, title_en, content_tr, content_en, section_order, is_active) VALUES
('home', 'floki_n', 'Navigasyon', 'Navigation', '', '', 20, 1),
('home', 'floki_a', 'Azimli', 'Determined', '', '', 21, 1),
('home', 'floki_v', 'Verimli', 'Efficient', '', '', 22, 1),
('home', 'floki_e', 'Enerjik', 'Energetic', '', '', 23, 1),
('home', 'floki_x', 'Mükemmel', 'Excellent', '', '', 24, 1)
ON DUPLICATE KEY UPDATE title_tr = VALUES(title_tr), title_en = VALUES(title_en), is_active = 1;

-- ANA SAYFA - DİĞER METINLER
INSERT INTO page_sections (page_key, section_key, title_tr, title_en, content_tr, content_en, section_order, is_active) VALUES
('home', 'services_title', 'HİZMETLERİMİZ', 'OUR SERVICES', '', '', 30, 1),
('home', 'service_detail_button', 'Detayları Gör', 'View Details', '', '', 33, 1)
ON DUPLICATE KEY UPDATE title_tr = VALUES(title_tr), title_en = VALUES(title_en), is_active = 1;

-- YAKLAŞIMIMIZ SAYFASI - TEMEL İÇERİKLER
INSERT INTO page_sections (page_key, section_key, title_tr, title_en, content_tr, content_en, section_order, is_active) VALUES
('approach', 'approach_intro', 'Farklı Bir Bakış Açısı', 'A Different Perspective', 
 'Navexmar, sektördeki diğer firmalardan farklı bir yaklaşımla gemi bakım ve uluslararası ticaret hizmetleri sunan bir şirkettir. Kuruluşumuzdan bu yana, insan odaklı, tüm ortaklarımızı kapsayan ve her yönüyle entegre bir şirket olmaya çalışıyoruz. Müşterilerimize en iyi hizmeti sunmak için sürekli gelişim ve yenilikçilik ilkelerimizle hareket ediyoruz.',
 'Navexmar is a company that provides ship maintenance and international trade services with a different approach from other companies in the industry. Since our establishment, we have been striving to be a human-oriented company that includes all our partners and is integrated in every aspect. We operate with the principles of continuous improvement and innovation to provide the best service to our customers.', 1, 1),
('approach', 'approach_mission', 'Misyonumuz', 'Our Mission',
 'Denizcilik sektöründe en güvenilir iş ortağı olmak, müşterilerimize en yüksek kalitede hizmet sunarak operasyonel verimliliğe ve sürdürülebilir başarıya katkıda bulunmak.',
 'To be the most reliable business partner in the maritime industry, contributing to operational efficiency and sustainable success by providing the highest quality service to our customers.', 2, 1),
('approach', 'approach_vision', 'Vizyonumuz', 'Our Vision',
 'Bölgesel lider konumumuzu koruyarak, küresel ölçekte tanınan ve tercih edilen bir denizcilik hizmetleri şirketi olmak, sektöre yenilikçi çözümler sunmaya devam etmek.',
 'To maintain our regional leadership position, to become a globally recognized and preferred maritime services company, and to continue providing innovative solutions to the industry.', 3, 1)
ON DUPLICATE KEY UPDATE title_tr = VALUES(title_tr), title_en = VALUES(title_en), content_tr = VALUES(content_tr), content_en = VALUES(content_en), is_active = 1;

-- YAKLAŞIMIMIZ - 6 KART
INSERT INTO page_sections (page_key, section_key, title_tr, title_en, content_tr, content_en, section_order, is_active) VALUES
('approach', 'card_1_title', 'İnsan Odaklı', 'People-Oriented',
 'Çalışanlarımız ve iş ortaklarımızla kurduğumuz güçlü ilişkiler, başarımızın temel taşıdır. Her bireyin değerini bilir ve onların gelişimine katkıda bulunuruz.',
 'The strong relationships we establish with our employees and business partners are the cornerstone of our success. We recognize the value of each individual and contribute to their development.', 10, 1),
('approach', 'card_2_title', 'Kapsayıcı Ortaklık', 'Inclusive Partnership',
 'Tüm paydaşlarımızı sürece dahil eder, şeffaf ve dürüst bir iletişim ile uzun vadeli ortaklıklar kurarız. Birlikte başarıya ulaşma inancıyla hareket ederiz.',
 'We involve all our stakeholders in the process, establish long-term partnerships with transparent and honest communication. We act with the belief of achieving success together.', 11, 1),
('approach', 'card_3_title', 'Entegre Çözümler', 'Integrated Solutions',
 'Her yönüyle entegre sistemlerimiz sayesinde müşterilerimize kapsamlı ve kesintisiz hizmet sunuyoruz. Tek noktadan tüm ihtiyaçlarınıza çözüm üretiyoruz.',
 'Thanks to our fully integrated systems, we provide comprehensive and uninterrupted service to our customers. We provide solutions to all your needs from a single point.', 12, 1),
('approach', 'card_4_title', 'Yenilikçilik', 'Innovation',
 'Teknolojik gelişmeleri yakından takip eder, sektördeki yenilikleri hızla adapte ederiz. Sürekli gelişim ve iyileştirme odaklı çalışırız.',
 'We closely follow technological developments and quickly adapt innovations in the industry. We work with a focus on continuous improvement.', 13, 1),
('approach', 'card_5_title', 'Kalite ve Güvenilirlik', 'Quality and Reliability',
 'Verdiğimiz hizmetlerde en yüksek kalite standartlarını benimser, güvenilir ve zamanında teslimat garantisi veririz. Müşteri memnuniyeti önceliğimizdir.',
 'We adopt the highest quality standards in our services, guarantee reliable and on-time delivery. Customer satisfaction is our priority.', 14, 1),
('approach', 'card_6_title', 'Küresel Ağ', 'Global Network',
 'Dünya çapında geniş tedarikçi ve iş ortağı ağımız sayesinde, her coğrafyada hızlı ve etkili hizmet sunabiliyoruz. Yerel bilgi, global çözümler.',
 'Thanks to our extensive network of suppliers and partners worldwide, we can provide fast and effective service in every geography. Local knowledge, global solutions.', 15, 1)
ON DUPLICATE KEY UPDATE title_tr = VALUES(title_tr), title_en = VALUES(title_en), content_tr = VALUES(content_tr), content_en = VALUES(content_en), is_active = 1;

-- YAKLAŞIMIMIZ - DİĞER METINLER
INSERT INTO page_sections (page_key, section_key, title_tr, title_en, content_tr, content_en, section_order, is_active) VALUES
('approach', 'mission_vision_title', 'Misyon ve Vizyonumuz', 'Our Mission and Vision', '', '', 20, 1),
('approach', 'cta_title', 'Bizimle Çalışmak İster Misiniz?', 'Would You Like to Work With Us?', '', '', 21, 1),
('approach', 'cta_button', 'İletişime Geçin', 'Get in Touch', '', '', 22, 1)
ON DUPLICATE KEY UPDATE title_tr = VALUES(title_tr), title_en = VALUES(title_en), is_active = 1;

-- İLETİŞİM SAYFASI - FORM ETİKETLERİ
INSERT INTO page_sections (page_key, section_key, title_tr, title_en, content_tr, content_en, section_order, is_active) VALUES
('contact', 'form_title', 'Mesaj Gönderin', 'Send Message', '', '', 1, 1),
('contact', 'form_description', 'Sorularınız ve talepleriniz için formu doldurun, en kısa sürede size dönüş yapalım.', 'Fill out the form for your questions and requests, we will get back to you as soon as possible.', '', '', 2, 1),
('contact', 'field_name', 'Adınız Soyadınız', 'Your Full Name', '', '', 3, 1),
('contact', 'field_email', 'E-posta Adresiniz', 'Your Email', '', '', 4, 1),
('contact', 'field_phone', 'Telefon Numaranız', 'Your Phone', '', '', 5, 1),
('contact', 'field_company', 'Firma Adı', 'Company Name', '', '', 6, 1),
('contact', 'field_service', 'Hizmet Seçimi', 'Service Selection', '', '', 7, 1),
('contact', 'field_message', 'Mesajınız', 'Your Message', '', '', 8, 1),
('contact', 'button_send', 'Gönder', 'Send', '', '', 9, 1),
('contact', 'info_title', 'İletişim Bilgileri', 'Contact Information', '', '', 10, 1),
('contact', 'info_address', 'Adres', 'Address', '', '', 11, 1),
('contact', 'info_phone', 'Telefon', 'Phone', '', '', 12, 1),
('contact', 'info_email', 'E-posta', 'Email', '', '', 13, 1),
('contact', 'info_hours', 'Çalışma Saatleri', 'Working Hours', '', '', 14, 1),
('contact', 'social_title', 'Sosyal Medya', 'Social Media', '', '', 15, 1)
ON DUPLICATE KEY UPDATE title_tr = VALUES(title_tr), title_en = VALUES(title_en), content_tr = VALUES(content_tr), content_en = VALUES(content_en), is_active = 1;

-- TÜMÜNÜ AKTİFLEŞTİR
UPDATE page_sections SET is_active = 1;

SELECT 'BAŞARILI! Tüm içerikler eklendi!' as SONUC;
