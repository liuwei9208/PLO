document.addEventListener('DOMContentLoaded', function() {
  const requirements = document.querySelectorAll('.recruit-interview__qa');
    requirements.forEach(function(item) {
        item.addEventListener('click', function() {
            const value = this.querySelector('.recruit-interview__answer');
            const iconActive = this.querySelector('.icon_active');
            const iconInactive = this.querySelector('.recruit-interview__icon:not(.icon_active)');
            if (value.style.display === 'block') {
                value.style.display = 'none';
                iconActive.style.display = 'none';
                iconInactive.style.display = 'block';
            } else {
                value.style.display = 'block';
                iconActive.style.display = 'block';
                iconInactive.style.display = 'none';
            }
        });
    });
  const requirements_faq = document.querySelectorAll('.recruit-faq__item');
    requirements_faq.forEach(function(item) {
        item.addEventListener('click', function() {
            const value = this.querySelector('.recruit-faq__answer');
            const iconActive = this.querySelector('.icon_active');
            const iconInactive = this.querySelector('.recruit-faq__icon:not(.icon_active)');
            if (value.style.display === 'block') {
                value.style.display = 'none';
                iconActive.style.display = 'none';
                iconInactive.style.display = 'block';
            } else {
                value.style.display = 'block';
                iconActive.style.display = 'block';
                iconInactive.style.display = 'none';
            }
        });
    });
});