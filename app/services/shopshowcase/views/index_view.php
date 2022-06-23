<?php
/*
	
<link rel="stylesheet" type="text/css" href="<?=SERVER_URL.'style/'.$_SESSION['alias']->alias.'/index.css'?>">

<main class="container">
  <?php if($this->userCan()) { ?>
  <a href="<?=SERVER_URL?>admin/<?=$_SESSION['alias']->link?>"
     class="pull-right"
     target="_blank"><i class="fas fa-user-cog"></i> Редагувати</a>
  <?php } ?>
  <h1><?=$_SESSION['alias']->name?></h1>
  <?php if(!empty($catalogAllGroups)) { ?>

  <section class="groups">
    <?php foreach ($catalogAllGroups as $group) { ?>
    <figure>
      <?php if($group->photo) { ?>
      <img src="<?=IMG_PATH.$group->photo?>"
           alt="<?=$group->name?>">
      <?php } ?>
      <figcaption>
        <h2><?=$group->name?></h2>
        <?php if($group->list) { ?>
        <p><?=$group->list?></p>
        <?php } ?>
        <a href="<?=SITE_URL.$group->link?>"><?=$group->name?></a>
      </figcaption>
    </figure>
    <?php }
			$addDiv = count($catalogAllGroups) % 3;
			while ($addDiv++ < 3) {
				echo "<figure class='empty'></figure>";
			} ?>
  </section>
  <?php } if(!empty($_SESSION['alias']->text)) { ?>

  <section class="row">
    <h4><?=$_SESSION['alias']->list?></h4>
    <p><?=html_entity_decode($_SESSION['alias']->text)?></p>
  </section>
  <?php } ?>
</main>
*/
?>
<?php

$products = $this->load->function_in_alias('catalog', '__get_Products');
?>
<section class="catalog ">
	<div class="content-block">
		<div class="title-with-link catalog__title-link">
			<h1 class="section-title"><?= $_SESSION['alias']->name ?></h1>
			<span class="show-on-map">
				<a href="">
					<img class="show-on-map__icon" src="<?= SERVER_URL ?>style/icons/ic_location-green.svg" alt="icon">
					<?= $this->text('Переглянути на карті', 0) ?>
				</a>
			</span>
		</div>
		<div class="group catalog__group-wrap">
			<?php $i = 0;
			foreach ($all_g as $item) { ?>
				<a href="<?= SITE_URL . $item->link ?>" class="group__item">
					<img class="group__img-bcg" src="<?= IMG_PATH . $item->photo ?>" alt="img">
					<img class="group__ic" src="<?= SERVER_URL ?>style/icons/group/ic_group-<?= $i ?>.svg" alt="img">
					<span class="group__text"><?= $item->name ?></span>
				</a>
			<?php $i++;
			} ?>
		</div>
	</div>
</section>

<section class="content-block">
	<div class="objects-map ">
		<h2 class="objects-map__title section-title"><?= $this->text('Карта об’єктів', 0) ?></h2>
		<div class="objects-map__map-wrap">
			<div id="map"></div>
		</div>
	</div>
</section>

<section class="search-form">
	<img class="search-form__bcg" src="<?= SERVER_URL ?>style/images/form-bcg.png" alt="img">
	<h3 class="search-form__title content-block">
		<img src="<?= SERVER_URL ?>style/icons/ic_search.svg" alt="icon">
		<?= $this->text('Підібрати об’єкт', 0) ?>
	</h3>
	<div class="content-block search-form__wrap">
		<form action="">
			<input class="input" type="text" placeholder="<?= $this->text('Категорія', 0) ?>" required>
			<input class="input" type="text" placeholder="<?= $this->text('Розташування', 0) ?>">
			<input class="input" type="text" placeholder="<?= $this->text('Бюджет', 0) ?>">
			<input class="input" type="text" placeholder="<?= $this->text('Розмір/Кількість кімнат', 0) ?>">
			<input class="input" type="text" placeholder="<?= $this->text('Цільове призначення', 0) ?>">
			<button type="submit" class="green-btn icon">
				<img src="<?= SERVER_URL ?>style/icons/ic_search.svg" alt="icon">

				<?= $this->text('Підібрати', 0) ?>
			</button>
		</form>
	</div>
</section>

<section class="content-block">
		<div class="item-wrap ">
			<?php
			foreach ($products as $i => $product) {
				if ($i < 9) { ?>
					<div class="item-card">
						<a href="<?= SITE_URL . $product->link ?>" class="item-card__img">
							<img src="<?= IMG_PATH . $product->photo ?>" alt="img">
						</a>
						<h3 class="item-card__title">
							<a href="<?= SITE_URL . $product->link ?>"><?= $product->name ?></a>
							<img class="item-card__heart" src="<?= SERVER_URL ?>style/icons/ic_heart-black.svg" alt="icon">
						</h3>
						<span class="item-card__location">
							<img class="item-card__location-icon" src="<?= SERVER_URL ?>style/icons/ic_location.svg" alt="img">
							<?= $product->list ?>
						</span>
						<span class="item-card__price"><?= number_format($product->price, 0, ' ', ' ')  ?> грн </span>
					</div>

			<?php }
			}
			?>
		</div>

		<div class="item-wrap__btn-wrap">
			<a href="<?= SITE_URL ?>catalog" class="green-btn" type="button"> <?= $this->text('Перейти в каталог', 0) ?>
			</a>
		</div>
