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