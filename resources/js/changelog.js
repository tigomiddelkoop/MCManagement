function removeEntry(elementId) {
    // Removes an element from the document
    let element = document.getElementById(elementId);
    element.parentNode.removeChild(element);
}

function addEntry(where) {

    let input_text = document.getElementById(where + "NEW").value;
    var form = document.createElement("div");

    form.innerHTML =
        '<div class="input-group" id="' + input_text + '" name="entries">\n' +
        '<input type="text" class="form-control" value="' + input_text + '" name="' + where + '[]">\n' +
        '<span class="input-group-btn">\n' +
        '<button type="button" id="' + input_text + '" class="btn btn-danger btn-flat"\n' +
        '                                                    title="Remove the entry" onclick="removeElement(\''+ input_text +'\')">\n' +
        '<i class="fa fa-remove"></i>\n' +
        '</button>\n' +
        '</span>\n' +
        '</div>';
    document.getElementById(where).appendChild(form);
}

function removeSection() {

}

function addSection() {
    console.log("Test");
}