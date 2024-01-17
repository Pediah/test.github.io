document.addEventListener("DOMContentLoaded", function () {
    const headsSection = document.querySelector('.heads');
    let lastScrollTop = 0;

    window.addEventListener('scroll', function () {
        const currentScrollTop = window.scrollY;

        // Toggle visibility using display property
        if (currentScrollTop > lastScrollTop) {
            // Scrolling down, hide the section
            headsSection.style.display = 'none';
        } else {
            // Scrolling up, show the section
            headsSection.style.display = 'block';
        }

        // Handle position of .heads based on scroll direction
        if (currentScrollTop > lastScrollTop) {
            headsSection.style.top = "-80px"; // Adjust this value as needed
        } else {
            headsSection.style.top = "0";
        }

        lastScrollTop = currentScrollTop;
    });
});
