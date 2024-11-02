document.addEventListener('DOMContentLoaded', () => {
    const showForm = document.querySelector('#form-insert');
    const btnOpen = document.getElementById('btn-open');
    const btnClose = document.getElementById('btn-close');
    const code2 = document.querySelector("#code2");
    const showFormUpdate = document.querySelector('#form-update');
    const btnUpdate = document.getElementById('btn-update');
    const btnCloseUpdate = document.getElementById('btn-close-update');

    btnOpen.addEventListener('click', () => {
        showForm.style.display = "flex";
    })

    btnClose.addEventListener('click', () => {
        showForm.style.display = "none";
    })

    if(showFormUpdate) {
        btnUpdate.addEventListener('click', () => {
            showFormUpdate.style.display = "flex";
        })
    
        btnCloseUpdate.addEventListener('click', () => {
            showFormUpdate.style.display = "none";
        })
    }

    if(code2 && code2.value == 2) {
        showForm.style.display = "flex";
    }
    
    if(code2 && code2.value == 3) {
        showFormUpdate.style.display = "flex";
    }
})
