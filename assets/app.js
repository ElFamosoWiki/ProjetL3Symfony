/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.css';

// start the Stimulus application
import './bootstrap';



const myAPIKey = "359953300cb54dc2b26338a792c2d1b6";


import { GeocoderAutocomplete } from '@geoapify/geocoder-autocomplete';

const autocomplete = new GeocoderAutocomplete(
                        document.getElementById("autocomplete"), 
                        myAPIKey, 
                        { /* Geocoder options */ });


let ville;
let rue;
let numero;
let departement;
let region;
let codepostal;
autocomplete.on('select', (location) => {
    if (ville) {
    	ville.remove();
    }
    
    if (location) {
    	ville = location.properties.city;
    	rue = location.properties.street;
    	numero = location.properties.housenumber;
    	departement = location.properties.county;
    	region = location.properties.state;
        codepostal  = location.properties.postcode;

        document.cookie="city="+ ville;
        document.cookie="numero="+ numero;
        document.cookie="departement="+ departement;
        document.cookie="rue="+ rue;
        document.cookie="region="+ region;
        document.cookie="codepostal="+ codepostal;
        console.log(ville);
        console.log(numero);
        console.log(rue);
        console.log(departement);
        console.log(region);
    }
});




autocomplete.on('suggestions', (suggestions) => {
});

document.getElementById('valid').onclick = function() {
    window.location.href = "event?ville=" + ville;
 };
