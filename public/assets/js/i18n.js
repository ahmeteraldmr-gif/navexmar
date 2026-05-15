// ==========================================
// INTERNATIONALIZATION (i18n) SYSTEM
// Çoklu dil desteği - TR/EN
// ==========================================

const translations = {
    tr: {
        // Navigation
        'nav.home': 'Ana Sayfa',
        'nav.approach': 'Yaklaşımımız',
        'nav.services': 'Hizmetler',
        'nav.policies': 'Politikalarımız',
        'nav.contact': 'İletişim',
        'nav.admin': 'Yönetim',
        
        // Common
        'common.readMore': 'Daha Fazla Bilgi',
        'common.contact': 'İletişim',
        'common.send': 'Gönder',
        'common.save': 'Kaydet',
        'common.cancel': 'İptal',
        'common.delete': 'Sil',
        'common.edit': 'Düzenle',
        'common.add': 'Ekle',
        'common.close': 'Kapat',
        
        // Contact Form
        'contact.sendMessage': 'Mesaj Gönderin',
        'contact.formDesc': 'Sorularınız ve talepleriniz için formu doldurun, en kısa sürede size dönüş yapalım.',
        'contact.required': '*',
        
        // Footer
        'footer.menu': 'Menü',
        'footer.contact': 'İletişim',
        'footer.location': 'Hatay, Türkiye',
        'footer.workingHours': 'Çalışma Saatleri',
        'footer.copyright': 'Tüm Hakları Saklıdır.'
    },
    en: {
        // Navigation
        'nav.home': 'Home',
        'nav.approach': 'Our Approach',
        'nav.services': 'Services',
        'nav.policies': 'Policies',
        'nav.contact': 'Contact',
        'nav.admin': 'Admin',
        
        // Common
        'common.readMore': 'Read More',
        'common.contact': 'Contact',
        'common.send': 'Send',
        'common.save': 'Save',
        'common.cancel': 'Cancel',
        'common.delete': 'Delete',
        'common.edit': 'Edit',
        'common.add': 'Add',
        'common.close': 'Close',
        
        // Contact Form
        'contact.sendMessage': 'Send Message',
        'contact.formDesc': 'Fill out the form for your questions and requests, we will get back to you as soon as possible.',
        'contact.required': '*',
        
        // Footer
        'footer.menu': 'Menu',
        'footer.contact': 'Contact',
        'footer.location': 'Hatay, Turkey',
        'footer.workingHours': 'Working Hours',
        'footer.copyright': 'All Rights Reserved.'
    }
};

// Current language
let currentLang = window.CURRENT_LANG || localStorage.getItem('language') || 'tr';

// Get translation function
function t(key) {
    return translations[currentLang][key] || key;
}

// Set language function
function setLanguage(lang) {
    currentLang = lang;
    localStorage.setItem('language', lang);
    document.documentElement.lang = lang;
    
    // Sunucudaki session'ı güncelle ve sayfayı yenile
    const baseUrl = window.BASE_URL || (window.location.origin + window.location.pathname.split('/public')[0] + '/public');
    window.location.href = baseUrl + '/lang/' + lang;
}

// Translate all elements with data-i18n attribute
function translatePage() {
    document.querySelectorAll('[data-i18n]').forEach(element => {
        const key = element.getAttribute('data-i18n');
        if (translations[currentLang] && translations[currentLang][key]) {
            const translation = translations[currentLang][key];
            
            if (element.tagName === 'INPUT') {
                if (element.type === 'submit' || element.type === 'button') {
                    element.value = translation;
                } else if (element.hasAttribute('data-i18n-placeholder')) {
                    element.placeholder = translation;
                }
            } else if (element.tagName === 'TEXTAREA') {
                if (element.getAttribute('data-i18n-placeholder')) {
                    element.placeholder = translation;
                }
            } else if (element.tagName === 'BUTTON') {
                const icon = element.querySelector('i');
                if (icon) {
                    element.innerHTML = icon.outerHTML + ' ' + translation;
                } else {
                    element.textContent = translation;
                }
            } else {
                const originalHTML = element.innerHTML;
                const tempDiv = document.createElement('div');
                tempDiv.innerHTML = originalHTML;
                const icons = tempDiv.querySelectorAll('i');
                
                if (icons.length > 0) {
                    const iconHTMLs = Array.from(icons).map(icon => icon.outerHTML);
                    if (originalHTML.trim().startsWith('<i')) {
                        element.innerHTML = iconHTMLs.join(' ') + ' ' + translation;
                    } else {
                        element.innerHTML = translation + ' ' + iconHTMLs.join(' ');
                    }
                } else {
                    element.textContent = translation;
                }
            }
        }
    });
    
    // Update language selector text
    document.querySelectorAll('.lang-text').forEach(langSpan => {
        langSpan.textContent = currentLang.toUpperCase();
    });
}

// Initialize translation on page load
document.addEventListener('DOMContentLoaded', () => {
    translatePage();
    
    document.querySelectorAll('.lang-option').forEach(option => {
        const newOption = option.cloneNode(true);
        option.parentNode.replaceChild(newOption, option);
        
        newOption.addEventListener('click', (e) => {
            e.preventDefault();
            const lang = newOption.getAttribute('data-lang');
            setLanguage(lang);
        });
    });
});

window.i18n = { t, setLanguage, currentLang };
