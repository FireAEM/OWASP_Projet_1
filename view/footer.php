        <footer>
            <div class="footerContent">
                <div class="footerLogo">
                    <img src="images/logo.png" alt="Square">
                    <span>Square</span>
                </div>
                <div class="footerSocial">
                    <a href="#" class="social-icon">
                        <img src="images/twitter.png" alt="Twitter">
                    </a>
                    <a href="#" class="social-icon">
                        <img src="images/facebook.png" alt="Facebook">
                    </a>
                    <a href="#" class="social-icon">
                        <img src="images/instagram.png" alt="Instagram">
                    </a>
                    <a href="#" class="social-icon">
                        <img src="images/tiktok.png" alt="TikTok">
                    </a>
                </div>
            </div>
            <div class="footerLinks">
                <a href="#">📍 30-32 Av. de la République, 94800 Villejuif</a>
                <a href="tel:0123456789">📞 01 23 45 67 89</a>
            </div>
            <div class="footerCopyright">
                <p>Copyright © <?php echo date('Y'); ?></p>
            </div>
        </footer>

        <script>
            function navigateToProduct(id) {
                window.location = '?page=produit&velo=' + id;
            }

            function stopEventPropagation(event) {
                event.stopPropagation();
        }
        </script>

    </body>
</html>