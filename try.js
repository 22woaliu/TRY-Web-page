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

function filterPosts(category, button) {
    let buttons = document.querySelectorAll('.filter-buttons button');
  
    buttons.forEach(btn => btn.classList.remove('active'));
    
    button.classList.add('active');

    let posts = document.querySelectorAll('.details');

    posts.forEach(details => {
        if (category === 'all' || details.classList.contains(category)) {
            details.style.display = 'block';
        } else {
            details.style.display = 'none';
        }
    });
}