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


$('#call, .modal-bcg').on('click', function () {
  console.log($(this))
  toggleCallModal();
})

function toggleCallModal() {
  $('.modal-wrap').fadeToggle(100);
  $('.modal-bcg').fadeToggle(100);
}
