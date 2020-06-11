<?php include './headers.php'; ?>
<p id="result"> </p>
<div id="header"></div>
<div class="loader"></div>
<div id="help"></div>
<div class="card panel-heading">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-end">
            <h4>Consultar cuenta cliente</h4>
        </div>
    </div>
    <div class="card-body">
        <form role="form" id="ccxc" data-toggle="validator" class="shake" autocomplete="off">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="Cobra">Cobra</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="Cobra" name="Cobr-A" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-info" title="Consultar Clientes" id="Clientes" data-toggle="modal" data-target="#modalClientes"><i class="pe-7s-look"></i></button>
                            </div>
                        </div>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="Ord">Ord</label>
                        <input type="text" class="form-control" id="Ord" name="Ord" placeholder="Enter Ord" required readonly="true">
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="Solo_Abiert">Solo_Abiert</label>
                        <input type="text" class="form-control" id="Solo_Abiert" name="Solo_Abiert" placeholder="Enter Solo_Abiert" required readonly="true">
                    </div>
                    <div class="help-block with-errors text-danger"></div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="Balance">Balance</label>
                        <input type="text" class="form-control" id="Balance" name="Balance" placeholder="Enter Balance" required readonly="true">
                        <div class="help-block with-errors text-danger"></div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="Moneda">Moneda</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" maxlength="3" id="Moneda" value="MN" name="Moneda" placeholder="Enter Moneda" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-info" title="Consultar Monedas" id="Monedas" data-toggle="modal" data-target="#modalMoneda"><i class="pe-7s-look"></i></button>
                            </div>
                        </div>
                        <div class="help-block with-errors text-danger"></div>
                    </div>                                 
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="MonedaRep">MonedaRep</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" maxlength="3" value ="MN" id="MonedaRep" name="MonedaRep" placeholder="Enter MonedaRep" required>
                            <div class="input-group-append">
                                <button class="btn btn-outline-info" title="Consultar Monedas" id="MonedasRep" data-toggle="modal" data-target="#modalMonedaReporte"><i class="pe-7s-look"></i></button>
                            </div>
                        </div>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group">
                        <label for="Salida">Salida</label>
                        <select class="form-control" id="Salida" name="Salida" required>
                            <option value="Terminal">Terminal</option>
                            <option value="PDF">PDF</option>
                        </select>
                        <div class="help-block with-errors text-danger"></div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label> </label>
                        <button type="submit" id="form-submit" class="btn btn-outline-success btn-block">Consultar</button>
                    </div>
                </div>
            </div>
            <div id="msgSubmit" class="h4 text-center hidden"></div>
            <div class="clearfix"></div>
        </form>
        <div class="card">
            <div class="card-header">Reporte</div>
            <div id="help2"></div>
            <div class="card-body" id="bodyReport"></div> 
            <div class="card-footer"><button onclick="printDiv()">print</button></div>
        </div>
    </div>
</div>

<!-- Table Clientes -->
<div class="modal fade" id="modalClientes">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Catalogo de Clientes</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div id="loadTableClient"></div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<!-- Table Monedas -->
<div class="modal fade" id="modalMoneda">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Catalogo de Monedas</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div id="loadTableMoneda"></div>
            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>
<!-- Table Monedas Reporte-->
<div class="modal fade" id="modalMonedaReporte">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Catalogo de Monedas</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div id="loadTableMonedaReporte"></div>

            </div>

            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<?php include './footer.php'; ?>
</body>
</html>
