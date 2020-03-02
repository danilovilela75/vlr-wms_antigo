<meta charset="UTF-8">

<!-- Titulo e Icone - HEAD -->
<title>:: SISTEMAS VALOREM - WMS ::</title>

<link rel="shortcut icon" href="images/icon.png" type="image/x-icon">

<!-- DataTables -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

<!-- CDN's -->

<!-- Bootstrap 4.1 -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<!-- Fontawesome 5 -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

<!-- GoogleFonts - OpenSans -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">

<!-- Folha de Estilo(CSS) - Direta -->
<style type="text/css">

* {
	font-family: 'Open Sans', sans-serif;
}

h2 {
	font-family: 'Open Sans', sans-serif;
}

.thead {
	background-color: #f7f7f7;
}

.onoff input.toggle {
    display: none;
}

.onoff input.toggle + label {
    display: inline-block;
    position: relative;
    box-shadow: inset 0 0 0px 1px #d5d5d5;
    height: 30px;
    width: 60px;
    border-radius: 30px;
}

.onoff input.toggle + label:before {
    content: "";
    display: block;
    height: 30px;
    width: 30px;
    border-radius: 30px;
    background: rgba(19, 191, 17, 0);
    transition: 0.1s ease-in-out;
}

.onoff input.toggle + label:after {
    content: "";
    position: absolute;
    height: 30px;
    width: 30px;
    top: 0;
    left: 0px;
    border-radius: 30px;
    background: #fff;
    box-shadow: inset 0 0 0 1px rgba(0, 0, 0, 0.2), 0 2px 4px rgba(0, 0, 0, 0.2);
    transition: 0.1s ease-in-out;
}

.onoff input.toggle:checked + label:before {
    width: 60px;
    background: #13bf11;
}

.onoff input.toggle:checked + label:after {
    left: 30px;
    box-shadow: inset 0 0 0 1px #13bf11, 0 2px 4px rgba(0, 0, 0, 0.2);
}

</style>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script>

     $(function() {
         //código para exibir os modais
    });
</script> 

<!-- CDN's - JQuery e JQueryMask - Caso Seja Necessário, incluir na Página.

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script> 

<script type="text/javascript">
	$(document).ready(function(){
		$("#cpf").mask("000.000.000-00");
		$("#phone").mask("(00) 0000-0000");
	})
</script>

-->