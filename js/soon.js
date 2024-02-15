document.addEventListener("DOMContentLoaded", () => {
  const $home = document.querySelector(".home");
  const $soon = document.querySelector(".soon a");
  if ($home && $soon) {
    $soon.setAttribute("data-scroll-to", "");
    setTimeout(() => {
    $soon.setAttribute("href", "#soon");
    }, 300);
  }
  if (!$home && $soon) {
    $soon.setAttribute("href", "/?id=soon");
  }
  const urlParams = new URLSearchParams(window.location.search);
  const soonParam = urlParams.get("id");
  if (soonParam) {
    setTimeout(() => {
      if ($soon) {
        $soon.click();
      }
    }, 300);
  }
});
