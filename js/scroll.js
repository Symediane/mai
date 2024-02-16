document.addEventListener("DOMContentLoaded", () => {
  const $header = document.querySelector(".header");
  const verticalScroll = document.querySelector(".vertical-scroll .main-content");

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

  if(verticalScroll){
    verticalScroll.addEventListener("scroll",() => {
      let st = verticalScroll.scrollTop;
      if (st <= 10) {
        $header.classList.remove("--white");
      }
      else {
        $header.classList.add("--white");
      }
      lastScrollTop = st <= 10 ? 10 : st;
    },
    false
  );
  }

});
