"use strict";
var	c_highest_id = 0;

function msg(str) {
	console.log(str);
}

function isEmpty(str) {
	return (!str || 0 === str.length);
}

function myConfirmFunction() {
	var txt;
	var r = confirm("hmmm!!! sure you to want remove this item?");
	if (r == true) {
		txt = "myConfirmFunction(): you pressed OK!";
	} else {
		txt = "myConfirmFunction(): you pressed Cancel!";
	}
	msg(txt);
	return r;
}

function addItemOnLoad() {
	var todo_item;
	var child_elt;
	msg("reloading todo items:");
	loadToCsvFile();
	c_highest_id++;
}

function createChild(todo_item) {
	var text_node;
	var child_elt;

	// create the child elt
	child_elt = $("<div/>", {
		// properties here
		text: todo_item,
		//id: "example",
		on: {
			mouseover: function() {
				child_elt.css({
					color: "red",
					cursor: "pointer"
				})
			},
			mouseout: function() {
				child_elt.css({
					color: "black",
				})
			},
			click: function(eventObj) {
				var	c_id = child_elt.attr("c_id");
				msg("item selected: id: " + c_id +  ", todo: " + child_elt.html());
				if (myConfirmFunction()) {
					todo_item = child_elt.html();
					msg("removing todo: " + todo_item);
					child_elt.remove();
					msg("deleting item: id:" + c_id + ", todo: " + todo_item);
					deleteFromCsvFile(c_id, todo_item);
				}
			}
		},
	});
	return child_elt;
}

function appendChildToParent(child_elt) {
	var first_child;
	var num_children = $("#ft_list").children().length;

	if (num_children == 0) {
		$("#ft_list").append(child_elt);
	} else {
		first_child = $("#ft_list").children().first();
		child_elt.insertBefore(first_child);
	}
}

function addItemOnClick() {
	var todo_item;
	var child_elt;
	var parent_elt = $("ft_list");
	var children_nodes = $("ft_list").children();

	todo_item = prompt("please enter your new todo item", "new todo");
	if (todo_item != null && !isEmpty(todo_item)) {
		msg("appending todo item '" + todo_item + "'");
		child_elt = createChild(todo_item);
		appendChildToParent(child_elt);

		// add the attribute to track the item
		child_elt.attr("c_id", c_highest_id);
		insertToCsvFile(c_highest_id, todo_item);
		c_highest_id++;
	} else {
		msg("can not add todo item '" + todo_item + "' : is null or empty");
	}
}

$(document).ready(function() {
	addItemOnLoad();

	$("#id").click(function() {
		addItemOnClick();
	});
});

/*
 * ajax calls
 */
function loadToCsvFile() {
	console.log("ajax- sending http request select()");
	$.ajax({
		type: 'POST',
		contentType: "application/json",
		url: './select.php',
		data: JSON.stringify( {
			"from": 0,
			"to": 0
		}),
		dataType: 'json',
		beforeSend: function() { 
			$('#loading').show(); 
		},
		success: function(response) {
			var todo_item;
			var child_elt;
			var	results, i, todo_key_value, c_id;

			results = response;
			console.log(response);
			for(i = 0; i < results.length; i++) {
				todo_key_value = results[i][0].split(';');
				c_id = todo_key_value[0];
				todo_item = todo_key_value[1];
				c_id = parseInt(c_id, 10);
				msg("appending todo item: '" + todo_item + "'' at position: '" + c_id + "'");
				child_elt = createChild(todo_item);
				appendChildToParent(child_elt);
				child_elt.attr("c_id", c_id);
				if (c_id > c_highest_id) {
					c_highest_id = c_id;
					msg("               c_highest_id: '" + c_highest_id + "' is less than '" + c_id + "'");
				} else {
					msg("               c_highest_id: '" + c_highest_id + "' is higher than '" + c_id + "'");
				}
				c_highest_id++;
			}
		},
		complete: function() {
			$('#loading').hide();
		},
		error: function(xhr) {
			console.log("error on http response: " + xhr.status + " " + xhr.statusText);
		}

	});
}

function insertToCsvFile(id, todo_item) {
	console.log("ajax- sending http request insert()", "post", "'" + id + ": " +  todo_item + "'");
	$.ajax({
		type: 'POST',
		contentType: "application/json",
		url: './insert.php',
		data: JSON.stringify( {
			"id": id,
			"todo": todo_item
		}),
		dataType: 'json',
		success: function(response) {
			console.log(response);
		},
		error: function(xhr) {
			console.log("error on http response: " + xhr.status + " " + xhr.statusText);
		}

	});
}

function deleteFromCsvFile(id, todo_item) {
	console.log("ajax- sending http request delete()", "get", "'" + id + ": " +  todo_item + "'");
	$.ajax({
		type: 'POST',
		contentType: "application/json",
		url: './delete.php',
		data: JSON.stringify( {
			"id": id,
			"todo": todo_item
		}),
		dataType: 'json',
		success: function(response) {
			console.log(response);
		},
		error: function(xhr) {
			console.log("error on http response: " + xhr.status + " " + xhr.statusText);
		}

	});
}

