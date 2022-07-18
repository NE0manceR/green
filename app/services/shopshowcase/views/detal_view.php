<link rel="stylesheet" href="<?= SERVER_URL ?>style/simpleLightbox.min.css">
<script src="<?= SERVER_URL ?>js/simpleLightbox.min.js"></script>

<?php
/*
  <link rel="stylesheet" type="text/css" href="<?=SERVER_URL.'style/'.$_SESSION['alias']->alias.'/shop.css'?>">
<link rel="stylesheet"
      type="text/css"
      href="/assets/lightSlider/css/lightslider.css">
<link rel="stylesheet"
      type="text/css"
      href="/assets/lightGallery/css/lightgallery.css">

<main class="container product"
      itemscope
      itemtype="https://schema.org/Product">
  <?php if($this->userIs()) {
        if($this->userCan()) { ?>
  <a href="<?=SERVER_URL?>admin/<?=$product->link?>"
     class="pull-right btn btn-warning"
     target="_blank"><i class="fas fa-cogs"></i> Редагувати Admin</a>
  <?php } if($product->author_add == $_SESSION['user']->id || $this->userCan()) { ?>
  <a href="<?=SITE_URL.$product->link?>?edit"
     class="pull-right btn btn-success"
     target="_blank"><i class="fas fa-paint-brush"></i> Редагувати</a>
  <?php } } 
    
    $path__breadcrumbs = APP_PATH . 'views/@commons/__breadcrumbs.php';
	if(file_exists($path__breadcrumbs))
		require $path__breadcrumbs;

    if ($product->active == -2) { ?>
  <div class="alert alert-warning">
    <h3>Етап 3. Корекція вигляду</h3>
    <p>Коли вказано всю інформацію про товар, сторінка виглядає гармонійно, натисніть кнопку
      "Надіслати товар на перевірку". <br>Адміністрація сайту перевірить вказану інформацію та
      активує товар або ж надішле повідомлення щодо відмови вказавжи причину.</p>
    <form action="<?=SITE_URL.$_SESSION['alias']->alias?>/confirm"
          method="post">
      <input type="hidden"
             name="id"
             value="<?=$product->id?>">
      <button class="btn btn-success"><i class="fas fa-cloud-upload-alt"></i> Надіслати товар на
        перевірку</button>
    </form>
  </div>
  <?php }
    if ($product->active == -1) { ?>
  <div class="alert alert-success">
    <h3>Товар надіслано на перевірку</h3>
    <p>Адміністрація сайту перевірить вказану інформацію та активує товар або ж надішле повідомлення
      щодо відмови вказавжи причину.</p>
  </div>
  <?php } 

    $this->load->model('wl_user_model');
    $author = $this->wl_user_model->getInfo($product->author_add); ?>

  <h1><?=$_SESSION['alias']->name?></h1>
  <?php if(!empty($_SESSION['alias']->list))
            echo "<p class=\"short\">".nl2br($_SESSION['alias']->list)."</p>"; ?>

  <div class="d-flex m-wrap">
    <div class="w33-5 m-w100">
      <?php if(!empty($_SESSION['alias']->images)) {
                echo '<div class="product-gallery">';
                foreach ($_SESSION['alias']->images as $i => $image) {
                    $path = 'images/'.$image->path;
                    if (!file_exists($path))
                        continue; ?>

      <figure data-thumb="<?=IMG_PATH.$image->thumb_path?>"
              data-src="<?=IMG_PATH.$image->path?>"
              itemprop="image">
        <img src="<?=IMG_PATH.$image->detal_path?>"
             alt="<?=$image->title ?? $product->name?>" />
        <figcaption><?=$image->title ?? $product->name?></figcaption>
      </figure>

      <?php }
                echo "</div>";
            }
            else
                echo '<img src="'.SERVER_URL.'style/'.$_SESSION['alias']->alias.'/no_photo.png">';
            ?>
    </div>
    <div class="w33-5 m-w100 specifications">
      <table class="bordered w100">
        <thead>
          <tr>
            <td colspan="2">Коротко</td>
          </tr>
        </thead>
        <tbody>
          <?php /* ?>
          <tr>
            <td><?=$this->text('Артикул')?></td>
            <td itemprop="sku"><?=$product->article_show?></td>
          </tr>
          <?php 
                    $address = '';
                    if(!empty($product->options))
                    foreach ($product->options as $option) {
                        if(!empty($option->value) && !is_array($option->value))
                            echo "<tr><td>{$option->name}</td><td>{$option->value->name}</td></tr>";
                        else if(!empty($option->value) && is_array($option->value))
                        {
                            $values = [];
                            foreach ($option->value as $opt)
                                $values[] = $opt->name;
                            $values = implode('<br> ', $values);
                            if($option->alias == '8-lokacija')
                                continue;
                            // echo '<tr><td>'.$option->name.'</td><td title="'.$values.'">'.$this->data->getShortText($values, 15)."</td></tr>";
                            echo '<tr><td>'.$option->name.'</td><td>'.$values."</td></tr>";
                        }
                    } ?>
          <tr>
            <td>Додано на сайт</td>
            <td><?=date('d.m.Y H:i', $product->date_add)?></td>
          </tr>
        </tbody>
      </table>
      <?php if(!empty($_SESSION['alias']->text)) { ?>
      <div class="w100 bordered h-fit"
           itemprop="description">
        <h4>Детальніше</h4>
        <?=$_SESSION['alias']->text?>
      </div>
      <?php }
            if(!empty($author->info['shipping'])) { $shipping = str_replace('-', '<li>', $author->info['shipping']); ?>
      <div class="shipping-info bordered">
        <h4>Доставка</h4>
        <ul><?=html_entity_decode($shipping)?></ul>
      </div>
      <?php } ?>
      <div class="shipping-info bordered"
           itemprop="aggregateRating"
           itemscope
           itemtype="https://schema.org/AggregateRating">
        <h4>Оцінка <?php if(empty($product->rating)) $product->rating = 0;
                for($i = 0; $i < round($product->rating); $i++) { ?>
          <i class="fas fa-star"></i>
          <?php } for($i = round($product->rating); $i < 5; $i++) { ?>
          <i class="far fa-star"></i>
          <?php } ?>
        </h4>
        Страву оцінено <strong itemprop="ratingValue"><?=$product->rating ?? 0?></strong>/5
        на основі <strong itemprop="reviewCount"><?=$product->rating_votes ?? 0?></strong> відгуків
      </div>
    </div>
    <div class="w33-5 m-w100">
      <div class="author bordered d-flex">
        <?php if($author) {
                    $user_photo = ($author->photo) ? IMG_PATH.'profile/p_'.$author->photo : SERVER_URL.'style/images/avatar.png'; ?>
        <a href="/seller/<?=$author->alias?>"><img src="<?=$user_photo?>"
               alt="<?=$author->name?>"></a>
        <div>
          <?php $from_sex = 'господаря';
                     if(isset($author->info['sex'])) {
                        switch ($author->info['sex']) {
                             case 'man':
                                 echo "<h4>Господар</h4>";
                                 break;
                             case 'woman':
                                 $from_sex = 'господині';
                                 echo "<h4>Господиня</h4>";
                                 break;
                             case 'company':
                                 $from_sex = $author->name;
                                 echo "<h4>Компанія</h4>";
                                 break;
                             default:
                                 echo "<h4>Господар/господиня</h4>";
                                 break;
                         }
                    } else echo "<h4>Господар/господиня</h4>"; ?>
          <a href="/seller/<?=$author->alias?>"><?=$author->name?></a>
          <p><?=$product->lokacija ?? ''?></p>
          <p>З нами від <i><?=date('d.m.Y', $author->registered)?></i></p>
        </div>
        <?php } else echo "Відсутня інформація про автора!"; ?>
      </div>
      <div class="order bordered">
        <h4><?=$product->availability == 1 ? 'В наявності (готово до видачі)' : 'Під замовлення'?>
        </h4>
        <?php if($product->old_price > $product->price) { ?>
        <del><?=$product->old_price_format?></del>
        <?php } ?>
        <strong
                class="text-center d-block"><?=$product->price_format?>/<?=$product->cina_za ?? 'одиницю'?></strong>
        <?php if($this->userIs() && $product->author_add == $_SESSION['user']->id) { ?>
        <a href="<?=SITE_URL.$product->link?>?edit"
           id="showContacts"
           class="text-center"><i class="fas fa-cogs"></i> Редагувати</a>
        <?php } else { ?>
        <button id="showContacts"
                data-id="<?=$product->id?>">Показати контактні дані</button>
        <!-- <p class="or text-center">або</p>
                    <button id="toOrderModel">Залишити заявку</button> -->
        <?php } ?>
      </div>
      <?php if(!empty($author->info['pay'])) { $pay = str_replace('-', '<li>', $author->info['pay']); ?>
      <div class="pay-info bordered">
        <h4>Оплата</h4>
        <ul><?=html_entity_decode($pay)?></ul>
      </div>
      <?php } ?>
    </div>
  </div>
  <div id="tabs">
    <ul class="tabs <?=(!empty($_SESSION['alias']->videos))?'':'tabs-4'?>">
      <?php if(!empty($_SESSION['alias']->videos)) { ?>
      <li><a href="#video"><span><?=$this->text('Відео')?></span></a></li>
      <?php } ?>
      <li><a href="#similar"><span><?=$this->text('Подібні')?></span></a></li>
      <li><a href="#more"><span><?=$this->text('Ще страви від').' '.$from_sex?></span></a></li>
      <li><a href="#delivery-and-payments"><span><?=$this->text('Доставка та оплата')?></span></a>
      </li>
      <li><a href="#reviews"><span><?=$this->text('Відгуки')?></span></a></li>
    </ul>
    <?php if(!empty($_SESSION['alias']->videos)) { ?>
    <div id="video">
      <div class="d-flex wrap">
        <?php if(!empty($_SESSION['alias']->videos)) {
                        $this->load->library('video');
                        $this->video->show_many($_SESSION['alias']->videos, '</div>', '<div class="w50-5 m-w100">');
                    } 
                if(!empty($_SESSION['alias']->files))
                    foreach ($_SESSION['alias']->files as $file) {
                        if($file->extension == 'pdf')
                        {
                            echo '<a href="'.$this->data->get_file_path($file).'" target="_blank" class="preview">';
                            $preview_path = IMG_PATH.'file_preview.jpg';
                            if(!empty($file->preview_extension))
                            {
                                $file->name .= '.'.$file->preview_extension;
                                $preview_path = $this->data->get_file_path($file);
                            }
                            echo "<img src='{$preview_path}'></a>";
                            
                            // echo '<embed src="'.$this->data->get_file_path($file).'" type="application/pdf" width="100%" height="700" alt="pdf" pluginspage="https://get.adobe.com/ru/reader/">';
                        }
                        else
                            echo '<iframe src="'.$this->data->get_file_path($file).'"> <a href="'.$this->data->get_file_path($file).'" class="load_pdf flex" target="_blank">'.$this->text('Завантажити креслення PDF').'</a></iframe>';
                    }
                ?>
      </div>
    </div>
    <?php } ?>
    <div id="similar">
      <?php $product_id = $product->id; $product_author_add = $product->author_add;
            $product_author_add_alias = $product->author_add_alias;
            $_SESSION['option']->paginator_per_page = 8;
            if($similar = $this->shop_model->getProducts($product->group, $product->id)) {
                echo "<section class='d-flex wrap products bordered'>";
                $this->setProductsPrice($similar);
                foreach ($similar as $product) {
                    require '__product_subview.php';
                }
                $addDiv = count($similar) % 4;
                if($addDiv)
                    while ($addDiv++ < 4) {
                        echo "<a class='empty'></a>";
                    }
                echo "</section>";
            if($_SESSION['option']->paginator_total >= $_SESSION['option']->paginator_per_page) { ?>
      <div class='p-15 text-center'><a href="<?=SITE_URL.$product->group_link?>"
           class="btn btn-info">Дивитися більше</a></div>
      <?php } } else { ?>
      <p>На даний момент це єдина страва у групі <strong><?=$product->group_name?></strong></p>
      <?php } ?>
    </div>
    <div id="more">
      <?php $_GET['author_add'] = $product_author_add;
            if($similar = $this->shop_model->getProducts(-1, $product_id)) {
                echo "<section class='d-flex wrap products bordered'>";
                $this->setProductsPrice($similar);
                foreach ($similar as $product) {
                    require '__product_subview.php';
                }
                $addDiv = count($similar) % 4;
                if($addDiv)
                    while ($addDiv++ < 4) {
                        echo "<a class='empty'></a>";
                    }
                echo "</section>";
            if($_SESSION['option']->paginator_total >= $_SESSION['option']->paginator_per_page) { ?>
      <div class='p-15 text-center'><a
           href="/<?=$_SESSION['alias']->alias?>/search?author=<?=$product_author_add_alias?>"
           class="btn btn-info">Дивитися всі страви <?=$from_sex?></a></div>
      <?php } } else { ?>
      <p>На даний момент це єдина страва <?=$from_sex?></p>
      <?php } ?>
    </div>
    <div id="delivery-and-payments">
      <?php // echo $this->function_in_alias('delivery-and-payments', '__get_Text'); ?>
      <?php if(!empty($author->info['shipping'])) { $shipping = str_replace('-', '<li>', $author->info['shipping']); ?>
      <div class="shipping-info bordered">
        <h4>Доставка</h4>
        <ul><?=html_entity_decode($shipping)?></ul>
      </div>
      <?php }
            if(!empty($author->info['pay'])) { $pay = str_replace('-', '<li>', $author->info['pay']); ?>
      <div class="pay-info bordered">
        <h4>Оплата</h4>
        <ul><?=html_entity_decode($pay)?></ul>
      </div>
      <?php } ?>
    </div>
    <div id="reviews"
         class='d-flex wrap'>
      <?php $this->load->model("wl_comments_model");
            $_SESSION['option']->paginator_per_page = 20;
            $comments = $this->wl_comments_model->get(['status' => '<3', 'parent' => 0, 'content_author' => $product_author_add]);

            $showAddForm = true; $image_name = false;
            if($this->userIs() && $product->author_add == $_SESSION['user']->id)
            {
                echo "<div class='alert alert-warning w100'>Увага! Автор товару не може додавати відгуки про себе</div>";
                $showAddForm = false;
            }
            $alias = $_SESSION['alias']->id;
            $alias = $_SESSION['alias']->alias == 'dishes' ? 8 : 9; // for lamure
            $content = $_SESSION['alias']->content;
            $comments_title = 'Відгуки про господаря';
            $_GET = ['request' => 'reviews', 'author' => $product_author_add_alias];
            include APP_PATH."views/@wl_comments/index_view.php";?>
    </div>
  </div>
</main><?php $this->load->js(['assets/jquery-ui/ui/minified/jquery-ui.min.js',
                        'assets/lightGallery/js/lightgallery.js',
                        'assets/lightSlider/js/lightslider.js',
                        'assets/lightGallery/modules/lg-thumbnail.min.js',
                        'js/'.$_SESSION['alias']->alias.'/product.js']); ?>
*/ ?>

