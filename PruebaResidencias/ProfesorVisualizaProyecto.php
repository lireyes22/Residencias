<?php
include 'headprofesores.php';
?>
<div class="col ms-sm-auto px-4">
    <div class="container col-9">

        <form action="#" class="mt-5 mb-5 shadow-lg" style="background-color: #E9ECEF;">

            <div class="p-2 rounded-top" style=" background-color: #384970; color: white;">
                <h2 class="text-center text-white">Proyecto: Aquí el nombre</h2>
            </div>

            <div class="mt-3 p-3">
                <label for="objetivoProyecto" class="form-label h6">Objetivo del Proyecto:</label>
                <textarea class="form-control" rows="4" readonly></textarea>
            </div>

            <div class="p-3">
                <label for="descripcionProyecto" class="form-label h6">Descripción del Proyecto:</label>
                <textarea class="form-control" rows="4" readonly></textarea>
            </div>

            <div class="p-3">
                <label for="impactoProyecto" class="form-label h6">Impacto del Proyecto:</label>
                <p class="text-muted">Establecer la importancia y aporte de la investigación propuesta en
                    función de la generación de conocimiento, el desarrollo tecnológico, la innovación y la
                    solución de problemas locales, nacionales o internacionales.</p>
                <textarea class="form-control" rows="4" readonly></textarea>
            </div>

            <div class="p-3">
                <label for="lugarDesarrollo" class="form-label h6">Lugar donde se va a desarrollar:</label>
                <input type="text" class="form-control" value="" readonly>
            </div>

            <div class="container p-3">
                <div class="row">
                    <div class="col">
                        <label for="cantidadEstudiantes" class="form-label h6">Cantidad de
                            estudiantes:</label>
                        <input type="number" class="form-control" min="0" placeholder="0" value="" readonly>
                    </div>
                    <div class="col">
                        <label for="tiempoProyecto" class="form-label h6">Tiempo estimado de
                            proyecto:</label>
                        <div class="input-group">
                            <input type="number" class="form-control" min="0" placeholder="0" value="" readonly>
                            <span class="input-group-text">MES(ES)</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container p-3">
                <div class="row">
                    <div class="col">
                        <label for="tipoPropuesta" class="form-label h6">Tipo de propuesta:</label>
                        <select class="form-select">
                            <option>INTERNO</option>
                            <option>EXTERNO</option>
                            <option>DUAL</option>
                            <option>CIIE</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="docenteResponsable" class="form-label h6">Docente Responsable:</label>
                        <input type="text" class="form-control" value="" readonly>
                    </div>
                </div>
            </div>

            <div class="p-3">
                <label for="lineaInvestigacion" class="form-label h6">Línea de investigación que
                    beneficia:</label>
                <input type="text" class="form-control" value="" readonly>
            </div>

            <div class="p-3">
                <label for="referencias" class="form-label h6">Incluya las referencias esenciales para
                    enmarcar el contenido de su propuesta:</label>
                <textarea class="form-control" rows="4" readonly></textarea>
            </div>

            <div class="p-3">
                <label for="nombreEmpresa" class="form-label h6">Nombre de la Empresa:</label>
                <select class="form-select" value="" readonly>
                </select>
            </div>

            <div class="mb-3 p-3">
                <label class="form-label h6">Carrera Requerida de los estudiantes:</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="">
                    <label class="form-check-label" for="carrera1">Ingeniería en Tecnologías de Información
                        y Comunicaciones</label>
                </div>
            </div>

            <div class="p-4 mb-3 d-flex justify-content-center" style="background-color: #384970;">
                <a href="#" class="btn btn-danger mt-md-0 mt-2" onclick=""><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-x-circle" viewBox="0 0 16 16">
                                        <path
                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                    </svg> Cerrar Página</a>
            </div>
        </form>

    </div>

</div>

<?php
include 'footer.php';
?>