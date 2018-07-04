<?php include("/config/header.php"); ?>
<div class="container">
<h1>Photo Essay</h1>
<hr>
<div class="row">
  <div class="column">
    <img src="img/rice-museum2.jpg" style="width:100%" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
  </div>
  <div class="column">
    <img src="img/rice-museum.jpg" style="width:100%" onclick="openModal();currentSlide(2)" class="hover-shadow cursor">
  </div>
  <div class="column">
    <img src="img/transformation-in-progress.jpg" style="width:100%" onclick="openModal();currentSlide(3)" class="hover-shadow cursor">
  </div>
  <div class="column">
    <img src="img/philrice.jpg" style="width:100%" onclick="openModal();currentSlide(4)" class="hover-shadow cursor">
  </div>
</div>
<div id="ModalPhoto" class="modal-photo">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content">

    <div class="PhotoSlides">
      <div class="numbertext">1 / 4</div>
      <img src="img/rice-museum2.jpg" style="width:100%">
    </div>

    <div class="PhotoSlides">
      <div class="numbertext">2 / 4</div>
      <img src="img/rice-museum.jpg" style="width:100%">
    </div>

    <div class="PhotoSlides">
      <div class="numbertext">3 / 4</div>
      <img src="img/transformation-in-progress.jpg" style="width:100%">
    </div>
    
    <div class="PhotoSlides">
      <div class="numbertext">4 / 4</div>
      <img src="img/philrice.jpg" style="width:100%">
    </div>
    
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>

    <div class="caption-container">
      <p id="caption"></p>
    </div>


    <div class="column">
      <img class="demo cursor" src="img/rice-museum2.jpg" style="width:100%" onclick="currentSlide(1)" alt="">
    </div>
    <div class="column">
      <img class="demo cursor" src="img/rice-museum.jpg" style="width:100%" onclick="currentSlide(2)" alt="">
    </div>
    <div class="column">
      <img class="demo cursor" src="img/transformation-in-progress.jpg" style="width:100%" onclick="currentSlide(3)" alt="">
    </div>
    <div class="column">
      <img class="demo cursor" src="img/philrice.jpg" style="width:100%" onclick="currentSlide(4)" alt="">
    </div>
  </div>
</div>
<script>
function openModal() {
  document.getElementById('ModalPhoto').style.display = "block";
}

function closeModal() {
  document.getElementById('ModalPhoto').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("PhotoSlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
<br>
</div>
    
<?php include("/config/footer.php"); ?>