document.addEventListener("DOMContentLoaded", function () {
  const header = document.querySelector(".header");
  const scroll = new LocomotiveScroll({
    el: document.querySelector("[data-scroll-container]"),
    smooth: true,
    direction: "horizontal",
  });
  if (scroll){
    scroll.on("scroll", (args) => {
      const scrollX = args.scroll.x;
      if (scrollX > 100){
        header.classList.add("--hide");
      } else {
        header.classList.remove("--hide");
      }
    });
  }

});
