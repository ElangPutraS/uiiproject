(function () {
  return {
    main: function () {
      $('#nav-menu').children().clone().appendTo($('#mobile-menu'));

      $('#mobile-menu .close.icon').click(function () {
        $('#dimmer-mobile-menu').dimmer('hide');
      })
      $('#nav-menu-toggler').click(function () {
        $('#nav-menu')
        $('#dimmer-mobile-menu').dimmer('show');
      });
    },
  }
})().main()
