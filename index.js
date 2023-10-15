function showpasswod()
{
    var x = document.getElementById("passwordfield");
    if (x.type === "password") {
        x.type = "text";
        $("#ghost").removeClass("bx bxs-ghost");
        $("#ghost").addClass("bx bx-ghost");
    } else {
        x.type = "password";
        $("#ghost").removeClass("bx bx-ghost");
        $("#ghost").addClass("bx bxs-ghost");
    }

}