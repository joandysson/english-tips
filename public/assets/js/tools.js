/**
 * Tools page specific JavaScript
 */

document.addEventListener('DOMContentLoaded', () => {
  // Tools filtering functionality
  const categoryButtons = document.querySelectorAll('.category-btn');
  const toolCards = document.querySelectorAll('.tool-card');
  
  categoryButtons.forEach(button => {
    button.addEventListener('click', () => {
      // Update active button state
      categoryButtons.forEach(btn => btn.classList.remove('active'));
      button.classList.add('active');
      
      const category = button.dataset.category;
      
      // Filter tools based on category
      toolCards.forEach(card => {
        if (category === 'all' || card.dataset.category === category) {
          card.style.display = 'flex';
          // Add slight delay to stagger the appearance
          setTimeout(() => {
            card.style.opacity = '1';
            card.style.transform = 'translateY(0)';
          }, 50);
        } else {
          card.style.opacity = '0';
          card.style.transform = 'translateY(10px)';
          setTimeout(() => {
            card.style.display = 'none';
          }, 300); // Match this timing with your CSS transition duration
        }
      });
    });
  });
  
  // Add animation to tool cards when they enter viewport
  const observeElements = (elements) => {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          // Apply staggered animation to the cards
          setTimeout(() => {
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
          }, 50);
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    });
    
    elements.forEach(el => {
      observer.observe(el);
    });
  };
  
  // Initialize animations if intersection observer is supported
  if ('IntersectionObserver' in window) {
    observeElements(toolCards);
  } else {
    // Fallback for browsers that don't support Intersection Observer
    toolCards.forEach(card => card.style.opacity = '1');
  }
});