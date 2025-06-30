// Main JavaScript file for English Tips
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all components
    initNavbar();
    initScrollAnimations();
    initSmoothScrolling();
    initNewsletterForm();
});

// Navbar functionality
function initNavbar() {
    const navbar = document.querySelector('.navbar');
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.querySelector('.navbar-collapse');

    // Handle navbar background on scroll
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Close mobile menu when clicking on links
    const navLinks = document.querySelectorAll('.navbar-nav .nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (navbarCollapse.classList.contains('show')) {
                navbarToggler.click();
            }
        });
    });
}

// Scroll animations
function initScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in-up');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // Observe elements for animation
    const animateElements = document.querySelectorAll('.blog-card, .category-card, .stat-item, .value-card');
    animateElements.forEach(el => observer.observe(el));
}

// Smooth scrolling for anchor links
function initSmoothScrolling() {
    const links = document.querySelectorAll('a[href^="#"]');

    links.forEach(link => {
        link.addEventListener('click', function(e) {
            const href = this.getAttribute('href');

            if (href === '#') return;

            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();

                const offsetTop = target.offsetTop - 80; // Account for fixed navbar

                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// Newsletter form handling
function initNewsletterForm() {
    const newsletterForms = document.querySelectorAll('form[id*="newsletter"]');

    newsletterForms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            handleNewsletterSubmission(this);
        });
    });
}

function handleNewsletterSubmission(form) {
    const formData = new FormData(form);
    const email = formData.get('email');
    const firstName = formData.get('firstName') || formData.get('name');

    if (!email || !firstName) {
        showNotification('Por favor, preencha todos os campos obrigatórios.', 'error');
        return;
    }

    if (!isValidEmail(email)) {
        showNotification('Por favor, insira um email válido.', 'error');
        return;
    }

    // Show loading state
    const submitBtn = form.querySelector('button[type="submit"]');
    const originalText = submitBtn.innerHTML;
    submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Enviando...';
    submitBtn.disabled = true;

    // Simulate API call (replace with actual implementation)
    setTimeout(() => {
        // Reset button
        submitBtn.innerHTML = originalText;
        submitBtn.disabled = false;

        // Show success message
        showNotification('Obrigado! Você foi inscrito com sucesso na nossa newsletter.', 'success');

        // Reset form
        form.reset();

        // Track conversion (replace with actual analytics)
        if (typeof gtag !== 'undefined') {
            gtag('event', 'newsletter_signup', {
                'event_category': 'engagement',
                'event_label': 'newsletter'
            });
        }
    }, 2000);
}

// Email validation
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Notification system
function showNotification(message, type = 'info') {
    // Remove existing notifications
    const existingNotifications = document.querySelectorAll('.notification');
    existingNotifications.forEach(notification => notification.remove());

    // Create notification element
    const notification = document.createElement('div');
    notification.className = `notification alert alert-${type === 'error' ? 'danger' : type} alert-dismissible fade show`;
    notification.style.cssText = `
        position: fixed;
        top: 100px;
        right: 20px;
        z-index: 9999;
        min-width: 300px;
        max-width: 500px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    `;

    notification.innerHTML = `
        ${message}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    `;

    document.body.appendChild(notification);

    // Auto remove after 5 seconds
    setTimeout(() => {
        if (notification.parentNode) {
            notification.remove();
        }
    }, 5000);
}

// Utility functions
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

function throttle(func, limit) {
    let inThrottle;
    return function() {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

// Performance optimization
function lazyLoadImages() {
    const images = document.querySelectorAll('img[data-src]');

    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.classList.remove('lazy');
                imageObserver.unobserve(img);
            }
        });
    });

    images.forEach(img => imageObserver.observe(img));
}

// Initialize lazy loading if images with data-src exist
if (document.querySelectorAll('img[data-src]').length > 0) {
    lazyLoadImages();
}

// Handle external links
document.addEventListener('click', function(e) {
    const link = e.target.closest('a');
    if (link && link.hostname !== window.location.hostname) {
        link.setAttribute('target', '_blank');
        link.setAttribute('rel', 'noopener noreferrer');
    }
});

// Add loading states to buttons
document.addEventListener('click', function(e) {
    const button = e.target.closest('button[type="submit"], .btn[href]');
    if (button && !button.disabled) {
        // Add loading class for visual feedback
        button.classList.add('loading');

        // Remove loading class after a short delay
        setTimeout(() => {
            button.classList.remove('loading');
        }, 1000);
    }
});

// Keyboard navigation improvements
document.addEventListener('keydown', function(e) {
    // Skip to main content with Tab key
    if (e.key === 'Tab' && !e.shiftKey && document.activeElement === document.body) {
        const mainContent = document.querySelector('main, .main-content, #main');
        if (mainContent) {
            mainContent.focus();
            e.preventDefault();
        }
    }
});

// Print functionality
function printArticle() {
    window.print();
}

// Share functionality
function shareArticle(platform, url, title) {
    const shareUrls = {
        facebook: `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}`,
        twitter: `https://twitter.com/intent/tweet?url=${encodeURIComponent(url)}&text=${encodeURIComponent(title)}`,
        linkedin: `https://www.linkedin.com/sharing/share-offsite/?url=${encodeURIComponent(url)}`,
        whatsapp: `https://wa.me/?text=${encodeURIComponent(title + ' ' + url)}`
    };

    if (shareUrls[platform]) {
        window.open(shareUrls[platform], '_blank', 'width=600,height=400');
    }
}

// Make functions globally available
window.printArticle = printArticle;
window.shareArticle = shareArticle;
