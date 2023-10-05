let autocomplete;
let map;
let marker;

function initMapAndAutocomplete() {
    autocomplete = new google.maps.places.Autocomplete(
        document.getElementById('autocomplete'), {
        types: ['geocode'], // Restrict the search to geographic locations
    }
    );

    autocomplete.addListener('place_changed', onPlaceChanged);
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: 7.8731, lng: 80.7718 },
        zoom: 8,
    });

    marker = new google.maps.Marker({
        position: { lat: 6.9271, lng: 79.8612 },
        map: map,
        draggable: true,
    });

    // Listen for the marker's dragend event to get the updated coordinates
    google.maps.event.addListener(marker, 'dragend', function () {
        const position = marker.getPosition();
        document.getElementById('latitude').value = position.lat();
        document.getElementById('longitude').value = position.lng();
    });
}

function onPlaceChanged() {
    const place = autocomplete.getPlace();

    if (!place.geometry) {
        // Place details not found for the input
        return;
    }

    // You can access various place details from the 'place' object
    const placeName = place.name;
    const placeAddress = place.formatted_address;
    const placeLatitude = place.geometry.location.lat();
    const placeLongitude = place.geometry.location.lng();

    // Do something with the selected place information (e.g., display it on the page)
    console.log(`Name: ${placeName}`);
    console.log(`Address: ${placeAddress}`);
    console.log(`Latitude: ${placeLatitude}`);
    console.log(`Longitude: ${placeLongitude}`);
}