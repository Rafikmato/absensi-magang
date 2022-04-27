const url = document.querySelector('#url').value;
const id = document.querySelector('.id').value;
const getPosition = (posisi) => 
{
    var image = '';
    var map = L.map('map').setView([posisi.coords.latitude,posisi.coords.longitude], 13);
    L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        maxZoom: 18,
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1,
        accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
    }).addTo(map);
    Webcam.snap( function(data_uri) {
        // display results in page
        image = data_uri;
        document.getElementById('results').innerHTML = 
        '<div class="text-center"><img class="img" src="'+data_uri+'"/></div>';
    });
    $.ajax({
        type: "POST",
        url: `${url}/Rest_api/absensi_masuk`,
        data:{
            gambar:image,
            latitude:posisi.coords.latitude,
            longitude:posisi.coords.longitude,
            id_karyawan:id,
        },
        dataType: "JSON",
        success: function (response) {
            console.log(response);
        }
    });
}

const getOut = () =>
{
    $.ajax({
        type: "POST",
        url: `${url}/Rest_api/absensi_keluar`,
        dataType: "JSON",
        success: function (response) {
            console.log(response);
        }
    });
}

const getPosition = async () => 
{
    if(navigator.geolocation)
    {
        navigator.geolocation.getCurrentPosition(getPosition);
    }  
}        