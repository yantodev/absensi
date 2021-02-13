<!DOCTYPE html>

<html>

<head>
    <title>Mendapatkan IP, Browser & OS User Menggunakan Codeigniter</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>

<body>

    <div class="container">
        <h3 align="center">Mendapatkan IP, Browser & OS User Menggunakan Codeigniter</h3>
        <div class="table-responsive" id="demo">
            <button type="button" onclick="getLocation()">Aktifkan Lokasi</button>
            <!-- <p id="demo"></p> -->
        </div>
    </div>

    <script>
        var x = document.getElementById("demo");

        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                x.innerHTML = "Geolocation tidak didukung oleh browser ini.";
            }
        }

        function showPosition(position) {
            x.innerHTML = "Latitude: " + position.coords.latitude +
                "<br>Longitude: " + position.coords.longitude +
                "<br><b>Lokasi Telah Aktif</b>" +
                "<table class='table table-bordered table-striped'>" +
                "<tr>" +
                "<td><b>IP Address</b></td>" +
                "<td><?= $ip_address; ?></td>" +
                "</tr>" +
                "<tr>" +
                "<td><b>Operating System</b></td>" +
                "<td><?= $os; ?></td>" +
                "</tr>" +
                "<tr>" +
                "<td><b>Browser Details</b></td>" +
                "<td><?= $browser . ' - ' . $browser_version; ?></td>" +
                "</tr>" +
                "</table>";
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    x.innerHTML = "User denied the request for Geolocation."
                    break;
                case error.POSITION_UNAVAILABLE:
                    x.innerHTML = "Location information is unavailable."
                    break;
                case error.TIMEOUT:
                    x.innerHTML = "The request to get user location timed out."
                    break;
                case error.UNKNOWN_ERROR:
                    x.innerHTML = "An unknown error occurred."
                    break;
            }
        }
    </script>


</body>

</html>