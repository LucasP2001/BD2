
<?php
    $connection = new MongoClient();
  
    $res = $mng->executeCommand("phpbasic", $stats);
    $stats = current($res->toArray());
    print_r($stats); 

    
?>