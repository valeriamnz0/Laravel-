function TraerDatos()
    {
      var request = new XMLHttpRequest(); //se hace esta variable para la solicitud para el GET y esta se pueda enviar, por eso el request.send();
      //se usa GET porque va a traer información, en cambio POST es para realizar transacciones
      request.open('GET','https://api.hacienda.go.cr/indicadores/tc', true);
      request.send();
      //este API nos va a traer un resultado

      //la funcion del onload es para cuando el API devuelve el resultado, se ejecuta esa función
      request.onload = function()
      {
        if(request.status >= 200 && request.status < 400)
        {
          var datos = JSON.parse(this.response); 
         
         document.getElementById("txtChangeBuy").innerHTML = "₡"+datos.dolar.compra.valor; //aqui puse el getElementbyID porque va a leer lo que pusimos en la caja de texto de arriba con el Tipo de Cambio Compra, ID es TCC
         //para sacar el valor de TCC se debe poner las variables o los datos del JSON que necesitamos del API, en orden se ponen.
          document.getElementById("txtChangeSell").innerHTML = "₡"+datos.dolar.venta.valor;

          /* esta forma es en JQUERY, es lo mismo de arriba
          $("#TCC").val(datos.dolar.compra.valor);
          $("#TCV").val(datos.dolar.venta.valor);
          */
        }
        else
        {
          alert("No se pudo consultar el tipo de cambio del día de hoy");
        }
      }
    }

    TraerDatos();