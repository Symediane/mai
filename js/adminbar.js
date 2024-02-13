document.addEventListener("DOMContentLoaded", () => {
  const $adminBar = document.querySelector("#wpadminbar");
  if ($adminBar) {
    setTimeout(() => {
      $adminBar.classList.add("--show");
    }, 500);
  }
});
