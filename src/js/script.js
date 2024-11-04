document.addEventListener("DOMContentLoaded", function () {
  const swiper = new Swiper(".swiper", {
    slidesPerView: 6,
    spaceBetween: 16,
    slidesPerGroup: 1,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      320: {
        slidesPerView: 2,
        spaceBetween: 8,
        grabCursor: true, // Aktifkan geser manual di mobile
        touchRatio: 1, // Swipe manual aktif di mobile
      },
      768: {
        slidesPerView: 4,
        spaceBetween: 16,
        grabCursor: true, // Tetap aktifkan geser manual di tablet
        touchRatio: 1,
      },
      1024: {
        slidesPerView: 6,
        spaceBetween: 16,
        grabCursor: false, // Nonaktifkan geser manual di desktop
        touchRatio: 0, // Nonaktifkan swipe di desktop
      },
    },
  });
});
