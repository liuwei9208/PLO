document.addEventListener('DOMContentLoaded', function() {
    const overlay = document.querySelector('.home-gradient-overlay');
    const homeHeader = document.querySelector('.home-header');
    const homeContent = document.querySelector('.home-content');
    const homeSchedule = document.querySelector('.home-schedule-title');
    
    // Menu toggle functionality
    const menuButton = document.querySelector('.menu-button');
    const mobileMenuButton = document.getElementById('mobileMenuButton');
    const menuOverlay = document.getElementById('menuOverlay');
    const menuClose = document.getElementById('menuClose');
    
    function openMenu() {
        if (menuOverlay) {
            menuOverlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
    }
    
    function closeMenu() {
        if (menuOverlay) {
            menuOverlay.classList.remove('active');
            document.body.style.overflow = '';
        }
    }
    
    if (menuButton && menuOverlay && menuClose) {
        menuButton.addEventListener('click', openMenu);
        
        // Also add click handler for mobile menu button if it exists
        if (mobileMenuButton) {
            mobileMenuButton.addEventListener('click', openMenu);
        }
        
        menuClose.addEventListener('click', closeMenu);
        
        // Close menu when clicking outside content
        menuOverlay.addEventListener('click', function(e) {
            if (e.target === menuOverlay) {
                closeMenu();
            }
        });
        
        // Close menu with Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && menuOverlay.classList.contains('active')) {
                closeMenu();
            }
        });
    }
    
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
            
            // Handle sticky header
            if (homeHeader && homeContent) {
                const headerRect = homeHeader.getBoundingClientRect();
                const scheduleRect = homeSchedule ? homeSchedule.getBoundingClientRect() : null;
                const headerHeight = homeHeader.offsetHeight;
                
                // Calculate distance from bottom of header to top of schedule section
                // When header is fixed at top (top = 0), we check if schedule is within 100px
                const distanceToSchedule = scheduleRect ? scheduleRect.top - headerHeight : Infinity;
                
                // Header should be fixed when:
                // 1. Header has reached the top of viewport (headerRect.top <= 0)
                // 2. AND schedule section is more than 100px away (distanceToSchedule > 100)
                const shouldBeFixed =  distanceToSchedule  <= 0;
                
                if (shouldBeFixed) {
                    if (!homeHeader.classList.contains('fixed-header')) {
                        homeHeader.classList.add('fixed-header');
                    }
                } else {
                    if (homeHeader.classList.contains('fixed-header')) {
                        homeHeader.classList.remove('fixed-header');
                    }
                }
            }
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
    
    // News slider functionality
    const newsSlider = document.querySelector('.news-content');
    const newsPrevBtn = document.querySelector('.news-slider-prev');
    const newsNextBtn = document.querySelector('.news-slider-next');
    
    if (newsSlider && newsPrevBtn && newsNextBtn) {
        const cardWidth = 165; // Fixed card width
        const gap = 15; // Gap between cards
        const scrollAmount = cardWidth + gap;
        
        function updateNewsButtonStates() {
            const scrollLeft = newsSlider.scrollLeft;
            const maxScroll = newsSlider.scrollWidth - newsSlider.clientWidth;
            
            newsPrevBtn.disabled = scrollLeft <= 0;
            newsNextBtn.disabled = scrollLeft >= maxScroll - 1;
        }
        
        newsPrevBtn.addEventListener('click', function() {
            newsSlider.scrollBy({
                left: -scrollAmount,
                behavior: 'smooth'
            });
        });
        
        newsNextBtn.addEventListener('click', function() {
            newsSlider.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            });
        });
        
        // Update button states on scroll
        newsSlider.addEventListener('scroll', updateNewsButtonStates);
        
        // Initial button state
        updateNewsButtonStates();
        
        // Update on window resize
        window.addEventListener('resize', updateNewsButtonStates);
    }
    
    // Photo Diary slider functionality
    const diarySlider = document.querySelector('.diary-content');
    const diaryPrevBtn = document.querySelector('.diary-slider-prev');
    const diaryNextBtn = document.querySelector('.diary-slider-next');
    
    if (diarySlider && diaryPrevBtn && diaryNextBtn) {
        const cardWidth = 130; // Fixed card width
        const gap = 15; // Gap between cards
        const scrollAmount = cardWidth + gap;
        
        function updateDiaryButtonStates() {
            const scrollLeft = diarySlider.scrollLeft;
            const maxScroll = diarySlider.scrollWidth - diarySlider.clientWidth;
            
            diaryPrevBtn.disabled = scrollLeft <= 0;
            diaryNextBtn.disabled = scrollLeft >= maxScroll - 1;
        }
        
        diaryPrevBtn.addEventListener('click', function() {
            diarySlider.scrollBy({
                left: -scrollAmount,
                behavior: 'smooth'
            });
        });
        
        diaryNextBtn.addEventListener('click', function() {
            diarySlider.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            });
        });
        
        // Update button states on scroll
        diarySlider.addEventListener('scroll', updateDiaryButtonStates);
        
        // Initial button state
        updateDiaryButtonStates();
        
        // Update on window resize
        window.addEventListener('resize', updateDiaryButtonStates);
    }
    
    // New Girl slider functionality
    const newGirlSlider = document.querySelector('.new-girl-slider-content');
    const newGirlPrevBtn = document.querySelector('.new-girl-slider-prev');
    const newGirlNextBtn = document.querySelector('.new-girl-slider-next');
    const sliderDots = document.querySelectorAll('.slider-dots .dot');
    
    if (newGirlSlider && newGirlPrevBtn && newGirlNextBtn) {
        const cardWidth = 640; // Fixed card width
        const gap = 20; // Gap between cards
        const cardsPerScroll = 2; // Move 2 cards at a time
        const scrollAmount = (cardWidth + gap) * cardsPerScroll;
        
        let currentPage = 0;
        const totalPages = sliderDots.length;
        
        function updateNewGirlState() {
            const scrollLeft = newGirlSlider.scrollLeft;
            const maxScroll = newGirlSlider.scrollWidth - newGirlSlider.clientWidth;
            
            // Calculate current page based on scroll position
            currentPage = Math.round(scrollLeft / scrollAmount);
            
            // Update button states
            newGirlPrevBtn.disabled = scrollLeft <= 0;
            newGirlNextBtn.disabled = scrollLeft >= maxScroll - 1;
            
            // Update dots
            sliderDots.forEach((dot, index) => {
                if (index === currentPage) {
                    dot.classList.add('active');
                } else {
                    dot.classList.remove('active');
                }
            });
        }
        
        newGirlPrevBtn.addEventListener('click', function() {
            newGirlSlider.scrollBy({
                left: -scrollAmount,
                behavior: 'smooth'
            });
        });
        
        newGirlNextBtn.addEventListener('click', function() {
            newGirlSlider.scrollBy({
                left: scrollAmount,
                behavior: 'smooth'
            });
        });
        
        // Dot click functionality
        sliderDots.forEach((dot, index) => {
            dot.addEventListener('click', function() {
                const targetScroll = index * scrollAmount;
                newGirlSlider.scrollTo({
                    left: targetScroll,
                    behavior: 'smooth'
                });
            });
        });
        
        // Update state on scroll
        newGirlSlider.addEventListener('scroll', updateNewGirlState);
        
        // Initial state
        updateNewGirlState();
        
        // Update on window resize
        window.addEventListener('resize', updateNewGirlState);
    }
});

