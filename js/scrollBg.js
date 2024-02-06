window.onload = function() {
  var presseElement = document.querySelector('.presse');

  if (presseElement) {
    var initialBackgroundSize = 100;

    window.addEventListener('scroll', function() {
      var newBackgroundSize = initialBackgroundSize + window.scrollY * 0.1;
      presseElement.style.backgroundSize = newBackgroundSize + '%';
    });
  }
};
