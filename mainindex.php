<?php

    include 'model.php';
    include 'view.php';
    include 'controller.php';

    $model = new product();
    $view = new productview();
    $control = new productcontrol($view, $model);

    if(isset($_POST['sub'])){
        $_POST['itemm'];
        $_POST['pricee'];
        $control->getdata($_POST['itemm'], $_POST['pricee']);
    }

    if(isset($_GET['val'])){
        $editt = $control->edit($_GET['val']);
        var_dump($editt);
        
    }

    if(isset($_POST['subedit'])){
        $control->saveupdate($_POST['itemid'], $_POST['itemedit'], $_POST['priceedit']);
    }

    if(isset($_GET['del'])){
        echo $_GET['del'];
        $control->deletee($_GET['del']);
    }

    if(isset($_GET['try'])){
        echo '<script> alert("'.$_GET['try'].'"); </script>';
    }



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <h1>Products</h1>

    <div style="display: flex; justify-content: center;">
    <div style="border: 1px solid; padding: 10px; width: 1500px;">
        <table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">Time</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php

                $control->viewall();

            ?>
        </tbody>
        </table>
    </div>
    </div>

    <form action="mainindex.php" method="POST">
        <label for="item">Item:</label>
        <input type="text" id="item" name="itemm" required>
        <br><br>

        <label for="price">Price:</label>
        <input type="number" id="price" name="pricee" required>
        <br><br>

        <button type="submit" name="sub">Submit</button>
    </form>

    
    <form action="mainindex.php" method="POST">
    
    <input type="hidden" id="item" name="itemid" value="<?php echo isset($editt['item_ID']) ? htmlspecialchars($editt['item_ID']) : ''; ?>" required>
    <br><br>

    <label for="item">Item:</label>
    <input type="text" id="item" name="itemedit" value="<?php echo isset($editt['item_name']) ? htmlspecialchars($editt['item_name']) : ''; ?>" required>
    <br><br>

    <label for="price">Price:</label>
    <input type="number" id="price" name="priceedit" value="<?php echo isset($editt['item_price']) ? htmlspecialchars($editt['item_price']) : ''; ?>" required>
    <br><br>

    <button type="submit" name="subedit">Submit</button>
    </form>



   
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>