<?php
$get_to = "";

switch ($_SESSION['alias']->link) {
	case 'catalog/budynky-ta-kotedzhi':
		$get_to = 7;
		break;

	case 'catalog/zemelni-diljanky':
		$get_to = 8;
		break;

	case 'catalog/komercija':
		$get_to = 9;
		break;

	default:
		break;
}

?>

<style>
	#map {
		height: 100%;
	}
</style>

<section class="content-block group-title">
	<div class="title-with-link">
		<img src="<?= IMG_PATH . $_SESSION['alias']->section['icon']->images[0]->path ?>" alt="icon">
		<h1 class="section-title"><?= $_SESSION['alias']->name ?></h1>
		<span class="show-on-map">
			<a href="<?= SERVER_URL ?>object_map?6-typ-obektu[]=<?= $get_to ?>">
				<img class="show-on-map__icon" src="<?= SERVER_URL ?>style/icons/ic_location-green.svg" alt="icon">
				<?= $this->text('Переглянути на карті', 0) ?>
			</a>
		</span>
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
		<?php foreach ($products as $product) { ?>
			<?php include $_SERVER['DOCUMENT_ROOT'] . "/app/views/@commons/item-card.php" ?>
		<?php } ?>
	</div>

	<div class="item-wrap__btn-wrap pagination-wrap">
		<?php
		$this->load->library('paginator');
		echo $this->paginator->get();
		?>
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

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwLJ94dy_JgpTb-uP0QaYfPFFJQmFs4QU">
</script>
<?php include $_SERVER['DOCUMENT_ROOT'] . "/app/views/@commons/google-map.php" ?>