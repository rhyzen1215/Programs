
<?Php

	$Rel1 = $_REQUEST['Rel1'];
	$Known1 = $_REQUEST['Known1'];
	$Rel2 = $_REQUEST['Rel2'];
	$Known2 = $_REQUEST['Known2'];

if (isset($_REQUEST['fcomaker'])){
	$LoanID = $_REQUEST['LoanID'];
	$Search = $_REQUEST['SearchCom'];
	$comTag = "1";
	$Pcode = $_REQUEST['pcode'];
	$prodName = $_REQUEST['pname'];
	$LoanTerm = $_REQUEST['LoanTerm'];
	$LoanAmount = $_REQUEST['LoanAmount'];
	$BID = $_REQUEST['BorrowerNo3'];
	$com2 = $_REQUEST['ComNo2'];
	$Rel1 = $_REQUEST['Rel1'];
	$Known1 = $_REQUEST['Known1'];
	$Rel2 = $_REQUEST['Rel2'];
	$Known2 = $_REQUEST['Known2'];
	} else { $com2 = ""; }

if (isset($_REQUEST['fcomaker2'])){
	$LoanID = $_REQUEST['LoanID'];
	$Search = $_REQUEST['SearchCom'];
	$comTag = "2";
	$Pcode = $_REQUEST['pcode'];
	$prodName = $_REQUEST['pname'];
	$LoanTerm = $_REQUEST['LoanTerm'];
	$LoanAmount = $_REQUEST['LoanAmount'];
	$BID = $_REQUEST['BorrowerNo3'];
	$com1 = $_REQUEST['ComNo'];
	$Rel2 = $_REQUEST['Rel2'];
	$Known2 = $_REQUEST['Known2'];
	$Rel1 = $_REQUEST['Rel1'];
	$Known1 = $_REQUEST['Known1'];
	} else { $com1 = ""; }
	
if (isset($_REQUEST['comakerS'])){
	$LoanID = $_REQUEST['LoanID'];
	$Search = $_REQUEST['SearchCom'];
	$comTag = $_REQUEST['comTag'];
	$Pcode = $_REQUEST['pcode'];
	$prodName = $_REQUEST['pname'];
	$LoanTerm = $_REQUEST['LoanTerm'];
	$LoanAmount = $_REQUEST['LoanAmount'];
	$BID = $_REQUEST['BorrowerNo3'];
	$com1 = $_REQUEST['ComNo'];
	$com2 = $_REQUEST['ComNo2'];
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
                <td align="right" width="150" height="30"><div class="style7">Comaker Search </div></td>
                <td><div align="left"><input name="SearchCom" id="SearchCom" size="50" type="text" value="<?Php echo $Search ?>" />
				<input name="comakerS" id="comakerS" type="submit" value="Search" onclick="javascript: frmSearch.action='ComakerSearch.php'; frmSearch.method='GET';" /></div>
				<input type="hidden" name="pcode" value="<?Php echo $Pcode ?>">
				<input type="hidden" name="comTag" value="<?Php echo $comTag ?>">
				<input type="hidden" name="pname" value="<?Php echo $prodName ?>">
				<input type="hidden" name="LoanTerm" value="<?Php echo $LoanTerm ?>">
				<input type="hidden" name="LoanAmount" value="<?Php echo $LoanAmount ?>">
				<input type="hidden" name="BorrowerNo3" value="<?Php echo $BID ?>">
				<input type="hidden" name="comTag" value="<?Php echo $comTag ?>">
				<input type="hidden" name="ComNo" value="<?Php echo $com1 ?>">
				<input type="hidden" name="ComNo2" value="<?Php echo $com2 ?>">
				<input type="hidden" name="LoanID" value="<?Php echo $LoanID ?>">
				
				
				<input type="hidden" name="Rel1" value="<?Php echo $Rel1 ?>">
				<input type="hidden" name="Rel2" value="<?Php echo $Rel2 ?>">
				<input type="hidden" name="Known1" value="<?Php echo $Known1 ?>">
				<input type="hidden" name="Known2" value="<?Php echo $Known2 ?>">
				
				
				
				
				</td>
                <td></td>
  				</tr>
				</form>	
             </table>
			
			<table width="700" cellpadding="0" cellspacing="0">
              <tr>
			  <td width="50"></td>
              <td><hr width=535px size="2" color="#666666" align="left"/></td>
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
			
			 if (isset($_REQUEST['SearchCom'])){
			 	$Pcode = $_REQUEST['pcode'];
			 	$sql="SELECT * FROM Comaker WHERE lastname like '%".$Search."%' or employeeno like '%".$Search."%' or firstname like '%".$Search."%'order by lastname";
			 	$rs=odbc_exec($conn,$sql);
				while (odbc_fetch_row($rs))
				{
				echo ('<form name="SubSearch" action="NewLoanApp.php">');
				echo ('<tr>');
				echo ('<td width="50"></td>');
				echo ('<td width="100" align="center">'.odbc_result($rs,"comakerno").'</td>');
				echo ('<td width="100" align="center">'.odbc_result($rs,"employeeno").'</td>');
				echo ('<td width="500">'.odbc_result($rs,"lastname").', '.odbc_result($rs,"firstname").' '.odbc_result($rs,"middlename").'</td>');
				
				if ($comTag == "1") {
				echo ('<input type="hidden" name="ComNo" value="'.odbc_result($rs,"comakerno").'">');
				echo ('<input type="hidden" name="ComNo2" value="'.$com2.'">');}
				else if ($comTag == "2") {
				echo ('<input type="hidden" name="ComNo" value="'.$com1.'">');
				echo ('<input type="hidden" name="ComNo2" value="'.odbc_result($rs,"comakerno").'">');}
				
				echo ('<input type="hidden" name="Rel1" value="'.$Rel1.'">');
				echo ('<input type="hidden" name="Known1" value="'.$Known1.'">');
				echo ('<input type="hidden" name="Rel2" value="'.$Rel2.'">');
				echo ('<input type="hidden" name="Known2" value="'.$Known2.'">');
				
				echo ('<input type="hidden" name="pcode" value="'.$Pcode.'">');
				echo ('<input type="hidden" name="comTag" value="'.$comTag.'">');
				echo ('<input type="hidden" name="pname" value="'.$prodName.'">');
				echo ('<input type="hidden" name="LoanTerm" value="'.$LoanTerm.'">');
				echo ('<input type="hidden" name="LoanAmount" value="'.$LoanAmount.'">');
				echo ('<input type="hidden" name="BorrowerNo3" value="'.$BID.'">');
				echo ('<input type="hidden" name="LoanID" value="'.$LoanID.'">');
				echo ('<td width="50"><input name="comaker" type="submit" value="Select" /></td>');
				echo ('</tr>');
				echo ('</form>');
				}
			}
			?>
			
			</table>

</body>
</html>