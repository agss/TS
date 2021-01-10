<?php

$xmldata = <<<XML
<?xml version='1.0' standalone='yes'?>
<!DOCTYPE doctest [
  <!ENTITY hue  "Hue" > 
  <!ENTITY hue2 "&hue;&hue;" >
  <!ENTITY hue3 "&hue2;&hue2;&hue2;" >
  <!ENTITY hue4 "&hue3;&hue3;&hue3;&hue3;" >
]>
<clientes>
  <cliente>
    <nome>&hue4;</nome>
    <email>test@email.tld</email>
  </cliente>
  <cliente>
    <nome>Maria Joana</nome>
    <email>maria@joana.com</email>
  </cliente>
</clientes>
XML;

libxml_disable_entity_loader(false);


$clientes = new SimpleXMLElement($xmldata, LIBXML_NOENT);

echo "XML Parser: <br>";
echo "<br>";
echo "Nome: ". $clientes->cliente[0]->nome."<br>";
echo "Email: ". $clientes->cliente[0]->email."<br>";
echo "<br>";
echo "Nome: ". $clientes->cliente[1]->nome."<br>";
echo "Email: ". $clientes->cliente[1]->email."<br>";

?>
