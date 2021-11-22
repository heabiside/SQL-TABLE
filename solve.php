<?php

    $opt=array(
        PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_MULTI_STATEMENTS=>false,
        PDO::ATTR_EMULATE_PREPARES=>false
    );

    $count=$_POST['count'];
    $dbname=$_POST['dbname'];
    $db=new PDO("mysql:host=127.0.0.1;dbname=$dbname","root","",$opt);
    $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
?>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>

    <body>
        <h2>name</h2>
        <h2>使用したDB: MySQL(と互換性のあるMariaDB)</h2>
        <?php

        // 各SELECT文を実行して表示
        for($i=0;$i<$count;$i++){
            $query=$_POST["query".$i];

            // SELECT文かどうかを確認
            $check_string=preg_replace("/( |\n)/","",$query);

            if(strcasecmp(substr($query,0,6),"SELECT")!==0){
                die("ここではSELECT文しか実行できません。");
            }

            try{
                $ps=$db->query($query);
        ?>
            
            <!--実行したSQL文を表示-->
            <h2><strong>問題(<?php echo $i+1;?>)</strong></h2>
            <p>SQL文:<br>
            <?php echo htmlspecialchars(nl2br($query), ENT_COMPAT, 'UTF-8');?>
            </p>

            <p>出力結果:<br>
            <table border=1>
            
                <?php

                    $first_col_out=false;
                    while($row=$ps->fetch()){
                        if($first_col_out===false){
                            echo "<tr>\n";
                            foreach($row as $key=>$val){
                                if(is_numeric($key)) continue;
                                echo "<td>".$key."</td>\n";
                            }
                            echo "</tr>\n";
                            $first_col_out=true;
                        }
                        echo "<tr>\n";
                        foreach($row as $key=>$val){
                            if(is_numeric($key)) continue;
                            echo "<td>".$val."</td>\n";
                        }
                        echo "</tr>\n";
                    }
                        
                } catch(PDOException $e){
                    die("エラーです。");
                }
                ?>
            </table>
            </p>
        <?php }?>
    </body>
</html>