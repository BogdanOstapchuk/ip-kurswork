let dots = document.getElementsByClassName("dots-item"),
  dotsArea = document.getElementsByClassName("dots-block")[0],
  slides = document.getElementsByClassName("slider-item"),
  prevBtn = document.getElementById("left-button"),
  nextBtn = document.getElementById("right-button"),
  sliderIndex = 1;

showSliders(sliderIndex);

function showSliders(n) {
  if (n < 1) {
    sliderIndex = slides.length;
  } else if (n > slides.length) {
    sliderIndex = 1;
  }
  for (let i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (let j = 0; j < dots.length; j++) {
    dots[j].classList.remove("active-slide");
  }
  slides[sliderIndex - 1].style.display = "block";
  dots[sliderIndex - 1].classList.add("active-slide");
}

function plusSlides(n) {
  let i = (sliderIndex += n);
  showSliders(i);
}
function currentSlider(n) {
  showSliders((sliderIndex = n));
}
prevBtn.onclick = function () {
  plusSlides(-1);
};
nextBtn.onclick = function () {
  plusSlides(1);
};
dotsArea.onclick = function (e) {
  for (let index = 0; index < dots.length + 1; index++) {
    if (
      e.target.classList.contains("dots-item") &&
      e.target == dots[index - 1]
    ) {
      currentSlider(index);
    }
  }
};
