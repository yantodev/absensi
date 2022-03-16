/**
 * @Author : yantodev
 * mailto: ekocahyanto007@gmail.com
 * link : http://yantodev.github.io/
 */
function cekAktif(cek) {
    if (cek == 1) {
        return "Aktif"
    } else {
        return "Non Aktif"
    }
}
function cekOption(cek) {
    if (cek == 1) {
        return `<option value="0">Non Aktif</option>`
    } else {
        return `<option value="1">Aktif</option>`
    }
}
function userAccess(userId) {
        fetch(`${url}/user/getUserDetails/${userId}`)
            .then(response => { 
                if (!response.ok) {
                throw new Error(response.statusText)
                }
                return response.json()
            })
            .then(response => {
                Swal.fire({
                    title: 'User Access',
                    html: `
                    <input type="hidden" name="id" id="id" value="${response[0].id}">
                    <table width="100%">
                        <tr>
                            <td>Kepala Sekolah</td>
                            <td>
                                <select class="form-control" id="ks" name="ks">
                                <option value="${response[0].is_ks}">${cekAktif(response[0].is_ks)}</option>
                                ${cekOption(response[0].is_ks)}
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Admin</td>
                            <td>
                                <select class="form-control" id="admin" name="admin">
                                <option value="${response[0].is_admin}">${cekAktif(response[0].is_admin)}</option>
                                ${cekOption(response[0].is_admin)}
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Piket</td>
                            <td>
                                <select class="form-control" id="piket" name="piket">
                                <option value="${response[0].is_piket}">${cekAktif(response[0].is_piket)}</option>
                                ${cekOption(response[0].is_piket)}
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Bendahara</td>
                            <td>
                                <select class="form-control" id="bendahara" name="bendahara">
                                <option value="${response[0].is_bendahara}">${cekAktif(response[0].is_bendahara)}</option>
                                ${cekOption(response[0].is_bendahara)}
                            </select>
                            </td>
                        </tr>
                    </table>
                    `,
                    focusConfirm: false,
                    showCancelButton: true,
                    confirmButtonText: 'Update',
                    showLoaderOnConfirm: true,
                    preConfirm: () => { 
                        const id = Swal.getPopup().querySelector('#id').value
                        const admin = Swal.getPopup().querySelector('#admin').value
                        const ks = Swal.getPopup().querySelector('#ks').value
                        const piket = Swal.getPopup().querySelector('#piket').value
                        const bendahara = Swal.getPopup().querySelector('#bendahara').value
                        $.ajax({
                            type: 'POST',
                            url: url + `/user/update_access`,
                            data: {
                                id: id,
                                ks: ks,
                                admin: admin,
                                piket: piket,
                                bendahara: bendahara
                            },
                            dataType: 'json',
                            beforeSend: function(e) {
                                if (e && e.overrideMimeType) {
                                e.overrideMimeType("application/json;charset=UTF-8");
                                }
                            },
                            success: function () {
                                Swal.fire({
                                    icon: "success",
                                    title: "Data berhasil ditambahkan!!!",
                                    })
                            setTimeout(function () {
                                    window.location.reload(1)
                                }, 1000);
                            }
                        })
                    },
                    allowOutsideClick: () => !Swal.isLoading()
                })
            })
            .catch(error => {
                Swal.showValidationMessage(
                `Request failed: ${error}`
                )
            })
}