// Card Paket
const subscriptionType = localStorage.getItem("subscriptionType");
if (subscriptionType) {
    const idPln = document.getElementById("pln");
    const tipeCharger = document.getElementById("tipecharger");
    const textForm = document.getElementById("text-daftar");
    console.log(textForm);
    if (subscriptionType === "standar") {
        idPln.style.display = "none";
        tipeCharger.style.display = "none";
        textForm.style.display = "none";
    } else if (subscriptionType === "premium") {
        tipeCharger.style.display = "none";
        idPln.style.display = "none";
        textForm.style.display = "none";
    }
    localStorage.removeItem("subscriptionType");
}

// Modal Image KTP
const imgKtp = document.getElementById("img-Ktp");
const imageModal = document.getElementById("imageModal");
const modalCheck = document.getElementById("modalcheck");
const preview = document.getElementById("preview");

imgKtp.addEventListener("change", (event) => {
    const [file] = event.target.files;
    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.style.display = "block";
    }
});

preview.addEventListener("click", function () {
    modalCheck.src = preview.src;
    imageModal.classList.remove("hidden");
    imageModal.classList.add("flex");
    imageModal.classList.remove("hidden");
});
imageModal.addEventListener("click", function (e) {
    if (!e.target.closest(".max-w-sm")) {
        imageModal.classList.add("hidden");
    }
});

// Modal Image Charger
const imgCharger = document.getElementById("img-charger");
const modalCharger = document.getElementById("modal-charger");
const checkCharger = document.getElementById("check-charger");
const previewCharger = document.getElementById("preview-charger");

imgCharger.addEventListener("change", (event) => {
    const [file] = event.target.files;
    if (file) {
        previewCharger.src = URL.createObjectURL(file);
        previewCharger.style.display = "block";
    }
});

previewCharger.addEventListener("click", function () {
    checkCharger.src = previewCharger.src;
    modalCharger.classList.remove("hidden");
    modalCharger.classList.add("flex");
    modalCharger.classList.remove("hidden");
});
modalCharger.addEventListener("click", function (e) {
    if (!e.target.closest(".max-w-sm")) {
        modalCharger.classList.add("hidden");
    }
});
