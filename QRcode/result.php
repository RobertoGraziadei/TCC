<?php
include_once("../Login/autenticar.php");
include("../config.php");
?>
<!DOCTYPE HTML>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../Bootstrap5/css/bootstrap.min.css" rel="stylesheet">
    <script src="../Bootstrap5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
    <title>Escaner - QR Code</title>
</head>

<BODY class="container-xxl" style="background-color: #79dfa5;">
    <nav class="rounded shadow bg-light mt-3">
        <ul class="nav nav-pills nav-justified">
            <li class="nav-item"><img src="../logo.png" style="width:250px;" alt="logo"></img></li>
            <li class="nav-item mt-5"><button type="button" class="btn btn-outline-success"><a href="../operador.php" class="text-decoration-none text-black" aria-current="page">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z" />
                        </svg></a></button></li>
            <li class="nav-item mt-5"><a href="./index.php" class="text-decoration-none btn btn-outline-success">Escaner</a></li>
            <li class="nav-item mt-5"><a href="../Operador/buscar_aluno.php" class="text-decoration-none btn btn-outline-success">Autorizar Entrada</a></li>
            <li class="nav-item mt-5"><a href="../Operador/historico.php" class="text-decoration-none btn btn-outline-success">Histórico</a></li>
            <li class="nav-item mt-5"><button type="button" class="btn btn-danger"><a href="../Login/sair.php" class="text-decoration-none text-light">Sair</a></button></li>
        </ul>
    </nav>
    <div class="container-sm rounded mt-5 p-4 text-center" style="width: 50%;">
        <?php
        $comanda = $_GET['comanda'];
        date_default_timezone_set('America/Sao_Paulo');
        $dt_hrAtual = date('Y-m-d H:i:s');
        $status_Atual = 0;
        $descricao_Atual = "";

        $verif = "SELECT * FROM aluno AS al 
        INNER JOIN turma AS tur ON al.ID_turma = tur.ID_turma
        WHERE matricula=" . $comanda;
        $resultado = $connect->query($verif);
        $qtLinhas = $resultado->num_rows;
        if ($qtLinhas > 0) {
            // Consulta 1 = retorna o aluno e a turma da a matrícula escaneada
            while ($row = $resultado->fetch_object()) { ?>
                <button type="button" id="registro" class="btn btn-success btn-lg p-5 mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal"> Visualizar Registro </button>
                <?php
                $teste = "SELECT * FROM cronograma WHERE ID_turma=" . $row->ID_turma;
                $resultTeste = $connect->query($teste);
                $qtLinhasTeste = $resultTeste->num_rows;
                if ($qtLinhasTeste > 0) {
                    // Consulta 2 = retorna o cronograma para a turma com o ID informado
                    while ($rowTeste = $resultTeste->fetch_object()) {
                        //$dia = date('D');
                        //$dia = 'Mon';
                        date_default_timezone_set('America/Sao_Paulo');
                        $hora = date("H:i:s");
                        $hora = '08:00:00';
                        if ($rowTeste->dia_semana == $dia) {
                            $autorizados = "SELECT * FROM historico AS hist 
                            INNER JOIN aluno AS al ON hist.matricula = al.matricula
                            INNER JOIN turma AS tur ON tur.ID_turma = al.ID_turma
                            INNER JOIN informa AS inf ON hist.ID_historico = inf.ID_historico  
                            INNER JOIN status AS stts ON inf.ID_status = stts.ID_status
                            WHERE al.matricula = $comanda AND hist.ID_historico = (SELECT MAX(ID_historico)
                            FROM historico WHERE matricula = $comanda)";
                            $resultAutorizados = $connect->query($autorizados);
                            $qtLinhasAutorizados = $resultAutorizados->num_rows;
                            if (($qtLinhasAutorizados > 0)) {
                                // Consulta 3 = retorna tudo sobre o último ID da matrícula informada
                                while ($rowAut = $resultAutorizados->fetch_object()) {
                                    if ($rowAut->ID_status == 12) {
                                        $status_Atual = 12;
                                        $descricao_Atual = "Entrada Autorizada";
                                    } elseif ($rowAut->ID_status == 10) {
                                        $status_Atual = 10;
                                        $descricao_Atual = "Saída Autorizada";
                                    } elseif (($rowTeste->hr_entrada == '08:00:00') && ($hora >= '07:00:00' && $hora <= '08:15:00')
                                        or ($rowTeste->hr_entrada == '13:30:00') && ($hora >= '12:30:00' && $hora <= '13:45:00')
                                        or ($rowTeste->hr_entrada == '19:00:00') && ($hora >= '18:00:00' && $hora <= '19:15:00')
                                    ) {
                                        $status_Atual = 6;
                                        $descricao_Atual = "Presente";
                                    } elseif (($rowTeste->hr_entrada == '08:00:00') && ($hora >= '08:15:00' && $hora <= '10:00:00')
                                        or ($rowTeste->hr_entrada == '13:30:00') && ($hora >= '13:45:00' && $hora <= '15:35:00')
                                        or ($rowTeste->hr_entrada == '19:00:00') && ($hora >= '19:15:00' && $hora <= '20:55:00')
                                    ) {
                                        $status_Atual  = 4;
                                        $descricao_Atual = "Entrada em Atraso";
                                    } else {
                                        if (($rowTeste->hr_saida == '11:35:00' && $hora >= '11:20:00')
                                            or ($rowTeste->hr_saida == '12:25:00' && $hora >= '12:10:00')
                                            or ($rowTeste->hr_saida == '17:10:00' && $hora >= '16:55:00')
                                            or ($rowTeste->hr_saida == '22:30:00' && $hora >= '22:15:00')
                                        ) {
                                            $status_Atual  = 8;
                                            $descricao_Atual = "Ausente";
                                        } else {
                                            print "<script class='alert alert-danger'> alert('Saída de Aluno NÃO autorizada!'); </script>";
                                            print "<script> location.href='index.php'; </script>";
                                        }
                                    }
                                }
                            } elseif (($rowTeste->hr_entrada == '08:00:00') && ($hora >= '07:00:00' && $hora <= '08:15:00')
                                or ($rowTeste->hr_entrada == '13:30:00') && ($hora >= '12:30:00' && $hora <= '13:45:00')
                                or ($rowTeste->hr_entrada == '19:00:00') && ($hora >= '18:00:00' && $hora <= '19:15:00')
                            ) {
                                $status_Atual = 6;
                                $descricao_Atual = "Presente";
                            } elseif (($rowTeste->hr_entrada == '08:00:00') && ($hora >= '08:15:00' && $hora <= '10:00:00')
                                or ($rowTeste->hr_entrada == '13:30:00') && ($hora >= '13:45:00' && $hora <= '15:35:00')
                                or ($rowTeste->hr_entrada == '19:00:00') && ($hora >= '19:15:00' && $hora <= '20:55:00')
                            ) {
                                $status_Atual  = 4;
                                $descricao_Atual = "Entrada em Atraso";
                            } else {
                                if (($rowTeste->hr_saida == '11:35:00' && $hora >= '11:20:00')
                                    or ($rowTeste->hr_saida == '12:25:00' && $hora >= '12:10:00')
                                    or ($rowTeste->hr_saida == '17:10:00' && $hora >= '16:55:00')
                                    or ($rowTeste->hr_saida == '22:30:00' && $hora >= '22:15:00')
                                ) {
                                    $status_Atual  = 8;
                                    $descricao_Atual = "Ausente";
                                } else {
                                    print "<script class='alert alert-danger'> alert('Saída de Aluno NÃO autorizada!'); </script>";
                                    print "<script> location.href='index.php'; </script>";
                                }
                            }
                        }
                    }
                }
                ?>
                <div class="modal-fullscreen-md-down">
                    <div class="modal fade text-center mx-auto" id="exampleModal" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content text-bg-success">
                                <div class="modal-header">
                                    <h4 class="modal-title m-2" id="exampleModalLabel">Acesso Solicitado</h4>
                                    <hr>
                                    <button type="button" class="btn-close btn btn-danger" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row g-0">
                                        <div class="col-md-5">
                                            <img src="../Aluno/fotos/<?php print $row->foto; ?>" class="img img-responsive img-thumbnail" style="height: 150px; width:150px;">
                                        </div>
                                        <div class="col-md-7 ">
                                            <h5 class="card-title mt-3">
                                                <p><?php print $row->nome . "<br>"; ?></p>
                                                <p><?php print "Matrícula : " . $row->matricula . "<br>"; ?></p>
                                                <p><?php print "Turma : " . $row->nome_turma . "<br>"; ?></p>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text mt-3 h5"> <?php print "Status : " .  $descricao_Atual . "<br>"; ?> </p>
                                        <p class="card-text"><small class="text-body-secondary"><?php print "Data/Hora de Acesso : " . $dt_hrAtual . "<br>"; ?></small></p>
                                    </div>
                                    <form action="" method="POST">
                                        <a href="index.php"><button type="submit" name="OK" value="registrar" class="btn btn-info btn-lg m-3 mt-3">OK</button></a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#registro').click(); // jQuery para abrir o modal automaticamente

                    });
                </script>
        <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    if (isset($_POST['OK'])) {
                        if ($status_Atual == 10 or $status_Atual == 12) {
                            print "<script> alert('Acesso Registrado com Sucesso!'); </script>";
                            print "<script> location.href='index.php'; </script>";
                        } else {
                            $sql = "INSERT INTO historico (data_hr, matricula) VALUES ('{$dt_hrAtual}', '{$comanda}')";
                            $result = $connect->query($sql);
                            if ($result == true) {
                                $sql2 = "SELECT * FROM historico ORDER BY ID_historico DESC";
                                $result2 = $connect->query($sql2);
                                $rowR2 = $result2->fetch_object();

                                $ID_historico = $rowR2->ID_historico;
                                $ID_status = $status_Atual;

                                $sql3 = "INSERT INTO informa (ID_historico, ID_status) VALUES ('{$ID_historico}', '{$ID_status}')";
                                $result3 = $connect->query($sql3);
                                if ($result3 == true) {
                                    print "<script> alert('Acesso Registrado com Sucesso!'); </script>";
                                    print "<script> location.href='index.php'; </script>";
                                }
                            } else {
                                print "<script> alert('Não foi Possível Registrar o Acesso!'); </script>";
                                print "<script> location.href='index.php'; </script>";
                            }
                        }
                    }
                }
            }
        } else {
            print "<script> alert('Matrícula de Aluno Não Reconhecida pelo Sistema!'); </script>";
            print "<script> location.href='index.php'; </script>";
        } ?>
    </div>
</BODY>

</html>