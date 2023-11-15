const btnSearch = document.getElementById('btn-search'),
    boxSearch = document.getElementById('search');
btnSearch.onclick = () => {
    boxSearch.classList.toggle('top-full');
    boxSearch.classList.toggle('-z-10');
};
