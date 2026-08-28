document.addEventListener("DOMContentLoaded", function () {
    const tableSearchInputs = document.querySelectorAll("#searchInput, [data-table-search]");

    tableSearchInputs.forEach(function (searchInput, index) {
        const sectionRoot =
            searchInput.closest(".bg-white") ||
            searchInput.closest(".card") ||
            searchInput.closest("section") ||
            searchInput.parentElement;

        if (!sectionRoot) {
            return;
        }

        const table = sectionRoot.querySelector("table");
        const tbody = table ? table.querySelector("tbody") : null;

        if (!table || !tbody) {
            return;
        }

        const pagination =
            sectionRoot.querySelector(".mt-4") ||
            sectionRoot.querySelector(".table-pagination-footer");

        const originalRows = Array.from(tbody.querySelectorAll("tr")).filter(function (row) {
            return !row.hasAttribute("data-search-empty");
        });

        let emptyRow = tbody.querySelector("[data-search-empty]");

        if (!emptyRow) {
            emptyRow = document.createElement("tr");
            emptyRow.setAttribute("data-search-empty", "true");
            emptyRow.style.display = "none";

            const emptyCell = document.createElement("td");
            emptyCell.colSpan = table.querySelectorAll("thead th").length || 1;
            emptyCell.className = "text-center text-gray-500 py-4";
            emptyCell.textContent = "No matching records found.";

            emptyRow.appendChild(emptyCell);
            tbody.appendChild(emptyRow);
        }

        const filterTable = function () {
            const query = searchInput.value.trim().toLowerCase();
            let visibleCount = 0;

            originalRows.forEach(function (row) {
                const text = row.textContent.toLowerCase().replace(/\s+/g, " ").trim();
                const isVisible = query === "" || text.includes(query);

                row.style.display = isVisible ? "" : "none";

                if (isVisible) {
                    visibleCount += 1;
                }
            });

            emptyRow.style.display = visibleCount === 0 ? "" : "none";

            if (pagination) {
                pagination.style.display = query === "" ? "" : "none";
            }
        };

        if (!searchInput.dataset.tableSearchBound) {
            searchInput.addEventListener("input", filterTable);
            searchInput.dataset.tableSearchBound = "1";
            searchInput.dataset.tableSearchIndex = String(index);
        }

        filterTable();
    });

    const topbarSearchInput = document.querySelector("[data-product-search-input]");
    const topbarSearchResults = document.querySelector("[data-product-search-results]");

    if (!topbarSearchInput || !topbarSearchResults) {
        return;
    }

    let activeRequest = null;
    let searchDebounceTimer = null;

    const escapeHtml = function (value) {
        return String(value)
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/\"/g, "&quot;")
            .replace(/'/g, "&#039;");
    };

    const minimumCharacters = 3;

    const hideResults = function () {
        topbarSearchResults.innerHTML = "";
        topbarSearchResults.classList.remove("is-visible");
    };

    const showMessage = function (message) {
        topbarSearchResults.innerHTML = '<div class="topbar-search-state">' + escapeHtml(message) + "</div>";
        topbarSearchResults.classList.add("is-visible");
    };

    const renderResults = function (products) {
        if (!products.length) {
            showMessage("No record found.");
            return;
        }

        topbarSearchResults.innerHTML = products
            .map(function (product) {
                const skuProductId = product.sku_product_id ? "ID: " + escapeHtml(product.sku_product_id) : "";
                const skuCode = product.sku_code ? "SKU: " + escapeHtml(product.sku_code) : "";
                const meta = [skuProductId, skuCode].filter(Boolean).join(" | ");

                return (
                    '<a class="topbar-search-result-item" href="' + escapeHtml(product.edit_url) + '">' +
                    '<span class="topbar-search-result-title">' + escapeHtml(product.name) + "</span>" +
                    '<span class="topbar-search-result-meta">' + escapeHtml(meta || "Open edit page") + "</span>" +
                    "</a>"
                );
            })
            .join("");

        topbarSearchResults.classList.add("is-visible");
    };

    const fetchProducts = function (query) {
        const searchUrl = topbarSearchInput.dataset.searchUrl;

        if (!searchUrl) {
            return;
        }

        if (activeRequest && activeRequest.readyState !== 4) {
            activeRequest.abort();
        }

        showMessage("Searching...");

        activeRequest = $.ajax({
            url: searchUrl,
            type: "GET",
            dataType: "json",
            data: {
                q: query,
            },
        })
            .done(function (response) {
                renderResults(Array.isArray(response.data) ? response.data : []);
            })
            .fail(function (xhr, status) {
                if (status === "abort") {
                    return;
                }

                showMessage("Search failed. Please try again.");
            });
    };

    topbarSearchInput.addEventListener("input", function () {
        const query = this.value.trim();

        window.clearTimeout(searchDebounceTimer);

        if (query.length === 0 || query.length < minimumCharacters) {
            showMessage("Enter at least 3 characters.");
            return;
        }

        searchDebounceTimer = window.setTimeout(function () {
            fetchProducts(query);
        }, 250);
    });

    topbarSearchInput.addEventListener("focus", function () {
        const query = this.value.trim();

        if (query.length < minimumCharacters) {
            showMessage("Enter at least 3 characters.");
            return;
        }

        if (topbarSearchResults.innerHTML.trim() !== "") {
            topbarSearchResults.classList.add("is-visible");
        }
    });

    document.addEventListener("click", function (event) {
        const topbarSearch = topbarSearchInput.closest(".topbar-search");

        if (topbarSearch && !topbarSearch.contains(event.target)) {
            hideResults();
        }
    });

    topbarSearchInput.addEventListener("keydown", function (event) {
        if (event.key !== "Enter") {
            return;
        }

        const firstResult = topbarSearchResults.querySelector(".topbar-search-result-item");
        if (firstResult && topbarSearchResults.classList.contains("is-visible")) {
            event.preventDefault();
            window.location.href = firstResult.getAttribute("href");
        }
    });
});
