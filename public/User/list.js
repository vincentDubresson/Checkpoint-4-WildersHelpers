if (document.getElementById('user-posts-list-demands')) {

    const demandContainer = document.getElementById('user-posts-list-demands');
    const offerContainer = document.getElementById('user-posts-list-offers');
    const allContainer = document.getElementById('user-posts-list-all');
    const demandsList = document.getElementById('user-posts-list-demands-container');
    const offersList = document.getElementById('user-posts-list-offers-container');
    const allList = document.getElementById('user-posts-list-all-container');
    const addPostOpenModalLink = document.getElementById('burger-menu-add-post-link');
    const addPostModal = document.querySelector('.user-list-add-post');
    const flexibleMenu = document.getElementById('flexible-menu');
    const addPostCloseModalIcon = document.getElementById('add-post-modal-close');
    const addPostFormInput = document.querySelectorAll('.add-post-form-input');
    const addPostFormSelect = document.querySelectorAll('.add-post-form-select');
    const addPostFormTextarea = document.querySelector('.add-post-form-textarea');
    const addPostFormFile = document.getElementById('post_posterFile_file');

    demandContainer.addEventListener('click', () => {
        allList.classList.add('display-none');
        demandsList.classList.remove('display-none');
        offersList.classList.add('display-none');
        demandContainer.classList.add('button-evidence');
        offerContainer.classList.remove('button-evidence');
        allContainer.classList.remove('button-evidence');
    });

    offerContainer.addEventListener('click', () => {
        allList.classList.add('display-none');
        offersList.classList.remove('display-none');
        demandsList.classList.add('display-none');
        demandContainer.classList.remove('button-evidence');
        offerContainer.classList.add('button-evidence');
        allContainer.classList.remove('button-evidence');
    });

    allContainer.addEventListener('click', () => {
        allList.classList.remove('display-none');
        offersList.classList.add('display-none');
        demandsList.classList.add('display-none');
        demandContainer.classList.remove('button-evidence');
        offerContainer.classList.remove('button-evidence');
        allContainer.classList.add('button-evidence');
    });

    addPostOpenModalLink.addEventListener('click', () => {
        const firstSpan = document.getElementById('first-line');
        const secondSpan = document.getElementById('not-cross');
        const thirdSpan = document.getElementById('third-line');
        firstSpan.classList.remove('first-line');
        secondSpan.classList.remove('not-cross');
        thirdSpan.classList.remove('third-line');
        addPostModal.classList.add('display-add-post');
        flexibleMenu.classList.remove('header-menu-display');
    });

    addPostCloseModalIcon.addEventListener('click', () => {
        addPostModal.classList.remove('display-add-post');
        addPostFormInput.forEach(input => {
            input.value = '';
        });
        addPostFormSelect.forEach(input => {
            input.value = '';
        });
        addPostFormTextarea.value = '';
        addPostFormFile.value = '';
    })


}