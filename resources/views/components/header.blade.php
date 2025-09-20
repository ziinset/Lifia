<!-- Header Component -->
<div class="topbar-wrapper">
    <div class="topbar">
        <div class="left-section">
            <button class="mobile-menu-btn" onclick="toggleMobileSidebar()">
                <i class="fas fa-bars"></i>
            </button>
            
            <!-- Back Button -->
            <button class="back-btn" onclick="goBack()" title="Kembali ke beranda">
                <i class="fas fa-home"></i>
            </button>
        </div>

        <!-- Search -->
        <div class="search-container">
            <form action="{{ route('search') }}" method="GET" class="search-form">
                <div class="search-box">
                    <input type="text" 
                           name="q" 
                           id="searchInput"
                           placeholder="Cari resep, artikel, atau tips kesehatan..."
                           value="{{ request('q') }}"
                           autocomplete="off">
                    <button type="submit" class="search-btn"><i class="fas fa-search"></i></button>
                    <div class="search-suggestions" id="searchSuggestions"></div>
                </div>
            </form>
        </div>

        <!-- User Section -->
        <div class="user-section">
            <button class="notification-btn">
                <i class="fas fa-bell"></i>
            </button>

            @auth
                <div class="user-info">
                    @php
                        $foto = Auth::user()->foto ?? null;
                        $initial = strtoupper(substr(Auth::user()->nama_lengkap ?? 'U', 0, 1));
                    @endphp
                    <img src="{{ $foto ? asset('storage/' . $foto) : 'https://placehold.co/40x40/8BAC65/white?text=' . $initial }}" 
                         alt="{{ Auth::user()->nama_lengkap }}">
                    <div class="user-details">
                        <h4>{{ Auth::user()->nama_lengkap }}</h4>
                        <p>{{ Auth::user()->email }}</p>
                    </div>
                </div>
            @else
                <div class="user-info">
                    <img src="https://placehold.co/40x40/8BAC65/white?text=?" alt="Guest">
                    <div class="user-details">
                        <h4>Tamu</h4>
                        <p>Belum login</p>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</div>

<style>
/* Header Styles */
.topbar-wrapper {
    position: sticky;
    top: 0;
    left: 0;
    right: 0;
    background: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    padding: 1rem 1.5rem;
    box-shadow: 0 4px 20px rgba(0,0,0,0.08);
    z-index: 999;
    border-bottom: 1px solid rgba(229, 231, 235, 0.5);
}

.topbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 100%;
}

.search-container {
    flex: 1;
    max-width: 450px;
    position: relative;
}

.search-box {
    position: relative;
    width: 100%;
}

.search-box input {
    width: 100%;
    padding: 0.875rem 3.5rem 0.875rem 1.25rem;
    border-radius: 1.5rem;
    border: 2px solid transparent;
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    outline: none;
    font-size: 0.95rem;
    font-weight: 400;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
    color: #374151;
}

.search-box input::placeholder {
    color: #9ca3af;
    font-weight: 400;
}

.search-box input:focus {
    border-color: #799549;
    background: #ffffff;
    box-shadow: 0 8px 25px rgba(121, 149, 73, 0.15),
                0 0 0 4px rgba(121, 149, 73, 0.1);
    transform: translateY(-1px);
}

