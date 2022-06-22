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
                <a class="navigation__link" href=""><?= $this->text('Карта об’єктів', 0) ?></a>
            </li>
            <li>
                <a class="navigation__link" href="<?= SITE_URL ?>#about"><?= $this->text('Про нас', 0) ?></a>
            </li>
            <li>
                <a class="navigation__link" href="<?= SITE_URL ?>#contacts"><?= $this->text('Контакти', 0) ?></a>
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
                    <a href="">Ру</a>
                </li>
            </ul>
        </div>
        <div class="header__favorite">
            <a href="">
                <img src="<?= SERVER_URL ?>style/icons/ic_heart.svg" alt="favorite">
            </a>
        </div>
        <button id="call" class="green-btn"><?= $this->text('Замовити дзвінок', 0) ?></button>
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
                    <a href="">Рус</a>
                </li>
                <li>
                    <a class="navigation__link" href=""><?= $this->text('Каталог', 0) ?></a>
                </li>
                <li>
                    <a class="navigation__link" href=""><?= $this->text('Карта об’єктів', 0) ?></a>
                </li>
                <li>
                    <a class="navigation__link" href=""><?= $this->text('Про нас', 0) ?></a>
                </li>
                <li>
                    <a class="navigation__link" href=""><?= $this->text('Контакти', 0) ?></a>
                </li>
                <li class=" mobile-menu__language mobile-menu__btn-wrap">
                    <div class="header__favorite">
                        <a href="">
                            <img src="<?= SERVER_URL ?>style/icons/ic_heart.svg" alt="favorite">
                        </a>
                    </div>
                    <button class="green-btn"><?= $this->text('Замовити дзвінок', 0) ?></button>
                </li>
            </ul>
        </div>
    </div>
</header>