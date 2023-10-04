
const xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
        document.querySelector(".dropdown").innerHTML = this.responseText;
    }
};
xhttp.open("GET", "index.php?op=createDropdown", true);
xhttp.send();

// const xhttp = new XMLHttpRequest();
// xhttp.onreadystatechange = function () {
//     if (this.readyState === 4 && this.status === 200) {
//         document.querySelector(".searchBar").innerHTML = this.responseText;
//     }
// };
// xhttp.open("GET", "index.php?op=createSearchBar", true);
// xhttp.send();

function createAjaxRequest(url, div) {
    const xhttp = new XMLHttpRequest();
    xhttp.open("GET", url, true);

    xhttp.onreadystatechange = function () {
        if (xhttp.readyState === 4 && xhttp.status === 200) {
            let text1 = ".";
            let text2 = div;
            let result = text1.concat("", text2);
            document.querySelector(result).innerHTML = xhttp.responseText;;
        }
    };
    xhttp.send();
}