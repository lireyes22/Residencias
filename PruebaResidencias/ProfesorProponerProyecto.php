<?php
include 'headprofesores.php';
?>
<div class="col ms-sm-auto px-4">
    <div class="container col-9">

        <form action="#" class="mt-5 mb-5 shadow-lg" style="background-color: #E9ECEF;">

            <div class="p-2 rounded-top" style=" background-color: #384970; color: white;">
               <h2 class="text-center text-white">Proponer Proyecto</h2>
            </div>
       
            <div class="mt-3 p-3">
                <label for="nombreProyecto" class="form-label h6">Nombre del Proyecto:</label>
                <input type="text" class="form-control" name="nombreProyecto">
            </div>

            <div class="p-3">
                <label for="objetivoProyecto" class="form-label h6">Objetivo del Proyecto:</label>
                <textarea class="form-control" name="objetivoProyecto" rows="4"></textarea>
            </div>

            <div class="p-3">
                <label for="descripcionProyecto" class="form-label h6">Descripción del Proyecto:</label>
                <textarea class="form-control" name="descripcionProyecto" rows="4"></textarea>
            </div>

            <div class="p-3">
                <label for="impactoProyecto" class="form-label h6">Impacto del Proyecto:</label>
                <p class="text-muted">Establecer la importancia y aporte de la investigación propuesta en
                    función de la generación de conocimiento, el desarrollo tecnológico, la innovación y la
                    solución de problemas locales, nacionales o internacionales.</p>
                <textarea class="form-control" name="impactoProyecto" rows="4"></textarea>
            </div>

            <div class="p-3">
                <label for="lugarDesarrollo" class="form-label h6">Lugar donde se va a desarrollar:</label>
                <input type="text" class="form-control" name="lugarDesarrollo">
            </div>

            <div class="container p-3">
                <div class="row">
                    <div class="col">
                        <label for="cantidadEstudiantes" class="form-label h6">Cantidad de estudiantes:</label>
                        <input type="number" class="form-control" name="cantidadEstudiantes" min="0" placeholder="0">
                    </div>
                    <div class="col">
                        <label for="tiempoProyecto" class="form-label h6">Tiempo estimado de proyecto:</label>
                        <div class="input-group">
                            <input type="number" class="form-control" name="tiempoProyecto" min="0" placeholder="0">
                            <span class="input-group-text">MES(ES)</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container p-3">
                <div class="row">
                    <div class="col">
                        <label for="tipoPropuesta" class="form-label h6">Tipo de propuesta:</label>
                        <select class="form-select" name="tipoProp">
                            <option>INTERNO</option>
                            <option>EXTERNO</option>
                            <option>DUAL</option>
                            <option>CIIE</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="docenteResponsable" class="form-label h6">Docente Responsable:</label>
                        <input type="text" class="form-control" name="docenteResponsable" value="" readonly>
                    </div>
                </div>
            </div>

            <div class="p-3">
                <label for="lineaInvestigacion" class="form-label h6">Línea de investigación que beneficia:</label>
                <input type="text" class="form-control" name="lineaInvestigacion">
            </div>

            <div class="p-3">
                <label for="referencias" class="form-label h6">Incluya las referencias esenciales para enmarcar el contenido de su propuesta:</label>
                <textarea class="form-control" name="referencias" rows="4"></textarea>
            </div>

            <div class="p-3">
                <label for="nombreEmpresa" class="form-label h6">Nombre de la Empresa:</label>
                <select class="form-select" name="nombreEmpresa">
                </select>
            </div>

            <div class="mb-3 p-3">
                <label class="form-label h6">Carrera Requerida de los estudiantes:</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" name="carreraReq[]">
                    <label class="form-check-label" for="carrera1">Ingeniería en Tecnologías de Información y Comunicaciones</label>
                </div>
            </div>

            <div class="d-flex justify-content-center p-4 rounded-bottom" style="background-color: #384970;">
                <button type="submit" class="btn btn-success btn-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                        <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                    </svg> Enviar
                </button>
            </div>

        </form>
    </div>
</div>

<?php
include 'footer.php';
?>
