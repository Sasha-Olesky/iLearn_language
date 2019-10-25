// rating slider
var rating_slider = document.getElementById('rating_slider');

noUiSlider.create(rating_slider, {
  start: [20, 80],
  connect: true,
  range: {
    'min': 0,
    'max': 100
  }
});

// price slider
var price_slider = document.getElementById('price_slider');

noUiSlider.create(price_slider, {
  start: [20, 80],
  connect: true,
  range: {
    'min': 0,
    'max': 100
  }
});