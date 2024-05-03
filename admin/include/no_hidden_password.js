function myFunction() {
    var x = document.getElementById("inputPassword4");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}