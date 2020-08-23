$(".buttonClick").click(function() {

    $("input[type=text]").each(function() {
        var validated = true;
        if (this.value.length < 8)
            validated = false;
        if (!/\d/.test(this.value))
            validated = false;
        if (!/[a-z]/.test(this.value))
            validated = false;
        if (!/[A-Z]/.test(this.value))
            validated = false;
        if (/[^0-9a-zA-Z]/.test(this.value))
            validated = false;
        $('div').text(validated ? "pass" : "fail");
        // use DOM traversal to select the correct div for this input above
    });
});

function CheckPassword(inputtxt) {
    var passw = /^[A-Za-z]\w{7,14}$/;
    if (inputtxt.value.match(passw)) {
        alert('Correct, try another...')
        return true;
    } else {
        alert('Wrong...!')
        return false;
    }
}