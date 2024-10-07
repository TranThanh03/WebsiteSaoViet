document.addEventListener('DOMContentLoaded', function () {
    const aElement = document.querySelectorAll('.menu a');
    const notifiStatus = document.getElementById('notification-calendar');
    
    aElement.forEach((element, index) => {
        element.addEventListener("click", () => {
            sessionStorage.setItem("navStatus", index);
        })
    });

    let checkStatus = sessionStorage.getItem("navStatus");
    if(checkStatus) {
        aElement[checkStatus].style.backgroundColor = '#45C3D2';
    }

    function getCookie(name) {
        let cookieArr = document.cookie.split(";");
        
        for (let i = 0; i < cookieArr.length; i++) {
            let cookiePair = cookieArr[i].split("=");
            
            if (name == cookiePair[0].trim()) {
                return decodeURIComponent(cookiePair[1]);
            }
        }
        
        return null;
    }

    if(getCookie('status') == 'active') {
        notifiStatus.style.display = 'block';
    }
})