<script> 
var Materiales = []; // array de Materiales

function pasaArticulos(elem){
    var idMaterial = $(elem).closest('tr').attr('id');
    if(elem.checked){
        var articulo = [ //array con la info de un artículo
            idMaterial,
            $($('#'+idMaterial).children()[1]).prop("outerText"),
            $($('#'+idMaterial).children()[2]).prop("outerText"),
            $($('#'+idMaterial).children()[3]).prop("outerText"),
            $($('#'+idMaterial).children()[4]).prop("outerText"),
            $($('#'+idMaterial).children()[5]).prop("outerText"),
            $($('#'+idMaterial).children()[6]).prop("outerText"),
            1,
            0 
        ]
        
        Materiales.push(articulo); //Metiendo el array del artículo dentro del array de Materiales.
        
    }else{
        for( var i = 0; i < Materiales.length; i++){ 
    
            if ( Materiales[i][0] === idMaterial) { 
        
                Materiales.splice(i, 1); //elimina el material deseleccionado
            }
        
        }
    }

    cargaMateriales();
    
}

//La idea es que se pase el arreglo de materiales a la vista de Agragar materiales
//Con un foreach, descargar cada material y hacer push directo a Materiales[]
//Luego de eso llamar a cargarMateriales();

function cargaMateriales(){
    $( ".tbodyMateriales" ).html("");
    $( ".tbodyMaterialesHidden" ).html("");
    var sku = 0;
    for (var articulo of Materiales) {
        sku++;

            $(".tbodyMateriales" ).append( "<tr id="+articulo[0]+">"+
            "<td>"+sku+"</td>"+
            "<td>"+articulo[1]+"</td>"+
            "<td>"+articulo[2]+"</td>"+
            "<td>"+articulo[3]+"</td>"+
            "<td><input type=\"number\" class=\"form-control {{$errors->has('listaArticulos.*.[1]') ? ' border-danger' : ''}}\" placeholder=\"Cantidad\" id=\"cantidadArticulo"+articulo[0]+"\" value="+articulo[7]+" onchange=\"calulaPrecio("+articulo[5]+","+articulo[0]+")\"></td>"+
            "<td>"+articulo[6]+"</td>"+
            "<td>"+articulo[5]+"</td>"+
            "<td><input type=\"number\" id=\"margenArticulo"+articulo[0]+"\" class=\"form-control {{ $errors->has('listaArticulos.*.[2]') ? ' border-danger' : ''}}\" placeholder=\"Margen\" value="+articulo[8]+" onchange=\"calulaPrecio("+articulo[5]+","+articulo[0]+")\"></td>"+
            "<td><input type=\"text\" class=\"form-control\" placeholder=\"Precio\" id=\"precioArticulo"+articulo[0]+"\" readonly></td>"+
            "<td><input type=\"text\" class=\"form-control\" placeholder=\"IVA\" id=\"ivaArticulo"+articulo[0]+"\" readonly></td>"+
            "<td><input type=\"text\" class=\"form-control\" placeholder=\"PrecioFinal\" id=\"precioFinalArticulo"+articulo[0]+"\" readonly></td></tr>");

            $(".tbodyMaterialesHidden" ).append( "<tr id="+articulo[0]+"></tr>"+
            "<input type=\"hidden\" name=\"listaArticulos["+articulo[0]+"][0]\" class=\"form-control no-border\" value="+articulo[0]+">"+
            "<input type=\"hidden\" name=\"listaArticulos["+articulo[0]+"][1]\" class=\"form-control no-border\" value=\"1\" id=\"cantidadOculto"+articulo[0]+"\">"+
            "<input type=\"hidden\" name=\"listaArticulos["+articulo[0]+"][2]\" class=\"form-control no-border\" id=\"margenOculto"+articulo[0]+"\">"+
            "<input type=\"hidden\" name=\"listaArticulos["+articulo[0]+"][3]\" class=\"form-control no-border\" id=\"precioOculto"+articulo[0]+"\">"+
            "<input type=\"hidden\" name=\"listaArticulos["+articulo[0]+"][4]\" class=\"form-control no-border\" id=\"ivaOculto"+articulo[0]+"\">"+
            "<input type=\"hidden\" name=\"listaArticulos["+articulo[0]+"][5]\" class=\"form-control no-border\" id=\"precioFinalOculto"+articulo[0]+"\">").appendTo('Form[name="cotizador"]');

            calulaPrecio(articulo[5], articulo[0]);

            //articulo[0] > ArticuloID
            //articulo[1] > Codigo de articulo
            //articulo[2] > Nombre de articulo
            //articulo[3] > Proveedor
            //articulo[4] > Marca
            //articulo[5] > Costo
            //articulo[6] > unidad de medida
            //articulo[7] > Cantidad
            //articulo[8] > margen
    }
}

