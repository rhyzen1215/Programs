
<?Php
include 'connect.php';
if (isset($_REQUEST['SearchBor'])){
	$Search = $_REQUEST['SearchBor'];
	
}
		
?>
				
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  oncontextmenu="return false;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css">
<!--
.style2 {font-size: 12px}

-->
select
{
	width: 195px;
	margin-left:2px;
}

input[type=date]
{
	width: 190px;
	margin-left:2px;
}

input[type=date],input[type=text],select
{
	font-family:"Century Gothic";
	font-size:12px;
	font-weight: bold;
	border-spacing:inherit;
	padding-left: 2px;
	margin: 2px;
}
.style3 {
	font-size: 14px;
	font-weight: bold;
	}
th {
	font-family: "Century Gothic";
	font-size: 12px;
	font-weight: bold;
	white-space:nowrap;
	padding-left: 10px;
	padding-right: 20px;
	border-bottom:double;
	border-left: solid 1px black;
}

td {
	font-family: "Century Gothic";
	font-size: 12px;
	white-space:nowrap;
	padding-left: 10px;
	padding-right: 10px;
}

.style8 {
	font-family: "Century Gothic";
	font-size: 14px;
	font-style:italic;
	font-weight:bold;
	color: #FF0000;
	}
	
.style9 {
	font-family: "Century Gothic";
	font-size: 14px;
	border-top:thin;
	font-weight:bold;
	color: #0000FF;
	}
	
</style>

</head>

<body>
        
			<table>
			 <tr> <td align="center"><span class="style8">SCHEDULED LOAN ANALYSYS</span></td></tr>
             <tr><td><hr width=640px size="1" color="#666666" align="left"/></td></tr> 
			</table>
			<!------------------------------------------------------------------------------------------------>
			
            
			<table>
				<tr height="10">
                <td></td>
                <td></td>
                <td></td>
  				</tr>
			</table>
			
            
            <form name="frmLoanView">
            
            <table>
			<tr>
            <td width="120" align="right">Company Name:</td>
			<td>
             <?Php
			 
			include 'connect.php';
			$TotalBalance = 0;
			$TotalPrincipal = 0;

			echo '<select name="LoanStatus" style="width:110px">';
			 	$sql="SELECT * FROM COMPANY";
			 	$rs=odbc_exec($conn,$sql);
				while (odbc_fetch_row($rs))
					{
						echo '<option value="'.odbc_result($rs,"branchname").'">'.odbc_result($rs,"branchname").'</option>';
					}	
			echo '</select>';
					

			?>
            </td></tr>
            
            <tr>
            <td width="120" align="right">Product:</td>
			<td>
             <?Php
			 
			include 'connect.php';
			$TotalBalance = 0;
			$TotalPrincipal = 0;

			echo '<select name="LoanProduct" style="width:110px">';
			 	$sql="SELECT * FROM PRODUCT";
			 	$rs=odbc_exec($conn,$sql);
				while (odbc_fetch_row($rs))
					{
						echo '<option value="'.odbc_result($rs,"productcode").'">'.odbc_result($rs,"productname").'</option>';
					}	
			echo '</select>';
					

			?>
            </td></tr>
            
            
            
            <tr>
            <td align="right">From:</td>
            <td><input type="date" name="DateFrom" value="" /></td>
            </tr>
            <tr>
            <td align="right">To:</td>
            <td><input type="date" name="DateTo" value="" /></td>
            </tr>
            
            <tr>
            <td></td>
            <td align="right"><input type="submit" value="View" name="ViewLoan2" onclick="javascript: frmLoanView.action='LoanAnalysisBySchedule.php'; frmLoanView.method='GET';" />
            </td></tr>
			</table>
            
          
			</form>
			
		
           

</body>
</html>