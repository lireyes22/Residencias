function intercambiarDivs() {
    var div1 = document.getElementById("parcial1");
    var div2 = document.getElementById("parcial2");
    if (div1.style.display === "none") {
        div1.style.display = "block";
        div2.style.display = "none";
    } else {
        div1.style.display = "none";
        div2.style.display = "block";
    }
}
