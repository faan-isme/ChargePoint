const checkImg = document.getElementById("checkimg");
const imageModal = document.getElementById("imageModal");
const modalCheck = document.getElementById("modalcheck");

checkImg.addEventListener("click", function () {
    modalCheck.src = checkImg.src;
    imageModal.classList.remove("hidden");
    imageModal.classList.add("flex");
});

imageModal.addEventListener("click", function (e) {
    if (!e.target.closest(".max-w-sm")) {
        imageModal.classList.add("hidden");
        imageModal.classList.remove("flex");
    }
});
