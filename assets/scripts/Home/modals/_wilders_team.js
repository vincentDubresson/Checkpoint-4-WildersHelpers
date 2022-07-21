if (document.querySelectorAll('.carousel-picture-general-style')) {

    const polaroids = document.querySelectorAll('.carousel-picture-general-style');
    const texts = document.querySelectorAll('.carousel-description');
    const clickZone = document.getElementById('wilders-team-polaroids-content');
    const carouselJoke = document.querySelectorAll('.carousel-description-joke');
    const carouselAnswer = document.querySelectorAll('.carousel-description-answer');

    // WildersTeam Carousel
    let i = 1;
    clickZone.addEventListener('click', () => {
        polaroids.forEach(pola => {
            texts.forEach(text => {
                if (pola.classList.contains('wilder-' + i) && text.classList.contains('wilder-' + i)) {
                    pola.classList.add('z-index-2');
                    text.classList.add('z-index-1');
                    i++;
                    if (pola.classList.contains('wilder-17') && text.classList.contains('wilder-17')) {
                        polaroids.forEach(pola => {
                            pola.classList.remove('z-index-2');
                        });
                        texts.forEach(text => {
                            text.classList.remove('z-index-1');
                        })
                        i = 1;
                    }
                }
            })
        });
    });

/*     // API Blagues Fetch
    for (let i = 17; i >= 1; i--) {
        fetch('https://www.blagues-api.fr/api/type/dev/random', {
            headers: {
                'Authorization': `Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX2lkIjoiOTk4OTY1ODY5MTgwODkxMjc3IiwibGltaXQiOjEwMCwia2V5IjoidkVIM1kyZkljUHpaVzlnSnlNZHpjRk1WdFFOYjdPOXlYeTExaHhhZDNvSEVuazkybHYiLCJjcmVhdGVkX2F0IjoiMjAyMi0wNy0xOVQxNDo1NDo1NyswMDowMCIsImlhdCI6MTY1ODI0MjQ5N30.yyP7zSo4ghIgUhYl0E0DLj8hIgA1hEIeztDSJjMIeWE`
            }
        })
        .then(response => response.json())
        .then(data => {
            carouselJoke[i].innerHTML = data.joke;
            carouselAnswer[i].innerHTML = data.answer;
        })
    }; */
}
