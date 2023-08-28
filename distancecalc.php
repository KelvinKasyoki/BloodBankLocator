<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>distancecalculator</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="crossorigin="anonymous"></script>
<script  defer src="https://maps.googleapis.com/maps/api/js?libraries=places&language=en&key=AIzaSyAvvrgNG6wOKBgACbV9npXn3NQ-SmuQ6xU"  type="text/javascript"></script>
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<body>
<div class="container">
<div class="row">
<div class="jumbotron">
<h1>Calculate the Distance to the nearest blood bank</h1>
</div>

<div class="col-md-6">
 <form action="" method="post">
 

            <label>Origin:</label> <input type="text" name="o" placeholder="Enter Origin location" required> <br><br>
            <label>Destination:</label> <input type="text" name="d" placeholder="Enter Destination location" required> <br><br>
            <input type="submit" value="Calculate distance & time" name="submit"> <br><br>

        </form>

        <?php
		//The Distance Matrix API is a service that provides travel distance and time for a matrix of origins and destinations. The API returns information based on the recommended route between start and end points, as calculated by the Google Maps API, and consists of rows containing duration and distance values for each pair.
            if(isset($_POST['submit'])){
            $origin = $_POST['o']; $destination = $_POST['d'];
            $api = file_get_contents("https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$origin."&destinations=".$destination."&key=AIzaSyAvvrgNG6wOKBgACbV9npXn3NQ-SmuQ6xU");
            $data = json_decode($api);
        ?>

            <label><b>Distance: </b></label> <span><?php echo ((int)$data->rows[0]->elements[0]->distance->value / 1000).' Km'; ?></span> <br><br>
            <label><b>Travel Time: </b></label> <span><?php echo $data->rows[0]->elements[0]->duration->text; ?></span> 

        <?php } ?>


</body>
</html>

