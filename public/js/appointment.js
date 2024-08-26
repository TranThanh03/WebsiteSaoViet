document.addEventListener("DOMContentLoaded", () => {
    const tourCosts = document.getElementById('tour-costs').value;
    const guideCosts = document.getElementById('guide-costs').value;
    const totalPrice = document.getElementById('total-price');

    let valueTourCosts = tourCosts.replace(/\./g, '').replace(/VND/g, '');
    let valueGuideCosts = guideCosts.replace(/\./g, '').replace(/VND/g, '');
    let totalCosts = parseInt(valueTourCosts) + parseInt(valueGuideCosts);
    totalCosts = totalCosts.toLocaleString('vi-VN');

    totalPrice.value = `${totalCosts}VND`;        
})