$ = document.querySelector.bind(document);

btnCloseUser = $(".close-btn__user");
formInsertUser = $(".form__insert-user");
userInsertBtn = $(".user-Insert__btn");

function showFormInsertUser() {
    formInsertUser.classList.add("show");
}
function hidderFormInsertUser() {
    formInsertUser.classList.remove("show");
}

userInsertBtn.addEventListener("click", showFormInsertUser);
btnCloseUser.addEventListener("click", hidderFormInsertUser);
