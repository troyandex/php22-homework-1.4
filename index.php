<?php	
	$city_id = '554840'; // Izhevsk
	$appid = 'a08845368237457a23ecf1f01348191d';
	// выгружаем  json:
	$api = file_get_contents("http://api.openweathermap.org/data/2.5/weather?id=" . $city_id . "&appid=" . $appid);
	$decode_api = json_decode($api, true); // переводим в масив, а "true" - значит на выходе ассоциативный массив.

// 	если  нужен вывод масива для себя:
//	echo "<b>decode_api</b> <br>";
//	echo "<pre>";
//	print_r ($decode_api);

	// данные
	$city_name = $decode_api['name'];
	$temp = $decode_api['main']['temp'];
	$temp_celsius = $temp - 273;
	$temp_celsius = round($temp_celsius, 1);
	$pressure = $decode_api['main']['pressure'];
	$humidity = $decode_api['main']['humidity'];
	$clouds_all = $decode_api['clouds']['all'];
	$coord_lon = $decode_api['coord']['lon'];
	$coord_lat = $decode_api['coord']['lat'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Домашнее задание к лекции 1.4 «Стандартные функции»</title>
	<style> 
		table {border: 2px solid black}
		table caption { font-weight: bold; border-bottom: 1px solid black;}
		td:first-child {text-align: right;}
		td:last-child {text-align: left; font-weight: bold;}
	</style>
</head>
<body>
	<table>
  		<caption>Weather in <?=$city_name;?></caption>
  		<tr>
    		<td>Temperature =</td>
			<td><?= $temp_celsius; ?> C  (<?= $temp; ?> F)</td>
 	 	</tr>
  		<tr>
    		<td>Pressure =</td>
			<td><?= $pressure; ?></td>
  		</tr>
  		<tr>
    		<td>Humidity =</td>
			<td><?= $humidity; ?></td>
  		</tr>
  		<tr>
	    	<td>Clouds =</td>
			<td><?= $clouds_all; ?>%</td>
  		</tr>
  		<tr>
	    	<td>Geo location  =</td>
			<td><?= $coord_lon; ?> / <?= $coord_lat; ?></td>
  		</tr>
  	</table>
</body>
</html>