const navbarNav = document.querySelector('.navbar-nav');
const hamburgerMenu = document.querySelector('#hamburger-menu');

hamburgerMenu.onclick = () => {
    navbarNav.classList.toggle('active');
};

// klik diluar sidebar untuk menghilangkan nav
const hamburger = document.querySelector('#hamburger-menu');
document.addEventListener('click', function (e) {
    if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
        navbarNav.classList.remove('active');
    }
});


// search
const searchBtn = document.querySelector('#search');
const searchForm = document.querySelector('.search-form');

searchBtn.addEventListener('click', () => {
    searchForm.classList.toggle('active');
});
const searchBox =
document.querySelector('#search-box');

searchBox.addEventListener('keyup', () => {

    let keyword =
    searchBox.value.toLowerCase();

    let products =
    document.querySelectorAll('.collection-card');

    products.forEach(product => {

        let name =
        product.querySelector('.product-name')
        .textContent
        .toLowerCase();

        if(name.includes(keyword)){
            product.style.display = 'block';
        }else{
            product.style.display = 'none';
        }

    });

});

