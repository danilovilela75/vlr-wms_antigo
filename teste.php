<h2 class='text-center'><b>PROCESSO DE APONTAMENTO</b></h2>
                    <hr>

                    <form method='POST' action='../view/apontamento_buscar.php'>
                        <div class='container'>

                            <div class='row'>

                                <div class='col-md-12'>
                                    <h5 class='text-center'>
                                        <button id='btncontinuar' class='btn btn-primary btn-xs'>CONTINUAR <i class='fas fa-search'></i></button>
                                        &nbsp;
                                        <a class='btn btn-secondary btn-xs' href='../view/apontamento.php'>VOLTAR <i class='fas fa-arrow-left'></i></a>
                                    </h5>
                                </div>

                                <div class='col-md-12'><br>
                                    <h5 class='text-center'>CÓDIGO LIBERADO</h5>
                                </div>

                                <div class='col-md-6'><br>
                                    <b>CODIGO DE BARRAS: </b><br>
                                    <input type='text' name='codigo' class='form-control' value='$codigo' autocomplete='off'>
                                </div>

                                
                            </div>
                            
                        </div>
                    </form>

                    <script type='text/javascript'>
                        window.setTimeout(function(){
                        document.getElementById('btncontinuar').click();
                        }, 5);
                    </script>