var magnifying_area = document.getElementById("magnifying_area");
var magnifying_img = document.getElementById("magnifying_img");

magnifying_area.addEventListener("mousemove", function(event) {

  clientX = event.clientX - magnifying_area.offsetLeft
  clientY = event.clientY - magnifying_area.offsetTop

  mWidth  = magnifying_area.offsetWidth
  mHeight = magnifying_area.offsetHeight

  clientX = clientX / mWidth * 100
  clientY = clientX / mHeight * 100

  magnifying_img.style.transform = 'translate(-'+clientX+'%, -'+clientY+'%) scale(2)'
  // magnifying_img.style.transform = 'translate(-0%, -50%) scale(2)'

});

magnifying_area.addEventListener("mouseleave", function() {

  magnifying_img.style.transform = 'translate(-0%, -50%) scale(1)'

});