document.addEventListener("DOMContentLoaded", () => {
  const $videos = document.querySelectorAll(".home__video, .video");

  if ($videos) {
    $videos.forEach(($video) => {
      setTimeout(() => {
        var observer = new IntersectionObserver(
          function (entries) {
            if (entries[0].intersectionRatio > 0) {
              $video.play();
            }
          }, {
            threshold: [0.5]
          }
        );
        observer.observe($video);

        const $muteIcon = $video.parentElement.querySelector(".mute-icon");
        const $unmuteIcon = $video.parentElement.querySelector(".unmute-icon");

        if ($muteIcon && $unmuteIcon) {
          $muteIcon.addEventListener("click", (event) => {
            event.preventDefault();
            $video.muted = false;
            $muteIcon.style.display = "none";
            $unmuteIcon.style.display = "block";
          });

          $unmuteIcon.addEventListener("click", (event) => {
            event.preventDefault();
            $video.muted = true;
            $unmuteIcon.style.display = "none";
            $muteIcon.style.display = "block";
          });
        }
      }, 500);
    });
  }
});
