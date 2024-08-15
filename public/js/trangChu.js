document.addEventListener('DOMContentLoaded', function () {
    functionSlide();
    functionSlide_2();
    functionSlide_3();
})

function functionSlide() {
    const subSlide = document.querySelector('.sub-slide');
    const nextBtn = document.querySelector('.control-next');
    const prevBtn = document.querySelector('.control-prev');
    let currentSlide = 0;
    const slides = document.querySelectorAll('.item');
    const totalSlides = slides.length;
    let stopInterval = setInterval(nextSlide, 3000);

    function goToSlide(index) {
        if (index < 0) {
            index = totalSlides - 1;
            subSlide?.classList.remove('sub-slide');
            subSlide?.classList.add('hide-slide')
        } else if (index >= totalSlides) {
            index = 0;
            subSlide?.classList.remove('sub-slide');
            subSlide?.classList.add('hide-slide')
        }
        else {
            subSlide?.classList.remove('hide-slide');
            subSlide?.classList.add('sub-slide');
        }
        subSlide && (subSlide.style.transform = `translateX(-${index * 100}%)`);
        currentSlide = index;
    }

    function nextSlide() {
        clearInterval(stopInterval);
        stopInterval = setInterval(nextSlide, 3000);
        goToSlide(currentSlide + 1);
    }

    function prevSlide() {
        clearInterval(stopInterval);
        stopInterval = setInterval(nextSlide, 3000);
        goToSlide(currentSlide - 1);
    }

    nextBtn.addEventListener('click', nextSlide);
    prevBtn.addEventListener('click', prevSlide);
}

function functionSlide_2() {
    const subList = document.querySelector('#faculty');
    const nextBtn = document.querySelector('#fac-next');
    const prevBtn = document.querySelector('#fac-prev');
    let currentSlide = 0;
    const list = document.querySelectorAll('#sub-faculty');
    const totalSlides = list.length/3 - 1;

    function goToSlide(index) {
        if (index <= 0) {
            prevBtn.style.display = 'none';
            nextBtn.style.display = 'block';
        } else if (index >= totalSlides) {
            nextBtn.style.display = 'none';
            prevBtn.style.display = 'block';
        }
        else {
            prevBtn.style.display = 'block';
            nextBtn.style.display = 'block';
        }
        subList.style.transform = `translateX(-${index * 1110}px)`;
        currentSlide = index;
    }

    function nextSlide() {
        goToSlide(currentSlide + 1);
    }

    function prevSlide() {
        goToSlide(currentSlide - 1);
    }

    nextBtn.addEventListener('click', nextSlide);
    prevBtn.addEventListener('click', prevSlide);
}

function functionSlide_3() {
    const subList = document.querySelector('#doctor');
    const nextBtn = document.querySelector('#doc-next');
    const prevBtn = document.querySelector('#doc-prev');
    let currentSlide = 0;
    const list = document.querySelectorAll('#sub-doctor');
    const totalSlides = list.length/4;

    function goToSlide(index) {
        if (index <= 0) {
            nextBtn.style.display = 'block';
            prevBtn.style.display = 'none';
        } else if (index >= totalSlides - 1) {
            nextBtn.style.display = 'none';
            prevBtn.style.display = 'block';
        }
        else {
            prevBtn.style.display = 'block';
            nextBtn.style.display = 'block';
        }
        subList.style.transform = `translateX(-${index * 1110}px)`;
        currentSlide = index;
    }

    function nextSlide() {
        goToSlide(currentSlide + 1);
    }

    function prevSlide() {
        goToSlide(currentSlide - 1);
    }

    nextBtn.addEventListener('click', nextSlide);
    prevBtn.addEventListener('click', prevSlide);
}