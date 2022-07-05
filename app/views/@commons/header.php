<header class="header content-block">
    <nav class="navigation">
        <a href="/">
            <img class="navigation__logo" src="<?= SERVER_URL ?>style/logo.svg" alt="logo">
        </a>

        <ul>
            <li>
                <a class="navigation__link" href="<?= SERVER_URL ?>catalog"><?= $this->text('Каталог', 0) ?></a>
            </li>
            <li>
                <a class="navigation__link" href="<?= SITE_URL ?>object_map"><?= $this->text('Карта об’єктів', 0) ?></a>
            </li>
            <li>
                <a class="navigation__link" href="<?= SITE_URL . $_SESSION['alias']->link ?>#about"><?= $this->text('Про нас', 0) ?></a>
            </li>
            <li>
                <a class="navigation__link" href="<?= SITE_URL . $_SESSION['alias']->link ?>#contacts"><?= $this->text('Контакти', 0) ?></a>
            </li>
        </ul>
    </nav>

    <div class="header__btn-wrap">
        <div class="header__language">
            <span>Укр</span>
            <img src="<?= SERVER_URL ?>style/icons/ic_arrow-down.svg" alt="arrow-icon">
            <ul class="header__launguage-list">
                <li>
                    <a href="">Укр</a>
                </li>
                <li>
                    <a href="">Eng</a>
                </li>
            </ul>
        </div>
        <div class="header__favorite">
            <img id="favorite" src="<?= SERVER_URL ?>style/icons/ic_heart.svg" alt="favorite">
            <div class="favorite-list header__favorite-list">
                <div class="favorite-list__wrap">
                    <span class="favorite-list__title">Збережені</span>
                    <div class="favorite-list__items">
                 
                    </div>
                    <a class="green-btn" href="<?= SERVER_URL ?>catalog">Перейти в каталог</a>
                </div>

            </div>

        </div>
        <button class="green-btn call"><?= $this->text('Замовити дзвінок', 0) ?></button>
    </div>

    <div class="header__burger">
        <span class="line"></span>
        <span class="line"></span>
        <span class="line"></span>
    </div>

    <div class="header__mobile mobile-menu">
        <div class="mobile-menu__wrap">
            <ul class="mobile-menu__nav">
                <li class="mobile-menu__language">
                    <a class="active" href="">Укр</a>
                    <a href="">Eng</a>
                </li>
                <li>
                    <a class="navigation__link" href="<?= SITE_URL ?>catalog"><?= $this->text('Каталог', 0) ?></a>
                </li>
                <li>
                    <a class="navigation__link" href="<?= SITE_URL ?>object_map"><?= $this->text('Карта об’єктів', 0) ?></a>
                </li>
                <li>
                    <a class="navigation__link" href="<?= SITE_URL . $_SESSION['alias']->link ?>#about"><?= $this->text('Про нас', 0) ?></a>
                </li>
                <li>
                    <a class="navigation__link" href="<?= SITE_URL . $_SESSION['alias']->link ?>#contacts"><?= $this->text('Контакти', 0) ?></a>
                </li>
                <li class=" mobile-menu__language mobile-menu__btn-wrap">
                    <div class="header__favorite">
                        <img src="<?= SERVER_URL ?>style/icons/ic_heart.svg" alt="favorite">
                    </div>
                    <button class="green-btn call"><?= $this->text('Замовити дзвінок', 0) ?></button>
                </li>
            </ul>
        </div>
    </div>
</header>
