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
    // 1. Select all elements with the class 'post'
    let posts = document.querySelectorAll('.details');

    posts.forEach(details => {
        // 2. If 'all' is clicked, show everything
        if (category === 'all') {
            details.style.display = 'block';
        } 
        // 3. Check if the post contains the category class
        else if (details.classList.contains(category)) {
            details.style.display = 'block';
        } 
        // 4. Otherwise, hide it
        else {
            details.style.display = 'none';
        }
    });
}