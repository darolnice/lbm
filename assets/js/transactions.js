$(document).ready(function () {

    if (document.querySelector(".rec")){
        new Index().openLink(document.querySelector(".rec"), 'reclamations');
        $('.back___').on('click', function () {
            $('.trans_opt').fadeIn(500);
            $('.recp_').fadeOut();
            $('.trans_shipp').fadeOut();
        });
    }


    // reception
    $('.recp').on('click', function () {
        $('.trans_opt').fadeOut(800);
        $('.recp_').fadeIn(1000);
    });


    // shipping
    let initmap = function() {
        if ("geolocation" in  navigator){
            navigator.geolocation.getCurrentPosition(position => {
                const latlng = [position.coords.latitude, position.coords.longitude];
                gMapsInit(latlng[0], latlng[1]);
                $('.trans_opt').fadeOut(800);
                $('.trans_shipp').fadeIn(1000);
            });
        }
    }

    $('.ship').on('click', function () {
        initmap();
    });


    function gMapsInit(custlat, cuslng) {
        // ini options
        let options = {
            center: {lat: custlat, lng: cuslng},
            zoom: 3
        }

        // create new map
        map = new google.maps.Map(document.querySelector('.map'), options);

        // custummer marker
        const cus_marker = new google.maps.Marker({
            position: {lat: custlat, lng: cuslng},
            map: map,
            icon: 'http://localhost/projets/lebolma/assets/images/svg/location_on_black_24dp.svg',
        });

        // // del man marker
        // const del_marker = new google.maps.Marker({
        //     position: {lat: 15.42, lng: -0.545},
        //     map: map,
        //     icon: 'http://localhost/projets/lebolma/assets/images/svg/location_on_black_24dp.svg',
        // });

        // imi del info window
        let del_man_div_inf = new google.maps.InfoWindow({
            content: `<h2>Estimation du temps restant, Position en temps reel, vitesse de deplacement</h2>`
        });

        // Add Event listener for del info position
        del_man_div_inf.open(map, cus_marker)
    }
























});