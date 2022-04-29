<?php
	header("Content-Type: application/xls");    
	header("Content-Disposition: attachment; filename=satellite_list.xls");  
	header("Pragma: no-cache"); 
	header("Expires: 0");
 
	require_once 'connect.php';
 
	$output = "";
 
	$output .="
		<table>
			<thead>
				<tr>
                <th>Satellite ID</th>
                <th>Satellite Name</th>
                <th>Satellite User</th>
                <th>Satellite Purpose</th>
                <th>Organisation ID</th>
                <th>Organisation Name</th>
                <th>Location</th>
                <th>Rocket ID</th>
                <th>Rocket Name</th>
                <th>Dry Weight</th>
				</tr>
			<tbody>
	";
 
	$query = $connection->query("select * from satellite S ,organisation O, rocket R where S.ORGID=O.ORGID and S.RID=R.RID") or die(mysqli_errno());
	while($fetch = $query->fetch_array()){
 
	$output .= "
				<tr>
                <td>".$fetch['SATID']."</td>
                <td>".$fetch['SATNAME']."</td>
                <td>".$fetch['SATUSER']."</td>
                <td>".$fetch['SATPURPOSE']."</td>
                <td>".$fetch['ORGID']."</td>
                <td>".$fetch['ORGNAME']."</td>
                <td>".$fetch['LOCATION']."</td>
                <td>".$fetch['RID']."</td>
                <td>".$fetch['RNAME']."</td>
                <td>".$fetch['DRYWEIGHT']."</td>
				</tr>
	";
	}
 
	$output .="
			</tbody>
 
		</table>
	";
 
	echo $output;
 ?>