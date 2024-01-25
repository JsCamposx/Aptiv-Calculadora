<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CALCULADORA</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #343a40;
            margin: 0;
            padding: 0;
        }
        .calculator {
            background-color: #343a40;
            color: #ffffff;
            padding: 40px 0;
            text-align: center;
        }
        .logo-container {
            display: flex;
            justify-content: center;
        }
        .logo {
            max-width: 350px;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            font-size: 18px;
            margin-bottom: 10px;
        }
        select, input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ced4da;
            border-radius: 5px;
        }
        button {
            background-color: #28a745;
            color: #ffffff;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
        }
        button:hover {
            background-color: #218838;
        }
        .radio-group {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 20px;
        }
        .radio-group label {
            margin: 0;
            font-size: 16px;
        }
        input[type="text"][readonly] {
            background-color: #e9ecef;
            cursor: not-allowed;
        }
    </style>

</head>
<body>

<div class="calculator">
    <div class="logo-container">
        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/26/Aptiv_logo.svg/2560px-Aptiv_logo.svg.png" alt="Logo de Aptiv" class="logo">
    </div>
</div>

<form>
    <label for="plataforma">Plataforma:</label>
    <select id="plataforma" class="form-control" onchange="actualizarDatos()">
        <option value="" disabled selected hidden>Seleccionar</option>
        <option value="P702 BEV">P702 BEV</option>
        <option value="FORD BEV-A">FORD BEV-A</option>
        <option value="GM">GM</option>
        <option value="Navistar">Navistar</option>
        <option value="P702 BEV G">P702 BEV G</option>
    </select>

    <label for="linea">Línea:</label>
    <select id="linea" class="form-control" onchange="actualizarDatos()">
        <option value="" disabled selected hidden>Seleccionar</option>
        
    </select>

    <label>Personas necesarias:</label>
    <input type="text" id="personasResultado" class="form-control" readonly>

    <label>Piezas necesarias:</label>
    <input type="text" id="piezasResultado" class="form-control" readonly>

    <label for="cantidad">Cantidad:</label>
    <input type="text" id="cantidad" class="form-control" required>

    <style>
    .radio-group {
        display: flex;
        align-items: center;
    }

    .radio-group input[type="radio"] {
        margin-right: 5px;
    }

    .radio-group label {
        margin: 0;
    }
    </style>

<div class="radio-group">
    <input type="radio" id="radioPersonas" name="conversion" value="personas" checked>
    <label for="radioPersonas">Personas</label> 

    <input type="radio" id="radioPiezas" name="conversion" value="piezas">
    <label for="radioPiezas">Piezas</label>
</div>

    <button type="button" onclick="convertir()" class="btn btn-success">Convertir</button>
