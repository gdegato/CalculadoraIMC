<html> 
<head> 
<title>Calculo de IMC</title> 
<link rel="stylesheet" href="styles.css"> 
</head> 
<body> 

<h1>Cálculo de IMC </h1> 

<form method="GET">

    <label for="nome">Digite seu nome</label>
    <input 
        name="nome" 
        id="<?php $nome; ?>"
        value="<?php $nome; ?>"
        type="text"/><br>

    <label for="peso">Digite seu peso</label>    
    <input name="peso" 
        id="<?php $peso; ?>"
        value="<?php $peso; ?>"
        type="text"/><br>

    <label for="altura">Digite sua altura</label>    
    <input name="altura" 
        id="<?php $altura; ?>"
        value="<?php $altura; ?>"
        type="text"/><br>
 
    <button type="submit">Enviar</button>

</form>


<?php function calcularImc($peso, $altura)
{
    $peso = $_GET['peso'];
    $altura = $_GET['altura'];

    $altura = str_replace(',', '.', $altura);
    $resultado = $peso / $altura ** 2;

    return $resultado;
} ?>

<?php function classificarImc($imc)
{
    $classificacao = [
        18.5 => 'Magreza',
        24.9 => 'Saudável',
        29.9 => 'Sobrepeso',
        34.9 => 'Obesidade Grau I',
        39.9 => 'Obesidade Grau II',
        40.0 => 'Obesidade Grau III',
    ];

    $resultado = '';

    foreach ($classificacao as $key => $value) {
        $resultado = $value;
        if ($imc <= (float) $key) {
            break;
        }
    }
    return $resultado;
} ?>


<?php if (isset($_GET['nome']) && $_GET['peso'] && $_GET['altura']) {
    $imc = calcularImc($_GET['peso'], $_GET['altura']);
    $resultado = classificarImc($imc);

    echo '<h3>Atenção, ' .
        $_GET['nome'] .
        ': seu IMC é ' .
        number_format($imc, 2, '.', ',') .
        ' e você está classificado(a) como ' .
        $resultado .
        '.<h3>';
} ?>

</body> 
</html> 