
    document.addEventListener('DOMContentLoaded', function() {
        const alert = document.getElementById('success-alert');
        if (alert) {
            setTimeout(() => {
                alert.classList.remove('show');
                alert.classList.add('fade');
            }, 3000); // 3 seconds
        }
    });

