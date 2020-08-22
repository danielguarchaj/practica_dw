function getEstudiantes() {
    $.ajax({
        url: '',
        type: "POST",
        data: {
            carnet: alumno.carnet.value,
            nombre: alumno.nombre.value,
            apellido: alumno.apellido.value
        },
        success: function(response){
            let alumnosHtml = ''
            for (const alumno of response.data) {
                alumnosHtml += `
                <tr>
                  <td> <span class="">${alumno.carnet}</span> </td>
                  <td> <span class="">${alumno.nombre}</span> </td>
                  <td> <span class="">${alumno.apellido}</span> </td>
                </tr>
              `
            }
            document.getElementById('tbody').innerHTML = alumnosHtml
        },
        error: function(error) {
            console.error(error)
            alert('Error de servidor, intente mas tarde.')
        }
    })
}

function insertarDatos (alumno) {
    $.ajax({
        url: '',
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
    let carnet = document.querySelector('#carnetBusqueda').value
    $.ajax({
        url: './getAlumno.php?',
        type: "get",
        data: {
            buscar: carnet,
        },
        success: function(response){
            console.log(response)
            document.getElementById('tbody').innerHTML = `
            <tr>
                <td> <span class="">${resopnse.data.carnet}</span> </td>
                <td> <span class="">${resopnse.data.nombre}</span> </td>
                <td> <span class="">${resopnse.data.apellido}</span> </td>
            </tr>
            `
        },
        error: function(error) {
            console.error(error)
            alert('Error de servidor, intente mas tarde.')
        }
    })
}

getEstudiantes();