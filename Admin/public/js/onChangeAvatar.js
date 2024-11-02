document.addEventListener('DOMContentLoaded', () => { 
    let avatarImg = document.querySelector(".avata-img");
    let avatarInput = document.querySelector(".avatar-input");

    if(avatarImg) {
        avatarInput.addEventListener("change", () => {
            if (avatarInput.files && avatarInput.files[0]) {
                avatarImg.src = URL.createObjectURL(avatarInput.files[0]);
            }
        });
    }
});
