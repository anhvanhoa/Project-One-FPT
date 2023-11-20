const btnSearch = document.getElementById('btn-search'),
    overlay = document.getElementById('overlay'),
    boxSearch = document.getElementById('search');
btnSearch.onclick = () => {
    boxSearch.classList.toggle('top-full');
    boxSearch.classList.toggle('-z-10');
    boxSearch.classList.toggle('z-10');
    boxSearch.classList.toggle('top-0');
    overlay.classList.toggle('hidden');
    document.body.classList.toggle('h-screen');
};

overlay.onclick = () => {
    boxSearch.classList.toggle('top-full');
    boxSearch.classList.toggle('-z-10');
    boxSearch.classList.toggle('z-10');
    boxSearch.classList.toggle('top-0');
    overlay.classList.toggle('hidden');
    document.body.classList.toggle('overflow-visible');
};
