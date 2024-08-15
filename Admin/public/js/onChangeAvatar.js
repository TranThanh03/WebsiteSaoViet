$ = document.querySelector.bind(document);

const avatarImg = $(".avata-img");
const avatarInput = $(".avatar-input-update");

avatarInput.addEventListener("change", () => {
    avatarImg.src = URL.createObjectURL(avatarInput.files[0]);
});
