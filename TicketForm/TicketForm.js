function checkInput()
{
    if ($(".shortdesc").val() != '')
    {
        $("#submit").prop('disabled', false)
    }
    else
    {
        $("#submit").prop('disabled', true)
    }
}