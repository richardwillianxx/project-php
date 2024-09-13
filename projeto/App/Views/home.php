<?php

use App\Widgets\BaseWidget;

$breadcumb = [
    [
        'title' => 'Dashboard',
        'url'   => '/home',
    ],
    [
        'title' => 'Dashboard',
        'url'   => false,
    ]
];

BaseWidget::breadcumb('Home', $breadcumb);

?>
    <style>
        gmp-map {
            height: 40rem;
            width: 35%;
            margin: auto;
            border: 2px solid #ddd;
            border-radius: 10px;
        }

        .place-picker-container {
            padding: 20px;
        }

        gmp-advanced-marker {
            border-radius: 50%;
        }

        .container-mapa {
            display: flex;
            width: 100%;
        }
    </style>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('029930d84c0bc83b9357', {
        cluster: 'us2'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('my-event', function(data) {
        alert(JSON.stringify(data));
    });
</script>

<div class='container-mapa'>
    <gmpx-api-loader key="AIzaSyBfEk2DdoQkxXmDs39CRqgCnE-1TTSY6_4" solution-channel="GMP_GE_mapsandplacesautocomplete_v1"></gmpx-api-loader>
    <gmp-map center="37.4219983,-122.084" zoom="17" map-id="DEMO_MAP_ID" id="map">
        <div slot="control-block-start-inline-start" class="place-picker-container">
            <gmpx-place-picker placeholder="Enter an address"></gmpx-place-picker>
        </div>
        <gmp-advanced-marker></gmp-advanced-marker>
    </gmp-map>
</div>
<form action="/gravardados" method="post">
    <input type="submit" value="teste">
</form>

<script src="/assets/plugins/jquery/jquery.min.js"></script>

<script>
    async function init() {
        await customElements.whenDefined('gmp-map');
        await customElements.whenDefined('gmpx-place-picker');
        await customElements.whenDefined('gmp-advanced-marker');

        const map = document.querySelector('gmp-map');
        const marker = document.querySelector('gmp-advanced-marker');
        const placePicker = document.querySelector('gmpx-place-picker');

        map.innerMap.setOptions({
            mapTypeControl: false
        });

        placePicker.addEventListener('gmpx-placechange', () => {
            const place = placePicker.value;

            if (!place.location) {
                window.alert("No details available for input: '" + place.name + "'");
                marker.position = null;
                return;
            }

            if (place.viewport) {
                map.innerMap.fitBounds(place.viewport);
            } else {
                map.center = place.location;
                map.zoom = 24;
            }

            marker.position = place.location;
        });

        try {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    async (position) => {
                        const latitude = position.coords.latitude;
                        const longitude = position.coords.longitude;

                        const userLocation = {
                            lat: latitude,
                            lng: longitude
                        };
                        const correctedLocation = await verifyCoordinates(userLocation);

                        map.center = correctedLocation;
                        map.zoom = 16;
                        marker.position = correctedLocation;
                    },
                    (error) => {
                        console.error("Error obtaining location: " + error.message);
                    }, {
                        enableHighAccuracy: true
                    }
                );
            } else {
                window.alert("Esse navegador não suporta o mapa.");
            }
        } catch (error) {
            console.error("Error: " + error.message);
        }
    }

    async function verifyCoordinates(location) {
        const apiKey = 'AIzaSyBfEk2DdoQkxXmDs39CRqgCnE-1TTSY6_4';
        const url = `https://maps.googleapis.com/maps/api/geocode/json?latlng=${location.lat},${location.lng}&key=${apiKey}`;

        const response = await fetch(url);
        const data = await response.json();

        if (data.status === 'OK') {
            const result = data.results[0].geometry.location;
            console.log("Geocoding result:", result);
            return {
                lat: result.lat,
                lng: result.lng
            };
        } else {
            throw new Error('Geocoding failed: ' + data.status);
        }
    }

    document.addEventListener('DOMContentLoaded', init);
</script>