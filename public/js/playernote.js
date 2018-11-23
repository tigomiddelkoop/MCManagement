function ajax(uuid, note) {
    let debug = true;
    if (window.XMLHttpRequest) {
        XMLHttp = new XMLHttpRequest();
    } else {
        XMLHttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    let controlScript = "index.php?page=ajaxdatatransfer&data=playernote";
    let httpString = controlScript + "&uuid=" + uuid + "&note=" + note;
    let httpReponse = "";
    if (debug) {
        console.log(httpString);
    }
    XMLHttp.open("GET", httpString, true);
    XMLHttp.send();
    XMLHttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            if (debug) {
                console.log("Site Response: " + XMLHttp.responseText);
            }
            httpReponse = XMLHttp.responseText;
        }
    }
}