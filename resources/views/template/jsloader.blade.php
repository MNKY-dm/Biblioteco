<script src="{{ asset('css/templatemo/js/plugins.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(window).on("load", function() {
        $('body').addClass('loaded');
    });
</script>
<script>
    // --- Recherche AJAX (commun à toutes les pages) ---
    const searchBar = document.getElementById('search-bar');
    const searchResults = document.getElementById('search-results');

    if (searchBar && searchResults) {
        let searchTimeout;

        searchBar.addEventListener('input', function () {
            const q = searchBar.value.trim();
            clearTimeout(searchTimeout);

            if (q.length < 3) {
                searchResults.innerHTML = '';
                searchResults.classList.remove('tm-search-open');
                return;
            }

            searchTimeout = setTimeout(function () {
                fetch('/search?q=' + encodeURIComponent(q), {
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                })
                    .then(response => response.text())
                    .then(html => {
                        searchResults.innerHTML = html;
                        searchResults.classList.add('tm-search-open');
                    });
            }, 300);
        });

        // Fermer en cliquant en dehors
        document.addEventListener('click', function (e) {
            if (!searchBar.closest('form').contains(e.target) && !searchResults.contains(e.target)) {
                searchResults.innerHTML = '';
                searchResults.classList.remove('tm-search-open');
            }
        });

        // Fermer avec Escape
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape') {
                searchResults.innerHTML = '';
                searchResults.classList.remove('tm-search-open');
            }
        });
    }
</script>
