document.addEventListener('DOMContentLoaded', function () {
    const aElement = document.querySelectorAll('.menu a');
    
    aElement.forEach((element, index) => {
        element.addEventListener("click", () => {
            sessionStorage.setItem("navStatus", index);
        })
    });

    let checkStatus = sessionStorage.getItem("navStatus");
    if(checkStatus) {
        aElement[checkStatus].style.backgroundColor = '#45C3D2';
    }
    
    totalNotification();
})

function totalNotification() {
    const subContents = document.querySelectorAll('.sub-content');
    const totalCalendarValue = document.getElementById('totalCalendar');
    totalCalendarValue.textContent = subContents.length;

    if(subContents.length > 0) {
        const notificationCalendar = document.querySelector('#notification-calendar');
        notificationCalendar.textContent = subContents.length;
    }
}