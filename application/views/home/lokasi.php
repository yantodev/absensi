<!DOCTYPE html>

<html>

<head>
    <title>Mendapatkan IP, Browser & OS User Menggunakan Codeigniter</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>

<body>

    <div class="container">
        <h3 align="center">Mendapatkan IP, Browser & OS User Menggunakan Codeigniter</h3>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <tr>
                    <td><b>IP Address</b></td>
                    <td><?php echo $ip_address; ?></td>
                </tr>
                <tr>
                    <td><b>Operating System</b></td>
                    <td><?php echo $os; ?></td>
                </tr>
                <tr>
                    <td><b>Browser Details</b></td>
                    <td><?php echo $browser . ' - ' . $browser_version; ?></td>
                </tr>
            </table>
            <button type="button" onclick="getLocation()">Aktifkan Lokasi</button>
            <p id="demo"></p>
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
                "<br><b>Lokasi Telah Aktif</b>";
        }
    </script>

</body>

</html>