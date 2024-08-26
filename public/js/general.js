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
})