<?php $item_bcg = IMG_PATH .  $_SESSION['alias']->images[0]->org_path ?>
<pre>
        <?php
        print_r($product->options);
        ?>
        </pre>
<section class="info" style='background: url("<?= $item_bcg ?>") no-repeat; background-size: cover;'>
  <div class="info__filter"></div>
  <div class="info__wrap content-block">
    <div class="info__description">
      <div class="info__description-wrap">
        <?php if (isset($product->group_name)) { ?>
          <span class="info__group-btn">
            <img src="<?= SERVER_URL ?>style/icons/group/ic_group-0.svg" alt="">
            <?= $product->group_name ?>
          </span>
        <?php } ?>
        <span class="info__number"><?= isset($product->article) ? $product->article : '' ?></span>
      </div>
      <h1 class="info__title"><?= $product->name ?></h1>
      <span class="info__price"><?= number_format($product->price, 0, ' ', ' ')  ?> грн</span>
      <div class="info__address">


        <?php foreach ($product->options as $item) { ?>

          <?php if ($item->name == 'Площа' || $item->name == 'Господарство') { ?>
            <span><?= is_array($item->value) ? "Господарство - " . $item->value[1]->name : "Площа - " . $item->value ?></span>
          <?php }
        } ?>
      </div>
    </div>
    <button class="info__favorite">
      <img src="<?= SERVER_URL ?>style/icons/ic_heart.svg" alt="">
      <span class="info__favorite-add"><?= $this->text('Додати в обране ') ?></span>
      <span class="info__favorite-remove"><?= $this->text('Прибрати з обраного ') ?></span>
    </button>
  </div>
