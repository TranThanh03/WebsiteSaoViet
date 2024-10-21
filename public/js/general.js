document.addEventListener('DOMContentLoaded', function () {
    let liElements = document.querySelectorAll('.menu li a');
    let liIndex =  sessionStorage.getItem("navLiIndex");
    let statusCalendar = sessionStorage.getItem('statusCalendar');
    let iconCalendar = document.querySelector(".icon-calendar");

    if(liIndex != null) {
        liElements.forEach(el => el.parentElement.classList.remove('active'));
        liElements[liIndex].parentElement.classList.add('active');
    }
    
    liElements.forEach((element, index) => {
        element.addEventListener('click', function () {
            sessionStorage.setItem("navLiIndex", index);
        })
    });

    if(statusCalendar && statusCalendar == 'true') {
        const notifiCalendar = document.querySelector(".icon-calendar #notification-calendar");
        notifiCalendar.style.display = "block";
    }

    iconCalendar.addEventListener('click', () => {
        sessionStorage.removeItem('statusCalendar');
    })
});
