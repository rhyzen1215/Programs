
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
	
</style>

</head>

<body>
        
			<table>
			 <tr> <td align="center"><span class="style8">LOAN RELEASE</td></tr>
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
			
			<table> 
				<tr height="20">
				<th>LOAN NUMBER</th>
				<th>BORROWER NAME</th>
                <th>AMOUNT LOAN</th>
                <!--<th>APPLICATION STATUS</th>-->
				<th>DATE APPROVED</th>
  				</tr>
			 <?Php
			 
				include 'connect.php';
				//if (isset($_GET['SearchBor'])){
			 
			 	$sql="SELECT * FROM LOANS WHERE LOANSTATUS = 'Approved' AND RELEASESTAT = 'No' order by DATEAPPROVEDOFF1";
			 	$rs=odbc_exec($conn,$sql);
				while (odbc_fetch_row($rs))
					{
						
						$AppDate = date_create(odbc_result($rs,"DATEAPPROVEDOFF1"));
						$AppDate = date_format($AppDate,"m/d/Y");
						
						echo ('<form name="SubSearch" action="LoanRelease2.php">');
						echo ('<tr>');
						echo ('<td width="100">'.odbc_result($rs,"LOANID").'</td>');
						echo ('<td width="500">'.odbc_result($rs,"NAME").'</td>');
						echo ('<td width="300" align="right">'.number_format(odbc_result($rs,"AMOUNTLOAN"),2,'.','').'</td>');
						//echo ('<td width="200" align="center">'.odbc_result($rs,"LOANSTATUS").'</td>');
						echo ('<td width="200" align="center">'.$AppDate.'</td>');
						echo '<input name="LoanIDnum" id="LoanIDnum" type="hidden"  size="30" value="'.odbc_result($rs,"LOANID").'"  />';
						echo ('<td width="50"><input name="submitBorApprove" type="submit" value="Select"/></td>');
						echo ('</tr>');
						echo ('</form>');
						
					}
				//}
			?>
			
			</table>

</body>
</html>