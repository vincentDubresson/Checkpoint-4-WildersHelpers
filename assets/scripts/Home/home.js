if (document.getElementById('wilders-team-modal-close')) {

    const wildersTeamLink = document.getElementById('wilders-team-link');
    const flexibleMenu = document.getElementById('flexible-menu');
    const wildersTeamModal = document.querySelector('.wilders-team');
    const wildersTeamModalClose = document.getElementById('wilders-team-modal-close');
    const body = document.getElementById('body');

    wildersTeamLink.addEventListener('click', () => {
        const firstSpan = document.getElementById('first-line');
        const secondSpan = document.getElementById('not-cross');
        const thirdSpan = document.getElementById('third-line');
        firstSpan.classList.remove('first-line');
        secondSpan.classList.remove('not-cross');
        thirdSpan.classList.remove('third-line');
        wildersTeamModal.classList.add('wilders-team-display');
        flexibleMenu.classList.remove('header-menu-display');
        body.classList.add('body-without-overflow');
    });

    wildersTeamModalClose.addEventListener('click', () => {
        wildersTeamModal.classList.remove('wilders-team-display');
        body.classList.remove('body-without-overflow');
    });
}