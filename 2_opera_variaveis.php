 <?php
// Recebe os dois valores pela URL usando o método GET
// Digitar a URL para poder enviar os valores
//Exemplo de URL: http://localhost/php-basico-Alunos/2_opera_variaveis.php?numero1=10&numero2=5

$numero1 = $_GET['numero1'];
$numero2 = $_GET['numero2'];

// Verifica se os valores foram passados corretamente
if (isset($numero1) && isset($numero2)) {
// Converte os valores para inteiros
$numero1 = (int)$numero1; 
$numero2 = (int)$numero2; 

// SOMAR
$soma = $numero1 + $numero2;
//SUBTRAIR
$subtracao = $numero1 - $numero2;
//MULTIPLICAÇÃO
$multiplicacao = $numero1 * $numero2;
//DIVISAO
$divisao = $numero1 / $numero2;

// Exibir os resultados
echo "A soma é: $soma <br>";
echo "A subtração é: $subtracao <br>";
echo "A multiplicação é: $multiplicacao <br>";
echo "A divisão é: $divisao <br>";

} else {
 echo "ATENÇÃO! Por favor, forneça os valores de numero1 e numero2 pela URL.";
}
?>