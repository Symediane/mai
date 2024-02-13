document.addEventListener("DOMContentLoaded", () => {
  const $header = document.querySelector(".header");

  let lastScrollTop = 0;
  document.querySelector("body").addEventListener("scroll",() => {
      console.log($header);
      let st = document.querySelector("body").scrollTop;
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
