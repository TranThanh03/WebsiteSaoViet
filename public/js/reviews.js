document.addEventListener("DOMContentLoaded", function() {
    let evaluate = document.querySelectorAll("#evaluate");
    
    if(evaluate) {
        evaluate.forEach(element => {
            let elementValue = element.textContent;
            switch(elementValue) {
                case "1":
                    element.innerHTML = `
                                    <span><img src="./public/icons/star-solid.svg" alt="icon"></span>
                                    <span><img src="./public/icons/star-regular.svg" alt="icon"></span>
                                    <span><img src="./public/icons/star-regular.svg" alt="icon"></span>
                                    <span><img src="./public/icons/star-regular.svg" alt="icon"></span>
                                    <span><img src="./public/icons/star-regular.svg" alt="icon"></span>
                                    <span id="totalEvaluate">(50 đánh giá)</span>
                    `;
                    break;
                case "2":
                    element.innerHTML = `
                                    <span><img src="./public/icons/star-solid.svg" alt="icon"></span>
                                    <span><img src="./public/icons/star-solid.svg" alt="icon"></span>
                                    <span><img src="./public/icons/star-regular.svg" alt="icon"></span>
                                    <span><img src="./public/icons/star-regular.svg" alt="icon"></span>
                                    <span><img src="./public/icons/star-regular.svg" alt="icon"></span>
                                    <span id="totalEvaluate">(65 đánh giá)</span>
                    `;
                    break;
                case "3":
                    element.innerHTML = `
                                    <span><img src="./public/icons/star-solid.svg" alt="icon"></span>
                                    <span><img src="./public/icons/star-solid.svg" alt="icon"></span>
                                    <span><img src="./public/icons/star-solid.svg" alt="icon"></span>
                                    <span><img src="./public/icons/star-regular.svg" alt="icon"></span>
                                    <span><img src="./public/icons/star-regular.svg" alt="icon"></span>
                                    <span id="totalEvaluate">(90 đánh giá)</span>
                    `;
                    break;
                case "4":
                    element.innerHTML = `
                                    <span><img src="./public/icons/star-solid.svg" alt="icon"></span>
                                    <span><img src="./public/icons/star-solid.svg" alt="icon"></span>
                                    <span><img src="./public/icons/star-solid.svg" alt="icon"></span>
                                    <span><img src="./public/icons/star-solid.svg" alt="icon"></span>
                                    <span><img src="./public/icons/star-regular.svg" alt="icon"></span>
                                    <span id="totalEvaluate">(122 đánh giá)</span>
                    `;
                    break;
                case "5":
                    element.innerHTML = `
                                    <span><img src="./public/icons/star-solid.svg" alt="icon"></span>
                                    <span><img src="./public/icons/star-solid.svg" alt="icon"></span>
                                    <span><img src="./public/icons/star-solid.svg" alt="icon"></span>
                                    <span><img src="./public/icons/star-solid.svg" alt="icon"></span>
                                    <span><img src="./public/icons/star-solid.svg" alt="icon"></span>
                                    <span id="totalEvaluate">(154 đánh giá)</span>
                    `;
                    break;
            }
        })
    }
})
