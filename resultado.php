<?php
    $host="localhost";
    $user="root";
    $pass="";
    $banco="bdnexus2(3)";
    $conexao=mysqli_connect($host, $user, $pass, $banco);

    function parseToXML($htmlStr)
    {
        $xmlStr=str_replace('<','&lt;',$htmlStr);
        $xmlStr=str_replace('>','&gt;',$xmlStr);
        $xmlStr=str_replace('"','&quot;',$xmlStr);
        $xmlStr=str_replace("'",'&#39;',$xmlStr);
        $xmlStr=str_replace("&",'&amp;',$xmlStr);
        return $xmlStr;
    }
    
    $query = "SELECT * FROM tblocalizacaoconfirmada";
    $result = mysqli_query($conexao, $query);

    header("Content-type: text/xml");

    echo "<?xml version='1.0' ?>";
    echo '<tblocalizacaoconfirmada>';
    $ind=0;
    
    // Iterate through the rows, printing XML nodes for each
    while ($row = mysqli_fetch_assoc($result)){
        // Add to XML document node
        echo '<tblocalizacaoconfirmada ';
        echo 'name="' . parseToXML($row['name']) . '" ';
        echo 'address="' . parseToXML($row['address']) . '" ';
        echo 'lat="' . $row['lat'] . '" ';
        echo 'lng="' . $row['lng'] . '" ';
        echo 'type="' . $row['type'] . '" ';
        echo '/>';
        $ind = $ind + 1;
    }
    
    echo '</tblocalizacaoconfirmada>';
?>