</form>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    var datosLinea = {
        "P702 BEV": {
            "PDU1 TA":   { personas: 59, piezas: 180 },
            "PDU1 TB":   { personas: 30, piezas: 80 },
            "PDU2 TA":   { personas: 0, piezas: 0 },
            "PDU2 TB":   { personas: 0, piezas: 0 },
            "INLET TA":  { personas: 35, piezas: 255 },
            "INLET TB":  { personas: 0, piezas: 0 },
            "JUMPER TA": { personas: 37, piezas: 255 },
            "JUMPER TB": { personas: 0, piezas: 0 },
            "SDU TA":    { personas: 23, piezas: 340 },
            "SDU TB":    { personas: 0, piezas: 0 }
        },
        "FORD BEV-A": {
            "Mini Jumper 1 A":            { personas: 32, piezas: 2269 },
            "Mini Jumper 1 B":            { personas: 0, piezas: 0 },
            "Mini Jumper 2":              { personas: 0, piezas: 0 },
            "Mini Jumper 2":              { personas: 0, piezas: 0 },
            "Header A":                   { personas: 0, piezas: 0 },
            "Header B":                   { personas: 0, piezas: 0 },
            "Header":                     { personas: 0, piezas: 0 },
            "Header":                     { personas: 0, piezas: 0 },
            "Mini Header(Rear Header) A": { personas: 0, piezas: 0 },
            "Mini Header(Rear Header) B": { personas: 0, piezas: 0 },
            "Jumper A":                   { personas: 0, piezas: 0 },
            "Jumper B":                   { personas: 0, piezas: 0 },
            "Battery 1FC173E A":          { personas: 0, piezas: 0 },
            "Battery 1FC173E B":          { personas: 0, piezas: 0 },
            "Battery 1FC173E1 A":         { personas: 0, piezas: 0 },
            "Battery 1FC173E1 B":         { personas: 0, piezas: 0 },
            "Battery 2FC173E A":          { personas: 0, piezas: 0 },
            "Battery 2FC173E B":          { personas: 0, piezas: 0 }
        },
        "GM": {
            "Fwd Lamp TA":             { personas: 0, piezas: 0 },
            "Fwd Lamp TB":             { personas: 25, piezas: 450 },
            "Engine Jumper TA":        { personas: 0, piezas: 0 },
            "Engine Jumper TB":        { personas: 0, piezas: 0 },
            "8AW063 A":                { personas: 0, piezas: 0 },
            "8AW063 B":                { personas: 0, piezas: 0 },
            "8AW062 A":                { personas: 0, piezas: 0 },
            "8AW062 B":                { personas: 0, piezas: 0 },
            "8AW061 A":                { personas: 0, piezas: 0 },
            "8AW061 B":                { personas: 0, piezas: 0 },
            "8AW066 A":                { personas: 0, piezas: 0 },
            "8AW066 B":                { personas: 0, piezas: 0 },
            "Radio Speaker Wiring TA": { personas: 9, piezas: 1200 },
            "Radio Speaker Wiring TB": { personas: 14, piezas: 350 }
        },
        "Navistar": {
            "Body TA":             { personas: 25, piezas: 45 },
            "Body TB":             { personas: 49, piezas: 80 },
            "Instrument Panel TA": { personas: 31, piezas: 100 },
            "Instrument Panel TB": { personas: 0, piezas: 0 },
            "Rear Camera TA":      { personas: 0, piezas: 0 },
            "Rear Camera TB":      { personas: 6, piezas: 80 },
            "Break Clutch TA":     { personas: 0, piezas: 0 },
            "Break Clutch TB":     { personas: 3, piezas: 48 },
            "Head liner TA":       { personas: 7, piezas: 95 },
            "Head Liner TB":       { personas: 0, piezas: 0 },
            "FR Door LH TA":       { personas: 3, piezas: 74 },
            "FR Door LH TB":       { personas: 0, piezas: 0 },
            "FR Door RH TA":       { personas: 3, piezas: 61 },
            "FR Door RH TB":       { personas: 0, piezas: 0 },
            "Console TA":          { personas: 0, piezas: 0 },
            "Console TB":          { personas: 0, piezas: 0 }
        },
        "P702 BEV G": {
            "Main TA":            { personas: 55, piezas: 290 },
            "Main TB":            { personas: 0, piezas: 0 },
            "Header TA":          { personas: 20, piezas: 255 },
            "Header TB":          { personas: 0, piezas: 0 },
            "Jumper TA":          { personas: 5, piezas: 255 },
            "Jumper TB":          { personas: 0, piezas: 0 },
            "Bus Bar (D,J) TA":   { personas: 3, piezas: 350 },
            "Bus Bar (D,J) TB":   { personas: 0, piezas: 0 },
            "Bus Bar (B) TA":     { personas: 0, piezas: 0 },
            "Bus Bar (B) TB":     { personas: 0, piezas: 0 },
            "Bus Bar (H) TA":     { personas: 6, piezas: 545 },
            "Bus Bar (H) TB":     { personas: 8, piezas: 500 },
            "Bus Bar (E,F,K) TA": { personas: 4, piezas: 1032 },
            "Bus Bar (E,F,K) TB": { personas: 0, piezas: 0 },
            "Bus Bar (A,G) TA":   { personas: 2, piezas: 577 },
            "Bus Bar (A,G) TB":   { personas: 0, piezas: 0 }
        }
    };

    function actualizarDatos() {
        var plataforma = document.getElementById("plataforma").value;
        var lineaSelect = document.getElementById("linea");
        var linea = lineaSelect.value;

        var personasNecesarias = datosLinea[plataforma][linea].personas;
        var piezasNecesarias = datosLinea[plataforma][linea].piezas;

        document.getElementById("personasResultado").value = personasNecesarias;
        document.getElementById("piezasResultado").value = piezasNecesarias;
    }

    function convertir() {
        var cantidad = parseFloat(document.getElementById("cantidad").value);
        var radioPersonas = document.getElementById("radioPersonas");

        var plataforma = document.getElementById("plataforma").value;
        var linea = document.getElementById("linea").value;
        var personasNecesarias = datosLinea[plataforma][linea].personas;
        var piezasNecesarias = datosLinea[plataforma][linea].piezas;

        if (radioPersonas.checked) {
            var piezasConvertidas = (cantidad / personasNecesarias) * piezasNecesarias;
            alert(cantidad + " personas equivalen a " + piezasConvertidas + " piezas.");
        } else {
            var personasConvertidas = (cantidad / piezasNecesarias) * personasNecesarias;
            alert(cantidad + " piezas equivalen a " + personasConvertidas + " personas.");
        }
    }

    document.getElementById("plataforma").addEventListener("change", function () {
        var plataforma = this.value;
        var lineaSelect = document.getElementById("linea");
        lineaSelect.innerHTML = "";

        for (var linea in datosLinea[plataforma]) {
            var option = document.createElement("option");
            option.value = linea;
            option.text = linea;
            lineaSelect.add(option);
        }

        actualizarDatos();
    });

    actualizarDatos();
</script>

</body>
</html>