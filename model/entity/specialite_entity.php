<?php
function getAllSpecialite() {
    /* @var $connection PDO */
    global $connection;
$query = "
SELECT 
    
    specialite.id,
    specialite.label
    
FROM specialite;";

 $stmt = $connection->prepare($query);
 $stmt->execute();

 return $stmt->fetchAll();
    
}