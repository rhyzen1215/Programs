
<?Php

$Pcode = $_REQUEST['pcode'];
if (isset($_GET['SearchBor'])){
	$Search = $_REQUEST['SearchBor'];
	}
else {
	$Search = "<search>";
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
.style7 {
	font-family: "Century Gothic";
	font-size: 12px;
	font-weight: bold;
}
</style>

</head>

<body>
        

			<table> 
				<tr height="30">
                <td></td>
                <td></td>
                <td></td>
  				</tr>
				
				<form name="frmSearch">
                <tr>
                <td align="right" width="100" height="30"><div class="style7">Search </div></td>
                <td><div align="left"><input name="SearchBor" id="SearchBor" size="50" type="text" value="<?Php echo $Search ?>" />
				<input name="SearchB" id="SearchB" type="submit" value="Search" onclick="javascript: frmSearch.action='BorrowerSearch.php'; frmSearch.method='GET';" /></div>
				<input type="hidden" name="pcode" value="<?Php echo $Pcode ?>"></td>
                <td></td>
  				</tr>
				</form>	
             </table>
			
			<table width="700" cellpadding="0" cellspacing="0">
              <tr>
			  <td width="50"></td>
              <td><hr width=423px size="2" color="#666666" align="left"/></td>
              </tr>
			</table>
			
			<table> 
				<tr height="20">
				<td></td>
				<td></td>
                <td></td>
                <td></td>
                <td></td>
  				</tr>
			 <?Php
			 
			include 'connect.php';
			
			 if (isset($_GET['SearchBor'])){
			 	$Pcode = $_REQUEST['pcode'];
			 	$sql="SELECT * FROM Borrower WHERE lastname like '%".$Search."%' or employeeno like '%".$Search."%' or firstname like '%".$Search."%'order by lastname";
			 	$rs=odbc_exec($conn,$sql);
				while (odbc_fetch_row($rs))
					{
						echo ('<form name="SubSearch" action="NewLoan.php">');
						echo ('<tr>');
						echo ('<td width="50"></td>');
						echo ('<td width="100" align="center">'.odbc_result($rs,"borrowerno").'</td>');
						echo ('<td width="100" align="center">'.odbc_result($rs,"employeeno").'</td>');
						echo ('<td width="500">'.odbc_result($rs,"lastname").', '.odbc_result($rs,"firstname").' '.odbc_result($rs,"mi").'</td>');
						echo ('<input type="hidden" name="searchBorrower" value="'.odbc_result($rs,"borrowerno").'">');
						echo ('<input type="hidden" name="pcode" value="'.$Pcode.'">');
						echo ('<td width="50"><input name="submitBor" type="submit" value="Select"/></td>');
						echo ('</tr>');
						echo ('</form>');
					}
			}
			?>
			
			</table>

</body>
</html>