function fillProvincias() {
    var html = "<option value='' disabled style=\"z-index:1000;\" selected>Seleccione una Provincia</option>";
    for (key in provinces) {
        html += "<option value='" + key + "' style=\"z-index:1000;\">" + provinces[key].name + "</option>";
    }
    $('.provincia').html(html);
}

$(document).ready(function () {
    $.ajax({
        dataType: "json",
        type: 'post',
        url: provincesUrl,
        data: {users, _token},
        success: function (data) {
            provinces = data;
            fillProvincias();
        },
        error: () => {
            alert("No se cargaron las provincias");
        }
    });

    if(formularioCliente === 1){
        addCustomersToTable();
        $('#tbClientes').DataTable({
            "paging": true,
        });
    }
})

function obtenerValorProvincia(aux) {
    const val = $('#' + aux + 'provincia').val();
    nombreProvincia(val);
    cantonSelect(val);
}


function cantonSelect(provincia, fill = true) {
    if (!provincia) return;
    if (provinces[provincia].cantones && fill)
        fillCanton(provincia)
    else
        $.ajax({
            dataType: "json",
            url: "https://ubicaciones.paginasweb.cr/provincia/" + provincia + "/cantones.json",
            success: function (data) {
                provinces[provincia]['cantones'] = [];
                for (key in data) {
                    provinces[provincia].cantones[key] = {name: data[key]};
                }
                if (fill)
                    fillCanton(provincia);
            },
            error: () => {
                alert("No se cargaron los cantones");
            }
        });
}

function fillCanton(provincia) {
    const data = provinces[provincia].cantones;
    var html = "<option value='' disabled style=\"z-index:1000;\" selected>Seleccione un Cantón</option>";
    for (key in data) {
        html += "<option value='" + key + "' style=\"z-index:1000;\">" + data[key].name + "</option>";
    }
    $('.canton').html(html);
}

function obtenerValorCanton(aux) {
    var provincia = $('#' + aux + 'provincia').val();
    var canton = $('#' + aux + 'canton').val();
    nombreCanton(aux);
    distritoSelect(provincia, canton);
}

function fillDistrito(provincia, canton) {
    const data = provinces[provincia].cantones[canton].distritos;
    var html = "<option value='' disabled style=\"z-index:1000;\" selected>Seleccione un Cantón</option>";
    for (key in data) {
        html += "<option value='" + key + "'>" + data[key].name + "</option>";
    }
    $('.distrito').html(html);
}

function distritoSelect(provincia, canton, fill = true) {
    if (!provincia && !canton) return;
    if (provinces[provincia].cantones[canton].distritos)
        fillDistrito(provincia, canton)
    else
        $.ajax({
            dataType: "json",
            url: "https://ubicaciones.paginasweb.cr/provincia/" + provincia + "/canton/" + canton + "/distritos.json",
            success: function (data) {
                provinces[provincia].cantones[canton]['distritos'] = [];
                for (key in data) {
                    provinces[provincia].cantones[canton].distritos[key] = {name: data[key]};
                }
                if (fill)
                    fillDistrito(provincia, canton)
            },
            error: () => {
                alert("No se cargaron los Distritos");
            }
        });
}

function nombreProvincia(province) {
    var texto = provinces[province].name;
    $("#texto_provincia").val(texto);
}

function nombreCanton(aux) {
    var texto = $("#" + aux + "canton option:selected").text();
    $("#texto_canton").val(texto);
}

function nombreDistrito(aux) {
    var texto = $("#" + aux + "distrito" + aux + " option:selected").text();
    $("#texto_distrito").val(texto);
}
