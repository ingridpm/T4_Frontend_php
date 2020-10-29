<html>
    <head>
        <script>
            var abrirArchivo = function(event) {
                var archivo = event.target;
                var reader = new FileReader();
                reader.onload = function(){
                    var contenido = reader.result;
                    document.getElementById("texto").innerHTML = contenido;
                    console.log(contenido);
                    json_peticion = JSON.stringify({contenido:contenido});
                    let respuesta = fetch("http://localhost:4000/leerArchivo",{
                        method: 'POST',
                        body: json_peticion,
                        headers: {'Content-Type':'application/json'}                    
                    })
                    console.log(respuesta)
                    alert("Archivo cargado")
                };
                reader.readAsText(archivo.files[0])
            };
        </script>
    </head>
    <body>
        <input type="file" accept="text/plain" onchange="abrirArchivo(event)">
        <div id="texto"></div>
    </body>
</html>