</section>
<section class="description content-block">

  <div class="description__wrap">
    <div class="description__text">
      <span class="section-title"><?= $this->text('Опис об’єкта') ?></span>
      <span><?= $product->text ?></span>
    </div>
    <div class="description__map">
      <span class="section-title"><?= $this->text('Об’єкт на карті') ?></span>
      <div class="description__map-wrap">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d84672.72513572637!2d24.50620474314756!3d48.45609475105361!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4737243a84944efd%3A0x1c5465f02903eff2!2sYaremche%2C%20Ivano-Frankivsk%20Oblast!5e0!3m2!1sen!2sua!4v1655825800516!5m2!1sen!2sua" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
      <button class="green-btn call"><?= $this->text('Домовитись про огляд') ?></button>
    </div>
  </div>
</section>

<section class="content-block object-gallery">
  <span class="section-title"><?= $this->text('Галерея об’єкту') ?></span>
  <div class="gallery">
    <a title="<?= $_SESSION['alias']->images[0]->title ?>" href="<?= IMG_PATH . $_SESSION['alias']->images[0]->org_path ?>">
      <img class="object-gallery__main" src="<?= IMG_PATH . $_SESSION['alias']->images[0]->org_path ?>">
    </a>
    <div class="object-gallery__wrap">
      <?php if (!empty($_SESSION['alias']->images)) {
        foreach ($_SESSION['alias']->images  as $index => $item) { ?>
          <a title="Image 2" href="<?= IMG_PATH . $item->org_path ?>">
            <img src="<?= IMG_PATH . $item->sm_path ?>">
          </a>
      <?php }
      } ?>

    </div>
  </div>
