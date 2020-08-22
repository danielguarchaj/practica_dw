function getEstudiantes() {
    $.ajax({
        url: 'connection/listaAlumnos.php',
        type: "GET",
        success: function(response){
            document.getElementById('tbody').innerHTML = response
        },
        error: function(error) {
            console.error(error)
            alert('Error de servidor, intente mas tarde.')
        }
    })
}

function insertarDatos (alumno) {
    $.ajax({
        url: 'connection/save.php',
        type: "POST",
        data: {
            carnet: alumno.carnet.value,
            nombre: alumno.nombre.value,
            apellido: alumno.apellido.value
        },
        success: function(response){
            alert('Alumno guardado')
            location.reload()
        },
        error: function(error) {
            console.error(error)
            alert('Error de servidor, intente mas tarde.')
        }
    })
}

function buscarAlumno (busqueda) {
    $.ajax({
        url: 'connection/getAlumno.php?carnet='+busqueda.carnetBusqueda.value,
        type: 'get',
        dataType: 'JSON',
        success: function(response){
          document.getElementById('tbody').innerHTML = response
        },
        error: function(error) {
            document.getElementById('tbody').innerHTML = error.responseText
            console.log(error)
        }
    });
}

getEstudiantes();