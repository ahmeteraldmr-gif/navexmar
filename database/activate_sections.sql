-- Tüm sections'ları aktif hale getir
USE navexmar;

UPDATE page_sections SET is_active = 1;

SELECT 'Tüm sections aktif hale getirildi!' as message;
