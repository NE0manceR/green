<div class="item-card">
  <a id="link-<?= $product->id ?>"
     href="<?= SITE_URL . $product->link ?>"
     class="item-card__img">
    <img id="img-<?= $product->id ?>"
         src="<?= IMG_PATH . $product->sm_photo ?>"
         alt="img">
  </a>
  <span class="item-card__title">
          <span id="name-<?= $product->id ?>"><?= $product->name ?></span>
          <img class="item-card__heart item-card__heart-like"
               src="<?= SERVER_URL ?>style/icons/ic_heart-black.svg"
               onclick="populateStorage(<?= $product->id ?>)"
               id="like<?= $product->id ?>"
               data-status="<?= $product->id ?>"
          >

          <img class="item-card__heart dislike"
               src="<?= SERVER_URL ?>style/icons/ic_heart-green.svg"
               onclick="populateStorage(<?= $product->id ?>)"
               id="dislike<?= $product->id ?>"
               data-status="<?= $product->id ?>"
          >
          </span>
  <span class="item-card__location">
          <img id="location_ic-<?= $product->id ?>"
               class="item-card__location-icon"
               src="<?= SERVER_URL ?>style/icons/ic_location.svg"
               alt="img">
          <span id="location-<?= $product->id ?>"><?= $product->list ?></span>
          </span>
  <span id="price-<?= $product->id ?>"
        class="item-card__price"><?= number_format($product->price, 0, ' ', ' ') ?> грн</span>
</div>
