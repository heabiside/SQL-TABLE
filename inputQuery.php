<?php 
    $count=$_POST['count'];
    $dbname=$_POST['dbname'];
    $init_db=$_POST['init_db'];

    if(!empty($dbname) && !empty($count) && is_numeric($count)){
        try{
            $opt=array(
                PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_MULTI_STATEMENTS=>false,
                PDO::ATTR_EMULATE_PREPARES=>false
            );
            $db=new PDO("mysql:host=127.0.0.1","root","",$opt);
            $db->exec("CREATE DATABASE IF NOT EXISTS ".$dbname);

            $db=null;
            $db=new PDO("mysql:host=127.0.0.1;dbname=$dbname","root","");
            if(!empty($init_db)) $db->exec($init_db);
        } catch(PDOException $e){
            die("不適切な入力です。");
        }
    }else{
        die('SELECT文を実行したいデータベースを指定し、実行したいSELECT文の個数も入力して下さい。');
    }
?>
<html>
    <head>
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
    <body>
        <form method="POST" action="solve.php">
            <input type="text" name="name" placeholder="あなたの名前を入力">
            <?php
            for($i=0;$i<$count;$i++){
            ?>
                <textarea type="text" class="bea" name=<?php echo "query".$i;?> placeholder=<?php echo "query".$i;?>></textarea><br>
            <?php } ?>

            <input type="submit" value="Go">
            <input type="hidden" name="count" value=<?php echo $count;?>>
            <input type="hidden" name="dbname" value=<?php echo htmlspecialchars($dbname,ENT_COMPAT,'UTF-8');?>>
        </form>
    </body>
</html>