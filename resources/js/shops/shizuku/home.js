// document.addEventListener('DOMContentLoaded', function() {
//     const overlay = document.querySelector('.home-gradient-overlay');
//     const homeHeader = document.querySelector('.home-header');
//     const homeContent = document.querySelector('.home-content');
//     const homeSchedule = document.querySelector('.home-schedule');
    
//     if (overlay) {
//         function handleScroll() {
//             const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
//             // Start showing overlay immediately when scrolling
//             // Increase opacity gradually as user scrolls
//             // Adjust these values to control when and how fast the overlay appears
//             const startFade = 0; // Start fading in immediately
//             const fadeDistance = 500; // Distance in pixels to reach full opacity
            
//             let opacity = 0;
//             if (scrollTop > startFade) {
//                 // Calculate opacity based on scroll position
//                 const scrollAmount = scrollTop - startFade;
//                 opacity = Math.min(scrollAmount / fadeDistance, 1);
//             }
            
//             overlay.style.opacity = opacity;
            
//             // Handle sticky header
//             if (homeHeader && homeContent) {
//                 const headerRect = homeHeader.getBoundingClientRect();
//                 const scheduleRect = homeSchedule ? homeSchedule.getBoundingClientRect() : null;
                
//                 // Check if we've scrolled past the home-schedule section
//                 const pastSchedule = scheduleRect && scheduleRect.top < 0;
                
//                 // When header reaches top of viewport (top <= 0) and not past schedule
//                 if (headerRect.top <= 0 && !pastSchedule) {
//                     homeHeader.classList.add('fixed-header');
//                     // Add padding to content to prevent jump when header becomes fixed
//                     if (!homeContent.dataset.originalPadding) {
//                         homeContent.dataset.originalPadding = homeContent.style.paddingTop || '';
//                         homeContent.style.paddingTop = homeHeader.offsetHeight + 'px';
//                     }
//                 } else {
//                     homeHeader.classList.remove('fixed-header');
//                     // Restore original padding
//                     if (homeContent.dataset.originalPadding !== undefined) {
//                         homeContent.style.paddingTop = homeContent.dataset.originalPadding;
//                         delete homeContent.dataset.originalPadding;
//                     }
//                 }
//             }
//         }
        
//         // Initial check
//         handleScroll();
        
//         // Throttle scroll event for better performance
//         let ticking = false;
//         window.addEventListener('scroll', function() {
//             if (!ticking) {
//                 window.requestAnimationFrame(function() {
//                     handleScroll();
//                     ticking = false;
//                 });
//                 ticking = true;
//             }
//         }, { passive: true });
//     }
// });

