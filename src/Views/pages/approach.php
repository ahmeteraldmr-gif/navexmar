<?php require VIEWS_PATH . '/components/page-header.php'; ?>

<!-- Approach Content -->
<section class="approach-content">
    <div class="container">
        <div class="approach-intro">
            <h2><?php echo $lang === 'tr' ? 'Farklı Bir Bakış Açısı' : 'A Different Perspective'; ?></h2>
            <p>
                <?php echo $lang === 'tr' 
                    ? 'Navexmar, sektördeki diğer firmalardan farklı bir yaklaşımla gemi bakım ve uluslararası ticaret hizmetleri sunan bir şirkettir. Kuruluşumuzdan bu yana, insan odaklı, tüm ortaklarımızı kapsayan ve her yönüyle entegre bir şirket olmaya çalışıyoruz. Müşterilerimize en iyi hizmeti sunmak için sürekli gelişim ve yenilikçilik ilkelerimizle hareket ediyoruz.'
                    : 'Navexmar is a company that provides ship maintenance and international trade services with a different approach from other companies in the industry. Since our establishment, we have been striving to be a human-oriented company that includes all our partners and is integrated in every aspect. We operate with the principles of continuous improvement and innovation to provide the best service to our customers.';
                ?>
            </p>
        </div>

        <div class="approach-grid">
            <div class="approach-card">
                <i class="fas fa-users"></i>
                <h3><?php echo $lang === 'tr' ? 'İnsan Odaklı' : 'People-Oriented'; ?></h3>
                <p><?php echo $lang === 'tr' 
                    ? 'Çalışanlarımız ve iş ortaklarımızla kurduğumuz güçlü ilişkiler, başarımızın temel taşıdır. Her bireyin değerini bilir ve onların gelişimine katkıda bulunuruz.'
                    : 'The strong relationships we establish with our employees and business partners are the cornerstone of our success. We recognize the value of each individual and contribute to their development.';
                ?></p>
            </div>

            <div class="approach-card">
                <i class="fas fa-handshake"></i>
                <h3><?php echo $lang === 'tr' ? 'Kapsayıcı Ortaklık' : 'Inclusive Partnership'; ?></h3>
                <p><?php echo $lang === 'tr' 
                    ? 'Tüm paydaşlarımızı sürece dahil eder, şeffaf ve dürüst bir iletişim ile uzun vadeli ortaklıklar kurarız. Birlikte başarıya ulaşma inancıyla hareket ederiz.'
                    : 'We involve all our stakeholders in the process, establish long-term partnerships with transparent and honest communication. We act with the belief of achieving success together.';
                ?></p>
            </div>

            <div class="approach-card">
                <i class="fas fa-cogs"></i>
                <h3><?php echo $lang === 'tr' ? 'Entegre Çözümler' : 'Integrated Solutions'; ?></h3>
                <p><?php echo $lang === 'tr' 
                    ? 'Her yönüyle entegre sistemlerimiz sayesinde müşterilerimize kapsamlı ve kesintisiz hizmet sunuyoruz. Tek noktadan tüm ihtiyaçlarınıza çözüm üretiyoruz.'
                    : 'Thanks to our fully integrated systems, we provide comprehensive and uninterrupted service to our customers. We provide solutions to all your needs from a single point.';
                ?></p>
            </div>

            <div class="approach-card">
                <i class="fas fa-lightbulb"></i>
                <h3><?php echo $lang === 'tr' ? 'Yenilikçilik' : 'Innovation'; ?></h3>
                <p><?php echo $lang === 'tr' 
                    ? 'Teknolojik gelişmeleri yakından takip eder, sektördeki yenilikleri hızla adapte ederiz. Sürekli gelişim ve iyileştirme odaklı çalışırız.'
                    : 'We closely follow technological developments and quickly adapt innovations in the industry. We work with a focus on continuous improvement.';
                ?></p>
            </div>

            <div class="approach-card">
                <i class="fas fa-award"></i>
                <h3><?php echo $lang === 'tr' ? 'Kalite ve Güvenilirlik' : 'Quality and Reliability'; ?></h3>
                <p><?php echo $lang === 'tr' 
                    ? 'Verdiğimiz hizmetlerde en yüksek kalite standartlarını benimser, güvenilir ve zamanında teslimat garantisi veririz. Müşteri memnuniyeti önceliğimizdir.'
                    : 'We adopt the highest quality standards in our services, guarantee reliable and on-time delivery. Customer satisfaction is our priority.';
                ?></p>
            </div>

            <div class="approach-card">
                <i class="fas fa-globe"></i>
                <h3><?php echo $lang === 'tr' ? 'Küresel Ağ' : 'Global Network'; ?></h3>
                <p><?php echo $lang === 'tr' 
                    ? 'Dünya çapında geniş tedarikçi ve iş ortağı ağımız sayesinde, her coğrafyada hızlı ve etkili hizmet sunabiliyoruz. Yerel bilgi, global çözümler.'
                    : 'Thanks to our extensive network of suppliers and partners worldwide, we can provide fast and effective service in every geography. Local knowledge, global solutions.';
                ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Mission Vision Section -->
<section class="about-section">
    <div class="container">
        <div class="about-content">
            <h2 style="color: white; text-align: center; margin-bottom: 2rem;">
                <?php echo $lang === 'tr' ? 'Misyon ve Vizyonumuz' : 'Our Mission and Vision'; ?>
            </h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 3rem; margin-top: 2rem;">
                <div style="text-align: center;">
                    <i class="fas fa-bullseye" style="font-size: 3rem; margin-bottom: 1rem;"></i>
                    <h3 style="margin-bottom: 1rem;"><?php echo $lang === 'tr' ? 'Misyonumuz' : 'Our Mission'; ?></h3>
                    <p>
                        <?php echo $lang === 'tr' 
                            ? 'Denizcilik sektöründe en güvenilir iş ortağı olmak, müşterilerimize en yüksek kalitede hizmet sunarak operasyonel verimliliğe ve sürdürülebilir başarıya katkıda bulunmak.'
                            : 'To be the most reliable business partner in the maritime industry, contributing to operational efficiency and sustainable success by providing the highest quality service to our customers.';
                        ?>
                    </p>
                </div>
                <div style="text-align: center;">
                    <i class="fas fa-eye" style="font-size: 3rem; margin-bottom: 1rem;"></i>
                    <h3 style="margin-bottom: 1rem;"><?php echo $lang === 'tr' ? 'Vizyonumuz' : 'Our Vision'; ?></h3>
                    <p>
                        <?php echo $lang === 'tr' 
                            ? 'Bölgesel lider konumumuzu koruyarak, küresel ölçekte tanınan ve tercih edilen bir denizcilik hizmetleri şirketi olmak, sektöre yenilikçi çözümler sunmaya devam etmek.'
                            : 'To maintain our regional leadership position, to become a globally recognized and preferred maritime services company, and to continue providing innovative solutions to the industry.';
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2><?php echo $lang === 'tr' ? 'Bizimle Çalışmak İster Misiniz?' : 'Would You Like to Work With Us?'; ?></h2>
        <a href="<?php echo url('/iletisim'); ?>" class="btn btn-light"><?php echo $lang === 'tr' ? 'İletişime Geçin' : 'Get in Touch'; ?></a>
    </div>
</section>
