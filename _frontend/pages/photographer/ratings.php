<!DOCTYPE html>
<html lang="en">

<?= include_page('photoex/phheader') ?>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <?= include_page('photoex/phsidebar') ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?= include_page('photoex/phnavbar') ?>
            <!-- Navbar End -->

            <div class="topbar">
                <div class="topbar-logo">
                    <span>📸</span>
                    <span>Photographer Pro</span>
                </div>
                <div class="topbar-actions">
                    <button class="icon-btn" id="refreshBtn">🔄 Refresh</button>
                    <button class="icon-btn" id="exportBtn">📥 Export</button>
                </div>
            </div>

            <div class="container">
                <!-- Hero Stats -->
                <div class="hero-stats">
                    <div class="stat-card">
                        <div class="stat-icon">⭐</div>
                        <div class="stat-value" id="avgRating">—</div>
                        <div class="stat-label">Average Rating</div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon">💬</div>
                        <div class="stat-value" id="totalReviews">0</div>
                        <div class="stat-label">Total Reviews</div>
                    </div>

                    <div class="stat-card">
                        <div class="stat-icon">🔥</div>
                        <div class="stat-value" id="fiveStars">0</div>
                        <div class="stat-label">Five Stars</div>
                    </div>
                </div>

                <!-- Rating Breakdown -->
                <div class="breakdown-card">
                    <h3 class="card-title">
                        <span>📊</span>
                        Rating Distribution
                    </h3>
                    <div id="breakdown"></div>
                </div>

                <!-- Filters -->
                <div class="filters-panel">
                    <h3 class="card-title">
                        <span>🔍</span>
                        Filter Reviews
                    </h3>
                    <div class="filters-grid">
                        <input
                            type="number"
                            min="1"
                            max="5"
                            placeholder="⭐ Filter by stars (1-5)"
                            class="filter-input"
                            id="filterStar">
                        <select class="filter-select" id="filterService">
                            <option value="">📸 All Services</option>
                            <option>Wedding</option>
                            <option>Portrait</option>
                            <option>Event</option>
                            <option>Product</option>
                            <option>Commercial</option>
                            <option>Fashion</option>
                            <option>Real Estate</option>
                            <option>Food</option>
                            <option>Sports</option>
                            <option>Family</option>
                        </select>
                    </div>
                    <div class="filter-actions">
                        <button class="btn btn-primary" id="applyFilters">Apply Filters</button>
                        <button class="btn btn-secondary" id="clearFilters">Clear All</button>
                    </div>
                </div>

                <!-- Reviews List -->
                <div class="reviews-container">
                    <div class="reviews-header">
                        <h2 class="reviews-title">
                            <span>💬</span>
                            All Reviews
                        </h2>
                        <div class="reviews-badge" id="reviewCount">0 Reviews</div>
                    </div>
                    <div id="reviewsList"></div>
                </div>
            </div>





            <script>
                const store = {
                    reviews: [{
                            id: 1,
                            name: 'Maria Santos',
                            rating: 5,
                            service: 'Wedding',
                            text: 'Absolutely phenomenal work! The photographer captured every precious moment perfectly. Professional, creative, and the photos exceeded all our expectations. Would highly recommend!',
                            date: '2025-10-18',
                            reply: null,
                            anon: false
                        },
                        {
                            id: 2,
                            name: 'John Cruz',
                            rating: 4,
                            service: 'Event',
                            text: 'Great quality photos with excellent attention to detail. Very professional throughout the event. Minor delay in delivery but overall very satisfied with the results.',
                            date: '2025-09-15',
                            reply: 'Thank you for your feedback! We apologize for the delay and have improved our delivery process.',
                            anon: false
                        },
                        {
                            id: 3,
                            name: 'Anonymous',
                            rating: 5,
                            service: 'Portrait',
                            text: 'Best portrait session I\'ve ever had! Made me feel so comfortable and the results were absolutely stunning. Cannot recommend enough!',
                            date: '2025-09-28',
                            reply: null,
                            anon: true
                        },
                        {
                            id: 4,
                            name: 'Sarah Reyes',
                            rating: 5,
                            service: 'Product',
                            text: 'Outstanding product photography! Really made our items stand out. Fast turnaround and excellent communication throughout the entire process.',
                            date: '2025-10-05',
                            reply: null,
                            anon: false
                        },
                        {
                            id: 5,
                            name: 'Michael Tan',
                            rating: 3,
                            service: 'Event',
                            text: 'Photos were decent quality but I expected more creative shots. The technical quality was good though.',
                            date: '2025-08-22',
                            reply: 'Thank you for the honest feedback. We\'re always looking to improve our creative approach and will take this into consideration!',
                            anon: false
                        },
                        {
                            id: 6,
                            name: 'Lisa Garcia',
                            rating: 5,
                            service: 'Wedding',
                            text: 'Dream photographer! Captured our special day perfectly. Every photo tells a story. Thank you so much!',
                            date: '2025-10-12',
                            reply: null,
                            anon: false
                        },
                        {
                            id: 7,
                            name: 'Anonymous',
                            rating: 4,
                            service: 'Portrait',
                            text: 'Very professional and patient. Great experience overall!',
                            date: '2025-09-30',
                            reply: null,
                            anon: true
                        }
                    ],
                    nextId: 8
                };

                let filteredReviews = [...store.reviews];

                function renderStars(n) {
                    return Array(5).fill(0).map((_, i) => i < n ? '★' : '☆').join('');
                }

                function escapeHtml(s) {
                    if (!s) return '';
                    const div = document.createElement('div');
                    div.textContent = s;
                    return div.innerHTML;
                }

                function calcStats(reviews) {
                    const total = reviews.length;
                    const avg = total ? (reviews.reduce((a, b) => a + b.rating, 0) / total) : 0;
                    const fiveStars = reviews.filter(r => r.rating === 5).length;
                    const breakdown = [5, 4, 3, 2, 1].map(star => ({
                        star,
                        count: reviews.filter(r => r.rating === star).length
                    }));
                    return {
                        total,
                        avg,
                        fiveStars,
                        breakdown
                    };
                }

                function renderBreakdown(node, breakdown, total) {
                    node.innerHTML = breakdown.map(b => {
                        const percentage = total ? Math.round((b.count / total) * 100) : 0;
                        return `
          <div class="breakdown-row">
            <div class="breakdown-label">${b.star}★</div>
            <div class="bar-container">
              <div class="bar-fill" style="width:${percentage}%">
                ${percentage > 10 ? percentage + '%' : ''}
              </div>
            </div>
            <div class="breakdown-count">${b.count}</div>
          </div>
        `;
                    }).join('');
                }

                function renderReviews(reviews) {
                    const container = document.getElementById('reviewsList');

                    if (!reviews.length) {
                        container.innerHTML = `
          <div class="empty-state">
            <div class="empty-icon">📭</div>
            <div class="empty-title">No Reviews Found</div>
            <div class="empty-text">Try adjusting your filters or check back later</div>
          </div>
        `;
                        return;
                    }

                    container.innerHTML = reviews.slice().reverse().map(r => `
        <div class="review-card">
          <div class="review-header">
            <div class="review-client-info">
              <div class="review-name">
                ${r.anon ? '🔒 ' + escapeHtml(r.name) : escapeHtml(r.name)}
                ${r.anon ? '<span class="anon-badge">Anonymous</span>' : ''}
              </div>
              <div class="review-meta">
                <span class="service-badge">${r.service}</span>
                <span>📅 ${r.date}</span>
              </div>
            </div>
            <div class="review-stars">${renderStars(r.rating)}</div>
          </div>
          <div class="review-text">${escapeHtml(r.text)}</div>
          ${r.reply ? `
            <div class="reply-section">
              <div class="reply-label">✓ Your Reply</div>
              <div class="reply-text">${escapeHtml(r.reply)}</div>
            </div>
          ` : ''}
          <div class="reply-form">
            <input 
              class="reply-input" 
              placeholder="${r.reply ? 'Update your reply...' : 'Write a thoughtful reply...'}" 
              value="${r.reply ? escapeHtml(r.reply) : ''}"
              data-review-id="${r.id}"
            >
            <button class="btn btn-primary" onclick="saveReply(${r.id})">
              ${r.reply ? '🔄 Update' : '💬 Reply'}
            </button>
          </div>
        </div>
      `).join('');
                }

                function saveReply(reviewId) {
                    const input = document.querySelector(`input[data-review-id="${reviewId}"]`);
                    const text = input.value.trim();

                    if (!text) {
                        alert('Please enter a reply message!');
                        return;
                    }

                    const review = store.reviews.find(r => r.id === reviewId);
                    if (review) {
                        review.reply = text;
                        renderAll();
                        alert('✓ Reply saved successfully!');
                    }
                }

                function renderAll() {
                    const stats = calcStats(store.reviews);

                    document.getElementById('avgRating').textContent = stats.total ? stats.avg.toFixed(1) : '—';
                    document.getElementById('totalReviews').textContent = stats.total;
                    document.getElementById('fiveStars').textContent = stats.fiveStars;
                    document.getElementById('reviewCount').textContent = `${filteredReviews.length} Review${filteredReviews.length !== 1 ? 's' : ''}`;

                    renderBreakdown(document.getElementById('breakdown'), stats.breakdown, stats.total);
                    renderReviews(filteredReviews);
                }

                // Event listeners
                document.getElementById('applyFilters').addEventListener('click', () => {
                    const star = Number(document.getElementById('filterStar').value) || null;
                    const service = document.getElementById('filterService').value || '';

                    filteredReviews = store.reviews.slice();

                    if (star) filteredReviews = filteredReviews.filter(r => r.rating === star);
                    if (service) filteredReviews = filteredReviews.filter(r => r.service === service);

                    renderAll();
                });

                document.getElementById('clearFilters').addEventListener('click', () => {
                    document.getElementById('filterStar').value = '';
                    document.getElementById('filterService').value = '';
                    filteredReviews = [...store.reviews];
                    renderAll();
                });

                document.getElementById('refreshBtn').addEventListener('click', () => {
                    renderAll();
                    alert('✓ Dashboard refreshed!');
                });

                document.getElementById('exportBtn').addEventListener('click', () => {
                    const headers = ['ID', 'Client', 'Rating', 'Service', 'Feedback', 'Date', 'Reply', 'Anonymous'];
                    const rows = store.reviews.map(r => [
                        r.id, r.name, r.rating, r.service, r.text, r.date, r.reply || '', r.anon ? 'Yes' : 'No'
                    ]);

                    const csv = [headers, ...rows]
                        .map(row => row.map(cell => `"${String(cell).replaceAll('"','""')}"`).join(','))
                        .join('\n');

                    const blob = new Blob([csv], {
                        type: 'text/csv'
                    });
                    const url = URL.createObjectURL(blob);
                    const a = document.createElement('a');
                    a.href = url;
                    a.download = `reviews-${new Date().toISOString().slice(0,10)}.csv`;
                    a.click();
                    URL.revokeObjectURL(url);

                    alert('✓ Reviews exported successfully!');
                });

                // Make saveReply available globally
                window.saveReply = saveReply;

                renderAll();
            </script>


            <!-- JavaScript Libraries -->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="<?= assets() ?>/lib/chart/chart.min.js"></script>
            <script src="<?= assets() ?>/lib/easing/easing.min.js"></script>
            <script src="<?= assets() ?>/lib/waypoints/waypoints.min.js"></script>
            <script src="<?= assets() ?>/lib/owlcarousel/owl.carousel.min.js"></script>
            <script src="<?= assets() ?>/lib/tempusdominus/js/moment.min.js"></script>
            <script src="<?= assets() ?>/lib/tempusdominus/js/moment-timezone.min.js"></script>
            <script src="<?= assets() ?>/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

            <!-- Template Javascript -->
            <script src="<?= assets() ?>/js/main.js"></script>
