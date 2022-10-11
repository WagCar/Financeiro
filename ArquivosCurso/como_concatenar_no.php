<?php  
echo "------ 1a. forma ------------" ;
$nome = "Angelo";
$sobrenome = "Ferreira";
echo "<h2>Meu nome é: ".$nome." ".$sobrenome."</h2>";

$end = "Rua São João";
$n = 1129;
$endCompleto = $end.", ".$n;
echo "<h2>Endereço: ".$endCompleto."</h2>";
echo "------------2a. forma------------------------------";
$nome = "Angelo";
$sobrenome = "Ferreira";
$idade = 90;

$nCompleto = "<h2>Meu nome é ";
$nCompleto .= "$nome ";
$nCompleto .= "$sobrenome ";
$nCompleto .= "e tenho $idade anos</h2>";

echo $nCompleto;

echo "------------3a. forma------------------------------";
$nome = "Angelo";
$sobrenome = "Ferreira";
$idade = 90;
echo "<h2>Meu nome é {$nome} {$sobrenome} e tenho {$idade} anos</h2>.";

$end = "Rua São João";
$n = "1129";
$endCompleto = "<h2>Endereço: {$end}, {$n}</h2>";
echo $endCompleto;

echo "------------4a. forma------------------------------";
$nome = "Angelo";
$sobrenome = "Ferreira";
$idade = 90;
echo "<h2>Meu nome é $nome $sobrenome e tenho $idade anos</h2>.";

$end = 'Rua São João';
$n = "1129";
$endCompleto = "<h2>Endereço: $end, $n</h2>";
echo $endCompleto;
?>


