$(document).ready(function(){
  $('.slider').slick({
    dots: true,
    infinite: true,
    speed: 1000,
    centerMode: false,
    slidesToShow: 3,
    slidesToScroll: 3,
    responsive: [
      {
        breakpoint: 900,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 700,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          dots: true,
          focusOnSelect: true
        }
      }
    ]
  })

  $('.around-logo').on('click', function() {
    $('slider').slick('slickAdd', '<p>Hello !</p>')
  })
  
});

