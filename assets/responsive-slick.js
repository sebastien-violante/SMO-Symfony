$('.slider').slick({
    dots: false,
    infinite: true,
    speed: 1000,
    centerMode: false,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: false
        }
      },
      /* {
        breakpoint: 600,
        settings: {
          slidesToShow: 5,
          slidesToScroll: 5,
        }
      }, */
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });