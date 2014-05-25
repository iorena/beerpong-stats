<?php

require 'yhteys.php';
$conn= getConnection();

$sqlquery = "SELECT DrinkName, DrinkPrice FROM drinks, drinkprices WHERE drinks.DrinkID=drinkprices.DrinkID";
$query = $conn->prepare($sqlquery);
$query->execute();

echo "Hinnasto:\n";

foreach($query->fetchAll(PDO::FETCH_OBJ) as $item) {

echo $item->drinkname;
echo " ";
echo $item->drinkprice;
echo " ";
echo "euroa\n"; 

}

?>
