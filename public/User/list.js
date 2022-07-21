if (document.getElementById('user-posts-list-demands')) {

    const demandContainer = document.getElementById('user-posts-list-demands');
    const offerContainer = document.getElementById('user-posts-list-offers');
    const allContainer = document.getElementById('user-posts-list-all');
    const demandsList = document.getElementById('user-posts-list-demands-container');
    const offersList = document.getElementById('user-posts-list-offers-container');

    demandContainer.addEventListener('click', () => {
        demandsList.classList.remove('display-none');
        offersList.classList.add('display-none');
        demandContainer.classList.add('button-evidence');
        offerContainer.classList.remove('button-evidence');
        allContainer.classList.remove('button-evidence');
    });

    offerContainer.addEventListener('click', () => {
        offersList.classList.remove('display-none');
        demandsList.classList.add('display-none');
        demandContainer.classList.remove('button-evidence');
        offerContainer.classList.add('button-evidence');
        allContainer.classList.remove('button-evidence');
    });

    allContainer.addEventListener('click', () => {
        offersList.classList.remove('display-none');
        demandsList.classList.remove('display-none');
        demandContainer.classList.remove('button-evidence');
        offerContainer.classList.remove('button-evidence');
        allContainer.classList.add('button-evidence');
    });

}