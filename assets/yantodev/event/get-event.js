/**
 * @Author : yantodev
 * mailto: ekocahyanto007@gmail.com
 * link : http://yantodev.github.io/
 */
function notifyEvent(nbm) {
    $.ajax({
        type:'GET',
        url: url+'/js/getDetailsGukar',
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
            var nama = response[0].nama;
            getEvents(nama);
        },
        error: function (xhr, ajaxOptions) {
            console.log(ajaxOptions, xhr.responseText, "error"); 
            }
        });
}

function cekEvent(eventId, userId) {
    $.ajax({
        type: "GET",
        url: url +`/js/cekEvent/${eventId}`,
        dataType: 'json',
        beforeSend: function (e) {
            if (e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
        },
        success: function (response) {
            if (response[0].time > timeNow) {
                Swal.fire({
                    icon: "warning",
                    title: "Presensi Gagal!!!",
                    text: "Waktu presensi belum dimulai, silahkan lakukan presensi pada "+ response[0].time,
                    footer: "Infomasi lebih lanjut bisa menghubungi guru piket"
                })
            } else {
                eventPresensi(eventId, userId)
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
        console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
        }
    })
}

function eventPresensi(eventId, userId) {
    $.ajax({
        type: 'GET',
        url: url +`/js/getDetailDHEvent/${userId}/${eventId}/${todayIn}`,
        dataType: 'json',
        beforeSend: function (e) {
            if (e && e.overrideMimeType) {
                e.overrideMimeType("application/json;charset=UTF-8");
            }
        },
        success: function (res) {
            if (res.length >= 1) {
                Swal.fire({   
                    icon: "warning",
                    title: "Presensi Gagal!!!",
                    text: "Anda Sudah melakukan presensi",
                    footer: "Infomasi lebih lanjut bisa menghubungi guru piket"
                })
            } else {
                    $.ajax({
                    type: 'POST',
                    url: url+'/js/saveDhEvent',
                    data: {
                        eventId: eventId,
                        userId: userId,
                        status: 'Hadir',
                        date: today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate(),
                    },
                    success: function () {
                            Swal.fire({
                            icon: "success",
                            title: "Presensi Berhasil!!!",
                            text: "Selamat Mengikuti Kegiatan ini",
                            footer: "Infomasi lebih lanjut bisa menghubungi guru piket"
                        })
                    }
                });
            }
        },
        error: function(xhr, ajaxOptions, thrownError) {
        console.log(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
    }
    })
}

function getEvents(name){
    $.ajax({
                type: 'GET',
                url: url+`/js/getEvent`,
                data:{
                    tgl: todayIn
                },
                dataType: 'json',
                beforeSend: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
                success: function (resDate) {
                    if (resDate.length >= 1) {
                        document.getElementById("notif-event").innerHTML = `Hai! ${name} hari ini ada ${resDate.length} kegiatan yang harus kamu hadiri <a href='guru/event/${todayIn}'>Klik Disni</a>`;
                    }
                },
                error: function (xhr, ajaxOptions) {
                console.log(ajaxOptions, xhr.responseText, "error"); 
            }
        })
}