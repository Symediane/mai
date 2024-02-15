document.addEventListener("DOMContentLoaded", () => {
  const $bg = document.querySelector(".vertical-scroll .main-content");

  if ($bg) {
    const yPos = -$bg.scrollTop / 2;
    $bg.style.backgroundPosition = `50% ${yPos}px`;

    $bg.addEventListener('scroll', function() {
      console.log("scroll desktop");
      const yPos = -$bg.scrollTop / 2;
      $bg.style.backgroundPosition = `50% ${yPos}px`;
    });

    window.addEventListener('scroll', function() {
      console.log("scroll mobile");
      const yPos = -window.scrollY / 5;
      $bg.style.backgroundPosition = `50% ${yPos}px`;
    });
  }
});
