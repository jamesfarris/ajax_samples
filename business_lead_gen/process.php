<?php
	require_once('connection.php');
	function date_fix($date) {
		$fix = explode('/', $date);
		$new_date = $fix[2] . '-' . $fix[0] . '-' . $fix[1];
		return $new_date;
	}
	// var_dump($_POST);
	// var_dump(date_fix($_POST['from_date']));
	$query =  "SELECT * FROM leads 
			   WHERE (first_name LIKE '" . $_POST['name'] . "%' 
			   OR last_name LIKE '". $_POST['name'] ."%')
			   AND registered_datetime BETWEEN '". 
			   (!empty($_POST['from_date']) ? date_fix($_POST['from_date']) : '1980-01-01') ."' 
			   AND '" . (!empty($_POST['to_date']) ? date_fix($_POST['to_date']) : '2055-01-01') . "'";
	// var_dump($_POST);
	// var_dump($query);
	$users = fetchAll($connection, $query);
	$data = array();
	$html = "
	<table>
		<thead>
			<tr>
				<th>User ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Registered Datetime</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
		";

	foreach ($users as $user) {
		$html .= 
			'<tr>
				 <td>' . $user['id']  . '</td>
			  	 <td>' . $user['first_name']  . '</td>
			  	 <td>' . $user['last_name']  . '</td>
			  	 <td>' . $user['registered_datetime']  . '</td>
			  	 <td>' . $user['email']  . '</td>
			</tr>';
	}
	$html .= '</tbody></table>';

	$data['html'] = $html;
	// echo $data['html'];
	echo json_encode($data);
?>