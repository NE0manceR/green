<link rel="stylesheet" href="<?= SERVER_URL ?>style/jquery-ui.css" type="text/css" media="all" />
<link rel="stylesheet" href="<?= SERVER_URL ?>style/select2.min.css" type="text/css" media="all" />
<script src="<?= SERVER_URL ?>js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?= SERVER_URL ?>js/select2.min.js" type="text/javascript"></script>

<style>
  .price-range-block {
    margin: 60px;
  }

  .sliderText {
    width: 40%;
    margin-bottom: 30px;
    border-bottom: 2px solid red;
    padding: 10px 0 10px 0px;
    font-weight: bold;
  }

  .ui-slider-horizontal {
    height: .6em;
  }

  .ui-slider-horizontal {
    margin-bottom: 15px;
    width: 40%;
  }

  .ui-widget-header {
    background: #3FE331;
  }

  .price-range-search {
    width: 40.5%;
    background-color: #f9f9f9;
    border: 1px solid #6e6666;
    min-width: 40%;
    display: inline-block;
    height: 32px;
    border-radius: 5px;
    float: left;
    margin-bottom: 20px;
    font-size: 16px;
  }

  .price-range-field {
    width: 20%;
    min-width: 16%;
    background-color: #f9f9f9;
    border: 1px solid #6e6666;
    color: black;
    font-family: myFont;
    font: normal 14px Arial, Helvetica, sans-serif;
    border-radius: 5px;
    height: 26px;
    padding: 5px;
  }

  .search-results-block {
    position: relative;
    display: block;
    clear: both;
  }

  .price-filter-range {
    width: 90%;
    margin: 0 auto 15px;
  }

  .ui-widget-header {
    background-color: #036A0B;
  }

  .ui-slider-horizontal .ui-slider-handle {
    border-radius: 100%;
    width: 24px;
    height: 24px;
    cursor: grab;
  }

  .ui-slider-horizontal .ui-slider-handle:focus {
    border: none;
  }

  .ui-slider-horizontal .ui-slider-handle::after {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto auto;
    content: "";
    width: 11px;
    height: 11px;
    background-color: #036A0B;
    border-radius: 100%;
    outline: none;
  }

  .ui-slider-horizontal .ui-slider-handle:hover {
    background-color: #c5c5c5;
  }

  .ui-slider-horizontal .ui-slider-handle:focus {
    background-color: #c5c5c5;
  }

  .selection .select2-selection--single {
    padding: 18px 24px;
    height: auto;
    border: 1px solid #C1C1C1;
    border-radius: 30px;
  }

  .map__filter .selection .select2-selection--single .select2-selection__arrow {
    top: 20px;
    right: 16px;
  }
</style>
<?php $products = $this->load->function_in_alias('catalog', '__get_Products', array('limit' => 20)) ?>

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
      <div id="slider-range" class="price-filter-range" name="rangeInput"></div>
      <div class="map__input-wrap">
        <div class="map__input-cover">
          <span>Мін. ціна</span>
          <input type="number" min=0 max="9900" oninput="validity.valid||(value='0');" id="min_price" class=" map__range-input" />
        </div>
        <div class="map__input-cover">
          <span>Макс. ціна</span>
          <input type="number" min=0 max="10000" oninput="validity.valid||(value='10000');" id="max_price" class=" map__range-input" />
        </div>
      </div>

      <span class="map__title">Розташування</span>
      <div class="map__select-wrap">
        <select style="width: 100%;" class="js-example-basic-single" name="state">
          <option value="WY1">Локція1</option>
          <option value="AL">Локція2</option>
          <option value="AL">Локція2
            і
          </option>
          <option value="WY2">Локція</option>
          <option value="WY3">Локція</option>
          <option value="W4">Локція</option>
          <option value="W5Y">Локція</option>
        </select>
      </div>
      <span class="map__title">Розміри будинків</span>
      <div class="map__input-wrap-radio">
        <label class="map__input-radio" for="50">
          <span>50-100м2</span>
          <input id="50" type="checkbox" name="testName1">
        </label>
        <label class="map__input-radio" for="55">
          <span>110-200 м2</span>
          <input id="55" type="checkbox" name="testName1">
        </label>
        <label class="map__input-radio" for="552">
          <span>210-500 м2</span>
          <input id="552" type="checkbox" name="testName1">
        </label>
      </div>

      <span class="map__title">Розміри ділянок</span>
      <div class="map__input-wrap-radio">
        <label class="map__input-radio" for="650">
          <span>До 15 соток</span>
          <input id="650" type="checkbox" name="TestName2">
        </label>
        <label class="map__input-radio" for="655">
          <span>До 50 соток</span>
          <input id="655" type="checkbox" name="TestName2">
        </label>
        <label class="map__input-radio" for="16552">
          <span>Більше 1 га</span>
          <input id="16552" type="checkbox" name="TestName2">
        </label>
        <label class="map__input-radio" for="6552">
          <span>До 1 га</span>
          <input id="6552" type="checkbox" name="TestName2">
        </label>
      </div>

    </div>
    </div>

  </form>
