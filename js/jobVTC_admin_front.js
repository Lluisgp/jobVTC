/**
 * With a form as param make call to backend for insert in db an element
 * @param {type} form
 * @returns {undefined}
 */
function insertItem(form) {
    var parametros;

    if (typeof (form.elements.do_action.value) != "undefined" && form.elements.do_action.value !== null) {
        var do_action = form.elements.do_action.value;
    } else {
        exit;
    }
    if (do_action == "insert_city") {
        if (typeof (form.elements.new_city_name.value) != "undefined" && form.elements.new_city_name.value !== null && typeof (form.elements.new_city_dlc.value) != "undefined" && form.elements.new_city_dlc.value !== null) {
            parametros = {
                "new_city_name": form.elements.new_city_name.value,
                "new_city_dlc": form.elements.new_city_dlc.value,
                "do_action": do_action,
                "action": "vtc_controller_test"
            };
        } else {
            Alert("Must be insert the name and DLC of the new city!"),
                    exit;
        }
    } else if (do_action == "insert_cargo") {
        if (typeof (form.elements.new_cargo_name.value) != "undefined" && form.elements.new_cargo_name.value !== null && typeof (form.elements.new_cargo_dlc.value) != "undefined" && form.elements.new_cargo_dlc.value !== null) {
            parametros = {
                "new_cargo_name": form.elements.new_cargo_name.value,
                "new_cargo_dlc": form.elements.new_cargo_dlc.value,
                "action": "vtc_controller_test",
                "do_action": do_action
            };
        } else {
            Alert("Must be insert the name and DLC of the new cargo!"),
                    exit;
        }
    }
    jQuery.ajax({
        data: parametros,
        url: ruta,
        type: 'post',
        action: "vtc_controller_test",
        success: function (response) {
            alert("Inserted with successful!");
            console.log(response);
        },
        error: function (errorThrown) {
            alert("Error!");
            console.log(errorThrown);
        }
    });
}

