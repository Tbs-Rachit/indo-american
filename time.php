<!DOCTYPE html>
<html lang="en">
<head>
	<title>Daily Time Log</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>
		.misspunch {
			text-align: center;
			background-color: red;
			color: #fff;
			display: block;
			font-size: 18px;
			font-weight: bolder;
		}
	</style>
</head>

<body>
    <h1 align='center'>Daily Logs</h1>

    <?php
//echo "<pre>";
$serverName = "server\server";
$uid = "sa";
$pwd = "sa2016";
$connectionOptions = array( "UID"=>$uid,
	"PWD"=>$pwd,
	"Database"=>"App91");

/* Connect using Windows Authentication. */
$conn = sqlsrv_connect( $serverName, $connectionOptions);
if( $conn === false ) {
	echo "Unable to connect.</br>";
	die(print_r(sqlsrv_errors(), true));
}

$eid = isset($_GET['id'])?$_GET['id']:'6971';

$tsql = "SELECT TOP (50) AttendanceLogs.AttendanceDate
        ,AttendanceLogs.EmployeeId
      ,AttendanceLogs.InTime
      ,AttendanceLogs.OutTime
      ,AttendanceLogs.PunchRecords
      ,MissedOutPunch
      ,MissedInPunch
      ,Employees.EmployeeName
      ,Employees.EmployeeCode
  FROM AttendanceLogs
  JOIN Employees
  ON Employees.EmployeeId = AttendanceLogs.EmployeeId
  WHERE AttendanceLogs.EmployeeId = $eid
  ORDER BY AttendanceLogs.AttendanceDate DESC";
//echo $tsql;
$stmt = sqlsrv_query( $conn, $tsql);

    if ( $stmt )
    {
	    //echo " Statement executed.<br>\n";
    }
    else
    {
	    echo "Error in statement execution.\n";
	    die( print_r( sqlsrv_errors(), true));
    }
    $i=0;
    echo '<div class="container"><table class="table table-bordered">
    <thead>
    <tr>
    <th>Employee ID</th>
    <th>Employee Name</th>
    <th>In Time</th>
    <th>Out Time</th>
    <th>Time</th>
    <th>Missed Punch</th>
    </tr>
    </thead>
    <tboday>';
$rr ='';
    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC))
    {
//print_r($row);
	    if($row[5] != 0){
	    	$rr .= '<tr>
<td>'.$row[1].'</td>
<td>'.$row[7].'</td>
<td>'.$row[2].'</td>
<td>'.$row[3].'</td>
<td>'.$row[4].'</td>
<td class="misspunch">Yes</td>
</tr>';
	    }else{
	    	$rr .= '';
	    }
    }
    if($rr != ''){
    	echo $rr;
    }else{
    	echo '<tr><td colspan="6">No Record Found</td></tr>';
    }
    echo '</tboady>
    </table>
    </div>';

/* Free statement and connection resources. */
    sqlsrv_free_stmt( $stmt);

    $tsql = "SELECT TOP (1000) [EmployeeId]
      ,[EmployeeName]
      ,[EmployeeCode]
  FROM [App91].[dbo].[Employees]
  WHERE [Status] = 'Working'
  ORDER by EmployeeId";
    //echo $tsql;
    $stmt = sqlsrv_query( $conn, $tsql);

    if ( $stmt )
    {
	    //echo " Statement executed.<br>\n";
    }
    else
    {
	    echo "Error in statement execution.\n";
	    die( print_r( sqlsrv_errors(), true));
    }

    echo '<div class="container"><table class="table table-bordered">
    <thead>
    <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Code</th>
    </tr>
    </thead>
    <tboday>';
    $rr ='';
    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_NUMERIC))
    {
//print_r($row);
	    echo '<tr>
<td><a href="?id='.$row[0].'">'.$row[0].'</a></td>
<td>'.$row[1].'</td>
<td>'.$row[2].'</td>
</tr>';
    }

    echo '</tboady>
    </table>
    </div>';

    sqlsrv_free_stmt( $stmt);
sqlsrv_close( $conn);

?>
</body>

</html>