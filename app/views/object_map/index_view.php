<link rel="stylesheet" href="<?= SERVER_URL ?>style/jquery-ui.css" type="text/css" media="all" />
<link rel="stylesheet" href="<?= SERVER_URL ?>style/select2.min.css" type="text/css" media="all" />
<script src="<?= SERVER_URL ?>js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?= SERVER_URL ?>js/select2.min.js" type="text/javascript"></script>
<script src="<?= SERVER_URL ?>js/sweetalert2@11.js" type="text/javascript"></script>

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

  .swal2-styled.swal2-confirm {
    background-color: #036A0B;
    border-radius: 25px;
    padding: 16px 22px;
    min-width: 100px;
  }
</style>
<?php
$products = $this->load->function_in_alias('catalog', '__get_Products', array('limit' => 100));

$_get = $_GET;
$_GET = [];
$productTmp = $this->load->function_in_alias('catalog', '__get_Products', array('limit' => 100));
$_GET = $_get;

$productsIdInGroup = [];
foreach ($productTmp as $p) {
  $productsIdInGroup[] = $p->id;
}
$filter = $this->load->function_in_alias('catalog', '__get_OptionsToGroup', compact('productsIdInGroup'));

?>

<script>
console.log(<?= json_encode($filter) ?>);
</script>

<?php
function category_icon($name)
{
  switch ($name) {
    case 'Будинки та котеджі':
      return 'style/icons/group/ic_cottages.svg.svg';

    case 'Земельні  ділянки':
      return 'style/icons/group/ic_sun-black.svg';
      break;
    case 'Комерція':
      return 'style/icons/group/ic_commerce.svg.svg';
      break;

    default:
      # code...
      break;
  }
}
?>

<script>
  console.log(<?= json_encode($_get) ?>);
</script>

<section class="map">
  <div class="map__wrap" id="map"></div>
  <form class="map__filter-wrap">
    <div class="map__filter">
      <span class="map__title">Категорія</span>
      <div class="map__group-wrap">

        <?php if ($filter) {
          foreach ($filter as $item) {
            if ($item->name == "Тип об'єкту") {
              foreach ($item->values as $value) {
                $status = '';
                if (isset($_GET[$item->alias]) && is_array($_GET[$item->alias]) && in_array($value->id, $_GET[$item->alias])) {
                  $status = 'checked';
                }
        ?>
                <label class="map__group-btn <?= $status == "checked" ? 'active' : '' ?>" for="<?= $value->name . $value->id ?>">
                  <span class="map__group-text"><?= $value->name ?></span>
                  <img class="map__group-icn" src="<?= SITE_URL . category_icon($value->name) ?>" alt="icons">
                  <input class="group-input" id="<?= $value->name . $value->id ?>" type="checkbox" name="<?= $item->alias ?>[]" value="<?= $value->id ?>" <?= $status ?>>
                </label>
        <?php }
            }
          }
        } ?>

      </div>
      <?php
      /*
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
      */
      ?>


      <?php if ($filter) {
        foreach ($filter as $item) { ?>
          <?php if ($item->name == "Господарство") { ?>
            <span class="map__title"><?= $item->name ?></span>
            <div class="map__select-wrap">
              <select style="width: 100%;" class="js-example-basic-single" name="<?= $item->alias ?>[]" onchange="this.form.submit()">
                <?php foreach ($item->values as $value) {
                  $status = false;
                  if (isset($_GET[$item->alias]) && is_array($_GET[$item->alias]) && in_array($value->id, $_GET[$item->alias])) {
                    $status = true;
                  }
                ?>
                  <option value="<?= $value->id ?>" <?= $status || !$status && trim($value->name) == 'Оберіть господарство' ? 'selected="selected"' : '' ?>>
                    <?= trim($value->name) == 'Оберіть господарство' ? "Усі господарства" : $value->name ?>
                  </option>
                <?php } ?>
              </select>
            </div>
          <?php }  ?>

          <?php if ($item->name !== "Господарство" && $item->name !== "Тип об'єкту" ) { ?>
            <span class="map__title"><?= $item->name ?></span>
            <div class="map__input-wrap-radio">
              <?php foreach ($item->values as $value) {
                $status = '';
                if (isset($_GET[$item->alias]) && is_array($_GET[$item->alias]) && in_array($value->id, $_GET[$item->alias])) {
                  $status = 'checked';
                }
              ?>
                <label class="map__input-radio <?= $status == "checked" ? 'active' : '' ?>" for="<?= $value->name . $value->id ?>">
                  <span class="map__group-text"><?= $value->name ?></span>
                  <input id="<?= $value->name . $value->id ?>" type="checkbox" name="<?= $item->alias ?>[]" value="<?= $value->id ?>" <?= $status ?>>
                </label>
              <?php } ?>
            </div>
          <?php }  ?>
        <?php }  ?>
      <?php } ?>
      <!-- <span class="map__title">Розмір будинків</span>
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
      </div> -->
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
        '<img class="item-card__location-icon" src="http://green.localhost/style/icons/ic_location.svg" alt="img">' +
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