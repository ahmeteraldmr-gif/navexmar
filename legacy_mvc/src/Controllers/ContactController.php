<?php
/**
 * Contact Controller
 * İletişim sayfası ve form gönderimi için controller
 */

require_once SRC_PATH . '/Controllers/BaseController.php';
require_once SRC_PATH . '/Models/Message.php';
require_once SRC_PATH . '/Models/Page.php';
require_once SRC_PATH . '/Models/HeaderImage.php';
require_once SRC_PATH . '/Models/Setting.php';

class ContactController extends BaseController {
    private $messageModel;
    private $pageModel;
    private $headerImageModel;
    private $settingModel;
    
    public function __construct() {
        parent::__construct();
        $this->messageModel = new Message();
        $this->pageModel = new Page();
        $this->headerImageModel = new HeaderImage();
        $this->settingModel = new Setting();
    }
    
    /**
     * İletişim Sayfası
     */
    public function index() {
        // Sayfa bilgilerini getir
        $page = $this->pageModel->getByKey('contact');
        $headerImage = $this->headerImageModel->getPageHeaderImage('contact');
        
        // Site ayarlarını getir (iletişim bilgileri için)
        $settings = $this->settingModel->getAllSettings();
        $contactInfo = $this->settingModel->getContactInfo();
        
        // Flash mesajı varsa al
        $flash = $this->getFlash();
        
        // View'e veri gönder
        $this->render('pages/contact', [
            'page' => $page,
            'headerImage' => $headerImage,
            'settings' => $settings,
            'contactInfo' => $contactInfo,
            'flash' => $flash,
            'lang' => $this->lang
        ]);
    }
    
    /**
     * İletişim Formu Gönderimi
     */
    public function submit() {
        // CSRF token kontrolü
        $token = $this->post('csrf_token');
        if (!validateCSRFToken($token)) {
            $msg = ($this->lang === 'en') ? 'Invalid request. Please try again.' : 'Geçersiz istek. Lütfen tekrar deneyin.';
            $this->setFlash('error', $msg);
            $this->redirect(url('/iletisim'));
            return;
        }
        
        // Form verilerini al
        $data = [
            'name' => $this->post('name'),
            'email' => $this->post('email'),
            'phone' => $this->post('phone'),
            'company' => $this->post('company'),
            'service' => $this->post('service'),
            'message' => $this->post('message')
        ];
        
        // Validasyon
        $validation = $this->validate($data, [
            'name' => 'required|min:2|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|min:10'
        ]);
        
        if ($validation !== true) {
            $msg = ($this->lang === 'en') ? 'Please fill in all required fields correctly.' : 'Lütfen tüm gerekli alanları doğru şekilde doldurun.';
            $this->setFlash('error', $msg);
            $_SESSION['form_errors'] = $validation;
            $_SESSION['form_data'] = $data;
            $this->redirect(url('/iletisim'));
            return;
        }
        
        // Mesajı kaydet
        $messageId = $this->messageModel->createMessage($data);
        
        if ($messageId) {
            // Başarılı
            $successMsg = ($this->lang === 'en') 
                ? 'Your message has been sent successfully. We will get back to you soon.' 
                : 'Mesajınız başarıyla gönderildi. En kısa sürede size dönüş yapacağız.';
            $this->setFlash('success', $successMsg);
            
            // Form verilerini temizle
            unset($_SESSION['form_data']);
            unset($_SESSION['form_errors']);
        } else {
            // Hata
            $errorMsg = ($this->lang === 'en') 
                ? 'Your message could not be sent. Please try again.' 
                : 'Mesajınız gönderilemedi. Lütfen tekrar deneyin.';
            $this->setFlash('error', $errorMsg);
            $_SESSION['form_data'] = $data;
        }
        
        $this->redirect(url('/iletisim'));
    }
    
    /**
     * E-posta bildirimi gönder (opsiyonel)
     * 
     * @param array $data Mesaj verileri
     */
    private function sendEmailNotification($data) {
        // Mail gönderimi burada yapılabilir
        // PHPMailer veya benzeri kütüphane kullanılabilir
        
        $to = $this->settingModel->get('contact_email_1', 'agency@navexmar.com');
        $subject = 'Yeni İletişim Formu Mesajı - ' . $data['name'];
        $message = "
        Yeni bir iletişim formu mesajı alındı:
        
        İsim: {$data['name']}
        E-posta: {$data['email']}
        Telefon: {$data['phone']}
        Firma: {$data['company']}
        Hizmet: {$data['service']}
        
        Mesaj:
        {$data['message']}
        ";
        
        $headers = "From: noreply@navexmar.com\r\n";
        $headers .= "Reply-To: {$data['email']}\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        
        // mail($to, $subject, $message, $headers);
    }
}
