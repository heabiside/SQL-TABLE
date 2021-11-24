<?php

    $opt=array(
        PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_MULTI_STATEMENTS=>false,
        PDO::ATTR_EMULATE_PREPARES=>false
    );

    $name='Enter your name.';
    if(!empty($_POST['name'])) $name=htmlspecialchars($_POST['name'],ENT_COMPAT,'UTF-8');
    $dbname=$_POST['dbname'];

    if(!empty($dbname)){
        try{
            $opt=array(
                PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_MULTI_STATEMENTS=>false,
                PDO::ATTR_EMULATE_PREPARES=>false
            );
            $db=new PDO("mysql:host=127.0.0.1","root","",$opt);
            $db->exec("CREATE DATABASE IF NOT EXISTS ".$dbname);
            $db=null;
        } catch(PDOException $e){
            die("Invalid input");
        }
    }else{
        die('Specify the database in which you want to execute the SELECT statement, and also enter the number of SELECT statements you want to execute.');
    }

    $db=new PDO("mysql:host=127.0.0.1;dbname=$dbname","root","",$opt);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $explodedQueries=explode(";",preg_replace("#(--[^\n]{0,}(\n|$)|/\*.*?\*/)#","",$_POST['queries']));
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>

    <body>
        <h2><?php echo $name;?></h2>
        <h2>powered by MariaDB (compatible with MySQL)</h2>
        <?php

        $selectQueryCounter=0;

        // Execute and display each SELECT statement
        for($i=0;$i<count($explodedQueries);$i++){
            $query=trim($explodedQueries[$i]);
            

            try{
                // Execute everything but the select statement here.
                if(strcasecmp(substr($query,0,6),"SELECT")!==0){
                    if(!empty($query)) $db->exec($query);
                    continue;
                }

                $ps=$db->query($query);
                $selectQueryCounter++;
        ?>
            
            <!--Display the executed SQL statement.-->
            <h2><strong>Problem(<?php echo $selectQueryCounter;?>)</strong></h2>
            SQL statement:<br>
            <?php
                echo "<p class='prewrap'>".$query."</p>";
            ?>

            Table:<br><p>
            <table border=1>
            
                <?php

                    $first_col_out=false;
                    while($row=$ps->fetch()){
                        if($first_col_out===false){
                            echo "<tr>\n";
                            foreach($row as $key=>$val){
                                if(is_numeric($key)) continue;
                                echo "<td>".htmlspecialchars($key,ENT_COMPAT,'UTF-8')."</td>\n";
                            }
                            echo "</tr>\n";
                            $first_col_out=true;
                        }
                        echo "<tr>\n";
                        foreach($row as $key=>$val){
                            if(is_numeric($key)) continue;
                            echo "<td>".htmlspecialchars($val,ENT_COMPAT,'UTF-8')."</td>\n";
                        }
                        echo "</tr>\n";
                    }
                        
                } catch(PDOException $e){
                    echo htmlspecialchars($e,ENT_COMPAT,'UTF-8');
                }
                ?>
            </table>
            </p>
        <?php }?>
    </body>
</html>