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
jQuery(document).ready(function($) {
    const galleries = document.querySelectorAll('.aleure.wp-block-gallery');
    
    galleries.forEach(gallery => {
        const swiperContainer = document.createElement('div');
        swiperContainer.className = 'swiper-container';
        const swiperWrapper = document.createElement('div');
        swiperWrapper.className = 'swiper-wrapper';
        
        gallery.querySelectorAll('figure').forEach(figure => {
            const slide = document.createElement('div');
            slide.className = 'swiper-slide';
            slide.appendChild(figure.cloneNode(true));
            swiperWrapper.appendChild(slide);
        });
        
        swiperContainer.appendChild(swiperWrapper);
        gallery.innerHTML = '';
        gallery.appendChild(swiperContainer);
        
        new Swiper(swiperContainer, {
            slidesPerView: 2,
            spaceBetween: 20,
            loop: true,
                    autoplay: {
                        delay: 5000,
                        disableOnInteraction: false
                    },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            }
        });
        
        // Mise à jour de la configuration Magnific Popup
        $(gallery).magnificPopup({
            delegate: '.wp-block-image img',
            type: 'image',
            gallery: {
                enabled: true
            },
            image: {
                verticalFit: true,
                titleSrc: function(item) {
                    return item.el.attr('alt');
                }
            },
            callbacks: {
                elementParse: function(item) {
                    item.src = item.el.attr('src');
                }
            }
        });
    });
});


