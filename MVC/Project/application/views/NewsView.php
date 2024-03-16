<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>All our news</h1>
    <?php
    foreach($data->news as $key => $value) {
        var_dump($value);
    }

    
    ?>  
    <br>
    <div>
        <nav>
            <?php
            $rows = $data->countRows;
            $actualPage = $data->actualPage;           
            $countPage = $rows / 8;
            if($actualPage > $countPage) {
                echo "<a href = '/News?id=0'>" . 0 . "</a>";
                exit;
            }
            if($actualPage == 0 & $countPage <= 1){
                $id = 0;
                echo "<a href = '/News?id=$id'>" . $id+1 . "</a>";
                exit;                
            }
            $countPage = round($countPage,0,PHP_ROUND_HALF_EVEN);
            if($actualPage != 0){
                echo "<a href = '/News?id=" . $actualPage-1 . "'> " . $actualPage-1 . " </a> ";
            }
            if($actualPage+1 == $countPage) {
                echo "<a href = '/News?id=" . $actualPage . "'> " .$actualPage . " </a>";
                echo "<a href = '/News?id=" . $actualPage + 1 . "'> " .$actualPage + 1 . " </a>";
                exit;
            }             
            for ($i = 0 ; $actualPage + $i < $countPage && $i<=3 ; $i++) {
                echo "<a href = '/News?id=" . $actualPage + $i . "'> " .$actualPage + $i . " </a>";                                          
            }                      
            
            exit;
            ?>
        </nav>
    </div>  
</body>
</html>