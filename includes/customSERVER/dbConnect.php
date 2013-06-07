<?php

 $connection = mysql_connect('localhost', 'mjg1989_ghaadmin', 'gha2012?') 
                or die(mysql_error()); 

            $db = mysql_select_db('mjg1989_gha', $connection) 
                or die(mysql_error()); 
                

?>