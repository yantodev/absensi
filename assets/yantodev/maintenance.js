/**
 * @Author : yantodev
 * mailto: ekocahyanto007@gmail.com
 * link : http://yantodev.github.io/
 */
      
function maintenance(nbm) {
    $.ajax({
        type:'GET',
        url: 'js/getDetailsGukar',
        data: {
            nbm: nbm,
        },
        dataType: 'json',
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
        success: function (response) {
            Swal.fire({
            icon: 'info',
            title: `Hai!!!  ${response[0].nama} &#128522`,
            text: 'Mohon maaf untuk menu ini belum tersedia...',
            footer: '<p style="text-align:center;">Infomasi lebih lanjut bisa menghubungi guru piket!<br/>Terima Kasih &#128522</p>'
    })
        },
        error: function (xhr, ajaxOptions) {
            swal.fire(ajaxOptions, xhr.responseText, "error"); 
            }
        });
}

function salary(nbm) {
    $.ajax({
        type:'GET',
        url: 'js/getDetailsGukar',
        data: {
            nbm: nbm,
        },
        dataType: 'json',
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
        success: function (response) {
            Swal.fire({
            icon: 'info',
            title: `Hai!!!  ${response[0].nama} &#128522`,
            text: 'Mohon bersabar menu ini sedang dalam proses...',
            footer: '<p style="text-align:center;">Infomasi lebih lanjut bisa menghubungi <b>bendahara sekolah</b> ya!<br/>Terima Kasih &#128522</p>'
    })
        },
        error: function (xhr, ajaxOptions) {
            swal.fire(ajaxOptions, xhr.responseText, "error"); 
            }
        });
}
