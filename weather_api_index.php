<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>AJAX - Basic 2</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#get_weather').submit(function(){
				$.get($(this).attr('action')+"?callback=?",
					$(this).serialize(),
					function(dojo){
						$('.weather').html(	'<h2>Weather for: '+dojo.data.nearest_area[0].areaName[0].value+'</h2>'+
											'<img src="'+dojo.data.current_condition[0].weatherIconUrl[0].value+'">'+
											'<p>Current Temp F: '+dojo.data.current_condition[0].temp_F+' degrees</p>'+
											'<p>Current Temp C: '+dojo.data.current_condition[0].temp_C+' degrees</p>'+
											'<p>Current Wind Speed: '+dojo.data.weather[0].windspeedMiles+'</p>'+
											'<p>Weather Description: '+dojo.data.weather[0].weatherDesc[0].value+'</p>'

							);
						console.log(dojo);
					},
					"json"
					);
				
			return false;
			});
		});
	</script>
	<style>
		.weather {
			width: 300px;
		}
		.weather img {
			float: right;
		}
	</style>
</head>
<body>
	<h1>The Coding Dojo Weather Report</h1>
	<form id="get_weather" action="http://api.worldweatheronline.com/free/v1/weather.ashx" method="get">
		<select name="q" id="city">
			<option value="Detroit">Detroit</option>
			<option value="Mountain View, CA">Mountain View</option>
			<option value="Seattle">Seattle</option>
			<option value="Los Angeles">Los Angeles</option>
		</select>
			<input type="hidden" name="format" value="json">
			<input type="hidden" name="date" value="today">
			<input type="hidden" name="cc" value="yes">
			<input type="hidden" name="includelocation" value="yes">
			<input type="hidden" name="key" value="ckdmj62bhfae37dnhfazue9z">
			<input type="submit" value="Get Weather!">
		
	</form>
	<div class="weather"></div>
</body>
</html>