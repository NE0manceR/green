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
			<?php foreach ($all_g as $item) { ?>
				<a href="<?= SITE_URL . $item->link ?>" class="group__item">
					<img class="group__img-bcg" src="<?= IMG_PATH . $item->photo ?>" alt="img">
					<img class="group__ic" src="<?= SERVER_URL ?>style/icons/group/ic_sun.svg" alt="img">
					<span class="group__text"><?= $item->name ?></span>
				</a>
			<?php } ?>
		</div>
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
		<?php foreach ($products as $i => $product) {
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
		} ?>
	</div>

	<div class="item-wrap__btn-wrap">
		<a href="<?= SITE_URL ?>catalog" class="green-btn" type="button"> <?= $this->text('Перейти в каталог', 0) ?>
	</a>
	</div>
</section>