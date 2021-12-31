// Toggle password visibility
function showPassword() {
  var x = document.getElementById('myPassword');
  if (x.type === 'password') {
    x.type = 'text';
  } else {
    x.type = 'password';
  }
}

// Slick Penyakit
$('.slickPenyakit').slick({
  centerMode: true,
  centerPadding: '60px',
  slidesToShow: 3,
  dots: true,
  arrows: true,

  responsive: [
    {
      breakpoint: 768,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 3,
      },
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        centerMode: true,
        centerPadding: '40px',
        slidesToShow: 1,
      },
    },
  ],
});
