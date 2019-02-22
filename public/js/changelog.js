function removeEntry(elementId) {
    // Removes an element from the document
    let element = document.getElementById(elementId);
    element.parentNode.removeChild(element);
}

function addEntry(where) {

    let input_text = document.getElementById(where + "NEW").value;
    let input_field = document.getElementById(where + "NEW");

    if(!input_text == "") {
        let form = document.createElement("div");

        form.innerHTML =
            '<div class="input-group" id="' + input_text + '" name="entries">\n' +
            '<input type="text" class="form-control" value="' + input_text + '" name="' + where + '[]">\n' +
            '<span class="input-group-btn">\n' +
            '<button type="button" id="' + input_text + '" class="btn btn-danger btn-flat"\n' +
            '                                                    title="Remove the entry" onclick="removeEntry(\'' + input_text + '\')">\n' +
            '<i class="fa fa-remove"></i>\n' +
            '</button>\n' +
            '</span>\n' +
            '</div>';
        document.getElementById(where + "NEW").value = "";
        document.getElementById(where).appendChild(form);
    }
}

function removeSection() {
    let input_text = document.getElementById('addSection');
    console.log(input_text);
}

function addSection() {
    let input_text = document.getElementById('addSection');
    console.log(input_text);
}