<?php
/**
 * Service Controller
 * Hizmetler sayfası için controller
 */

require_once SRC_PATH . '/Controllers/BaseController.php';
require_once SRC_PATH . '/Models/Service.php';
require_once SRC_PATH . '/Models/Page.php';
require_once SRC_PATH . '/Models/HeaderImage.php';
require_once SRC_PATH . '/Models/Setting.php';

class ServiceController extends BaseController {
    private $serviceModel;
    private $pageModel;
    private $headerImageModel;
    private $settingModel;
    
    public function __construct() {
        parent::__construct();
        $this->serviceModel = new Service();
        $this->pageModel = new Page();
        $this->headerImageModel = new HeaderImage();
        $this->settingModel = new Setting();
    }
    
    /**
     * Hizmetler Listesi
     */
    public function index() {
        // Sayfa bilgilerini getir
        $page = $this->pageModel->getByKey('services');
        $headerImage = $this->headerImageModel->getPageHeaderImage('services');
        
        // Sayfa bölümlerini getir
        $sections = $this->pageModel->getSections('services');
        
        // Tüm hizmetleri getir
        $services = $this->serviceModel->getAllOrdered($this->lang);
        
        // Site ayarlarını getir
        $settings = $this->settingModel->getAllSettings();
        
        // View'e veri gönder
        $this->render('pages/services', [
            'page' => $page,
            'headerImage' => $headerImage,
            'sections' => $sections,
            'services' => $services,
            'settings' => $settings,
            'lang' => $this->lang
        ]);
    }
    
    /**
     * Hizmet Detay Sayfası
     * 
     * @param string $slug Hizmet slug'ı
     */
    public function detail($slug) {
        // Hizmeti getir
        $service = $this->serviceModel->findBySlug($slug);
        
        if (!$service) {
            // 404 sayfasına yönlendir
            http_response_code(404);
            $this->view('errors/404');
            return;
        }
        
        // Sayfa bilgilerini getir
        $page = $this->pageModel->getByKey('services');
        $headerImage = $this->headerImageModel->getPageHeaderImage('services');
        $settings = $this->settingModel->getAllSettings();
        
        // Diğer hizmetleri getir (ilişkili içerik için)
        $otherServices = $this->serviceModel->getAllOrdered($this->lang);
        // Mevcut hizmeti listeden çıkar
        $otherServices = array_filter($otherServices, function($s) use ($service) {
            return $s['id'] != $service['id'];
        });
        
        // View'e veri gönder
        $this->render('pages/service-detail', [
            'page' => $page,
            'service' => $service,
            'otherServices' => array_slice($otherServices, 0, 3), // En fazla 3 tane göster
            'headerImage' => $headerImage,
            'settings' => $settings,
            'lang' => $this->lang
        ]);
    }
}
