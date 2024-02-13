document.addEventListener("DOMContentLoaded", function () {
  const header = document.querySelector(".header");
  const horizontal = document.querySelector("[data-scroll-container]");

  if(horizontal) {
    setTimeout(() => {
      var scroll = new LocomotiveScroll({
        el: horizontal,
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
    }, 400);
  }

});