function todo_js_ajax_without_jquery() {

	"use strict";

	var parent_elt = document.getElementById("ft_list");
	var children_nodes = parent_elt.childNodes;
	var	c_highest_id = 0;
	addItemOnLoad();

	function msg(str) {
		console.log(str);
	}

	function isEmpty(str) {
		return (!str || 0 === str.length);
	}

	function myConfirmFunction() {
		var txt;
		var r = confirm("hmmm!!! sure you to want remove this item?");
		if (r == true) {
			txt = "myConfirmFunction(): you pressed OK!";
		} else {
			txt = "myConfirmFunction(): you pressed Cancel!";
		}
		msg(txt);
		return r;
	}

	function createChild(todo_item) {
		var text_node;
		var child_elt;

		// create the child elt
		child_elt = document.createElement("div");
		// text is the child of 
		text_node = document.createTextNode(todo_item);		// text is the child of child_et
		child_elt.appendChild(text_node);
		// add an event to change color
		child_elt.addEventListener("mouseover", function() { child_elt.style.color = 'red';});
		child_elt.addEventListener("mouseout", function() { child_elt.style.color = 'black';});
		// add an event to remove it
		child_elt.addEventListener("click", 
				function(eventObj) { 
					var c_id = child_elt.getAttribute("c_id");
					msg("item selected: id:" + c_id + ", todo: " + child_elt.innerHTML);
					if (myConfirmFunction()) {
						todo_item = child_elt.innerHTML;
						msg("removing todo: " + todo_item);
						parent_elt.removeChild(child_elt);
						msg("deleting item: id:" + ", todo: " + todo_item);
						deleteFromCsvFile(c_id, todo_item);
					}
				}
		);
		return child_elt;
	}

	function appendChildToParent(child_elt) {
		var first_child;

		if (children_nodes.length == 0) {
			// see also: parent_elt.hasChildNodes()
			// no todo_item list div: this is the first one
			// attach the newly created child in the parent ft_list
			parent_elt.appendChild(child_elt);
		} else {
			first_child = children_nodes[0];
			parent_elt.insertBefore(child_elt, first_child);
		}
	}

	function addItemOnLoad() {
		var todo_item;
		var child_elt;
		msg("reloading todo items:");
		loadToCsvFile();
		c_highest_id++;
	}

	function addItemOnClick() {
		var todo_item;
		var child_elt;

		todo_item = prompt("please enter your new todo item", "new todo");
		if (todo_item != null && !isEmpty(todo_item)) { 
			msg("appending todo item '" + todo_item + "'");
			child_elt = createChild(todo_item);
			appendChildToParent(child_elt);

			// add the attribute to track the cookie
			msg("adding attribute to the new div id = '"  + c_highest_id + "'");
			child_elt.setAttribute("c_id", c_highest_id);
			insertToCsvFile(c_highest_id, todo_item);
			c_highest_id++;
		} else {
			msg("can not add todo item '" + todo_item + "' : is null or empty");
		}
	}

	/*
	* ajax calls
	*/
	function loadToCsvFile() {
		console.log("ajax- sending http request select()");
		//parent_elt.innerHTML = 'loading...';
		my_post('./select.php', {"from": 0, "to" : 0}, function(response) {
			var todo_item;
			var child_elt;
			var	results, i, todo_key_value, c_id;

			results = JSON.parse(response);
			console.log(response);
			console.log(results);
			for(i = 0; i < results.length; i++) {
				todo_key_value = results[i][0].split(';');
				c_id = todo_key_value[0];
				todo_item = todo_key_value[1];
				c_id = parseInt(c_id, 10);
				msg("appending todo item: '" + todo_item + "'' at position: '" + c_id + "'");
				child_elt = createChild(todo_item);
				appendChildToParent(child_elt);
				child_elt.setAttribute("c_id", c_id);
				if (c_id > c_highest_id) {
					c_highest_id = c_id;
					msg("               c_highest_id: '" + c_highest_id + "' is less than '" + c_id + "'");
				} else {
					msg("               c_highest_id: '" + c_highest_id + "' is higher than '" + c_id + "'");
				}
				c_highest_id++;
			}

		}, function(xhr) {
			console.log("error on http response", xhr.status);
		});
	}

	function insertToCsvFile(id, todo_item) {
		//parent_elt.innerHTML = 'loading...';
		console.log("ajax- sending http request insert()", "get", "'" + id + ": " +  todo_item + "'");
		my_post('./insert.php', {"id": id, "todo": todo_item}, function(response) {
			console.log(response);
		}, function(xhr) {
			console.log("error on http response", xhr.status);
		});
	}

	function deleteFromCsvFile(id, todo_item) {
		console.log("ajax- sending http request delete()", "get", "'" + id + ": " +  todo_item + "'");
		my_post('./delete.php', {"id": id, "todo": todo_item}, function(response) {
			console.log(response);
		}, function(xhr) {
			console.log("error on http response", xhr.status);
		});
	}

	function my_post(uri, params, onSuccess, onError) {
		var xhr = new XMLHttpRequest();
		var	x = JSON.stringify(params);

		xhr.open('POST', uri, true);
		xhr.setRequestHeader("Content-type", "application/json");

		xhr.onreadystatechange = function() {
			if(xhr.readyState === 4) {
				// response arrived
				if(xhr.status === 200) {
					// http status
					onSuccess(xhr.responseText);
				} else {
					onError(xhr);
				}
			}
		};
		xhr.send(x);
	}
}
