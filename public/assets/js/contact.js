// Contact page specific JavaScript
document.addEventListener('DOMContentLoaded', function() {
    initContactForm();
    initFormValidation();
});

// Contact form handling
function initContactForm() {
    const contactForm = document.getElementById('contactForm');
    if (!contactForm) return;

    contactForm.addEventListener('submit', function(e) {
        e.preventDefault();
        handleContactSubmission(this);
    });
}

// Form validation
function initFormValidation() {
    const form = document.getElementById('contactForm');
    if (!form) return;

    const inputs = form.querySelectorAll('input, select, textarea');

    inputs.forEach(input => {
        // Real-time validation
        input.addEventListener('blur', function() {
            validateField(this);
        });

        input.addEventListener('input', function() {
            // Clear error state when user starts typing
            if (this.classList.contains('is-invalid')) {
                this.classList.remove('is-invalid');
                const feedback = this.parentNode.querySelector('.invalid-feedback');
                if (feedback) {
                    feedback.remove();
                }
            }
        });
    });
}

// Validate individual field
function validateField(field) {
    const value = field.value.trim();
    let isValid = true;
    let errorMessage = '';

    // Remove existing error state
    field.classList.remove('is-invalid');
    const existingFeedback = field.parentNode.querySelector('.invalid-feedback');
    if (existingFeedback) {
        existingFeedback.remove();
    }

    // Required field validation
    if (field.hasAttribute('required') && !value) {
        isValid = false;
        errorMessage = 'Este campo é obrigatório.';
    }

    // Email validation
    if (field.type === 'email' && value && !isValidEmail(value)) {
        isValid = false;
        errorMessage = 'Por favor, insira um email válido.';
    }

    // Name validation (no numbers)
    if ((field.id === 'firstName' || field.id === 'lastName') && value) {
        if (!/^[a-zA-ZÀ-ÿ\s]+$/.test(value)) {
            isValid = false;
            errorMessage = 'O nome deve conter apenas letras.';
        }
    }

    // Message minimum length
    if (field.id === 'message' && value && value.length < 10) {
        isValid = false;
        errorMessage = 'A mensagem deve ter pelo menos 10 caracteres.';
    }

    // Show error if invalid
    if (!isValid) {
        field.classList.add('is-invalid');
        const feedback = document.createElement('div');
        feedback.className = 'invalid-feedback';
        feedback.textContent = errorMessage;
        field.parentNode.appendChild(feedback);
    }

    return isValid;
}

// Handle contact form submission
function handleContactSubmission(form) {
    // Validate all fields
    const inputs = form.querySelectorAll('input[required], select[required], textarea[required]');
    let isFormValid = true;

    inputs.forEach(input => {
        if (!validateField(input)) {
            isFormValid = false;
        }
    });

    if (!isFormValid) {
        showNotification('Por favor, corrija os erros no formulário.', 'error');
        return;
    }

    // Get form data
    const formData = new FormData(form);
    const contactData = {
        firstName: formData.get('firstName'),
        lastName: formData.get('lastName'),
        email: formData.get('email'),
        subject: formData.get('subject'),
        message: formData.get('message')
    };

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
        showNotification('Mensagem enviada com sucesso! Responderemos em breve.', 'success');

        // Reset form
        form.reset();

        // Remove any validation classes
        const validatedFields = form.querySelectorAll('.is-invalid, .is-valid');
        validatedFields.forEach(field => {
            field.classList.remove('is-invalid', 'is-valid');
        });

        // Remove feedback messages
        const feedbacks = form.querySelectorAll('.invalid-feedback, .valid-feedback');
        feedbacks.forEach(feedback => feedback.remove());

        // Track form submission (replace with actual analytics)
        if (typeof gtag !== 'undefined') {
            gtag('event', 'contact_form_submit', {
                'event_category': 'engagement',
                'event_label': contactData.subject
            });
        }

        // Scroll to top of form
        form.scrollIntoView({ behavior: 'smooth', block: 'start' });

    }, 2000);
}

// Email validation function
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Notification system (if not already defined in main.js)
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

// Character counter for message field
function initCharacterCounter() {
    const messageField = document.getElementById('message');
    if (!messageField) return;

    const maxLength = 1000;
    const counter = document.createElement('small');
    counter.className = 'text-muted character-counter';
    counter.style.display = 'block';
    counter.style.textAlign = 'right';
    counter.style.marginTop = '0.25rem';

    messageField.parentNode.appendChild(counter);

    function updateCounter() {
        const currentLength = messageField.value.length;
        counter.textContent = `${currentLength}/${maxLength} caracteres`;

        if (currentLength > maxLength * 0.9) {
            counter.classList.add('text-warning');
        } else {
            counter.classList.remove('text-warning');
        }

        if (currentLength > maxLength) {
            counter.classList.add('text-danger');
            messageField.classList.add('is-invalid');
        } else {
            counter.classList.remove('text-danger');
            if (messageField.classList.contains('is-invalid')) {
                messageField.classList.remove('is-invalid');
            }
        }
    }

    messageField.addEventListener('input', updateCounter);
    updateCounter(); // Initial count
}

// Auto-resize textarea
function initAutoResize() {
    const textarea = document.getElementById('message');
    if (!textarea) return;

    function autoResize() {
        textarea.style.height = 'auto';
        textarea.style.height = textarea.scrollHeight + 'px';
    }

    textarea.addEventListener('input', autoResize);
    autoResize(); // Initial resize
}

// Initialize additional features
initCharacterCounter();
initAutoResize();

// FAQ accordion enhancement
function initFAQEnhancements() {
    const faqButtons = document.querySelectorAll('#faqAccordion .accordion-button');

    faqButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Track FAQ interactions
            const faqTitle = this.textContent.trim();
            if (typeof gtag !== 'undefined') {
                gtag('event', 'faq_click', {
                    'event_category': 'engagement',
                    'event_label': faqTitle
                });
            }
        });
    });
}

initFAQEnhancements();

// Contact info click tracking
function initContactInfoTracking() {
    const emailLinks = document.querySelectorAll('a[href^="mailto:"]');
    const phoneLinks = document.querySelectorAll('a[href^="tel:"]');
    const socialLinks = document.querySelectorAll('.social-links a');

    emailLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (typeof gtag !== 'undefined') {
                gtag('event', 'email_click', {
                    'event_category': 'contact',
                    'event_label': 'email'
                });
            }
        });
    });

    phoneLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (typeof gtag !== 'undefined') {
                gtag('event', 'phone_click', {
                    'event_category': 'contact',
                    'event_label': 'phone'
                });
            }
        });
    });

    socialLinks.forEach(link => {
        link.addEventListener('click', () => {
            const platform = link.querySelector('i').className.split(' ')[1].replace('bi-', '');
            if (typeof gtag !== 'undefined') {
                gtag('event', 'social_click', {
                    'event_category': 'contact',
                    'event_label': platform
                });
            }
        });
    });
}

initContactInfoTracking();

// Form field focus enhancement
function initFieldFocusEnhancement() {
    const formFields = document.querySelectorAll('.form-control, .form-select');

    formFields.forEach(field => {
        field.addEventListener('focus', function() {
            this.parentNode.classList.add('field-focused');
        });

        field.addEventListener('blur', function() {
            this.parentNode.classList.remove('field-focused');
        });
    });
}

initFieldFocusEnhancement();