.search-box .search-btn {
    position: absolute;
    right: 0.5rem;
    top: 50%;
    transform: translateY(-50%);
    background: linear-gradient(135deg, #799549 0%, #8BAC65 100%);
    color: white;
    border: none;
    border-radius: 50%;
    width: 2.25rem;
    height: 2.25rem;
    cursor: pointer;
    font-size: 0.9rem;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 2px 8px rgba(121, 149, 73, 0.3);
}

.search-box .search-btn:hover {
    background: linear-gradient(135deg, #435331 0%, #799549 100%);
    transform: translateY(-50%) scale(1.05);
    box-shadow: 0 4px 12px rgba(121, 149, 73, 0.4);
}

/* Search Suggestions */
.search-suggestions {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: white;
    border-radius: 1rem;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
    border: 1px solid #e5e7eb;
    max-height: 500px;
    overflow-y: auto;
    z-index: 1000;
    display: none;
    margin-top: 0.5rem;
}

.search-suggestions.show {
    display: block;
}

.search-results-header {
    padding: 1rem;
    background: linear-gradient(135deg, #f8fdf4 0%, #e8f5e8 100%);
    border-bottom: 1px solid #e5e7eb;
    font-weight: 600;
    color: #2d5016;
    font-size: 0.9rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.view-all-btn {
    background: #799549;
    color: white;
    padding: 0.25rem 0.75rem;
    border-radius: 1rem;
    text-decoration: none;
    font-size: 0.75rem;
    font-weight: 500;
    transition: all 0.2s ease;
}

.view-all-btn:hover {
    background: #435331;
    transform: translateY(-1px);
}

.suggestion-item {
    padding: 1rem;
    cursor: pointer;
    border-bottom: 1px solid #f3f4f6;
    transition: all 0.2s ease;
    display: flex;
    gap: 1rem;
    align-items: flex-start;
}

.suggestion-item:last-child {
    border-bottom: none;
}

.suggestion-item:hover {
    background: linear-gradient(135deg, #f8fdf4 0%, #e8f5e8 100%);
}

.suggestion-image {
    width: 60px;
    height: 60px;
    border-radius: 0.75rem;
    background: linear-gradient(135deg, #799549 0%, #8BAC65 100%);
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 1.5rem;
    flex-shrink: 0;
    overflow: hidden;
}

.suggestion-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.suggestion-content {
    flex: 1;
    min-width: 0;
}

.suggestion-title {
    font-weight: 600;
    color: #2d5016;
    font-size: 0.95rem;
    margin-bottom: 0.25rem;
    line-height: 1.3;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.suggestion-description {
    color: #6b7280;
    font-size: 0.8rem;
    line-height: 1.4;
    margin-bottom: 0.5rem;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.suggestion-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 0.5rem;
}

.suggestion-category {
    font-size: 0.7rem;
    color: white;
    background: #799549;
    padding: 0.2rem 0.6rem;
    border-radius: 1rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.3px;
}

.suggestion-author {
    font-size: 0.7rem;
    color: #9ca3af;
    font-weight: 500;
}

.suggestion-item:hover .suggestion-title {
    color: #799549;
}

.suggestion-item:hover .suggestion-category {
    background: #2d5016;
}

.no-results {
    padding: 2rem 1rem;
    text-align: center;
    color: #6b7280;
    font-size: 0.9rem;
}

.no-results i {
    font-size: 2rem;
    margin-bottom: 0.5rem;
    color: #d1d5db;
}

.user-section {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.notification-btn {
    position: relative;
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    border: 2px solid transparent;
    color: #6b7280;
    cursor: pointer;
    font-size: 1.1rem;
    width: 2.75rem;
    height: 2.75rem;
    border-radius: 50%;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
}

.notification-btn:hover {
    background: linear-gradient(135deg, #799549 0%, #8BAC65 100%);
    color: white;
    transform: translateY(-1px) scale(1.05);
    box-shadow: 0 8px 25px rgba(121, 149, 73, 0.25);
    border-color: rgba(255, 255, 255, 0.2);
}

.notification-btn::after {
    content: '';
    position: absolute;
    top: 0.25rem;
    right: 0.25rem;
    width: 0.5rem;
    height: 0.5rem;
    background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    border-radius: 50%;
    border: 2px solid white;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.2);
}

.user-info {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.5rem 0.75rem;
    border-radius: 1.5rem;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    cursor: pointer;
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    border: 2px solid transparent;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
}

.user-info:hover {
    background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
    transform: translateY(-1px);
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
    border-color: rgba(121, 149, 73, 0.2);
}

.user-info img {
    width: 2.25rem;
    height: 2.25rem;
    border-radius: 50%;
    border: 2px solid #e5e7eb;
    object-fit: cover;
    transition: all 0.3s ease;
}

.user-info:hover img {
    border-color: #799549;
    transform: scale(1.05);
}

.user-details h4 {
    font-size: 0.875rem;
    font-weight: 600;
    color: #4E342E;
    margin-bottom: 1px;
    transition: color 0.2s ease;
}

.user-details p {
    font-size: 0.75rem;
    color: #6b7280;
    transition: color 0.2s ease;
}

.user-info:hover .user-details h4 {
    color: #1f2937;
}

.user-info:hover .user-details p {
    color: #799549;
}

.left-section {
    display: flex;
    align-items: center;
    gap: 0.75rem;
}

.mobile-menu-btn {
    display: none;
    background: #fff;
    border: 1px solid #e5e7eb;
    border-radius: 0.5rem;
    padding: 0.5rem;
    cursor: pointer;
    color: #6b7280;
    font-size: 1.1rem;
}

.mobile-menu-btn:hover {
    background: #f9fafb;
    color: #799549;
}

.back-btn {
    background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    border: 2px solid transparent;
    color: #6b7280;
    cursor: pointer;
    font-size: 1rem;
    width: 2.5rem;
    height: 2.5rem;
    border-radius: 50%;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
}

.back-btn:hover {
    background: linear-gradient(135deg, #799549 0%, #8BAC65 100%);
    color: white;
    transform: translateY(-1px) scale(1.05);
    box-shadow: 0 8px 25px rgba(121, 149, 73, 0.25);
    border-color: rgba(255, 255, 255, 0.2);
}

/* Responsive Design */
@media (max-width: 1024px) {
    .search-container { 
        max-width: 350px; 
    }
}

@media (max-width: 768px) {
    .mobile-menu-btn { 
        display: block; 
    }
    .topbar { 
        flex-wrap: wrap; 
        gap: 1rem; 
    }
    .search-container { 
        order: 2; 
        flex-basis: 100%; 
        max-width: none; 
    }
    .user-section { 
        order: 1; 
        margin-left: auto; 
    }
}
</style>

<script>
function toggleMobileSidebar() {
    const sidebar = document.querySelector('.sidebar');
    if (sidebar) {
        sidebar.classList.toggle('mobile-open');
    }
}

function goBack() {
    // Always redirect to landing page
    window.location.href = '/';
}

// Search functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const searchSuggestions = document.getElementById('searchSuggestions');
    let searchTimeout;

    if (searchInput && searchSuggestions) {
        // Handle input for search results
        searchInput.addEventListener('input', function() {
            const query = this.value.trim();
            
            clearTimeout(searchTimeout);
            
            if (query.length >= 1) {
                searchTimeout = setTimeout(() => {
                    fetchSearchResults(query);
                }, 300);
            } else {
                hideSuggestions();
            }
        });

        // Handle Enter key
        searchInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                const query = this.value.trim();
                if (query) {
                    window.location.href = `/search?q=${encodeURIComponent(query)}`;
                }
            }
        });

        // Hide suggestions when clicking outside
        document.addEventListener('click', function(e) {
            if (!searchInput.contains(e.target) && !searchSuggestions.contains(e.target)) {
                hideSuggestions();
            }
        });

        // Show suggestions when input is focused and has value
        searchInput.addEventListener('focus', function() {
            const query = this.value.trim();
            if (query.length >= 1) {
                fetchSearchResults(query);
            }
        });
    }

    function fetchSearchResults(query) {
        fetch(`/search/suggestions?q=${encodeURIComponent(query)}`)
            .then(response => response.json())
            .then(results => {
                displaySearchResults(results, query);
            })
            .catch(error => {
                console.error('Error fetching search results:', error);
                hideSuggestions();
            });
    }

    function displaySearchResults(results, query) {
        if (results.length === 0) {
            searchSuggestions.innerHTML = `
                <div class="no-results">
                    <i class="fas fa-search"></i>
                    <div>Tidak ada hasil untuk "${query}"</div>
                </div>
            `;
            searchSuggestions.classList.add('show');
            return;
        }

        let html = `
            <div class="search-results-header">
                <span>Hasil Pencarian (${results.length})</span>
                <a href="/search?q=${encodeURIComponent(query)}" class="view-all-btn">Lihat Semua</a>
            </div>
        `;

        results.forEach(result => {
            const hasImage = result.image && result.image !== '/image/Rectangle 127.png';
            html += `
                <div class="suggestion-item" onclick="selectSuggestion('${result.url}')">
                    <div class="suggestion-image">
                        ${hasImage ? `<img src="${result.image}" alt="${result.title}">` : '<i class="fas fa-newspaper"></i>'}
                    </div>
                    <div class="suggestion-content">
                        <div class="suggestion-title">${result.title}</div>
                        <div class="suggestion-description">${result.description}</div>
                        <div class="suggestion-meta">
                            <span class="suggestion-category">${result.category}</span>
                            <span class="suggestion-author">${result.author}</span>
                        </div>
                    </div>
                </div>
            `;
        });

        searchSuggestions.innerHTML = html;
        searchSuggestions.classList.add('show');
    }

    function hideSuggestions() {
        searchSuggestions.classList.remove('show');
    }

    window.selectSuggestion = function(url) {
        window.location.href = url;
    };
});
</script>