var search = document.getElementById('pesquisar');
search.addEventListener("keydown", function (event) {
    if (event.key === "Enter") {
        searchData();
    }
});

function searchData() {
    window.location = 'listar.php?search=' + search.value;
}
