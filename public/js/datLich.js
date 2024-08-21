document.addEventListener('DOMContentLoaded', function () {
    let currentDate = new Date();
    let formattedDate = currentDate.toISOString().substring(0, 10);
    document.getElementById("date").value = formattedDate;
})
