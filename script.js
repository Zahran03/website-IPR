document.addEventListener("DOMContentLoaded", function () {
  const carouselItems = document.querySelectorAll(".carousel-item");
  let currentIndex = 0;
  const totalItems = carouselItems.length;

  function showSlide(index) {
    carouselItems.forEach((item, i) => {
      if (i === index) {
        item.classList.add("active");
      } else {
        item.classList.remove("active");
      }
    });
  }

  // Mengganti slide secara otomatis setiap 3 detik
  setInterval(() => {
    currentIndex = (currentIndex + 1) % totalItems;
    showSlide(currentIndex);
  }, 4000);
});
