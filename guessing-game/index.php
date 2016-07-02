<!DOCTYPE html>
<html>
<head>
    <title>Guessing Game</title>
</head>
<body>
    <style type="text/css">
        .container{
            width: 1200px;
            text-align: center;
        }
    </style>
    <div class="container">
        <div class="logo">
            <h1>Guessing Game</h1>
        </div>
        <form action="" method="POST">
            <input type="text" name="text">
            <input type="submit" name="submit" value="Guess It">
        </form>
    </div>
    <?php
    $number = mt_rand(1,10);
        if( isset($_POST['submit']) ){
            $text = trim($_POST['text']);
            if(empty($text) || $text > 10 ) { ?>
                <div class="container">
                    <h2><?php echo 'Please guess any number between 1 to 10' ?></h2>
                </div>
            <?php }else{
                if($text == $number){ ?>
                   <div class="container">
                       <h2><?php echo 'Hurrah..! You won the game.'; ?></h2>
                   </div>

               <?php }else{ ?>
                   <div class="container">
                       <h2><?php echo 'Sorry...! Best luck for next time.'; ?></h2>
                   </div>

                <?php }
            }
        }

    ?>

</body>
</html>