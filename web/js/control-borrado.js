function ctrlPais(path,nombre)
{
    swal({
        title: "¿Está seguro?",
        text: "Se está por borrar el país "+nombre,
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {

          window.location.replace(path);
          
        }
      });

    return false;

}

function ctrlProvincia(path,nombre)
{
    swal({
        title: "¿Está seguro?",
        text: "Se está por borrar la provincia "+nombre,
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {

        if (willDelete) {

            window.location.replace(path);
          
        }
      });
    return false;

}

