let autocomplete;
function initAutocomplete(){
    autocomplete = new google.maps.places.Autocomplete(
        document.getElementById('autocompletePickup'),
        {
            types: ['establishment'],
            fields: ['place_id', 'geometry', 'name']
        },
        document.getElementById('autocompleteDropOff'),
        {
            types: ['establishment'],
            fields: ['place_id', 'geometry', 'name']
        }
    );
    autocomplete.addListener('place_changed', onPlaceChanged);
}

function onPlaceChanged(){
    var place =  autocomplete.getPlace();

    if(!place.geometry){
        document.getElementById('autocompletePickup'),placeholder = 'Enter your location';
        document.getElementById('autocompleteDropOff'),placeholder = 'Enter your location';
    }
    else{
        document.getElementById('details').innerHTML = place.name;
    }
}
