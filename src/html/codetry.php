<?php

require "connection.php";

$sql = "SELECT DISTINCT YEAR(Date) AS DistinctYear FROM `damages`;";
        $result = $conn->query($sql);
        $yeararray = array();

        if(!$result){
        die("Invalid query: " . $connection->error);
        }

        while ($row = $result->fetch_assoc()) {
        $yeararray[] = $row['DistinctYear'];
        }


        foreach ($yeararray as $element) {
						$thearray = array();

            $evacsql = "SELECT * FROM `evac_center`;";
          	$evares = $conn->query($evacsql);
           	

	            while ($rowevac = $evares->fetch_assoc()) {
	            	$indexer = $rowevac["Evac_ID"];
	              $anothersql = "SELECT * FROM `family_members` INNER JOIN `damages` ON `family_members`.`Serial_No.`= `damages`.`Serial_No.` WHERE `damages`.`Evac_Cent_ID` = '$indexer' AND Year(`damages`.`Date`) = '$element';";
	              $res = $conn->query($anothersql);

	              $anothersql2 = "SELECT * FROM `family` INNER JOIN `damages` ON `family`.`Serial_No.` = `damages`.`Serial_No.` WHERE `damages`.`Evac_Cent_ID` = '$indexer' AND Year(`damages`.`Date`) = '$element';";
	              $res2 = $conn->query($anothersql2);

	              $thearray[] = mysqli_num_rows($res) + mysqli_num_rows($res2);
	            }



            if(!$evares){
            die("Invalid query: " . $conn->error);
            }
            
            echo '"'.$element.'": [';

            echo implode(', ', $thearray) . '],';
            echo "<br>";
            echo "\n";
            
        }


        $evacsql = "SELECT * FROM `evac_center`;";
        $evares = $conn->query($evacsql);
        $indexer = 0;
        while ($rowevac = $evares->fetch_assoc()) {

        	echo "<p>document.getElementById('count".$rowevac["Evac_ID"]."').innerHTML = casualties[".$indexer."];</p>";
        	$indexer = $indexer + 1;
        }



?>