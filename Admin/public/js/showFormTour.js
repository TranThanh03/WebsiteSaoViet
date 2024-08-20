$ = document.querySelector.bind(document);

btnCloseService = $(".close-btn__service");
formInsertService = $(".form__insert-service");
serviceInsertBtn = $(".service-Insert__btn");

function showFormInsertService() {
    formInsertService.classList.add("show");
}
function hidderFormInsertService() {
    formInsertService.classList.remove("show");
}

serviceInsertBtn.addEventListener("click", showFormInsertService);
btnCloseService.addEventListener("click", hidderFormInsertService);