function calulaPrecio(costo, id){
    var cantidad = $("#cantidadArticulo"+id).val();
    var margen = $("#margenArticulo"+id).val();

    var precio = costo * cantidad * ((margen/100) + 1);
    var iva = precio * 0.13;
    var precioFinal =  iva + precio;

    precioFinal = roundNumber(precioFinal, 2);
    iva = roundNumber(iva, 2);
    precio = roundNumber(precio, 2);

    $("#cantidadOculto"+id).val(cantidad);
    $("#margenOculto"+id).val(margen);

    $("#precioArticulo"+id).val(precio);
    $("#ivaArticulo"+id).val(iva);
    $("#precioFinalArticulo"+id).val(precioFinal);

    $("#precioOculto"+id).val(precio);
    $("#ivaOculto"+id).val(iva);
    $("#precioFinalOculto"+id).val(precioFinal);
}


function calculaMateriales(){
    cantidad = $("#txtCantidadMat").val();
    costo = $("#txtCostoMat").val();
    margen = $("#txtMargenMat").val();

    var precio = costo * cantidad * (margen + 1);
    var iva = precio * 0.13;
    var precioFinal =  iva + precio;

    $("#txtPrecioMat").val(precio);
    $("#txtivaMat").val(iva);
    $("#txtPrecioFMat").val(precioFinal);
}

function calculaMano(){
    cantidad = $("#txtCantidadMano").val();
    costo = $("#txtCostoMano").val();
    margen = $("#txtMargenMano").val();

    var precio = costo * cantidad * (margen + 1);
    var iva = precio * 0.13;
    var precioFinal =  iva + precio;

    $("#txtPrecioMano").val(precio);
    $("#txtivaMano").val(iva);
    $("#txtPrecioFMano").val(precioFinal);
}

function pasaMateriales(materiales){
    for (var material of materiales){
        var articulo = [ //array con la info de un artículo
            ""+material['articuloID'],
            material['codigo'],
            material['nombre'],
            material['proveedor'],
            material['marca'],
            material['costo'],
            material['unidadMedida'],
            material['cantidad'],
            material['margen']
        ];
        Materiales.push(articulo);
    }
    cargaMateriales();
}

function cargaRubros(rubros){
    for (var rubro of rubros){
        if(rubro['fk_rubrosCotizacionID'] === 1){
            $("#txtCantidadMat").val(rubro['cantidad']);
            $("#txtCostoMat").val(rubro['costo'] );
            $("#txtMargenMat").val(rubro['margen'] );
        }
        if(rubro['fk_rubrosCotizacionID'] === 2){
            $("#txtCantidadMano").val(rubro['cantidad']);
            $("#txtCostoMano").val(rubro['costo'] );
            $("#txtMargenMano").val(rubro['margen'] );
        }
    }
    calculaMano();
    calculaMateriales();
}

function roundNumber(num, scale) {
    if(!("" + num).includes("e")) {
      return +(Math.round(num + "e+" + scale)  + "e-" + scale);
    } else {
      var arr = ("" + num).split("e");
      var sig = ""
      if(+arr[1] + scale > 0) {
        sig = "+";
      }
      return +(Math.round(+arr[0] + "e" + sig + (+arr[1] + scale)) + "e-" + scale);
    }
  }

</script>