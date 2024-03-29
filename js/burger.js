document.addEventListener("DOMContentLoaded", () => {
   const $header = document.querySelector(".header");
   const $menu = document.querySelector(".header__menu");
   const $menu_top = document.querySelector(".header__menu__top");
   const $nav = document.querySelector(".header__menu__nav");
   const $navTwo = document.querySelector(".header__menu__nav.--secondary");
   const $burger = document.querySelector(".header__burger");
   const $close = document.querySelector(".header__close");

   const $soon = document.querySelector(".soon a");

   if ($burger) {
      $burger.addEventListener("click", () => {
         toggle();
      });
   }

   document.addEventListener("click", (e) => {
      if (
         e.target.closest(".header__menu") &&
         !e.target.closest(".header__menu__nav") &&
         !e.target.closest(".header__menu__nav.--secondary")
      ) {
         toggle();
      }
   });

   if ($soon) {
      $soon.addEventListener("click", () => {
        $header.classList.remove("--active");
        $menu_top.classList.remove("--active");
        $burger.classList.remove("--active");
        $menu.classList.remove("--active");
        $nav.classList.remove("--active");
        $navTwo.classList.remove("--active");
        $close.classList.remove("--active");
      });
   }

   function toggle() {
      $header.classList.toggle("--active");
      $menu_top.classList.toggle("--active");
      $burger.classList.toggle("--active");
      $menu.classList.toggle("--active");
      $nav.classList.toggle("--active");
      $navTwo.classList.toggle("--active");
      $close.classList.toggle("--active");
   }
});
