<div class="home">
    <div class="contact">
        <div class="contactInfo">
            <h1>Contactez-nous</h1>
            <p>📞 Téléphone : <a href="tel:0123456789">0123456789</a> </p>
            <p>✉️ Email : <a href="mailto:contact@smartbike.com">contact@smartbike.com</a> </p>
            <p>🏢 Adresse : 30-32 Avenue de la République, 94800 Villejuif, France</p>
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d42058.277306962074!2d2.2875336486328064!3d48.78871820000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47e673e24e04a9c3%3A0xc55cb3e676f95321!2sEfrei!5e0!3m2!1sfr!2sfr!4v1734089567433!5m2!1sfr!2sfr" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <form action="index.php?page=contact" method="POST" class="contactForm">
            <div class="formGroup">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" required>
            </div>

            <div class="formGroup">
                <label for="prenom">Prénom</label>
                <input type="text" id="prenom" name="prenom" required>
            </div>

            <div class="formGroup">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="formGroup">
                <label for="message">Message</label>
                <textarea id="message" name="message" rows="5" required></textarea>
            </div>

            <button type="submit">Envoyer</button>
        </form>
    </div>
</div>