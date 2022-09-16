@if(session()->has('msj'))
    <script>

    Swal.fire({
        html: "{{session()->get('msj')}}",
        icon: "{{session()->get('icon')}}",
        confirmButtonText: 'Aceptar',
        confirmButtonColor: '#02054a',
    });
    
    </script>
    
    {{session()->forget('msj')}}
    {{session()->forget('icon')}}

@endif