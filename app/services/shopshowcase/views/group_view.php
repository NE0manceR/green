<section class="content-block group-title">
	<div class="title-with-link">
		<img src="<?= IMG_PATH . $_SESSION['alias']->section['icon']->images[0]->path ?>" alt="icon">
		<h1 class="section-title"><?= $_SESSION['alias']->name ?></h1>
		<span class="show-on-map">
			<a href="">
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
			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d42332.94187007656!2d24.52356752390296!3d48.46019668799371!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47372434d361a9a9%3A0x4f539b9d38654c20!2sYaremche%2C%20Ivano-Frankivsk%20Oblast%2C%2078500!5e0!3m2!1sen!2sua!4v1655543126811!5m2!1sen!2sua" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
			</iframe>
		</div>
	</div>
</section>