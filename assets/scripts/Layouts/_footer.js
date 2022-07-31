if (document.getElementById('footer-link')) {

    const footerLink = document.getElementById('footer-link');

    footerLink.addEventListener('mouseover', () => {
        const footerPoo = document.querySelector('.footer-poo');
        footerPoo.classList.add('footer-poo-display');
    });

    footerLink.addEventListener('mouseout', () => {
        const footerPoo = document.querySelector('.footer-poo');
        footerPoo.classList.remove('footer-poo-display');
    });

};