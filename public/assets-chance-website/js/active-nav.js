    const container = document.querySelector('.container');
    const links = container.querySelectorAll('.nav.navbar-nav.nav-white.text-uppercase li');

    const currentLocation = window.location.href;

    links.forEach(link => {
        const anchor = link.querySelector('a');
        if (anchor.getAttribute('href') && currentLocation.includes(anchor.getAttribute('href'))) {
            link.classList.add('active');
        }
    });
