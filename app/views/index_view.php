<link rel="stylesheet"
      href="<?= SERVER_URL ?>style/swiper-bundle.min.css">
<link rel="stylesheet"
      href="<?= SERVER_URL ?>style/slick.css">
<style>
.swiper {
  width: 100%;
  height: 100%;
}

.swiper-slide {
  text-align: center;
  font-size: 18px;
  background: grey;

  /* Center slide text vertically */
  display: -webkit-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  -webkit-justify-content: center;
  justify-content: center;
  -webkit-box-align: center;
  -ms-flex-align: center;
  -webkit-align-items: center;
  align-items: center;
}

.swiper-slide img {
  display: block;
  width: 100%;
  height: 100%;
  object-fit: cover;
}

.news .swiper {
  margin-left: auto;
  margin-right: auto;
}

.news .swiper-slide {
  text-align: center;
  font-size: 18px;
  background: #fff;
  height: calc((100% - 30px) / 2) !important;

  /* Center slide text vertically */
  display: -webkit-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  -webkit-box-pack: center;
  -ms-flex-pack: center;
  -webkit-justify-content: center;
  justify-content: center;
  -webkit-box-align: center;
  -ms-flex-align: center;
  -webkit-align-items: center;
  align-items: center;
}

.slide {
  padding: 10px;
}

</style>

<?php $products = $this->load->function_in_alias('catalog', '__get_Products', array('limit' => 20)) ?>

<section class="main">
  <div class="main__title-wrap content-block">
    <h1 class="section-title"><?= $_SESSION['alias']->name ?></h1>

    <ul class="main__link-wrap">
      <?php if (!empty($all_g)) {
        foreach ($all_g as $item) {
      ?>
      <li>
        <a class="main__link"
           href="<?= SITE_URL . $item->link ?>"><?= $item->name ?></a>
      </li>
      <?php }
      } ?>
    </ul>
  </div>

  <div class="main__slider">
    <div class="swiper mySwiper mainSlider">
      <div class="swiper-wrapper">
        <?php for ($i = 0; $i < 10; $i++) { ?>
        <div class="swiper-slide">
          <img class="main__slider-img"
               src="<?= SERVER_URL ?>style/test-imgs/test1.svg"
               alt="img">
        </div>
        <?php  } ?>

      </div>
      <div class="main__slider-filter"></div>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>

    </div>

</section>

<section id="about"
         class="about content-block">
  <h2 class="section-title center"><?= $this->text('Про Компанію', 0) ?></h2>
  <div class="about__content">
    <span class="about__years"><?= $this->text('14 років 1000+ об’єктів') ?></span>
    <button class="green-btn icon">
      <img src="<?= SERVER_URL ?>style/icons/ic_location-white.svg"
           alt="icon">
      <?= $this->text('Карта об’єктів') ?>
    </button>
    <span class="about__title">Your Green Property —
      <?= $this->text('Це агенство нерухомості') ?></span>
    <span class="about__text">
      <?= html_entity_decode($_SESSION['alias']->text); ?>
    </span>
  </div>

  <div class="group about__group">
    <?php $i = 0;
    if (!empty($all_g)) {
      foreach ($all_g as $item) { ?>
    <a href="<?= SITE_URL . $item->link ?>"
       class="group__item">
      <img class="group__img-bcg"
           src="<?= IMG_PATH . $item->photo ?>"
           alt="img">
      <img class="group__ic"
           src="<?= SERVER_URL ?>style/icons/group/ic_group-<?= $i ?>.svg"
           alt="img">
      <span class="group__text"><?= $item->name ?></span>
    </a>
    <?php $i++;
      }
    } ?>
  </div>

</section>

<section class="news content-block">
  <div class="news__title-wrap">
    <h2 class="section-title"><?= $this->text('Нові об’єкти') ?></h2>
    <div class="news__slider-nav">

    </div>
  </div>
  <div class="slider-container news__items-container">
    <?php foreach ($products as  $product) { ?>
    <div class="slide">
      <div class="item-card">
        <a id="link-<?= $product->id ?>"
           href="<?= SITE_URL . $product->link ?>"
           class="item-card__img">
          <img id="img-<?= $product->id ?>" src="<?= IMG_PATH . $product->sm_photo ?>"
               alt="img">
        </a>
        <span class="item-card__title">
          <span id="name-<?= $product->id ?>"><?= $product->name ?></span>
          <img class="item-card__heart item-card__heart-like"
               data-status="<?= $product->id ?>"
               src="<?= SERVER_URL ?>style/icons/ic_heart-black.svg"
               onclick="populateStorage(<?= $product->id ?>)"
               id="like<?= $product->id ?>">

          <img class="item-card__heart dislike"
               data-status="<?= $product->id ?>"
               src="<?= SERVER_URL ?>style/icons/ic_heart-green.svg"
               onclick="populateStorage(<?= $product->id ?>)"
               id="dislike<?= $product->id ?>">
        </span>
        <span class="item-card__location">
          <img class="item-card__location-icon"
               src="<?= SERVER_URL ?>style/icons/ic_location.svg"
               alt="img">
          <span id="location-<?= $product->id ?>"><?= $product->list ?></span>
        </span>
        <span id="price-<?= $product->id ?>" class="item-card__price"><?= number_format($product->price, 0, ' ', ' ') ?> грн</span>
      </div>
    </div>
    <?php } ?>
  </div>

  <button class="green-btn"><?= $this->text('Перейти в каталог', 0) ?></button>
</section>

<script src="<?= SERVER_URL ?>js/swiper-bundle.min.js"></script>
<script src="<?= SERVER_URL ?>js/slick.min.js"></script>

<script>
var swiper1 = new Swiper(".mainSlider", {
  pagination: {
    el: ".swiper-pagination",
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});

$('.slider-container').slick({
  arrow: true,
  infinite: false,
  slidesToShow: 3,
  slidesToScroll: 3,
  rows: 3,
  centerPadding: '60px',
  // autoplay: true,
  // autoplaySpeed: 4000,


  responsive: [{
      breakpoint: 880,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
      }
    },
    {
      breakpoint: 560,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1
      }
    }
  ],
  appendArrows: document.querySelector('.news__slider-nav'),
  nextArrow: "<button type='button' class='news__next-btn'></button>",
  prevArrow: "<button type='button' class='news__prev-btn'></button>",


});
</script>
