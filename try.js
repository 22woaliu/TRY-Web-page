document.getElementById('loadMore').addEventListener('click', function() {

    let hiddenPosts = document.querySelectorAll('.details[style*="display: none"]');
    
    let amountToShow = 3; 

    for (let i = 0; i < amountToShow; i++) {
        if (hiddenPosts[i]) {
            hiddenPosts[i].style.display = 'block';
        }
    }

    if (hiddenPosts.length <= amountToShow) {
        this.style.display = 'none';
    }
});

function filterPosts(category) {
    let posts = document.querySelectorAll('.details');

    posts.forEach(details => {
        if (category === 'all') {
            details.style.display = 'block';
        }
        else if (details.classList.contains(category)) {
            details.style.display = 'block';
        }
        else {
            details.style.display = 'none';
        }
    });
}