const tanyaQA = document.querySelectorAll(".tanya-QA");
console.log(tanyaQA);
const jawabQA = document.querySelectorAll(".jawab-QA");
console.log(jawabQA);


tanyaQA.forEach((tanyaQAS, index) => {
    tanyaQAS.addEventListener("click", () => {
        if (jawabQA[index]) {
            jawabQA[index].classList.toggle("hidden");
        }
    });
});

// subscribeBasic.addEventListener("click", function () {
//     localStorage.setItem("subscriptionType", "Basic");
// });
// subscribeStandar.addEventListener("click", function () {
//     localStorage.setItem("subscriptionType", "Standar");
// });
// subscribePremium.addEventListener("click", function () {
//     localStorage.setItem("subscriptionType", "Premium");
// });
