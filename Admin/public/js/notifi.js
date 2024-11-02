document.addEventListener('DOMContentLoaded', () => {
    const code = document.querySelector("#code");
    const code2 = document.querySelector("#code2");

    if(code2.value) {
        let url = new URL(window.location.href);
        url.searchParams.delete('code2');
        url.searchParams.delete('full-name');
        url.searchParams.delete('number-phone');
        url.searchParams.delete('email');
        url.searchParams.delete('password');
        url.searchParams.delete('iduser');
        url.searchParams.delete('idaccount');
        window.history.replaceState(null, '', url);
    }

    if(code.value) {
        let url = new URL(window.location.href);
        url.searchParams.delete('message');
        url.searchParams.delete('code');
        url.searchParams.delete('code2');
        url.searchParams.delete('full-name');
        url.searchParams.delete('number-phone');
        url.searchParams.delete('email');
        url.searchParams.delete('password');
        url.searchParams.delete('idTour');
        url.searchParams.delete('idGuide');
        url.searchParams.delete('startDate');
        url.searchParams.delete('endDate');
        url.searchParams.delete('endDate');
        url.searchParams.delete('iduser');
        url.searchParams.delete('idaccount');
        window.history.replaceState(null, '', url);

        const notifi = document.querySelector(".notifi");
        const countdown = document.getElementById("countdown");
        const message =document.getElementById("message");

        let pos = -100;
        notifi.style.opacity = 1;
        const slideDown = setInterval(() => {
            if (pos >= 0) {
                clearInterval(slideDown);
            } else {
                pos += 5;
                notifi.style.top = pos + "px";
            }
        }, 20);

        let width = 0;
        const countdownDuration = 2;
        const interval = 30;
        const totalSteps = countdownDuration * 1000 / interval;

        const countdownTimer = setInterval(() => {
            width += (320 / totalSteps);
            countdown.style.width = width + "px";
            countdown.style.height = "5px";
            
            if(code.value == 0) {
                countdown.style.backgroundColor = "green";
            }
            else {
                message.style.color = "red";
                notifi.style.border = "2px solid red";
                countdown.style.backgroundColor = "red";
            }

            if (width > 320) {
                clearInterval(countdownTimer);

                setTimeout(() => {
                    notifi.style.transition = "opacity 1s";
                    notifi.style.opacity = 0;
                }, 100);
            }
        }, interval);
    }
})
