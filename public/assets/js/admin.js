// ==========================================
// NAVEXMAR ADMIN PANEL - API-Based Management
// ==========================================

// Base URL for API calls
// Base URL for API calls - Automatically detect from current URL
const getBaseUrl = () => {
    const path = window.location.pathname;
    if (path.includes('/public/admin')) {
        return window.location.origin + path.split('/admin')[0];
    }
    return window.location.origin;
};

const BASE_URL = typeof window.PHP_BASE_URL !== 'undefined' ? window.PHP_BASE_URL : getBaseUrl();

// ==========================================
// SIDEBAR TOGGLE LOGIC
// ==========================================
document.addEventListener('DOMContentLoaded', () => {
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.querySelector('.admin-sidebar');
    
    if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener('click', (e) => {
            e.stopPropagation();
            if (window.innerWidth <= 1024) {
                sidebar.classList.toggle('active');
            } else {
                sidebar.classList.toggle('collapsed');
            }
        });

        // Close sidebar on mobile when clicking outside
        document.addEventListener('click', (e) => {
            if (window.innerWidth <= 1024 && 
                sidebar.classList.contains('active') && 
                !sidebar.contains(e.target) && 
                !sidebarToggle.contains(e.target)) {
                sidebar.classList.remove('active');
            }
        });
    }
});

// ==========================================
// UTILITY FUNCTIONS
// ==========================================

