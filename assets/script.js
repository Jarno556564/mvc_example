function showModal() {
    let modal = document.querySelector('.modal');
    modal.style.display = "block";
}

function toggleCheckboxes(source) {
    checkboxes = document.getElementsByName('checkboxes[]');
    for (var i = 0, n = checkboxes.length; i < n; i++) {
        checkboxes[i].checked = source.checked;
    }
}