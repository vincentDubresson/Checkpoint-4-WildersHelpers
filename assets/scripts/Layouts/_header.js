if (document.getElementById('burger-menu')) {

    const burgerMenu = document.getElementById('burger-menu');

    burgerMenu.addEventListener('click', () => {
        const flexibleMenu = document.getElementById('flexible-menu');
        const firstSpan = document.getElementById('first-line');
        const secondSpan = document.getElementById('not-cross');
        const thirdSpan = document.getElementById('third-line');
        firstSpan.classList.toggle('first-line');
        secondSpan.classList.toggle('not-cross');
        thirdSpan.classList.toggle('third-line');
        flexibleMenu.classList.toggle('header-menu-display');
    });

};