</body>

</html>

<style>
    :root {
        --red: #c62828;
        --red-dark: #9b2222;
        --red-light: #ff5252;
        --black: #000000;
        --white: #ffffff;
        --muted: #6b6b6b;
        --gradient: linear-gradient(135deg, var(--red-dark) 0%, var(--red) 100%);
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    }


    .topbar {
        background: var(--red);
        color: var(--white);
        padding: 20px 32px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.15);
        position: sticky;
        top: 0;
        z-index: 100;
    }

    .topbar-logo {
        font-size: 24px;
        font-weight: 700;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .topbar-actions {
        display: flex;
        gap: 16px;
    }

    .icon-btn {
        background: rgba(255, 255, 255, 0.2);
        border: 2px solid rgba(255, 255, 255, 0.3);
        color: var(--white);
        padding: 12px 24px;
        border-radius: 50px;
        cursor: pointer;
        font-weight: 700;
        transition: all 0.3s ease;
        font-size: 15px;
        backdrop-filter: blur(10px);
    }

    .icon-btn:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(255, 255, 255, 0.2);
    }

    .container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 40px 32px;
    }

    .hero-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 24px;
        margin-bottom: 40px;
    }

    .stat-card {
        background: linear-gradient(135deg, #ffffff 0%, #f9f9f9 100%);
        padding: 36px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        position: relative;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        border: 2px solid transparent;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 6px;
        background: var(--gradient);
    }

    .stat-card::after {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: radial-gradient(circle, rgba(198, 40, 40, 0.1) 0%, transparent 70%);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        transition: all 0.6s ease;
    }

    .stat-card:hover {
        transform: translateY(-12px) scale(1.02);
        box-shadow: 0 20px 50px rgba(198, 40, 40, 0.25);
        border-color: var(--red);
    }

    .stat-card:hover::after {
        width: 300px;
        height: 300px;
    }

    .stat-icon {
        font-size: 64px;
        margin-bottom: 20px;
        display: inline-block;
        animation: float 3s ease-in-out infinite;
        filter: drop-shadow(0 4px 8px rgba(198, 40, 40, 0.3));
    }

    @keyframes float {

        0%,
        100% {
            transform: translateY(0) rotate(0deg)
        }

        50% {
            transform: translateY(-15px) rotate(5deg)
        }
    }

    .stat-value {
        font-size: 64px;
        font-weight: 900;
        background: var(--gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        line-height: 1;
        margin-bottom: 16px;
        position: relative;
        z-index: 1;
    }

    .stat-label {
        color: var(--muted);
        font-size: 15px;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-weight: 600;
    }

    .breakdown-card {
        background: linear-gradient(135deg, #ffffff 0%, #f9f9f9 100%);
        padding: 36px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        margin-bottom: 32px;
        border: 2px solid #f0f0f0;
        transition: all 0.4s ease;
    }

    .breakdown-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
        border-color: var(--red);
    }

    .card-title {
        font-size: 26px;
        font-weight: 800;
        margin-bottom: 28px;
        display: flex;
        align-items: center;
        gap: 12px;
        color: var(--black);
    }

    .breakdown-row {
        display: flex;
        align-items: center;
        gap: 16px;
        margin-bottom: 16px;
    }

    .breakdown-label {
        font-size: 16px;
        font-weight: 700;
        width: 50px;
        color: var(--black);
    }

    .bar-container {
        flex: 1;
        height: 36px;
        background: linear-gradient(135deg, #f5f5f5 0%, #e8e8e8 100%);
        border-radius: 50px;
        overflow: hidden;
        position: relative;
        box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .bar-fill {
        height: 100%;
        background: var(--gradient);
        border-radius: 50px;
        transition: width 1.2s cubic-bezier(0.4, 0, 0.2, 1);
        display: flex;
        align-items: center;
        justify-content: flex-end;
        padding-right: 14px;
        color: var(--white);
        font-weight: 800;
        font-size: 14px;
        box-shadow: 0 2px 8px rgba(198, 40, 40, 0.4);
        position: relative;
        overflow: hidden;
    }

    .bar-fill::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(90deg, transparent 0%, rgba(255, 255, 255, 0.3) 50%, transparent 100%);
        animation: shimmer 2s infinite;
    }

    @keyframes shimmer {
        0% {
            transform: translateX(-100%)
        }

        100% {
            transform: translateX(100%)
        }
    }

    .breakdown-count {
        font-size: 18px;
        font-weight: 700;
        width: 50px;
        text-align: right;
        color: var(--red);
    }

    .filters-panel {
        background: linear-gradient(135deg, #ffffff 0%, #f9f9f9 100%);
        padding: 36px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        margin-bottom: 32px;
        border: 2px solid #f0f0f0;
        transition: all 0.4s ease;
    }

    .filters-panel:hover {
        border-color: #e0e0e0;
        box-shadow: 0 12px 35px rgba(0, 0, 0, 0.18);
    }

    .filters-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 16px;
        margin-bottom: 20px;
    }

    .filter-input,
    .filter-select {
        padding: 16px 22px;
        border: 3px solid #e5e5e5;
        border-radius: 50px;
        font-size: 15px;
        font-weight: 600;
        transition: all 0.3s ease;
        background: var(--white);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .filter-input:focus,
    .filter-select:focus {
        outline: none;
        border-color: var(--red);
        box-shadow: 0 0 0 4px rgba(198, 40, 40, 0.15);
        transform: translateY(-2px);
    }

    .filter-input:hover,
    .filter-select:hover {
        border-color: #d0d0d0;
    }

    .filter-actions {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .btn {
        padding: 16px 36px;
        border: none;
        border-radius: 50px;
        font-weight: 800;
        font-size: 15px;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        position: relative;
        overflow: hidden;
    }

    .btn::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: rgba(255, 255, 255, 0.3);
        border-radius: 50%;
        transform: translate(-50%, -50%);
        transition: all 0.5s ease;
    }

    .btn:hover::before {
        width: 300px;
        height: 300px;
    }

    .btn-primary {
        background: var(--gradient);
        color: var(--white);
        box-shadow: 0 6px 20px rgba(198, 40, 40, 0.4);
    }

    .btn-primary:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 30px rgba(198, 40, 40, 0.5);
    }

    .btn-secondary {
        background: var(--white);
        color: var(--black);
        border: 3px solid #e5e5e5;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    .btn-secondary:hover {
        border-color: var(--black);
        transform: translateY(-3px);
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);
    }

    .reviews-container {
        background: linear-gradient(135deg, #ffffff 0%, #f9f9f9 100%);
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        border: 2px solid #f0f0f0;
    }

    .reviews-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 28px;
        padding-bottom: 20px;
        border-bottom: 2px solid #f0f0f0;
    }

    .reviews-title {
        font-size: 32px;
        font-weight: 900;
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .reviews-badge {
        background: var(--gradient);
        color: var(--white);
        padding: 10px 24px;
        border-radius: 50px;
        font-size: 17px;
        font-weight: 800;
        box-shadow: 0 4px 12px rgba(198, 40, 40, 0.3);
    }

    .review-card {
        background: linear-gradient(135deg, #ffffff 0%, #fafafa 100%);
        padding: 36px;
        border-radius: 20px;
        margin-bottom: 24px;
        border: 2px solid #f0f0f0;
        transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
    }

    .review-card::before {
        content: '';
        position: absolute;
        left: 0;
        top: 0;
        width: 8px;
        height: 100%;
        background: var(--gradient);
        transform: scaleY(0);
        transition: transform 0.4s ease;
        box-shadow: 2px 0 8px rgba(198, 40, 40, 0.4);
    }

    .review-card::after {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background: radial-gradient(circle at top right, rgba(198, 40, 40, 0.05) 0%, transparent 50%);
        opacity: 0;
        transition: opacity 0.4s ease;
    }

    .review-card:hover {
        transform: translateX(16px) translateY(-4px);
        box-shadow: 0 16px 40px rgba(198, 40, 40, 0.2);
        border-color: var(--red);
    }

    .review-card:hover::before {
        transform: scaleY(1);
    }

    .review-card:hover::after {
        opacity: 1;
    }

    .review-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 20px;
        flex-wrap: wrap;
        gap: 16px;
    }

    .review-client-info {
        flex: 1;
    }

    .review-name {
        font-size: 22px;
        font-weight: 800;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 12px;
        position: relative;
        z-index: 1;
    }

    .anon-badge {
        background: linear-gradient(135deg, #ffd700 0%, #ffed4e 100%);
        color: #000;
        padding: 6px 14px;
        border-radius: 50px;
        font-size: 12px;
        font-weight: 800;
        text-transform: uppercase;
        box-shadow: 0 2px 8px rgba(255, 215, 0, 0.4);
        animation: pulse 2s ease-in-out infinite;
    }

    @keyframes pulse {

        0%,
        100% {
            transform: scale(1)
        }

        50% {
            transform: scale(1.05)
        }
    }

    .review-meta {
        display: flex;
        gap: 16px;
        color: var(--muted);
        font-size: 14px;
        font-weight: 500;
    }

    .service-badge {
        background: var(--gradient);
        color: var(--white);
        padding: 8px 18px;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 800;
        box-shadow: 0 2px 8px rgba(198, 40, 40, 0.3);
    }

    .review-stars {
        display: flex;
        gap: 6px;
        font-size: 32px;
        color: var(--red);
        filter: drop-shadow(0 2px 4px rgba(198, 40, 40, 0.3));
        position: relative;
        z-index: 1;
    }

    .review-text {
        background: linear-gradient(135deg, rgba(0, 0, 0, 0.02) 0%, rgba(0, 0, 0, 0.04) 100%);
        padding: 28px;
        border-radius: 16px;
        line-height: 1.8;
        font-size: 16px;
        color: #333;
        border-left: 6px solid var(--red);
        margin-bottom: 24px;
        box-shadow: inset 0 2px 8px rgba(0, 0, 0, 0.05);
        position: relative;
        z-index: 1;
    }

    .reply-section {
        background: linear-gradient(135deg, #e8f5e9 0%, #c8e6c9 100%);
        padding: 24px;
        border-radius: 16px;
        border-left: 6px solid #4caf50;
        margin-bottom: 20px;
        box-shadow: 0 4px 12px rgba(76, 175, 80, 0.2);
        position: relative;
        z-index: 1;
    }

    .reply-label {
        font-size: 13px;
        text-transform: uppercase;
        color: #2e7d32;
        font-weight: 800;
        margin-bottom: 10px;
        letter-spacing: 1px;
    }

    .reply-text {
        color: #1b5e20;
        font-size: 15px;
        line-height: 1.7;
        font-weight: 500;
    }

    .reply-form {
        display: flex;
        gap: 12px;
        align-items: center;
    }

    .reply-input {
        flex: 1;
        padding: 16px 24px;
        border: 3px solid #e5e5e5;
        border-radius: 50px;
        font-size: 15px;
        transition: all 0.3s ease;
        font-weight: 500;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        position: relative;
        z-index: 1;
    }

    .reply-input:focus {
        outline: none;
        border-color: var(--red);
        box-shadow: 0 0 0 4px rgba(198, 40, 40, 0.15);
        transform: translateY(-2px);
    }

    .empty-state {
        text-align: center;
        padding: 80px 20px;
        color: var(--muted);
    }

    .empty-icon {
        font-size: 120px;
        margin-bottom: 24px;
        opacity: 0.3;
        animation: float 3s ease-in-out infinite;
    }

    .empty-title {
        font-size: 32px;
        font-weight: 700;
        margin-bottom: 12px;
        color: var(--black);
    }

    .empty-text {
        font-size: 18px;
    }

    @media (max-width:768px) {
        .container {
            padding: 20px 16px
        }

        .topbar {
            padding: 16px;
            flex-direction: column;
            gap: 16px
        }

        .hero-stats {
            grid-template-columns: 1fr
        }

        .stat-value {
            font-size: 40px
        }

        .filters-grid {
            grid-template-columns: 1fr
        }

        .filter-actions {
            flex-direction: column
        }

        .btn {
            width: 100%
        }

        .reviews-header {
            flex-direction: column;
            align-items: stretch
        }

        .review-card {
            padding: 20px
        }

        .reply-form {
            flex-direction: column
        }
    }
</style>