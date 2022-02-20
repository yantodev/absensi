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
            title: `Hai!!!  ${response[0].nama}`,
            text: 'Mohon maaf untuk menu ini belum tersedia...',
            footer: 'Infomasi lebih lanjut bisa menghubungi guru piket! Terima Kasih &#128522'
    })
        },
        error: function (xhr, ajaxOptions) {
            swal.fire(ajaxOptions, xhr.responseText, "error"); 
            }
        });
}
