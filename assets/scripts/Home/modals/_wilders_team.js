if (document.querySelectorAll('.carousel-picture-general-style')) {

    const polaroids = document.querySelectorAll('.carousel-picture-general-style');
    //const texts = document.querySelectorAll('.carousel-text');
    const clickZone = document.getElementById('wilders-team-polaroids-content');


    let i = 1;
    clickZone.addEventListener('click', () => {
        polaroids.forEach(pola => {
            if (pola.classList.contains('wilder-' + i)) {
                console.log('ok');
                pola.classList.add('z-index-1');
                i++;
                if (pola.classList.contains('wilder-17')) {
                    polaroids.forEach(pola => {
                        pola.classList.remove('z-index-1');
                    });
                    i = 1;
                }
            }
        });
    });

    /* let i = 1;
    clickZone.addEventListener('click', () => {
        polaroids.forEach(pola => {
            texts.forEach(text => {
                if (pola.classList.contains('picture-' + i) && text.classList.contains('picture-' + i)) {
                    pola.classList.add('z-index-1');
                    text.classList.add('z-index-0');
                    i++;
                    if (pola.classList.contains('picture-18') && text.classList.contains('picture-18')) {
                        polaroids.forEach(pola => {
                            pola.classList.remove('z-index-1');
                        });
                        texts.forEach(text => {
                            text.classList.remove('z-index-0');
                        })
                        i = 1;
                    }
                }
            })
        });
    }); */
}