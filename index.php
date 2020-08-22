<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica Desarrollo web</title>    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container mt-5">
      <div id="alertMessage"></div>
        <h1>INGRESO DE DATOS</h1>
        <form name="alumno">
            <div class="form-group">
              <label for="carnet">Carnet</label>
              <input type="text" class="form-control" id="carnet" name="carnet">
            </div>
            <div class="form-group">
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido">
              </div>
            <button type="button" class="btn btn-primary" id="insertAlumno">Guardar</button>
          </form>
          <h1 class="mt-5">Lista de alumnos</h1>
          <form name="busqueda">
            <div class="form-group">
              <label for="buscar"></label>
              <input type="text" class="form-control" id="carnetBusqueda" name="carnetBusqueda" placeholder="Buscar alumno por carnet" >
            </div>
            <button type="button" class="btn btn-info" id="enviar">Buscar</button>
            <button type="button" class="btn btn-warning" id="enviarTodo">Ver todo</button>
          </form>
          <div class="table">
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Carnet</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                  </tr>
                </thead>
                <tbody id="agregar">
                  
                </tbody>
              </table>
          </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
<script>
  document.querySelector('#enviar').addEventListener('click', e => {
    let carnet = document.querySelector('#carnetBusqueda').value
    $.ajax({
        url: 'getAlumnos.php?buscar='+carnet,
        type: 'get',
        dataType: 'JSON',
        success: function(response){
            let tbody = document.querySelector('#agregar');
            console.log(response)
            tbody.innerHTML = ''
            response.forEach(el => {
              tbody.innerHTML += `
              <tr>
                <td> <span class="">${el.carnet}</span> </td>
                <td> <span class="">${el.name}</span> </td>
                <td> <span class="">${el.lastname}</span> </td>
              </tr>`
            })
        }, 
        error : function(error){
          console.log(error)
        }
    });
  })

  document.querySelector('#enviarTodo').addEventListener('click', e => {
    $.ajax({
        url: 'getAllAlumnos.php',
        type: 'get',
        dataType: 'JSON',
        success: function(response){
            let tbody = document.querySelector('#agregar');
            console.log(response)
            tbody.innerHTML = ''
            response.forEach(el => {
              tbody.innerHTML += `
              <tr>
                <td> <span class="">${el.carnet}</span> </td>
                <td> <span class="">${el.name}</span> </td>
                <td> <span class="">${el.lastname}</span> </td>
              </tr>`
            })
        }, 
        error : function(error){
          console.log(error)
        }
    });
  })

  window.addEventListener('load', function () {
    $.ajax({
        url: 'getAllAlumnos.php',
        type: 'get',
        dataType: 'JSON',
        success: function(response){
            let tbody = document.querySelector('#agregar');
            console.log(response)
            tbody.innerHTML = ''
            response.forEach(el => {
              tbody.innerHTML += `
              <tr>
                <td> <span class="">${el.carnet}</span> </td>
                <td> <span class="">${el.name}</span> </td>
                <td> <span class="">${el.lastname}</span> </td>
              </tr>`
            })
        }, 
        error : function(error){
          console.log(error)
        }
    });
  })

  document.querySelector('#insertAlumno').addEventListener('click', e => {
    let carnet = window.carnet.value
    let nombre = window.nombre.value
    let apellido = window.apellido.value
    let alert = window.alertMessage
    let body = {
      'carnet' : carnet,
      'name' : nombre,
      'lastname' : apellido
    }

    console.log(body)
    $.ajax({
        url: 'setAlumnos.php',
        type: 'post',
        dataType: 'JSON',
        data: body,
        success: function(response){
            alert.innerHTML = `
            <div class="alert alert-${(response.status) ? 'success' : 'warning'} alert-dismissible fade show" role="alert">
              ${response.message}
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            `
            console.log(response)
        },
        error : function(error){
          console.log(error)
        }
    });

  })


</script>
