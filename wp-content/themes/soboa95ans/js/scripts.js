document.addEventListener('DOMContentLoaded', function() {
    // Menu hamburger animation
    const button = document.querySelector('.menu-toggle');
    if (button) {
        button.addEventListener('click', function() {
            const isExpanded = button.getAttribute('aria-expanded') === 'true';
            button.setAttribute('aria-expanded', !isExpanded);
        });
    }


    // Autres initialisations futures...
});
document.addEventListener('DOMContentLoaded', function() {
    // Wrapper le contenu dans la structure Swiper
    const entryContent = document.querySelector('.entry-content');
    if (entryContent) {
        const groups = entryContent.querySelectorAll('.wp-block-group');
        
        // Créer le container Swiper
        const swiperContainer = document.createElement('div');
        swiperContainer.className = 'swiper-container main-swiper';
        const swiperWrapper = document.createElement('div');
        swiperWrapper.className = 'swiper-wrapper';
        
        // Déplacer chaque groupe dans un slide
        groups.forEach(group => {
            const slide = document.createElement('div');
            slide.className = 'swiper-slide';
            slide.appendChild(group);
            swiperWrapper.appendChild(slide);
        });
        
        // Assembler la structure
        swiperContainer.appendChild(swiperWrapper);
        entryContent.appendChild(swiperContainer);
        
        // Initialiser Swiper
        new Swiper('.main-swiper', {
            direction: 'vertical',
            slidesPerView: 1,
            speed: 800,
            mousewheel: true,
            keyboard: {
                enabled: true
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true
            }
        });
    }
});
