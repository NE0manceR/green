<script>
  const products = <?= json_encode($products) ?>;
  console.log(products);
  const with_coord = [];
  const server_url = <?= json_encode(SERVER_URL) ?>;
  const img_path = <?= json_encode(IMG_PATH) ?>;
  const site_url = <?= json_encode(SITE_URL) ?>;

  if (products !== false) {
    products.forEach((item) => {
      if (item.hasOwnProperty('koordynaty')) {
        with_coord.push({
          id: item.id,
          name: item.name,
          link: site_url + item.link,
          price: item.price,
          address: item.list,
          photo: img_path + item.sm_photo,
          position: {
            lat: item.hasOwnProperty('koordynaty') ? +item.koordynaty.split(", ")[0] : 0,
            lng: item.hasOwnProperty('koordynaty') ? +item.koordynaty.split(", ")[1] : 0
          }
        })
      }
    })
  } else {
    Swal.fire({
      icon: 'error',
      title: 'Така комбінація не знайдена'
    })
  }

  const myLatLng = {
    lat: 48.43532259984072,
    lng: 24.52901548123906
  };

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


    with_coord.forEach(function({
      id,
      link,
      name,
      price,
      photo,
      address,
      position
    }) {

      let contentString =
        `<a href="${link}" class="item-card">` +
        '<div class="item-card__img">' +
        `<img src="${photo}" alt="img">` +
        '</div>' +
        ' <h3 class="item-card__title">' +
        `${name}` +
        '</h3>' +
        ' <span class="item-card__location">' +
        `<img class="item-card__location-icon" src="${server_url}style/icons/ic_location.svg" alt="img">` +
        `${address}` +
        '</span>' +
        `<span class="item-card__price">${price} грн</span>` +
        '</a>'


      let infowindow = new google.maps.InfoWindow({
        content: contentString,
      });

      let marker = new google.maps.Marker({
        position: position,
        map,
        title: name,
      });
      marker.addListener("click", () => {
        infowindow.open({
          anchor: marker,
          map,
          shouldFocus: false,
        });
      });

      // marker.addListener("mouseout", () => {
      //   infowindow.open();
      // });
    })

  }

  initMap()
</script>