const darkModeToggle = document.getElementById('darkModeToggle');
const body = document.body;

darkModeToggle.addEventListener('change', () => {
    body.classList.toggle('dark-mode', darkModeToggle.checked);
});

var gambar = document.getElementById('hero-gambar');
var quotes = document.getElementById('quotes');

quotes.addEventListener('click', () =>{
    quotes.style.color = 'red'
});

gambar.addEventListener('click', () =>{
    gambar.style.rotate = '90deg'
});