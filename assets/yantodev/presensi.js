/**
 * @Author : yantodev
 * mailto: ekocahyanto007@gmail.com
 * link : http://yantodev.github.io/
 */

let today = new Date();
var todayIn = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
var year = today.getFullYear();
function tampilkanwaktu() { 
        var waktu = new Date(); 
        var sh = waktu.getHours() + "";
        var sm = waktu.getMinutes() + ""; 
        var ss = waktu.getSeconds() + "";
        document.getElementById("clock").innerHTML = (sh.length == 1 ? "0" + sh : sh) + ":" + (sm.length == 1 ? "0" + sm : sm) + ":" + (ss.length == 1 ? "0" + ss : ss);
}
      
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
            text: 'Untuk sat ini menu ini belum tersedia...',
            footer: 'Infomasi mlebih lanjut bisa menghubungi developer!'
    })
        },
        error: function (xhr, ajaxOptions) {
            swal.fire(ajaxOptions, xhr.responseText, "error"); 
            }
        });
}

function showDataPresensi(noReg) {
    $.ajax({
        type:'GET',
        url: 'js/presensiMasuk',
        data: {
            id: noReg,
            dateIn: todayIn
        },
        dataType: 'json',
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
        success: function (response) {
            if (response.length > 0) {
                document.getElementById("data-presensi-masuk").innerHTML = response[0].time_in
                document.getElementById("data-presensi-pulang").innerHTML = response[0].time_out
            } else {
                document.getElementById("data-presensi-masuk").innerHTML = "Belum Presensi"
                document.getElementById("data-presensi-pulang").innerHTML = "Belum Presensi"
            }
        },
        error: function (xhr, ajaxOptions) {
            swal.fire(ajaxOptions, xhr.responseText, "error"); 
            }
        });
    
}

function presensiMasuk(noReg) {
    $.ajax({
        type:'GET',
        url: 'js/presensiMasuk',
        data: {
            id: noReg,
            dateIn: todayIn
        },
        dataType: 'json',
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
        success: function (response) {
            if (response.length > 0) {
                Swal.fire({
                    icon: "warning",
                    title: "Presensi Masuk Gagal!!!",
                    text: "Anda Sudah melakukan presensi",
                    footer: "Infomasi mlebih lanjut bisa menghubungi guru piket"
                })
            } else {
                $.ajax({
                    type: 'GET',
                    url: 'js/getDetailsGukar',
                    data: {
                        nbm: noReg,
                    },
                    dataType: 'json',
                            beforeSend: function(e) {
                                if (e && e.overrideMimeType) {
                                    e.overrideMimeType("application/json;charset=UTF-8");
                                }
                            },
                    success: function (response) {
                       savePresensiMasuk(response[0].nbm, response[0].nama, response[0].status)
                    },
                    error: function (xhr, ajaxOptions) {
                        swal.fire(ajaxOptions, xhr.responseText, "error"); 
                        }
                    });
                
                $.ajax({
                    type: "GET",
                    url: 'js/getMotivation',
                    data: { id: today.getDate() },
                    dataType: 'json',
                    beforeSend: function (e) {
                        if (e && e.overrideMimeType) {
                            e.overrideMimeType("application/json;charset=UTF-8");
                        }
                    },
                    success: function (response) {
                            Swal.fire({
                            icon: "success",
                            title: "Presensi Masuk Berhasil!!!",
                            text: response[0].motivasi,
                            footer: "<p>Jaga Diri dan Keluarga dari Virus Corona Dengan GERMAS.<br/>Info lebih lanjut <a href='https://www.kemenkopmk.go.id/jaga-diri-dan-keluarga-dari-virus-corona-dengan-germas'>Klik Disini</a></p>"
                        })
                    }
                })
            }    
        },
        error: function (xhr, ajaxOptions) {
            swal.fire(ajaxOptions, xhr.responseText, "error"); 
            }
        });
}
    
function presensiPulang(noReg) {
    $.ajax({
        type:'GET',
        url: 'js/presensiPulang',
        data: {
            id: noReg,
            dateIn: todayIn,
        },
        dataType: 'json',
                beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
                },
        success: function (response) {
            if (response[0] == undefined) {
                Swal.fire({
                    icon: "error",
                    title: "Presensi Pulang Gagal!!!",
                    text: "Anda belum melakukan presensi masuk!!",
                    footer: "Infomasi mlebih lanjut bisa menghubungi guru piket"
                })
            }else if (response[0].time_out != "00:00:00") {
                Swal.fire({
                    icon: "warning",
                    title: "Presensi Pulang Gagal!!!",
                    text: "Anda Sudah melakukan presensi",
                    footer: "Infomasi mlebih lanjut bisa menghubungi guru piket"
                })
            } else {
                savePresensiPulang(noReg)
                $.ajax({
                    type:'GET',
                    url: 'js/getDetailsGukar',
                    data: {
                        nbm: noReg,
                    },
                    dataType: 'json',
                            beforeSend: function(e) {
                                if (e && e.overrideMimeType) {
                                    e.overrideMimeType("application/json;charset=UTF-8");
                                }
                            },
                    success: function (response) {
                        Swal.fire({
                        icon: 'success',
                        title: "Presensi Pulang Berhasil!!!",
                        text: `Hai!!! ${response[0].nama} hati-hati dijalan ya..`,
                        footer: 'Tetap patuhi protokol kesehatan ya, see you!!! &#128522'
                })
                    },
                    error: function (xhr, ajaxOptions) {
                        swal.fire(ajaxOptions, xhr.responseText, "error"); 
                        }    
                });
            }
        },
        error: function (xhr, ajaxOptions) {
            swal.fire(ajaxOptions, xhr.responseText, "error"); 
        }
    });
}

function savePresensiMasuk(nbm, nama, status) {
    $.ajax({
        type:'POST',
        url: 'js/insert_DH',
        data: {
            nbm: nbm,
            nama: nama,
            bulan: (today.getMonth() + 1),
            date: today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate(),
            time: today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds(),
            role_id: status,
             year : year
        },
        error: function(xhr, ajaxOptions, thrownError) { 
            swal.fire(ajaxOptions, xhr.responseText ,"error"); 
        }
    })
}

function savePresensiPulang(nbm) {
    $.ajax({
        type:'POST',
        url: 'js/update_DH',
        data: {
            'nbm': nbm,
            'nama': "nama",
            'date': today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate(),
            'time': today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds(),
        },
        error: function(xhr, ajaxOptions, thrownError) { 
            swal.fire(ajaxOptions, xhr.responseText ,"error"); 
        }
    })
}

function izin() {
    Swal.fire({
        title: 'Masukan alasan anda izin',
        input: 'textarea',
        inputAttributes: {
            autocapitalize: 'off'
        },
        showCancelButton: true,
        confirmButtonText: 'Ajukan',
        showLoaderOnConfirm: true,
        preConfirm: (login) => {
            console.log(login);
            return fetch(`//api.github.com/users/${login}`)
                
                .then(response => {
                    if (!response.ok) {
                        throw new Error(response.statusText)
                    }
                    return response.json()
                })
                .catch(error => {
                    Swal.showValidationMessage(`Request failed: ${error}`)
                })
        },
        allowOutsideClick: () => !Swal.isLoading()
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
            title: `${result.value.login}'s avatar`,
                imageUrl: result.value.avatar_url
            })
        }
    })
}
