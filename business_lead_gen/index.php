<!-- I CAN'T QUITE FIGURE OUT PAGINATION, COULD YOU EXPLAIN IT? -->
<?php
	require_once('connection.php');
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax - Sample</title>
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
	<script>
		$(document).ready(function(){
			$('.datepicker').datepicker();
			$('#search').keyup(function(){
				$('#test_form').submit();
			});
			$('#test_form').submit(function(){
				$.post(
						$(this).attr('action'),
						$(this).serialize(),
						function(data){
							$('#results').html(data.html);
						},
						"json"
					);
				return false;
			});
			$(document).on('change', '#test_form', function(){
				$('#test_form').submit();
			})
		});
	</script>
</head>
<body>
	<form id="test_form" action="process.php" method="post">
		Name: <input type="text" name="name" id="search">
		From: <input class="datepicker" type="text" name="from_date" id="from_date">
		To: <input class="datepicker" type="text" name="to_date" id="to_date">
	</form>
	<div id="results"></div>
</body>
</html>