document.addEventListener("DOMContentLoaded", () => {
    const btnControl = document.querySelector('#btn-Control');
    const listDoctor = document.querySelector('.list-doctor');

    btnControl.addEventListener("click", () => {
        if(btnControl.innerHTML.includes('Xem thêm')) {
            listDoctor.style.transform = 'translateY(180px)';
            btnControl.innerHTML = 'Ẩn bớt &uarr;';
        }
        else {
            listDoctor.style.transform = 'none';
            btnControl.innerHTML = 'Xem thêm &darr;';
        }
    })
})