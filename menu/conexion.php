<?php
        //MANASÉS JIMÉNEZ 
        
try {
    $pdo = new PDO('mysql:host=localhost;dbname=regalo', 'root', '');
    

} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>