<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Usuario</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.0-beta1 -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css"
      integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center p-5">
        <div class="col-sm-6">
          <h5>Formulario</h5>
          <hr />
          <form action="insertar.php" method="POST">
            <input type="hidden" id="id" />
            <label for="nombres">Nombre</label>
            <input
              type="text"
              class="form-control"
              id="Nombre"
              name="nombre"
              placeholder="Nombres Apellidos"
              autofocus
              required
            />
            <label for="Correo">Correo</label>
            <input
              type="Correo"
              class="form-control"
              id="Correo"
              name="correo"
              placeholder="Correo@Correo.com"
              required
            />
            <label for="email">Cedula</label>
            <input
              type="number"
              class="form-control"
              id="cedula"
              name="cedula"
              placeholder= "Ingrese su Cedula"
              required
            />
            <label for="email">Fecha de nacimiento</label>
            <input
              type="date"
              class="form-control"
              id="Fecha_nacimiento"
              name="fecha_nacimiento"
              placeholder= "Ingrese su Fecha de nacimiento"
              required
            />
            <label for="mensaje">Mensaje:</label>
            <input type="text" name="mensaje" id="mensaje">
            <br />
            <div>
              <button type="submit" class="btn btn-primary">Guardar</button>
              <a href="indexx.php" class="btn btn-secondary ml-2">Cancelar</a>

            </div>
        </form>
          <br />
            <tbody id="tbody"></tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="../assets/code.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js"
      integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk"
      crossorigin="anonymous"
    ></script>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js"
      integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
    
</body>
</html>

