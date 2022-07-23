if (document.getElementById('burger-menu')) {

    const burgerMenu = document.getElementById('burger-menu');
    const wildersTeamModal = document.querySelector('.wilders-team');
    const body = document.getElementById('body');

    burgerMenu.addEventListener('click', () => {
        const flexibleMenu = document.getElementById('flexible-menu');
        const firstSpan = document.getElementById('first-line');
        const secondSpan = document.getElementById('not-cross');
        const thirdSpan = document.getElementById('third-line');
        firstSpan.classList.toggle('first-line');
        secondSpan.classList.toggle('not-cross');
        thirdSpan.classList.toggle('third-line');
        flexibleMenu.classList.toggle('header-menu-display');
        wildersTeamModal.classList.remove('wilders-team-display');
        body.classList.remove('body-without-overflow');
    });

};
