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
