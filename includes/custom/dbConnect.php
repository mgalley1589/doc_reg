<?php

 $connection = mysql_connect('localhost', 'root', 'jacamimcd2012?') 
                or die(mysql_error()); 

            $db = mysql_select_db('gha', $connection) 
                or die(mysql_error()); 
                

?>