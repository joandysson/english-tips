/**
 * Blog post page specific JavaScript
 */

document.addEventListener('DOMContentLoaded', () => {
  // Highlight code blocks
  const codeBlocks = document.querySelectorAll('pre code');
  
  // Simple syntax highlighting function (in a real implementation, you might use a library like Prism.js)
  const highlightCode = (codeBlock) => {
    let html = codeBlock.innerHTML;
    
    // Highlight JavaScript syntax (very basic implementation)
    const keywords = ['const', 'let', 'var', 'function', 'return', 'if', 'else', 'for', 'while', 'try', 'catch', 'async', 'await', 'import', 'export', 'class', 'extends'];
    const types = ['string', 'number', 'boolean', 'null', 'undefined', 'true', 'false'];
    const comments = ['//', '/*', '*/'];
    
    // Replace keywords with highlighted spans
    keywords.forEach(keyword => {
      const regex = new RegExp(`\\b${keyword}\\b`, 'g');
      html = html.replace(regex, `<span style="color: #569cd6;">${keyword}</span>`);
    });
    
    // Highlight types
    types.forEach(type => {
      const regex = new RegExp(`\\b${type}\\b`, 'g');
      html = html.replace(regex, `<span style="color: #4ec9b0;">${type}</span>`);
    });
    
    // Highlight strings
    html = html.replace(/'([^']*)'/g, '<span style="color: #ce9178;">\'$1\'</span>');
    html = html.replace(/"([^"]*)"/g, '<span style="color: #ce9178;">"$1"</span>');
    
    // Highlight comments (simple implementation)
    html = html.replace(/\/\/.*/g, '<span style="color: #6a9955;">$&</span>');
    
    codeBlock.innerHTML = html;
  };
  
  // Apply highlighting to all code blocks
  codeBlocks.forEach(highlightCode);
  
  // Animate elements when they come into view
  const observeElements = () => {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
          observer.unobserve(entry.target);
        }
      });
    }, {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    });
    
    // Target elements to animate
    const elements = document.querySelectorAll('.post-content h2, .post-content h3, .post-content p, .post-content ul, .post-content ol, .post-content pre');
    
    elements.forEach(el => {
      observer.observe(el);
    });
  };
  
  // Initialize intersection observer if supported
  if ('IntersectionObserver' in window) {
    observeElements();
  }
  
  // Add active states to table of contents links when scrolling
  const updateTableOfContents = () => {
    const tocLinks = document.querySelectorAll('.table-of-contents a');
    
    if (tocLinks.length === 0) return;
    
    // Track sections
    const sections = Array.from(tocLinks).map(link => {
      const id = link.getAttribute('href').substring(1);
      return document.getElementById(id);
    }).filter(section => section !== null);
    
    // Update active section based on scroll position
    window.addEventListener('scroll', () => {
      let currentSectionId = '';
      
      sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.offsetHeight;
        
        if (window.pageYOffset >= sectionTop - 100 && 
            window.pageYOffset < sectionTop + sectionHeight - 100) {
          currentSectionId = section.getAttribute('id');
        }
      });
      
      // Update active link
      tocLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href') === `#${currentSectionId}`) {
          link.classList.add('active');
        }
      });
    });
  };
  
  // Initialize ToC if it exists on the page
  updateTableOfContents();
});