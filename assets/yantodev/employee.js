/**
 * @Author : yantodev
 * mailto: ekocahyanto007@gmail.com
 * link : http://yantodev.github.io/
 */

function getDetailEmployees(noId) {
    $.ajax({
        type: 'GET',
        url: url +'/js/getDetailsGukar',
        data: {
            nbm: noId,
        },
        dataType: 'json',
        beforeSend: function (e) {
            if (e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
        },
        success: function (response) {
            console.log("ceck employee")
            console.log(response);
        },
        error: function(xhr, ajaxOptions, thrownError) {
        console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
    }
    })
}