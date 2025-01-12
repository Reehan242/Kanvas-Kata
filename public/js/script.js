// const { replace } = require("lodash");

// Pilih tombol back-to-top
const backToTopButton = document.getElementById('backToTop');

// Event listener untuk memantau scroll
window.addEventListener('scroll', function () {
    if (window.scrollY > 200) { // Munculkan tombol jika scroll lebih dari 200px
        backToTopButton.classList.add('show');
    } else {
        backToTopButton.classList.remove('show');
    }
});

document.querySelectorAll('.like-btn').forEach(button => {
    button.addEventListener('click', function() {
        const slug = this.dataset.postSlug;
        fetch(`/post/${slug}/like`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({}),
        })
        .then(response => response.json())
        .then(data => {
            // Update icon dan jumlah like
            if (data.status === 'liked') {
                // Ganti icon dan teks jika sudah like
                this.classList.replace('btn-primary', 'btn-danger');
                this.innerHTML = `<i class="bi bi-hand-thumbs-up-fill"></i> | Unlike <span class="like-count">(${data.likes_count})</span>`;
            } else {
                // Ganti icon dan teks jika belum like
                this.classList.replace('btn-danger', 'btn-primary');
                this.innerHTML = `<i class="bi bi-hand-thumbs-up"></i> | Like <span class="like-count">(${data.likes_count})</span>`;
            }
        });
    });
});