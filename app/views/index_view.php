<link rel="stylesheet" href="<?= SERVER_URL ?>style/swiper-bundle.min.css">
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
</style>

<section class="main">
  <div class="main__title-wrap content-block">
    <h1 class="section-title">Нерухомість
      в Карпатському Регіоні
    </h1>

    <ul class="main__link-wrap">
      <li>
        <a class="main__link" href="">Будинки та котеджі</a>
      </li>
      <li>
        <a class="main__link" href="">Земельні ділянки</a>
      </li>
      <li>
        <a class="main__link" href="">Комерція</a>
      </li>
    </ul>
  </div>

  <div class="main__slider">
    <div class="swiper mySwiper">
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

<section class="about content-block">
  <h2 class="section-title center">Про Компанію</h2>
  <div class="about__content">
    <span class="about__years">14 років 1000+ об’єктів</span>
    <button class="green-btn">Карта об’єктів</button>
    <span class="about__title">Your Green Property — Це агенство нерухомості</span>
    <span class="about__text">
      Основною послугою є те що ми можемо підібрати нерухомість по індивідуальних критеріях замовника, яку він може придбати з повним супроводом та підтримкою агентства!
      <br>
      <br>
      Ми працюємо з 2008 року на ринку нерухомості в Карпатському регіоні — Яремче, Татарові, Микуличині, Яблуниці, Паляниці (Буковель) тощо.
      <br>
      <br>
      Наше агенство надає весь спектр послуг:
      • Пошук та підбір ділянок за вашими критеріями
      • Купівля-продаж
      • Підготовка, отримання та реєстрація повного пакету документів для всіх видів угод із нерухомістю.
    </span>
  </div>

  <div class="about__group">
    <a href="/" class="about__group-item">
      <img class="about__img-bcg" src="<?= SERVER_URL ?>style/test-imgs/group1.png" alt="img">
      <img class="about__group-ic" src="<?= SERVER_URL ?>style/icons/ic_sun.svg" alt="img">
      <span class="about__group-text">Земельні ділянки</span>
    </a>

    <a href="/" class="about__group-item">
      <img class="about__img-bcg" src="<?= SERVER_URL ?>style/test-imgs/group2.png" alt="img">
      <img class="about__group-ic" src="<?= SERVER_URL ?>style/icons/ic_cottages.svg" alt="img">
      <span class="about__group-text">Будинки та котеджі</span>
    </a>

    <a href="/" class="about__group-item">
      <img class="about__img-bcg" src="<?= SERVER_URL ?>style/test-imgs/group3.png" alt="img">
      <img class="about__group-ic" src="<?= SERVER_URL ?>style/icons/ic_commerce.svg" alt="img">
      <span class="about__group-text">Комерція</span>

    </a>
  </div>

</section>
<script src="<?= SERVER_URL ?>js/swiper-bundle.min"></script>

<script>
  var swiper1 = new Swiper(".mySwiper", {
    pagination: {
      el: ".swiper-pagination",
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });
</script>