</section>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwLJ94dy_JgpTb-uP0QaYfPFFJQmFs4QU"></script>

<script>
	const myLatLng = {lat: 48.43532259984072, lng: 24.52901548123906};

	var locations = [
		{
			id: 1,
			name: 'Локація 1',
			position: {lat: 48.43532259984072, lng: 24.52901548123906}
		},
		{
			id: 2,
			name: 'Локація 2',
			position: {lat: 48.33532259984072, lng: 24.42901548123906}
		},
		{
			id: 3,
			name: 'Локація 3',
			position: {lat: 48.23532259984072, lng: 24.12901548123906}
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
		styles: [
			{
					"elementType": "labels.text",
					"stylers": [
							{
									"visibility": "on"
							}
					]
			},
			{
					"featureType": "landscape.natural",
					"elementType": "geometry.fill",
					"stylers": [
							{
									"color": "#f5f5f2"
							},
							{
									"visibility": "on"
							}
					]
			},
			{
					"featureType": "administrative",
					"stylers": [
							{
									"visibility": "off"
							}
					]
			},
			{
					"featureType": "transit",
					"stylers": [
							{
									"visibility": "off"
							}
					]
			},
			{
					"featureType": "poi.attraction",
					"stylers": [
							{
									"visibility": "off"
							}
					]
			},
			{
					"featureType": "landscape.man_made",
					"elementType": "geometry.fill",
					"stylers": [
							{
									"color": "#ffffff"
							},
							{
									"visibility": "on"
							}
					]
			},
			{
					"featureType": "poi.business",
					"stylers": [
							{
									"visibility": "off"
							}
					]
			},
			{
					"featureType": "poi.medical",
					"stylers": [
							{
									"visibility": "off"
							}
					]
			},
			{
					"featureType": "poi.place_of_worship",
					"stylers": [
							{
									"visibility": "off"
							}
					]
			},
			{
					"featureType": "poi.school",
					"stylers": [
							{
									"visibility": "off"
							}
					]
			},
			{
					"featureType": "poi.sports_complex",
					"stylers": [
							{
									"visibility": "off"
							}
					]
			},
			{
					"featureType": "road.highway",
					"elementType": "geometry",
					"stylers": [
							{
									"color": "#ffffff"
							},
							{
									"visibility": "simplified"
							}
					]
			},
			{
					"featureType": "road.arterial",
					"stylers": [
							{
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
					"stylers": [
							{
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
					"stylers": [
							{
									"visibility": "off"
							}
					]
			},
			{
					"featureType": "road.arterial",
					"stylers": [
							{
									"color": "#ffffff"
							}
					]
			},
			{
					"featureType": "road.local",
					"stylers": [
							{
									"color": "#ffffff"
							}
					]
			},
			{
					"featureType": "poi.park",
					"elementType": "labels.icon",
					"stylers": [
							{
									"visibility": "off"
							}
					]
			},
			{
					"featureType": "poi",
					"elementType": "labels.icon",
					"stylers": [
							{
									"visibility": "off"
							}
					]
			},
			{
					"featureType": "water",
					"stylers": [
							{
									"color": "#71c8d4"
							}
					]
			},
			{
					"featureType": "landscape",
					"stylers": [
							{
									"color": "#e5e8e7"
							}
					]
			},
			{
					"featureType": "poi.park",
					"stylers": [
							{
									"color": "#8ba129"
							}
					]
			},
			{
					"featureType": "road",
					"stylers": [
							{
									"color": "#ffffff"
							}
					]
			},
			{
					"featureType": "poi.sports_complex",
					"elementType": "geometry",
					"stylers": [
							{
									"color": "#c7c7c7"
							},
							{
									"visibility": "off"
							}
					]
			},
			{
					"featureType": "water",
					"stylers": [
							{
									"color": "#a0d3d3"
							}
					]
			},
			{
					"featureType": "poi.park",
					"stylers": [
							{
									"color": "#91b65d"
							}
					]
			},
			{
					"featureType": "poi.park",
					"stylers": [
							{
									"gamma": 1.51
							}
					]
			},
			{
					"featureType": "road.local",
					"stylers": [
							{
									"visibility": "off"
							}
					]
			},
			{
					"featureType": "road.local",
					"elementType": "geometry",
					"stylers": [
							{
									"visibility": "on"
							}
					]
			},
			{
					"featureType": "poi.government",
					"elementType": "geometry",
					"stylers": [
							{
									"visibility": "off"
							}
					]
			},
			{
					"featureType": "landscape",
					"stylers": [
							{
									"visibility": "off"
							}
					]
			},
			{
					"featureType": "road",
					"elementType": "labels",
					"stylers": [
							{
									"visibility": "off"
							}
					]
			},
			{
					"featureType": "road.arterial",
					"elementType": "geometry",
					"stylers": [
							{
									"visibility": "simplified"
							}
					]
			},
			{
					"featureType": "road.local",
					"stylers": [
							{
									"visibility": "simplified"
							}
					]
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
				console.log('location id#'+ location.id);
			});
		})
		
	}

	initMap()
</script>

<style>
	#map {
		height: 100%;
	}
</style>