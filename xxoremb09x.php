<?php
/**
 * @author Ing. Bernabe Gutierrez Rodriguez
 */
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include './headers.php';
?>

<div class="container">
    <p id="result"> </p>
    <div id="header"></div>
    <div class="loader"></div>
    <div id="help"></div>
    <div class="card panel-heading">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-end">
                <h4>12.3.2 Ordenes de embarque </h4>
                <h4><?php echo date("d/m/Y"); ?> </h4>
            </div>
        </div>
        <div class="card-body">
            <form role="form" id="xxoremb09x" data-toggle="validator" class="shake">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="puerta">Puerta</label>
                            <div id="divpuerta">
                                <select class="form-control" id="puerta" name="puerta" placeholder="Enter puerta" required>
                                    <option value="">Seleccione Una opcion</option>
                                    <option value="MT MONTERREY">MT MONTERREY</option>
                                </select>
                            </div>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="lab">LAB</label>
                            <div id="divlab">
                                <select class="form-control" id="lab" name="lab" placeholder="Enter lab" required>
                                    <option value="">Seleccione Una opcion</option>
                                    <option value="MT MONTERREY">NUESTRA PLANTA</option>
                                </select>
                            </div>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="ruta">Ruta</label>
                            <input type="text" class="form-control" id="ruta" name="ruta" placeholder="Enter ruta" required>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="a">a:</label>
                            <input type="text" class="form-control" id="a" name="a" placeholder="Enter a" required>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="cliente">Cliente</label>
                            <input type="text" class="form-control" id="cliente" name="cliente" placeholder="Enter cliente" required>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="a">a:</label>
                            <input type="text" class="form-control" id="a" name="a" placeholder="Enter a" required>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="ri">Incluir RI?</label>
                            <select class="form-control" id="ri" name="ri" placeholder="Enter ri" required>
                                <option value="No">No</option>
                                <option value="No">No</option><option value="Si">Si</option>
                            </select>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="mto">Inclute MTO/ Sin MTO/ Solo Mto</label>
                            <select class="form-control" id="mto" name="mto" placeholder="Enter mto" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="p110">Atados Incompletos para P110</label>
                            <select class="form-control" id="p110" name="p110" placeholder="Enter p110" required>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="herrajes">Filtrar solo por Herrajes</label>
                            <select class="form-control" id="herrajes" name="herrajes" placeholder="Enter ri" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                            </select>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="maq_prov">Incluir envio Maq PROV?</label>
                            <select class="form-control" id="maq_prov" name="maq_prov" placeholder="Enter maq_prov" required>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="venc_limite">Vence Limite</label>
                            <input type="date" class="form-control" id="venc_limite" name="venc_limite" placeholder="Enter venc_limite">
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="edc">Embarque Directo Cliente?</label>
                            <select class="form-control" id="edc" name="edc" placeholder="Enter maq_prov" required>
                                <option value="No">No</option>
                                <option value="Si">Si</option>                           
                            </select>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>    
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="vehiculo"></label>
                            <select class="form-control" id="maq_prov" name="maq_prov" placeholder="Enter maq_prov" required>
                                <option value="C">Cedis [C]</option>
                                <option value="P">Planta [P]</option>
                                <option value="A">Ambos [A]</option>
                            </select>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="vehiculo">Tipo de Vehículo</label>
                            <select class="form-control" id="vehiculo" name="vehiculo" placeholder="Enter maq_prov" required>
                                <option value="001">001</option>
                            </select>
                            <div class="help-block with-errors text-danger"></div>
                        </div>
                    </div>
                </div>
                <button type="submit" id="form-submit" class="btn btn-success btn-lg pull-right ">Submit</button>
                <div id="msgSubmit" class="h3 text-center hidden"></div>
                <div class="clearfix"></div>
            </form>
        </div>
    </div>
</div>

<?php include './footer.php'; ?>

<script>
    $("#xxoremb09x").validator().on("submit", function (event) {
        if (event.isDefaultPrevented()) {
            // handle the invalid form...
            swalert('Mensaje!', 'Llene los campos requeridos', 'warning');
            formError();
            smg(false, 'Llene los campos requeridos');
        } else {
            // everything looks good!
            event.preventDefault();
            forgot_password();
        }
    });
    function forgot_password() {
        var clave = $("#clave").val();
        var repeat = $("#repeat").val();
        var org = $("#org").val();
        if (clave === repeat) {
            var dataString = $('#xxoremb09x').serialize();
            swalert('Mensaje!', 'Procesando...', 'info');
            $.ajax({
                type: "POST",
                url: "dataConect/registration.php",
                data: "action=valid_token&" + dataString,
                success: function (text) {
                    if (text == "success") {
                        $("#xxoremb09x")[0].reset();
                        swalert('Exito!', 'Su contraseña ha sido reestablecida correctamente', 'success');
                        location.href = "login.php?org=" + org;
                    } else {
                        swalert('Mensaje!', text, 'info');
                    }
                }
            });
        } else {
            swalert('Mensaje!', 'Las Contraseñas deben coincidir', 'info');
        }

    }
    function formError() {
        $("#xxoremb09x").removeClass().addClass('shake animated').one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend', function () {
            $(this).removeClass();
        });
    }
    function smg(valid, msg) {
        if (valid) {
            var msgClasses = "h3 text-center tada animated text-success";
        } else {
            var msgClasses = "h3 text-center text-danger";
        }
        $("#msg").removeClass().addClass(msgClasses).text(msg);
    }

</script>