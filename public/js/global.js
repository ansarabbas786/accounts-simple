//show the spinner
function showSpiner(clicked_btn) {
    clicked_btn.prop('disabled', true);
    clicked_btn.find('img').removeClass('hide_spinner');
}

//hide the spinner by adding hide_spinner class
function hideSpinner(clicked_btn) {
    clicked_btn.prop('disabled', false);
    clicked_btn.find('img').addClass('hide_spinner')
}

function showMessage(message) {
    $('#notification_text').html('<h1>' + message + '</h1>');
    $('#notification').slideDown();
    hideMessage();
}

function hideMessage() {
    $('#notification').delay(2000).slideUp();
}

function formatNumber(number, length) {
    return ("0000000" + number).slice(-1 * length);
}

