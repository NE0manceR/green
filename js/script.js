// ========== mobile menu ==========

let body = $('body');
let mobile_menu_wrap = $('.mobile-menu__wrap');

$('.header__burger, .mobile-menu').on('click', function (event) {
  if (event.target.classList.contains('mobile-menu') || event.currentTarget.classList.contains('header__burger')) {
    toggle_menu();
  }
})

function toggle_menu() {
  if (body.hasClass('active')) {
    mobile_menu_wrap.addClass('hide');

    setTimeout(() => {
      body.toggleClass('active');
      mobile_menu_wrap.removeClass('hide');

    }, 200)

    return;
  }
  body.toggleClass('active');
}

// ========== modal window ==========

let modal_wrap = $('.modal-wrap');
let modal_bcg = $('.modal-bcg');
let favorite_list = $('.favorite-list');
let body_block = $('body');
let header_favorite = $('.header__favorite');

$('.call').on('click', function () {
  toggle_call_modal();
  toggle_bcg();
  toggle_body_hide();
})

header_favorite.on('click', function () {
  toggle_favorite_list();
  toggle_bcg();
  toggle_body_hide();
  header_favorite_active();
})

function header_favorite_active() {
  header_favorite.toggleClass('active');
}

modal_bcg.on('click', function () {
  modal_wrap.hide();
  favorite_list.hide();
  toggle_bcg();
  toggle_body_hide();
  header_favorite_active();
})

function toggle_favorite_list() {
  favorite_list.fadeToggle(100);
}

function toggle_body_hide() {
  body_block.toggleClass('hide');
}

function toggle_call_modal() {
  modal_wrap.fadeToggle(100);
}

function toggle_bcg() {
  modal_bcg.fadeToggle(100);
}

// localstorage
// localStorage.clear();

let header_favorite_list = document.querySelector('.favorite-list__items');
let header_favorite_arr = ''
if (!localStorage.hasOwnProperty("favorites")) {
  localStorage.setItem('favorites', JSON.stringify([]))
}

add_favorite_to_list();

function populateStorage(id) {
  let favorites_item = {
    id: id,
    link: $(`#link-${id}`).attr('href'),
    photo: $(`#img-${id}`).attr('src'),
    name: $(`#name-${id}`).html(),
    location: $(`#location-${id}`).html(),
    price: $(`#price-${id}`).html(),
    locationic: $(`#location_ic-${id}`).attr('src'),
  }

  let copy_favorites = [...JSON.parse(localStorage.getItem('favorites'))];

  if (copy_favorites.find((item) => item.id === favorites_item.id) === undefined) {
    copy_favorites.push(favorites_item);
    localStorage.setItem('favorites', JSON.stringify(copy_favorites));
    change_heart_status('show', id);
    add_favorite_to_list();
  } else {
    let remove_item = copy_favorites.filter((item) => item.id !== favorites_item.id);
    localStorage.setItem('favorites', JSON.stringify(remove_item));
    change_heart_status('hide', id);
    add_favorite_to_list();
  }
}

function change_heart_status(status, id) {
  if (status === 'show') {
    $('#like' + id).hide();
    $('#dislike' + id).show();
  } else {
    $('#like' + id).show();
    $('#dislike' + id).hide();
  }
}

//  генерує блок та додає його до Збереженого
function add_favorite_to_list() {

  if (JSON.parse(localStorage.getItem('favorites')).length !== 0) {
    header_favorite_list.innerHTML = "";
    console.log(JSON.parse(localStorage.getItem('favorites')));
    JSON.parse(localStorage.getItem('favorites')).forEach(({ locationic, link, location, name, photo, price }) => {
      header_favorite_list.insertAdjacentHTML('beforeend', `
      <a href="${link}" class="item-card">
      <div class="item-card__img">
          <img src="${photo}" alt="img">
      </div>
      <h3 class="item-card__title">
          ${name}
      </h3>
      <span class="item-card__location">
          <img class="item-card__location-icon" src="${locationic}" alt="img">
          ${location}
      </span>
      <span class="item-card__price">${price}</span>
      </a>
      `);
    });
  }
}

// перевіряє чи  лайкнуте вже
function like_heart() {
  JSON.parse(localStorage.getItem('favorites')).forEach((item) => {
    $(`.dislike[data-status~=${item.id}]`).show();
    $(`.item-card__heart-like[data-status~=${item.id}]`).hide();
  })
}

like_heart();
