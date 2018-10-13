
var parent_elt = document.getElementById("ft_list");
var children_nodes = parent_elt.childNodes;
var c_highest_id = 0;

checkCookies();
readCookies();
addItemOnLoad();

function msg(str) {
    console.log(str);
}

function isEmpty(str) {
    return (!str || 0 === str.length);
}

function myConfirmFunction() {
    var txt;
    var r = confirm("Attention ! Etes-vous sur de vouloir supprimer cet item?");
    if (r == true) {
        txt = "myConfirmFunction(): OK !";
    } else {
        txt = "myConfirmFunction(): Annuler !";
    }
    msg(txt);
    return r;
}

function createChild(todo_item) {
    var text_node;
    var child_elt;

    child_elt = document.createElement("div");
    text_node = document.createTextNode(todo_item);
    child_elt.appendChild(text_node);
    child_elt.addEventListener("mouseover", function () { child_elt.style.color = 'red'; });
    child_elt.addEventListener("mouseout", function () { child_elt.style.color = 'black'; });
    child_elt.addEventListener("click",
        function (eventObj) {
            var c_id = child_elt.getAttribute("c_id");
            var cookie_name = "todo" + c_id;
            msg("item selected: " + ", todo: " + child_elt.innerHTML + ", cookie name: " + cookie_name);
            if (myConfirmFunction()) {
                todo_item = child_elt.innerHTML;
                msg("removing todo: " + todo_item);
                msg("getting cookie '" + cookie_name + "' : " + getCookie(cookie_name));
                parent_elt.removeChild(child_elt);
                msg("deleting cookie:" + cookie_name + " " + todo_item);
                setCookie(cookie_name, todo_item, -1);
                readCookies();
            }
        }
    );
    return child_elt;
}

function appendChildToParent(child_elt) {
    var first_child;

    if (children_nodes.length == 0) {
        parent_elt.appendChild(child_elt);
    } else {
        first_child = children_nodes[0];
        parent_elt.insertBefore(child_elt, first_child);
    }
}

function checkCookies() {
    var text = "";
    if (navigator.cookieEnabled == true) {
        text = "Cookies are enabled.";
    } else {
        text = "Cookies are not enabled.";
    }
    msg(text);
}

function setCookie(cookie_name, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cookie_name + "=" + cvalue + ";" + expires; + ";path=/";
}

function getCookie(cookie_name) {
    var name = cookie_name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function deleteAllCookies() {
    var cookies = document.cookie.split(";");

    for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i];
        var eqPos = cookie.indexOf("=");
        var name = eqPos > -1 ? cookie.substr(0, eqPos) : cookie;
        msg("deleting cookie: " + name);
        document.cookie = name + "=;expires=Thu, 01 Jan 1970 00:00:00 GMT";
    }
}

function readCookies() {
    var allcookies = document.cookie;
    msg("all cookies: " + allcookies);
}

function addItemOnLoad() {
    var todo_item;
    var child_elt;
    var ca = document.cookie.split(';');
    msg("reloading todo items:" + ca.length);
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf("todo") === 0) {
            var cookie_key_value = c.split('=');
            var cookie_key = cookie_key_value[0];
            var cookie_value = cookie_key_value[1];
            var c_id = cookie_key.replace(/^todo/, '');
            c_id = parseInt(c_id, 10);
            msg("appending todo item: '" + cookie_value + "' at position: '" + c_id + "'");
            child_elt = createChild(cookie_value);
            appendChildToParent(child_elt);
            child_elt.setAttribute("c_id", c_id);
            if (c_id > c_highest_id) {
                c_highest_id = c_id;
                msg("               c_highest_id: '" + c_highest_id + "' is less than '" + c_id + "'");
            } else {
                msg("               c_highest_id: '" + c_highest_id + "' is higher than '" + c_id + "'");
            }
        }
    }
    c_highest_id++;
}

function addItemOnClick() {
    var todo_item;
    var child_elt;
    var cookie_name;

    todo_item = prompt("Veuillez saisir une nouvelle tache / todo", "new todo");
    if (todo_item != null && !isEmpty(todo_item)) {
        msg("appending todo item '" + todo_item + "'");
        child_elt = createChild(todo_item);
        appendChildToParent(child_elt);

        cookie_name = "todo" + c_highest_id;
        msg("setting cookie '" + cookie_name + "=" + todo_item + "'");
        child_elt.setAttribute("c_id", c_highest_id);
        setCookie(cookie_name, todo_item, 10000);
        c_highest_id++;
        readCookies();
    } else {
        msg("can not add todo item '" + todo_item + "' : is null or empty");
    }
}
