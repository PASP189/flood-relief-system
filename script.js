
// DELETE CONFIRMATION

function confirmDelete(url) {
    if (confirm("Are you sure you want to delete this?")) {
        window.location.href = url;
    }
}



// PAGE NAVIGATION

function goTo(page) {
    window.location.href = page;
}



// FORM VALIDATION

function validateForm(formId) {
    let form = document.getElementById(formId);
    let inputs = form.querySelectorAll("input, select, textarea");

    for (let input of inputs) {
        if (input.value.trim() === "") {
            alert("Please fill all fields!");
            input.focus();
            return false;
        }
    }
    return true;
}



// AUTO HIDE ALERT (OPTIONAL)

window.onload = function () {
    let alertBox = document.querySelector(".alert");
    if (alertBox) {
        setTimeout(() => {
            alertBox.style.display = "none";
        }, 3000);
    }
};



// TABLE SEARCH (ADMIN/USER)

function searchTable(inputId, tableId) {
    let input = document.getElementById(inputId);
    let filter = input.value.toLowerCase();
    let table = document.getElementById(tableId);
    let rows = table.getElementsByTagName("tr");

    for (let i = 1; i < rows.length; i++) {
        let text = rows[i].textContent.toLowerCase();
        rows[i].style.display = text.includes(filter) ? "" : "none";
    }
}



// BUTTON LOADING EFFECT

function buttonLoading(btn) {
    btn.innerHTML = "Processing...";
    btn.disabled = true;
}