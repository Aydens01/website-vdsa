// CUSTOM JS

$(function () {

    // Scrolling animation when clicking on spyLink
    $('.spyLink').on('click', function (e) {
        e.preventDefault();
        var hash = this.hash;
        $('html, body').animate({
            scrollTop: $(this.hash).offset().top - $('.navbar').height()
        }, 1000, function () {});
    });
    
});

// NO XSS
function escapeHtml(text) {
    var map = {
        '&': '&amp;',
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        "'": '&#039;'
    };

    return text.replace(/[&<>"']/g, function (m) {
        return map[m];
    });
};

// Ajax request get
function ajaxGet(url, data, callbackSuccess, callbackError) {
    $.ajax({
        type: 'GET',
        url: url,
        timeout: 3000,
        data: data,
        success: function (data) {
            callbackSuccess(data);
        },
        error: function (data) {
            callbackError(data);
        }
    });
};

// Ajax request post
function ajaxPost(url, formData, callbackSuccess, callbackError, isJson) {
    if (isJson) {
        formData = JSON.stringify(formData);
    };

    $.ajax({
        type: 'POST',
        data: formData,
        url: url,
        timeout: 3000,
        processData: false,
        contentType: false,
        success: function (data) {
            callbackSuccess(data);
        },
        error: function (data) {
            callbackError(data);
        }
    });
};