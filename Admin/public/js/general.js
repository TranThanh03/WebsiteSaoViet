document.addEventListener('DOMContentLoaded', function () {
    let liElements = document.querySelectorAll('.menu li a');
    let liIndex =  sessionStorage.getItem("navIndex");

    if(liIndex != null) {
        liElements.forEach(el => el.parentElement.classList.remove('active'));
        liElements[liIndex].parentElement.classList.add('active');
    }
    
    liElements.forEach((element, index) => {
        element.addEventListener('click', function () {
            sessionStorage.setItem("navIndex", index);
        })
    });
});
