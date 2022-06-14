$(document).ready(function(){
  $('.newSlider').slick({
    dots: true,
    infinite: true,
    speed: 1000,
    centerMode: false,
    slidesToShow: 2,
    slidesToScroll: 2,
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
          focusOnSelect: true,
          centerMode: false,
        }
      }
    ]
  })

  $('.aroundSlider').slick({
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
        }
      },
      {
        breakpoint: 700,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          focusOnSelect: true,
          centerMode: true,
        }
      }
    ]
  })
  
});

