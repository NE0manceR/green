<link rel="stylesheet" href="<?= SERVER_URL ?>style/swiper-bundle.min.css">
<link rel="stylesheet" href="<?= SERVER_URL ?>style/slick.css">
<style>
  html,

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

<section class="main">
  <div class="main__title-wrap content-block">
    <h1 class="section-title"><?= $_SESSION['alias']->name ?></h1>

    <ul class="main__link-wrap">
      <?php if (!empty($all_g)) {
        foreach ($all_g as $item) {
      ?>
          <li>
            <a class="main__link" href="<?= SITE_URL . $item->link ?>"><?= $item->name ?></a>
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
            <img class="main__slider-img" src="<?= SERVER_URL ?>style/test-imgs/test1.svg" alt="img">
          </div>
        <?php  } ?>

      </div>
      <div class="main__slider-filter"></div>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>

    </div>

</section>

<section id="about" class="about content-block">
  <h2 class="section-title center"><?= $this->text('Про Компанію', 0) ?></h2>
  <div class="about__content">
    <span class="about__years"><?= $this->text('14 років 1000+ об’єктів') ?></span>
    <button class="green-btn icon">
      <img src="<?= SERVER_URL ?>style/icons/ic_location-white.svg" alt="icon">
      <?= $this->text('Карта об’єктів') ?>
    </button>
    <span class="about__title">Your Green Property — <?= $this->text('Це агенство нерухомості') ?></span>
    <span class="about__text">
      <?= $this->text('текст про компанію') ?>
    </span>
  </div>

  <div class="group about__group">
    <?php $i = 0;
    if (!empty($all_g)) {
      foreach ($all_g as $item) { ?>
        <a href="<?= SITE_URL . $item->link ?>" class="group__item">
          <img class="group__img-bcg" src="<?= IMG_PATH . $item->photo ?>" alt="img">
          <img class="group__ic" src="<?= SERVER_URL ?>style/icons/group/ic_group-<?= $i ?>.svg" alt="img">
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
    <div class="news__slider-nav"></div>
  </div>
  <div class="slider-container news__items-container">
    <?php for ($i = 1; $i < 10; $i++) { ?>
      <div class="slide">
        <a class="item-card" href="">
          <div class="item-card__img">
            <img src="<?= SERVER_URL ?>style/test-imgs/items/<?= $i ?>.png" alt="img">
          </div>
          <h3 class="item-card__title">
            Котедж в горах
            <img class="item-card__heart" src="<?= SERVER_URL ?>style/icons/ic_heart-black.svg" alt="icon">
          </h3>
          <span class="item-card__location">
            <img class="item-card__location-icon" src="<?= SERVER_URL ?>style/icons/ic_location.svg" alt="img">
            Яремче, вул. Галицька 13
          </span>
          <span class="item-card__price">12 200 000 грн </span>
        </a>
      </div>
      <div class="slide">
        <a class="item-card" href="">
          <div class="item-card__img">
            <img src="<?= SERVER_URL ?>style/test-imgs/items/<?= $i ?>.png" alt="img">
          </div>
          <h3 class="item-card__title">
            Котедж в горах
            <img class="item-card__heart" src="<?= SERVER_URL ?>style/icons/ic_heart-black.svg" alt="icon">
          </h3>
          <span class="item-card__location">
            <img class="item-card__location-icon" src="<?= SERVER_URL ?>style/icons/ic_location.svg" alt="img">
            Яремче, вул. Галицька 13
          </span>
          <span class="item-card__price">12 200 000 грн </span>
        </a>
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
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 3,
    rows: 3,
    centerPadding: '60px',
    // autoplay: true,
    // autoplaySpeed: 4000,
    appendArrows: document.querySelector('.news__slider-nav'),
    nextArrow: "<button type='button' class='news__next-btn'></button>",
    prevArrow: "<button type='button' class='news__prev-btn'></button>",

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
      // {
      //   breakpoint: 480,
      //   settings: {
      //     arrows: false,
      //     centerMode: true,
      //     centerPadding: '40px',
      //     slidesToShow: 1
      //   }
      // }
    ]


  });
</script>