if (document.getElementById('contact-form-button')) {

    const contactFormButton = document.getElementById('contact-form-button');

    contactFormButton.addEventListener('click', () => {
        alert('Votre message va être envoyé après validation de notre algorythme poussé. Vous serez redirigé vers l\'accueil si notre machine ne tombe pas en panne d\'ici là...');
    });
}