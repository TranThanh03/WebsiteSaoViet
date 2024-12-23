document.addEventListener('DOMContentLoaded', () => {
    const code = document.querySelector('.message #code');

    if(code.value == 0) {
        let count = 3;
        const countDown = document.querySelector('.message #countdown');
        const goHome = document.querySelector('.message #goHome');
        
        goHome.style.display = "block";
        
        countDown.textContent = count;
        
        const interval = setInterval(() => {
            countDown.textContent = --count;
        }, 1000)

        setTimeout(() => {
            clearInterval(interval);
            window.location.href = "index.php";
        }, 3000);
    }
    else {
        const tagH2 = document.querySelector('.message h2');
        const goCalendar = document.querySelector('.message #goCalendar');

        tagH2.style.color = "red";
        goCalendar.style.display = "block";
    }
})