function adjustFooter() {
    const content = document.getElementById('mainContent');
    const footer = document.getElementById('mainFooter');

    const windowHeight = window.innerHeight;
    const contentHeight = document.body.scrollHeight;

    if (contentHeight < windowHeight) {
      footer.classList.add('sticky-footer');
    } else {
      footer.classList.remove('sticky-footer');
    }
  }

  window.addEventListener('load', adjustFooter);
  window.addEventListener('resize', adjustFooter);