</section>


<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwLJ94dy_JgpTb-uP0QaYfPFFJQmFs4QU&v=3">
</script>

<script>
  const products = <?= json_encode($products) ?>;
  const with_coord = [];
  const server_url = <?= json_encode(SERVER_URL) ?>

  products.forEach((item) => {
    if (item.hasOwnProperty('koordynaty')) {
      with_coord.push({
        id: item.id,
        name: item.name,
        link: server_url + item.link,
        position: {
          lat: item.hasOwnProperty('koordynaty') ? +item.koordynaty.split(", ")[0] : 0,
          lng: item.hasOwnProperty('koordynaty') ? +item.koordynaty.split(", ")[1] : 0
        }
      })
    }
  })

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

    const contentString =
      '<a href="http://green.localhost/catalog/dm00116-diljanka-2" class="item-card">' +
      '<div class="item-card__img">' +
      '<img src="http://green.localhost/images/shopshowcase/2/sm_-10.png" alt="img">' +
      '</div>' +
      ' <h3 class="item-card__title">' +
      '   Ділянка 2' +
      '   </h3>' +
      ' <span class="item-card__location">' +
      '<img class="item-card__location-icon" src="http://green.localhost/style/icons/ic_location.svg" alt="img">' +
      'Яремче, вул. Галицька 13' +
      '</span>' +
      '<span class="item-card__price">567 897 000 грн</span>' +
      '</a>'

    with_coord.forEach(function(item) {

      let infowindow = new google.maps.InfoWindow({
        content: contentString,
      });

      let marker = new google.maps.Marker({
        position: item.position,
        map,
        title: item.name,
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

<script>
  $(document).ready(function() {

    $('#price-range-submit').hide();

    $("#min_price,#max_price").on('change', function() {

      $('#price-range-submit').show();

      var min_price_range = parseInt($("#min_price").val());

      var max_price_range = parseInt($("#max_price").val());

      if (min_price_range > max_price_range) {
        $('#max_price').val(min_price_range);
      }

      $("#slider-range").slider({
        values: [min_price_range, max_price_range]
      });

    });


    $("#min_price,#max_price").on("paste keyup", function() {

      $('#price-range-submit').show();

      var min_price_range = parseInt($("#min_price").val());

      var max_price_range = parseInt($("#max_price").val());

      if (min_price_range == max_price_range) {

        max_price_range = min_price_range + 100;

        $("#min_price").val(min_price_range);
        $("#max_price").val(max_price_range);
      }

      $("#slider-range").slider({
        values: [min_price_range, max_price_range]
      });

    });


    $(function() {
      $("#slider-range").slider({
        range: true,
        orientation: "horizontal",
        min: 0,
        max: 20000000,
        values: [0, 20000000],
        step: 10000,

        slide: function(event, ui) {
          if (ui.values[0] == ui.values[1]) {
            return false;
          }

          $("#min_price").val(ui.values[0]);
          $("#max_price").val(ui.values[1]);
        }
      });

      $("#min_price").val($("#slider-range").slider("values", 0));
      $("#max_price").val($("#slider-range").slider("values", 1));

    });

    $(document).ready(function() {
      $('.js-example-basic-single').select2({
        placeholder: "Локація",
        minimumResultsForSearch: Infinity
      });
    });
  });
</script>