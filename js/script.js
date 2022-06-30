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

localStorage.clear();

let test = [
  {
    name: 'qeqwe',
    testwww: 'qeqwewq'
  },
  {
    name: 'qeqw123e',
    testwww: 'qeqwew123q'
  }
]

if (!localStorage.hasOwnProperty("favorites")) {
  localStorage.setItem('favorites', JSON.stringify([]))
}


function populateStorage(id) {
  let item_link = $(`#link-${id}`).attr('href');
  let item_photo = $(`#img-${id}`).attr('src');
  let item_name = $(`#name-${id}`).html();
  let item_location = $(`#location-${id}`).html();
  let item_price = $(`#price-${id}`).html();

  let newObj = {
    id: id,
    link: item_link,
    photo: item_photo,
    name: item_name,
    location: item_location,
    price: item_price,
  }


  let copyArray = [...JSON.parse(localStorage.getItem('favorites'))];

  console.log(copyArray)

  if (copyArray.indexOf(item => item.id === newObj.id) === -1) {
    localStorage.removeItem('favorites')
    copyArray.push(newObj);
    console.log(copyArray)
    localStorage.setItem('favorites', JSON.stringify(copyArray));

  }


  if (localStorage.getItem(id) != 'liked') {
    // localStorage.setItem(id, JSON.stringify(test).push());
    $('#like' + id).hide();
    $('#dislike' + id).show();
  } else {
    localStorage.removeItem(id);
    $('#like' + id).show();
    $('#dislike' + id).hide();
  }

  console.log(JSON.parse(localStorage.getItem('favorites')));

}



$('.item-card__heart-like').each(function (index) {

  if (localStorage.hasOwnProperty($(this).attr('data-status'))) {
    $(`.dislike[data-status~=${$(this).attr('data-status')}]`).show();
    $(this).hide();
  }

})
