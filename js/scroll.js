document.addEventListener("DOMContentLoaded", () => {
  const $header = document.querySelector(".header");

  let lastScrollTop = 0;
  window.addEventListener("scroll",() => {
      let st = document.documentElement.scrollTop;
      if (st <= 100) {
        $header.classList.remove("--white");
      }
      else {
        $header.classList.add("--white");
      }
      lastScrollTop = st <= 100 ? 100 : st;
    },
    false
  );
});
