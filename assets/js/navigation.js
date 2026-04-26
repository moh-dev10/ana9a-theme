document.addEventListener('DOMContentLoaded', () => {
    
    const header = document.querySelector('header');

    if(header) {
        document.addEventListener('scroll', () => {
            header.classList.toggle('scrolled', window.scrollY > 50);
        });
    }
});