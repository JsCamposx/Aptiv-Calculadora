<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de Personas y Piezas</title>
    <Link rel=StyleSheet href="styles.css" type="text/css" Media=screen>


    <script>
        function actualizarDatos() {
            var plataforma = document.getElementById("plataforma").value;
            var linea = document.getElementById("linea").value;
            var turno = document.getElementById("turno").value;

            var personasNecesarias = obtenerPersonasNecesarias(plataforma, linea, turno);
            var piezasNecesarias = obtenerPiezasNecesarias(plataforma, linea, turno);

            document.getElementById("personasResultado").value = personasNecesarias;
            document.getElementById("piezasResultado").value = piezasNecesarias;
        }

        function convertir() {
            var cantidad = parseFloat(document.getElementById("cantidad").value);
            var radioPersonas = document.getElementById("radioPersonas");

            if (radioPersonas.checked) {
                var piezasConvertidas = cantidad * 2; 
                alert(cantidad + " personas equivalen a " + piezasConvertidas + " piezas.");
            } else {
                var personasConvertidas = cantidad / 2; 
                alert(cantidad + " piezas equivalen a " + personasConvertidas + " personas.");
            }
        }

        function obtenerPersonasNecesarias(plataforma, linea, turno) {
  
            return 10;
        }

        function obtenerPiezasNecesarias(plataforma, linea, turno) {
      
            return 20;
        }
    </script>

   
</head>
<body>

<form>
    <label for="plataforma">Plataforma:</label>
    <select id="plataforma" onchange="actualizarDatos()">
        <option value="GM">GM</option>
        <option value="FORD">Ford</option>
      
    </select>

    <label for="linea">Línea:</label>
    <select id="linea" onchange="actualizarDatos()">
        <option value="Main">Main</option>
        <option value="Inlet">Inlet</option>
      
    </select>

    <label for="turno">Turno:</label>
    <select id="turno" onchange="actualizarDatos()">
        <option value="TA">TA</option>
        <option value="TB">TB</option>
      
    </select>

    <br><br>

    <label>Personas necesarias:</label>
    <input type="text" id="personasResultado" readonly>

    <label>Piezas necesarias:</label>
    <input type="text" id="piezasResultado" readonly>

    <br><br>

    <label for="cantidad">Cantidad:</label>
    <input type="text" id="cantidad" required>

    <label>Convertir a:</label>
    <input type="radio" id="radioPersonas" name="conversion" value="personas" checked>
    <label for="radioPersonas">Personas</label>

    <input type="radio" id="radioPiezas" name="conversion" value="piezas">
    <label for="radioPiezas">Piezas</label>

    <button type="button" onclick="convertir()">Convertir</button>
</form>

</body>
</html>
