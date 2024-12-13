<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <form class="row g-2">
        
        <div class="col-md-5 ms-5 mt-5">
          <label for="validationServer01" class="form-label">Numero de Oficio</label>
          <input type="text" class="form-control" id="validationServer01" placeholder="Escriba Numero de Oficio"  maxlength="10" required>
        </div>

        <div class="col-md-6 mt-5">
          <label for="validationServer02" class="form-label">Nombre Solicitante</label>
          <input type="text" class="form-control" id="validationServer02" placeholder="Escriba su Nombre" maxlength="40" required>
          <div class="valid-feedback">
            Correcto!
          </div>
        
        </div>
        
        <div class="col-md-5 ms-5 mt-4">
          <label for="validationServerUsername" class="form-label">Cargo</label>
          <div class="input-group has-validation">
            <input type="text" class="form-control" id="validationServerUsername" aria-describedby="" placeholder="Seleccione un cargo" required>
            <div id="validationServerUsernameFeedback" class="invalid-feedback">
              Please choose a username.
            </div>
          </div>
        </div>
        
        <div class="col-md-6 mt-4">
          <label for="validationServer03" class="form-label">Nombre de la Empresa</label>
          <input type="text" class="form-control" id="validationServer03" aria-describedby="validationServer03Feedback" required>
          <div id="validationServer03Feedback" class="invalid-feedback">
            Please provide a valid city.
          </div>
        </div>
       
        <div class="col-md-5 ms-5 mt-4">
          <label for="validationServer04" class="form-label">Carrera(s)</label>
          <select class="form-select" id="validationServer04" required>
            <option selected disabled value=""><Choose class=""></Choose></option>
            <option>Ing. Mecatronica</option>
            <option>Ing. Sistemas</option>
            <option>Ing. Industrial</option>
          </select>
          <div id="validationServer04Feedback" class="invalid-feedback">
            Por Favor Seleccione una Carrera!
          </div>
        </div>
        
        <div class="col-md-6 mt-4">
          <label for="validationServer05" class="form-label">Numero Estudiantes</label>
          <input type="number" class="form-control" id="validationServer05" aria-describedby="validationServer05Feedback" required>
          <div id="validationServer05Feedback" class="invalid-feedback">
          </div>
        </div>
        
        <div class="col-md-5 ms-5 mt-4">
            <label for="validationServer05" class="form-label">Area a Observar</label>
            <input type="text" class="form-control" id="validationServer05" aria-describedby="validationServer05Feedback" required>
            <div id="validationServer05Feedback" class="invalid-feedback">
            </div>
        </div>

        <div class="col-md-6 mt-4">
            <label for="validationServer05" class="form-label">Objetivo de la Visita</label>
            <input type="text" class="form-control" id="validationServer05" aria-describedby="validationServer05Feedback" required>
            <div id="validationServer05Feedback" class="invalid-feedback">
            </div>
        </div>

        <div class="col-md-3 ms-5 mt-4">
            <label for="validationServer05" class="form-label">Turno</label>
            <select class="form-select" id="validationServer05" aria-describedby="validationServer05Feedback" required>
                <option selected disabled value=""><Choose class=""></Choose></option>
                <option>Matutino</option>
                <option>Vespertino</option>
            </select>    
        </div>

        <div class="col-md-3 mt-4">
            <label for="validationServer05" class="form-label">Fecha</label>
            <input type="date" class="form-control" id="validationServer05" aria-describedby="validationServer05Feedback" required>
            <div id="validationServer05Feedback" class="invalid-feedback">
            </div>
        </div>
        
        <div class="ms-4 mt-6">
          <button class="btn btn-primary" type="submit">Enviar</button>
        </div>
      </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>