// Show alert message
function showAlert(message, type = 'success') {
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type}`;
    alertDiv.innerHTML = `
        <i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-circle'}"></i>
        ${message}
    `;
    
    const content = document.querySelector('.admin-content');
    if (content) {
        content.insertBefore(alertDiv, content.firstChild);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            alertDiv.remove();
        }, 5000);
    }
}

// ==========================================
// SERVICES MANAGEMENT
// ==========================================

// Service Modal Elements
let serviceModal, serviceForm, modalTitle;
let currentServiceId = null;

// Initialize Services Page
if (document.getElementById('serviceModal')) {
    console.log('Service modal found, initializing...');
    serviceModal = document.getElementById('serviceModal');
    serviceForm = document.getElementById('serviceForm');
    modalTitle = document.getElementById('modalTitle');
    
    // Add Service Button
    document.getElementById('addServiceBtn')?.addEventListener('click', () => {
        console.log('Add service button clicked');
        openServiceModal();
    });
    
    // Edit Service Buttons
    const editButtons = document.querySelectorAll('.edit-service');
    console.log('Edit buttons found:', editButtons.length);
    editButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const serviceId = this.dataset.id;
            console.log('Edit button clicked, service ID:', serviceId);
            loadServiceForEdit(serviceId);
        });
    });
    
    // Delete Service Buttons
    document.querySelectorAll('.delete-service').forEach(btn => {
        btn.addEventListener('click', function() {
            const serviceId = this.dataset.id;
            deleteService(serviceId);
        });
    });
    
    // Save Service Button
    document.getElementById('saveServiceBtn')?.addEventListener('click', () => {
        saveService();
    });
    
    // Close Modal Buttons
    document.querySelectorAll('.modal-close').forEach(btn => {
        btn.addEventListener('click', () => {
            closeServiceModal();
        });
    });
    
    // Close modal on outside click
    serviceModal.addEventListener('click', (e) => {
        if (e.target === serviceModal) {
            closeServiceModal();
        }
    });
    
    // Feature buttons
    document.getElementById('addFeatureTr')?.addEventListener('click', () => {
        addFeatureInput('featuresTr', 'tr');
    });
    
    document.getElementById('addFeatureEn')?.addEventListener('click', () => {
        addFeatureInput('featuresEn', 'en');
    });
}

// Open service modal (for add or edit)
function openServiceModal(service = null) {
    currentServiceId = service?.id || null;
    
    if (service) {
        modalTitle.textContent = 'Hizmeti Düzenle';
        document.getElementById('serviceId').value = service.id;
        document.getElementById('serviceName').value = service.name;
        document.getElementById('serviceNameEn').value = service.name_en;
        document.getElementById('serviceIcon').value = service.icon || '';
        document.getElementById('serviceDescription').value = service.description;
        document.getElementById('serviceDescriptionEn').value = service.description_en;
        
        // Load features
        loadFeatures(service.features, 'featuresTr', 'tr');
        loadFeatures(service.features_en, 'featuresEn', 'en');
    } else {
        modalTitle.textContent = 'Yeni Hizmet Ekle';
        serviceForm.reset();
        document.getElementById('featuresTr').innerHTML = '';
        document.getElementById('featuresEn').innerHTML = '';
        addFeatureInput('featuresTr', 'tr');
        addFeatureInput('featuresEn', 'en');
    }
    
    serviceModal.style.display = 'flex';
}

// Close service modal
function closeServiceModal() {
    serviceModal.style.display = 'none';
    serviceForm.reset();
    currentServiceId = null;
}

// Load service for editing
async function loadServiceForEdit(serviceId) {
    console.log('Loading service for edit:', serviceId);
    
    // We need to fetch full service data via API
    try {
        const url = `${BASE_URL}/admin/services/get/${serviceId}`;
        console.log('Fetching from:', url);
        const response = await fetch(url);
        console.log('Response status:', response.status, response.ok);
        
        if (!response.ok) {
            throw new Error(`HTTP error! status: ${response.status}`);
        }
        
        const data = await response.json();
        console.log('Data received:', data);
        
        if (data.success && data.data) {
            console.log('Opening modal with API data');
            openServiceModal(data.data);
        } else {
            throw new Error('Invalid API response');
        }
    } catch (error) {
        console.error('Error loading service, using fallback:', error);
        
        // Fallback: Sayfayı yeniden yükle ve düzenlemeyi farklı şekilde yap
        alert('Hizmet bilgileri yüklenemedi. Lütfen sayfayı yenileyin veya yöneticinize başvurun.\n\nHata: ' + error.message);
        
        // Alternatif: Yine de modalı aç ama boş
        openServiceModal({
            id: serviceId,
            name: '',
            name_en: '',
            description: '',
            description_en: '',
            icon: '',
            features: [],
            features_en: []
        });
    }
}

// Save service (create or update)
async function saveService() {
    const formData = new FormData(serviceForm);
    
    // Get features
    const featuresTr = Array.from(document.querySelectorAll('#featuresTr input'))
        .map(input => input.value)
        .filter(val => val.trim() !== '');
    
    const featuresEn = Array.from(document.querySelectorAll('#featuresEn input'))
        .map(input => input.value)
        .filter(val => val.trim() !== '');
    
    const serviceData = {
        name: formData.get('name'),
        name_en: formData.get('name_en'),
        icon: formData.get('icon'),
        description: formData.get('description'),
        description_en: formData.get('description_en'),
        features: featuresTr,
        features_en: featuresEn
    };
    
    if (currentServiceId) {
        serviceData.id = currentServiceId;
    }
    
    try {
        const url = currentServiceId 
            ? `${BASE_URL}/admin/services/update`
            : `${BASE_URL}/admin/services/create`;
        
        const response = await fetch(url, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(serviceData)
        });
        
        const data = await response.json();
        
        if (data.success) {
            showAlert(data.message, 'success');
            closeServiceModal();
            setTimeout(() => location.reload(), 1000);
        } else {
            showAlert(data.message, 'error');
        }
    } catch (error) {
        console.error('Error saving service:', error);
        showAlert('Bir hata oluştu.', 'error');
    }
}

// Delete service
async function deleteService(serviceId) {
    if (!confirm('Bu hizmeti silmek istediğinizden emin misiniz?')) {
        return;
    }
    
    try {
        const response = await fetch(`${BASE_URL}/admin/services/delete/${serviceId}`, {
            method: 'POST'
        });
        
        const data = await response.json();
        
        if (data.success) {
            showAlert(data.message, 'success');
            document.querySelector(`[data-id="${serviceId}"]`).remove();
        } else {
            showAlert(data.message, 'error');
        }
    } catch (error) {
        console.error('Error deleting service:', error);
        showAlert('Bir hata oluştu.', 'error');
    }
}

// Add feature input
function addFeatureInput(containerId, lang) {
    const container = document.getElementById(containerId);
    const div = document.createElement('div');
    div.className = 'feature-input-group';
    div.innerHTML = `
        <input type="text" placeholder="${lang === 'tr' ? 'Özellik ekleyin' : 'Add feature'}">
        <button type="button" class="btn btn-sm btn-danger remove-feature">
            <i class="fas fa-times"></i>
        </button>
    `;
    
    div.querySelector('.remove-feature').addEventListener('click', () => {
        div.remove();
    });
    
    container.appendChild(div);
}

// Load features into inputs
function loadFeatures(features, containerId, lang) {
    const container = document.getElementById(containerId);
    container.innerHTML = '';
    
    if (typeof features === 'string') {
        try {
            features = JSON.parse(features);
        } catch (e) {
            features = [];
        }
    }
    
    if (!Array.isArray(features)) {
        features = [];
    }
    
    if (features.length === 0) {
        addFeatureInput(containerId, lang);
    } else {
        features.forEach(feature => {
            const div = document.createElement('div');
            div.className = 'feature-input-group';
            div.innerHTML = `
                <input type="text" value="${feature}" placeholder="${lang === 'tr' ? 'Özellik' : 'Feature'}">
                <button type="button" class="btn btn-sm btn-danger remove-feature">
                    <i class="fas fa-times"></i>
                </button>
            `;
            
            div.querySelector('.remove-feature').addEventListener('click', () => {
                div.remove();
            });
            
            container.appendChild(div);
        });
    }
}

// ==========================================
// EXPORT FOR CONSOLE USE
// ==========================================
if (typeof window !== 'undefined') {
    window.adminPanel = {
        showAlert,
        saveService,
        deleteService
    };
}
