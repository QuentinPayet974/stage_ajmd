<?php
try {
   $pdo = new PDO("mysql:host=185.31.40.32;dbname=ajmd-gestion_login", "258803", "mcGCV7XTyzsDd6");
} catch (PDOException $e) {
   echo $e->getMessage();
}
