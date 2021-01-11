<button type="button" onclick="getLocation()">Aktifkan Lokasi</button>
<p id="demo"></p>
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