<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-6 offset-lg-3 d-flex flex-column flex-sm-row justify-content-between align-items-center mt-5 py-3" style="border-top: #16a085 2px solid;">
                
                <?php 
                // Footer-Menü (responsive für Desktop und Mobile)
                if (has_nav_menu('footer')) {
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'container'      => false,
                        'menu_class'     => 'footer-menu d-flex flex-row justify-content-between list-unstyled mb-0',
                        'depth'          => 1,
                        'link_before'    => '',
                        'link_after'     => '',
                        'fallback_cb'    => false,
                    ));
                } else {
                    // Fallback falls kein Menü zugewiesen wurde
                    ?>
                    <ul class="footer-menu d-flex flex-row flex-wrap justify-content-between list-unstyled mb-3 mb-sm-0">
                        <li><a href="/" class="footerlink">Home</a></li>
                        <li><a href="datenschutz" class="footerlink">Datenschutz</a></li>
                        <li><a href="https://intern.musikwerk-stuttgart.de" target="_blank" class="footerlink">Intern</a></li>
                        <li><a href="kontakt" class="footerlink">Kontakt</a></li>
                    </ul>
                <?php } ?>
                    
                <div class="d-flex flex-row social-icons justify-content-center mt-3 mt-sm-0">
                    <a href="https://www.facebook.com/musikwerk.stuttgart" target="_blank" class="mx-1">
                        <img src="<?php echo get_stylesheet_directory_uri() . '/img/fb4.png' ?>" width="35" alt="Facebook">
                    </a>
                    <a href="https://www.instagram.com/musikwerk.stuttgart" target="_blank" class="mx-1">
                        <img src="<?php echo get_stylesheet_directory_uri() . '/img/insta.png' ?>" width="35" alt="Instagram">
                    </a>
                    <a href="https://www.youtube.com/channel/UCFCTETiuBqXwtfRiCnhDBCw" target="_blank" class="mx-1">
                        <img src="<?php echo get_stylesheet_directory_uri() . '/img/yt.png' ?>" width="35" alt="YouTube">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php wp_footer(); ?>

</body>
</html>