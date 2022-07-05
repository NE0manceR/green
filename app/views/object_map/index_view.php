<!-- <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script> -->

<section class="map">
  <div class="map__wrap" id="map"></div>
  <form class="map__filter-wrap">
    <div class="map__filter">
      <span class="map__title">Категорія</span>
      <div class="map__group-wrap">
        <label class="map__group-btn" for="test1">
          <span class="map__group-text">Земельні ділянки</span>
          <img class="map__group-icn" src="<?= SITE_URL ?>style/icons/group/ic_sun-black.svg.svg" alt="icons">
          <input class="group-input" id="test1" type="radio" name="group">
        </label>

        <label class="map__group-btn" for="test2">
          <span class="map__group-text">Будинки та котеджі</span>
          <img class="map__group-icn" src="<?= SITE_URL ?>style/icons/group/ic_cottages.svg.svg" alt="icons">
          <input class="group-input" id="test2" type="radio" name="group">
        </label>

        <label class="map__group-btn" for="test3">
          <span class="map__group-text">Комерція</span>
          <img class="map__group-icn" src="<?= SITE_URL ?>style/icons/group/ic_commerce.svg.svg" alt="icons">
          <input class="group-input" id="test3" type="radio" name="group">
        </label>
      </div>
      <span class="map__title">Ціна</span>
     
    </div>

    </div>

  </form>
</section>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwLJ94dy_JgpTb-uP0QaYfPFFJQmFs4QU">
</script>
<script>
  const myLatLng = {
    lat: 48.43532259984072,
    lng: 24.52901548123906
  };

  var locations = [{
      id: 1,
      name: 'Локація 1',
      position: {
        lat: 48.43532259984072,
        lng: 24.52901548123906
      }
    },
    {
      id: 2,
      name: 'Локація 2',
      position: {
        lat: 48.33532259984072,
        lng: 24.42901548123906
      }
    },
    {
      id: 3,
      name: 'Локація 3',
      position: {
        lat: 48.23532259984072,
        lng: 24.12901548123906
      }
    }
  ]

  var mapOptions = {
    zoom: 11,
    minZoom: 6,
    panControl: false,
    zoomControl: true,
    mapTypeControl: false,
    scaleControl: false,
    streetViewControl: false,
    overviewMapControl: false,
    rotateControl: false,
    center: myLatLng,
    styles: [{
        "elementType": "labels.text",
        "stylers": [{
          "visibility": "on"
        }]
      },
      {
        "featureType": "landscape.natural",
        "elementType": "geometry.fill",
        "stylers": [{
            "color": "#f5f5f2"
          },
          {
            "visibility": "on"
          }
        ]
      },
      {
        "featureType": "administrative",
        "stylers": [{
          "visibility": "off"
        }]
      },
      {
        "featureType": "transit",
        "stylers": [{
          "visibility": "off"
        }]
      },
      {
        "featureType": "poi.attraction",
        "stylers": [{
          "visibility": "off"
        }]
      },
      {
        "featureType": "landscape.man_made",
        "elementType": "geometry.fill",
        "stylers": [{
            "color": "#ffffff"
          },
          {
            "visibility": "on"
          }
        ]
      },
      {
        "featureType": "poi.business",
        "stylers": [{
          "visibility": "off"
        }]
      },
      {
        "featureType": "poi.medical",
        "stylers": [{
          "visibility": "off"
        }]
      },
      {
        "featureType": "poi.place_of_worship",
        "stylers": [{
          "visibility": "off"
        }]
      },
      {
        "featureType": "poi.school",
        "stylers": [{
          "visibility": "off"
        }]
      },
      {
        "featureType": "poi.sports_complex",
        "stylers": [{
          "visibility": "off"
        }]
      },
      {
        "featureType": "road.highway",
        "elementType": "geometry",
        "stylers": [{
            "color": "#ffffff"
          },
          {
            "visibility": "simplified"
          }
        ]
      },
      {
        "featureType": "road.arterial",
        "stylers": [{
            "visibility": "simplified"
          },
          {
            "color": "#ffffff"
          }
        ]
      },
      {
        "featureType": "road.highway",
        "elementType": "labels.icon",
        "stylers": [{
            "color": "#ffffff"
          },
          {
            "visibility": "off"
          }
        ]
      },
      {
        "featureType": "road.highway",
        "elementType": "labels.icon",
        "stylers": [{
          "visibility": "off"
        }]
      },
      {
        "featureType": "road.arterial",
        "stylers": [{
          "color": "#ffffff"
        }]
      },
      {
        "featureType": "road.local",
        "stylers": [{
          "color": "#ffffff"
        }]
      },
      {
        "featureType": "poi.park",
        "elementType": "labels.icon",
        "stylers": [{
          "visibility": "off"
        }]
      },
      {
        "featureType": "poi",
        "elementType": "labels.icon",
        "stylers": [{
          "visibility": "off"
        }]
      },
      {
        "featureType": "water",
        "stylers": [{
          "color": "#71c8d4"
        }]
      },
      {
        "featureType": "landscape",
        "stylers": [{
          "color": "#e5e8e7"
        }]
      },
      {
        "featureType": "poi.park",
        "stylers": [{
          "color": "#8ba129"
        }]
      },
      {
        "featureType": "road",
        "stylers": [{
          "color": "#ffffff"
        }]
      },
      {
        "featureType": "poi.sports_complex",
        "elementType": "geometry",
        "stylers": [{
            "color": "#c7c7c7"
          },
          {
            "visibility": "off"
          }
        ]
      },
      {
        "featureType": "water",
        "stylers": [{
          "color": "#a0d3d3"
        }]
      },
      {
        "featureType": "poi.park",
        "stylers": [{
          "color": "#91b65d"
        }]
      },
      {
        "featureType": "poi.park",
        "stylers": [{
          "gamma": 1.51
        }]
      },
      {
        "featureType": "road.local",
        "stylers": [{
          "visibility": "off"
        }]
      },
      {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [{
          "visibility": "on"
        }]
      },
      {
        "featureType": "poi.government",
        "elementType": "geometry",
        "stylers": [{
          "visibility": "off"
        }]
      },
      {
        "featureType": "landscape",
        "stylers": [{
          "visibility": "off"
        }]
      },
      {
        "featureType": "road",
        "elementType": "labels",
        "stylers": [{
          "visibility": "off"
        }]
      },
      {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [{
          "visibility": "simplified"
        }]
      },
      {
        "featureType": "road.local",
        "stylers": [{
          "visibility": "simplified"
        }]
      },
      {
        "featureType": "road"
      },
      {
        "featureType": "road"
      },
      {},
      {
        "featureType": "road.highway"
      }
    ]
  }

  function initMap() {
    const map = new google.maps.Map(document.getElementById("map"), mapOptions);

    locations.forEach(function(location) {
      var marker = new google.maps.Marker({
        position: location.position,
        map,
        title: location.name,
      }).addListener("click", () => {
        console.log('location id#' + location.id);
      });
    })

  }

  initMap()
</script>