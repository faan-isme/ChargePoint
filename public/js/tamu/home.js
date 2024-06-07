const tanyaQA = document.querySelectorAll(".tanya-QA");
console.log(tanyaQA);
const jawabQA = document.querySelectorAll(".jawab-QA");
console.log(jawabQA);
const subscribeBasic = document.getElementById("subscribe-basic");
console.log(subscribeBasic);
const subscribeStandar = document.getElementById("subscribe-standar");
console.log(subscribeBasic);
const subscribePremium = document.getElementById("subscribe-premium");
console.log(subscribeBasic);

tanyaQA.forEach((tanyaQAS, index) => {
    tanyaQAS.addEventListener("click", () => {
        if (jawabQA[index]) {
            jawabQA[index].classList.toggle("hidden");
        }
    });
});

subscribeBasic.addEventListener("click", function () {
    localStorage.setItem("subscriptionType", "basic");
});
subscribeStandar.addEventListener("click", function () {
    localStorage.setItem("subscriptionType", "standar");
});
subscribePremium.addEventListener("click", function () {
    localStorage.setItem("subscriptionType", "premium");
});
