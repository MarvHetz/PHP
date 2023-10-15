function showpassword()
{
    var x = document.getElementById("passwordfield");
    var y = document.getElementById("passwordfield2");
    if (x.type === "password") {
        x.type = "text";
        y.type = "text";
        $("#ghost").removeClass("bx bxs-ghost");
        $("#ghost").addClass("bx bx-ghost");
        $("#ghost2").removeClass("bx bxs-ghost");
        $("#ghost2").addClass("bx bx-ghost");
    } else {
        x.type = "password";
        y.type = "password";
        $("#ghost").removeClass("bx bx-ghost");
        $("#ghost").addClass("bx bxs-ghost");
        $("#ghost2").removeClass("bx bx-ghost");
        $("#ghost2").addClass("bx bxs-ghost");
    }

}