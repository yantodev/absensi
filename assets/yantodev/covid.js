function getCovidData() {
    $.ajax({
        type: "GET",
        url: "https://data.covid19.go.id/public/api/prov.json",
        dataType: "application/json",
        beforeSend: function(e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charset=UTF-8");
                    }
        },
        success: function (data) {
            console.log(data);
        },
        error: function (xhr, ajaxOptions) {
            swal.fire(ajaxOptions, xhr.responseText, "error"); 
            }
    })
}