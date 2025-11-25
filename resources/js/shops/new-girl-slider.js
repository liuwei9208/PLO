document.addEventListener('DOMContentLoaded', function() {
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

