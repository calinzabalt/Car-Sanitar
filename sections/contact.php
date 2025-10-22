<section class="contact-section">
    <div class="container">
        <div class="section-header align-center">
            <h2 class="section-title"><?php echo get_sub_field('section_title');?></h2>
            <p class="section-description"><?php echo get_sub_field('section_description');?></p>
        </div>
        <div class="col-wrapper">
            <div class="loan-info col-50 small-desktop-col-100">
                <div class="loan-inner">
                    <h3 class="loan-title"><?php echo get_sub_field('loan_title');?></h3>
                    <?php echo get_sub_field('loan_content');?>
                </div>
            </div>
            <form class="contact-form col-50 small-desktop-col-100" action="" method="post">
                <?php
                    if (isset($_GET['contact_success'])) : ?>
                        <div class="alert alert-success" style="background-color: #d4edda; color: #155724; padding: 10px; margin-bottom: 20px; border: 1px solid #c3e6cb; border-radius: 4px;">
                            Mulțumim! Mesajul dvs. a fost trimis cu succes. Vă vom contacta în curând.
                        </div>
                    <?php elseif (isset($_GET['contact_error'])) : ?>
                        <div class="alert alert-error" style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 20px; border: 1px solid #f5c6cb; border-radius: 4px;">
                            <?php if ($_GET['contact_error'] === '1') : ?>
                                Vă rugăm să completați toate câmpurile obligatorii corect.
                            <?php else : ?>
                                A apărut o eroare la trimiterea mesajului. Vă rugăm să încercați din nou.
                            <?php endif; ?>
                        </div>
                    <?php endif;
                ?>
                <div class="contact-form-inner">
                    <div class="form-group">
                        <label for="full-name">Nume Complet</label>
                        <input type="text" id="full-name" name="full_name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefon</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Mesaj (opțional)</label>
                        <textarea id="message" name="message" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms">Sunt de acord cu <a href="/termeni-si-conditii" target="_blank">termenii și condițiile</a> și <a href="/politica-de-confidentialitate" target="_blank">politica de confidențialitate</a> a site-ului.</label>
                    </div>
                    <button type="submit" class="cta-button">Contactează-ne</button>
                </div>
            </form>
        </div>
    </div>
</section>