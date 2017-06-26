<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Parcel.php";

    $app = new Silex\Application();

    $app->get("/", function() {
        return "
        <!DOCTYPE html>
        <html>
        <head>
            <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css'>
            <title>New Parcel</title>
        </head>
        <body>
            <div class='container'>
                <h1>Add New Parcel</h1>
                <p>Enter the dimensions of your parcel here:</p>
                <form action='/view_parcel'>
                    <div class='form-group'>
                        <label for='weight'>Weight (lbs)</label>
                        <input id='weight' name='weight' class='form-control' type='number'>
                    </div>
                    <div class='form-group'>
                        <label for='length'>Length (in)</label>
                        <input id='length' name='length' class='form-control' type='number'>
                    </div>
                    <div class='form-group'>
                        <label for='width'>Width (in)</label>
                        <input id='width' name='width' class='form-control' type='number'>
                    </div>
                    <div class='form-group'>
                        <label for='height'>Height (in)</label>
                        <input id='height' name='height' class='form-control' type='number'>
                    </div>
                    <div class='form-group'>
                        <label for='distance'>Distance (mi)</label>
                        <input id='distance' name='distance' class='form-control' type='number'>
                    </div>
                    <button type='submit' class='btn-success'>Get Price</button>
                </form>
            </div>
        </body>
        </html>
        ";
    });

    $app->get("/view_parcel", function() {
        $my_parcel = new Parcel($_GET['weight'], $_GET['length'], $_GET['width'], $_GET['height'], $_GET['distance']);
        $volume = $my_parcel->getVolume();
        $cost = $my_parcel->getCost();
        return "<h2>Parcel Volume: $volume</h2></br><h2>Shipping Cost: $$cost</h2>";

    });
    return $app;
?>
