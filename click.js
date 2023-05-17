function sortProducts() {
    var sortOption = document.getElementById("sort-menu").value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("product-container").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "sort.php?sort_option=" + sortOption, true);
    xmlhttp.send();
}
