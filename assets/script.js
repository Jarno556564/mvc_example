
const xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
        document.querySelector(".dropdown").innerHTML = this.responseText;
    }
};
xhttp.open("GET", "index.php?op=createDropdown", true);
xhttp.send();

function readDropdown(selectElement) {
    var selectedValue = selectElement.value;
    var url = "index.php?op=readDropdown&name=" + encodeURIComponent(selectedValue);

    const xhttp = new XMLHttpRequest();
    xhttp.open("GET", url, true);

    xhttp.onreadystatechange = function() {
        if (xhttp.readyState === 4 && xhttp.status === 200) {
            document.querySelector(".main").innerHTML = xhttp.responseText;;
        }
    };
    xhttp.send();
}
