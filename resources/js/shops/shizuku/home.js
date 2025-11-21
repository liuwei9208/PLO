document.addEventListener('DOMContentLoaded', function() {
    const overlay = document.querySelector('.home-gradient-overlay');
    
    if (overlay) {
        function handleScroll() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            // Start showing overlay immediately when scrolling
            // Increase opacity gradually as user scrolls
            // Adjust these values to control when and how fast the overlay appears
            const startFade = 0; // Start fading in immediately
            const fadeDistance = 500; // Distance in pixels to reach full opacity
            
            let opacity = 0;
            if (scrollTop > startFade) {
                // Calculate opacity based on scroll position
                const scrollAmount = scrollTop - startFade;
                opacity = Math.min(scrollAmount / fadeDistance, 1);
            }
            
            overlay.style.opacity = opacity;
        }
        
        // Initial check
        handleScroll();
        
        // Throttle scroll event for better performance
        let ticking = false;
        window.addEventListener('scroll', function() {
            if (!ticking) {
                window.requestAnimationFrame(function() {
                    handleScroll();
                    ticking = false;
                });
                ticking = true;
            }
        }, { passive: true });
    }
});

