function FilterCategories(){
    // Declare variables
    var input, filter, a, i, txtValue;
    input = document.getElementById('search_course');
    filter = input.value.toUpperCase();
    prt = document.getElementById("menu-sidebar");
    elts = prt.getElementsByClassName('list-group-item');

    // Loop through all list items, and hide those who don't match the search query
    for (i = 0; i < elts.length; i++) {
        a = elts[i];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
        a.style.visibility = "visible";
        } else {
        a.style.visibility = "hidden";
        }
    }
}