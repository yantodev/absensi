/**
 * @Author : yantodev
 * mailto: ekocahyanto007@gmail.com
 * link : http://yantodev.github.io/
 */

function addkbm(name, nbm, dates, user) {
    var date = new Date(dates);
    Swal.fire({
        title: `${name}`,
        html: `
        <div>
            <input type="hidden" id="id_peg" class="swal2-input" placeholder="id_peg" value="${nbm}">
            <input type="hidden" id="month" class="swal2-input" placeholder="month" value="${date.getMonth() + 1}">
            <input type="hidden" id="year" class="swal2-input" placeholder="year" value="${date.getFullYear()}">
            <select class="swal2-input" id="jam" name="jam" required>
                <option value="0">--- Pilih Jam Ke ---</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>
            <select id="status" name="status" class="swal2-input" required>
                <option value="0">--- Pilih Status ---</option>
                <option value="1">Mengajar</option>
                <option value="2">Tidak Mengajar</option>
            </select>
            <input type="text" id="keterangan" name="keterangan" class="swal2-input" placeholder="Keterangan">
            <div>
            <small style="color:red;">Diisi jika guru tidak mengajar</small>
            </div>
        </div>
        `,
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Save',
        showLoaderOnConfirm: true,
        preConfirm: () => {
            console.log(user)
            const id_peg = Swal.getPopup().querySelector('#id_peg').value;
            const month = Swal.getPopup().querySelector('#month').value;
            const year = Swal.getPopup().querySelector('#year').value;
            const jam = Swal.getPopup().querySelector('#jam').value;
            const status = Swal.getPopup().querySelector('#status').value;
            const keterangan = Swal.getPopup().querySelector('#keterangan').value;
            if (jam == 0) {
                Swal.fire({
                    icon: "warning",
                    title: "Field Jam wajib disisi!!!",
                })
            } else if (status == 0) {
                Swal.fire({
                icon: "warning",
                title: "Field status wajib disisi!!!",
                })
            } else {
                cekkbm(id_peg,jam,status, dates,month,year,user,keterangan)
            }
        },
        allowOutsideClick: () => !Swal.isLoading()
    })
}
function cekkbm(id_peg,jam,status, dates,month,year,user, keterangan) {
    $.ajax({
        type: "GET",
        url: url + `/piket/cekkbm`,
        data: {
            id_peg: id_peg,
            jam: jam,
            date: dates,
        },
        dataType: "json",
        beforeSend: function(e) {
            if (e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
            }
        },
        success: function (response) {
            console.log(response);
            if (response.length > 0) {
                Swal.fire({
                    icon: "error",
                    title: "Data sudah ada!!!",
                })
            } else {
                adddatakbm(id_peg,jam,status, dates,month,year,user, keterangan)
            }
        }
    })
}
function adddatakbm(id_peg,jam,status, dates,month,year,user, keterangan) {
    $.ajax({
        type: 'POST',
        url: url + `/piket/add_kbm`,
        data: {
            id_peg: id_peg,
            jam: jam,
            status: status,
            date: dates,
            month: month,
            year: year,
            created_by: user,
            keterangan: keterangan,
        },
        dataType: 'json',
        beforeSend: function(e) {
            if (e && e.overrideMimeType) {
            e.overrideMimeType("application/json;charset=UTF-8");
            }
        },
    })
    Swal.fire({
        icon: "success",
        title: "Data berhasil ditambahkan!!!",
    })
    setTimeout(function () {
    window.location.reload(1)
    }, 1000);
}