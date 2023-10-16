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

function inputcheck()
{

    if($('#emailfield').val() != '' && $('#passwordfield').val() != '')
    {
        $('.email').css('border-color','green');
        $('.password').css('border-color','green');
        $('#submit').prop('disabled', false);
    }
    else if($('#emailfield').val() != '' && $('#passwordfield').val() == '')
    {
        $('.email').css('border-color','green');
        $('.password').css('border-color','red');
        $('#submit').prop('disabled', true);
    }
    else
    {
        $('.email').css('border-color','red');
        $('.password').css('border-color','green');
        $('#submit').prop('disabled', true);
    }
}