document.addEventListener('scroll', function () {
    var scrollPosition = window.pageYOffset || document.documentElement.scrollTop;
    var button = document.getElementById('scrollToTopButton');
  
    if (scrollPosition > 200) { // Show button when user scrolls down 100px from the top of the document
      button.style.display = 'block';
      button.style.opacity = '1';
    } else {
      button.style.opacity = '0';
      setTimeout(function () { button.style.display = 'none'; }, 500); // Delay to hide after transition
    }
  });
  
  function scrollToTop() {
    window.scrollTo({ top: 0, behavior: 'smooth' }); // Smooth scroll to the top
  }