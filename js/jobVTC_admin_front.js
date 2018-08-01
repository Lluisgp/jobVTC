/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function test() {
    var parametros = {
        "do_action": "show_cargo"
    };

    jQuery.ajax({
        data: parametros,
        url: ruta + 'jobVTC_controller.php',
        type: 'post',
        complete: function (response) {
            alert(JSON.stringify(response));
            location.reload();
        }
    });
}

function insertItem(form) {
    alert("insertItem");
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
                "do_action": do_action
            };
        } else {
            Alert("Must be insert the name and DLC of the new city!"),
                    exit;
        }
    } else if (do_action == "insert_cargo") {
        if (typeof (form.elements.new_cargo_name.value) != "undefined" && form.elements.new_cargo_name.value !== null && typeof (form.elements.new_cargo_dlc.value) != "undefined" && form.elements.new_cargo_dlc.value !== null) {
            parametros = {
                "new_city_name": form.elements.new_cargo_name.value,
                "new_city_dlc": form.elements.new_cargo_dlc.value,
                "do_action": do_action
            };
        } else {
            Alert("Must be insert the name and DLC of the new cargo!"),
                    exit;
        }
    }
    jQuery.ajax({
        data: parametros,
        url: ruta + 'jobVTC_controller.php',
        type: 'post',
        complete: function (response) {
            alert(JSON.stringify(response));
            location.reload();
        }
    });
}