</section>

<script>
  // As a jQuery plugin
  $('.gallery a').simpleLightbox({
    // options here
  });

  $('.info__favorite').on('click', function() {
    add_favorite(<?= $product->id ?>);
  });
</script>

<script>
  let favorite_btn = $('.info__favorite');
  let favorite_btn_add = $('.info__favorite-add');
  let favorite_btn_remove = $('.info__favorite-remove');

  let detal_favorites_item = {
    id: <?= $product->id ?>,
    link: "<?= SITE_URL . $product->link ?>",
    photo: "<?= IMG_PATH . $product->sm_photo ?>",
    name: "<?= $product->name ?>",
    location: "<?= $product->list ?>",
    price: "<?= number_format($product->price, 0, ' ', ' ')  ?> грн",
    locationic: "<?= SERVER_URL ?> style/icons/ic_location.svg",
  }

  let item_index = JSON.parse(localStorage.getItem('favorites')).findIndex(item => item.id === <?= $product->id ?>);

  if (item_index !== -1) {
    favorite_btn.addClass('active');
    if (window.innerWidth > 745) {
      favorite_btn_add.hide();
      favorite_btn_remove.show();
    }

  } else {
    if (window.innerWidth > 745) {
      favorite_btn_add.show();
      favorite_btn_remove.hide();
    }
  }

  function add_favorite(id) {

    let copy_favorites = [...JSON.parse(localStorage.getItem('favorites'))];

    if (copy_favorites.find((item) => item.id === detal_favorites_item.id) === undefined) {
      copy_favorites.push(detal_favorites_item);
      localStorage.setItem('favorites', JSON.stringify(copy_favorites));
      favorite_btn.addClass('active');
      if (window.innerWidth > 745) {
        favorite_btn_add.hide();
        favorite_btn_remove.show();
      }


    } else {
      let remove_item = copy_favorites.filter((item) => item.id !== detal_favorites_item.id);
      localStorage.setItem('favorites', JSON.stringify(remove_item))
      favorite_btn.removeClass('active');
      if (window.innerWidth > 745) {
        favorite_btn_add.show();
        favorite_btn_remove.hide();
      }
    }

    console.log(JSON.parse(localStorage.getItem('favorites')));
  }
</script>