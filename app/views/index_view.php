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
        <div class="swiper-slide">Slide 1</div>
        <div class="swiper-slide">Slide 2</div>
        <div class="swiper-slide">Slide 3</div>
        <div class="swiper-slide">Slide 4</div>
        <div class="swiper-slide">Slide 5</div>
        <div class="swiper-slide">Slide 6</div>
        <div class="swiper-slide">Slide 7</div>
        <div class="swiper-slide">Slide 8</div>
        <div class="swiper-slide">Slide 9</div>
      </div>
      <div class="swiper-pagination"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>

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