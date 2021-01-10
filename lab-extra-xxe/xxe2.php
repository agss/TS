<?php

$xmldata = <<<XML
<?xml version='1.0' standalone='yes'?>
<!DOCTYPE doctest [ <!ENTITY semnome "Sem nome" > ]>
<clientes>
  <cliente>
    <nome>&semnome;</nome>
    <email>joao@marcos.com</email>
  </cliente>
  <cliente>
    <nome>Maria Joana</nome>
    <email>maria@joana.com</email>
  </cliente>
</clientes>
XML;

$clientes = new SimpleXMLElement($xmldata);

echo "XML Parser: <br>";
echo "<br>";
echo "Nome: ". $clientes->cliente[0]->nome."<br>";
echo "Email: ". $clientes->cliente[0]->email."<br>";
echo "<br>";
echo "Nome: ". $clientes->cliente[1]->nome."<br>";
echo "Email: ". $clientes->cliente[1]->email."<br>";

?>
