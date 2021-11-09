



  // Function that get started when you click the tab

$('.tab-link').on('click', function() {
    // get and save clicked tab ID
    var tabID = $(this).attr('data-tab');
    // remove active menu status from tab bar
    $('.tab-link').removeClass('active-menu');
    // add active menu status to clicked tab
    $(this).addClass('active-menu');
    // fade out slide over .3s
    $('.active-tab').fadeOut(300);
    // wait and then slide in the correct slide
    setTimeout(function() {
      // removes the active (animation) class from all slides
      $('.slide').removeClass('active-tab');
      // add active (animation) class to the right slide
      $('#' + tabID).show().addClass('active-tab');
    }, 300); // timeout is .3s longs, which matches the fade out
  });