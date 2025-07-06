// Blog page specific JavaScript
document.addEventListener('DOMContentLoaded', function() {
    initBlogFilters();
    initBlogSearch();
    handleCategoryFromURL();
});

// Blog filtering functionality
function initBlogFilters() {
    const filterButtons = document.querySelectorAll('.filter-buttons .btn');
    const blogPosts = document.querySelectorAll('.blog-post');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');

            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            // Filter posts
            filterPosts(filter, blogPosts);

            // Update URL without page reload
            const url = new URL(window.location);
            if (filter === 'all') {
                url.searchParams.delete('category');
            } else {
                url.searchParams.set('category', filter);
            }
            window.history.pushState({}, '', url);
        });
    });
}

// Filter posts based on category
function filterPosts(filter, posts) {
    let visibleCount = 0;

    posts.forEach(post => {
        const postCategory = post.getAttribute('data-category');
        const shouldShow = filter === 'all' || postCategory === filter;

        if (shouldShow) {
            post.style.display = 'block';
            post.classList.add('fade-in-up');
            visibleCount++;
        } else {
            post.style.display = 'none';
            post.classList.remove('fade-in-up');
        }
    });

    // Show/hide "no results" message
    updateNoResultsMessage(visibleCount);

    // Update load more button
    updateLoadMoreButton(visibleCount);
}

// Search functionality
function initBlogSearch() {
    const searchInput = document.getElementById('searchInput');
    if (!searchInput) return;

    const searchButton = searchInput.nextElementSibling;

    // Debounced search function
    const debouncedSearch = debounce(performSearch, 300);

    searchInput.addEventListener('input', debouncedSearch);
    searchButton.addEventListener('click', performSearch);

    // Handle Enter key
    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            e.preventDefault();
            performSearch();
        }
    });
}

function performSearch() {
    const searchInput = document.getElementById('searchInput');
    const query = searchInput.value.toLowerCase().trim();
    const blogPosts = document.querySelectorAll('.blog-post');

    let visibleCount = 0;

    blogPosts.forEach(post => {
        const title = post.querySelector('h5, h6').textContent.toLowerCase();
        const description = post.querySelector('p').textContent.toLowerCase();
        const category = post.querySelector('.badge').textContent.toLowerCase();

        const matches = title.includes(query) ||
                       description.includes(query) ||
                       category.includes(query);

        if (query === '' || matches) {
            post.style.display = 'block';
            visibleCount++;
        } else {
            post.style.display = 'none';
        }
    });

    updateNoResultsMessage(visibleCount);
    updateLoadMoreButton(visibleCount);

    // Clear active filter when searching
    if (query) {
        const filterButtons = document.querySelectorAll('.filter-buttons .btn');
        filterButtons.forEach(btn => btn.classList.remove('active'));
    }
}

// Handle category from URL parameter
function handleCategoryFromURL() {
    const urlParams = new URLSearchParams(window.location.search);
    const category = urlParams.get('category');

    if (category) {
        const filterButton = document.querySelector(`[data-filter="${category}"]`);
        if (filterButton) {
            filterButton.click();
        }
    }
}

// Update no results message
function updateNoResultsMessage(visibleCount) {
    let noResultsMsg = document.querySelector('.no-results-message');

    if (visibleCount === 0) {
        if (!noResultsMsg) {
            noResultsMsg = document.createElement('div');
            noResultsMsg.className = 'no-results-message col-12 text-center py-5';
            noResultsMsg.innerHTML = `
                <div class="text-muted">
                    <i class="bi bi-search" style="font-size: 3rem;"></i>
                    <h4 class="mt-3">Nenhum artigo encontrado</h4>
                    <p>Tente ajustar os filtros ou termos de busca.</p>
                </div>
            `;
            document.getElementById('blogPosts').appendChild(noResultsMsg);
        }
        noResultsMsg.style.display = 'block';
    } else {
        if (noResultsMsg) {
            noResultsMsg.style.display = 'none';
        }
    }
}

// Update load more button visibility
function updateLoadMoreButton(visibleCount) {
    const loadMoreBtn = document.getElementById('loadMoreBtn');
    if (loadMoreBtn) {
        const totalPosts = document.querySelectorAll('.blog-post').length;
        if (visibleCount < 6 || totalPosts >= 30) { // Hide after 30 posts or if few results
            loadMoreBtn.style.display = 'none';
        } else {
            loadMoreBtn.style.display = 'inline-block';
        }
    }
}

// Utility function to format date
function formatDate(date) {
    const options = { day: '2-digit', month: 'short', year: 'numeric' };
    return date.toLocaleDateString('pt-BR', options);
}

// Debounce function (if not already defined in main.js)
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

// Reading time estimation
function calculateReadingTime(text) {
    const wordsPerMinute = 200;
    const words = text.trim().split(/\s+/).length;
    const readingTime = Math.ceil(words / wordsPerMinute);
    return readingTime;
}

// Add reading time to posts
function addReadingTime() {
    const posts = document.querySelectorAll('.blog-post');

    posts.forEach(post => {
        const description = post.querySelector('p').textContent;
        const readingTime = calculateReadingTime(description);
        const meta = post.querySelector('.blog-meta');

        if (meta && !meta.querySelector('.reading-time')) {
            const readingTimeSpan = document.createElement('span');
            readingTimeSpan.className = 'reading-time text-muted ms-2';
            readingTimeSpan.innerHTML = `• ${readingTime} min`;
            meta.appendChild(readingTimeSpan);
        }
    });
}

// Initialize reading time calculation
addReadingTime();

// Handle bookmark functionality (localStorage)
function toggleBookmark(postId) {
    let bookmarks = JSON.parse(localStorage.getItem('englishTipsBookmarks') || '[]');

    if (bookmarks.includes(postId)) {
        bookmarks = bookmarks.filter(id => id !== postId);
    } else {
        bookmarks.push(postId);
    }

    localStorage.setItem('englishTipsBookmarks', JSON.stringify(bookmarks));
    updateBookmarkUI(postId, bookmarks.includes(postId));
}

function updateBookmarkUI(postId, isBookmarked) {
    const bookmarkBtn = document.querySelector(`[data-post-id="${postId}"] .bookmark-btn`);
    if (bookmarkBtn) {
        const icon = bookmarkBtn.querySelector('i');
        if (isBookmarked) {
            icon.className = 'bi bi-bookmark-fill';
            bookmarkBtn.title = 'Remover dos favoritos';
        } else {
            icon.className = 'bi bi-bookmark';
            bookmarkBtn.title = 'Adicionar aos favoritos';
        }
    }
}

// Initialize bookmarks on page load
function initBookmarks() {
    const bookmarks = JSON.parse(localStorage.getItem('englishTipsBookmarks') || '[]');
    bookmarks.forEach(postId => {
        updateBookmarkUI(postId, true);
    });
}

// Call bookmark initialization
initBookmarks();
