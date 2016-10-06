<?php 
session_start();
include 'connect.php';	

if (isset($_SESSION['previous'])) {
   if (basename($_SERVER['PHP_SELF']) != $_SESSION['previous']) {
        session_destroy();
	}
}
 $_SESSION['previous'] = basename($_SERVER['PHP_SELF']);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Leave Application</title>
<style type="text/css">
	<?php include 'templatestyle.css'; ?>
</style>
</head>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<?php
$message = "";
$date = "";
$employee = "";
$empNo = $empName = $date = $empPosition = $empBranch = $empRank = "";
$dateFrom = $dateTo = $hourFrom = $hourTo = "";
$othersDesc = $leaveReqBy = $leaveCredits = $leaveRequest = $leaveBalance = $postedBy = $postedDate = "";
?>

<table width="728" height="40">
    <tr>
        <td width="478"><div align="center"><font face="Century Gothic">REQUEST FOR LEAVE/ ABSENCES/ UNDERTIME/ OTHERS</font></div>
        </td>
    </tr>
</table>

<table width="728">
<tr>
<td width="478" height="25" bgcolor=<?php echo $color ?> align="center"><font face="Century Gothic" color="white" size="-1"><?php echo $message ?></font><div align="center"></div>
</td>
</tr>
</table>

<table>
    <tr>
        <td><font face="Century Gothic"><b>Leave Details</b></font></td>
    </tr>
    
    <tr>
    	<td><hr width=718px size="3" color="#666666" align="left"/></td>
    </tr>
</table>

<table >
	<tr>
	<table align="center">    
    	<tr>
            <td width="335" height="155">    
                <table>
                	<tr>
   			 		
   			 	  	  <td id="comLabel">Employee No:</td>
		   	 		 <th width="215"><div align="left"><input name="empNo" type="text" size="10" id="tbxEmpNo" value="<?php echo $empNo; ?>"/>
		   	 		    <input type="submit" value="Fetch" name="fetch"/>
		   	 		  </th>
			 	  </tr>
                    <tr>
                      	<td id="comLabel">Employee Name:</td>
                        <td id="comTbx"><input type="text" size="50" name="empName" value="<?php echo $empName; ?>" id="tbxLeave"/></td>	
                        <td id="comLabel">Date:</td>
                        <td id="comTbx"><input type="date" size="50" name="date" value="<?php echo $date; ?>" id="tbxLeave"/></td>	
                    </tr>
                    <tr>
                      	<td id="comLabel">Position:</td>
                        <td id="comTbx"><input type="text" size="50" name="empPosition" value="<?php echo $empPosition; ?>" id="tbxLeave"/></td>	
                        <td id="comLabel">Branch/Unit:</td>
                        <td id="comTbx"><input type="text" size="50" name="empBranch" value="<?php echo $empBranch; ?>" id="tbxLeave"/></td>	
                    </tr>
                    <tr>
                      	<td id="comLabel">Rank:</td>
                        <td id="comTbx"><input type="text" size="50" name="empRank" value="<?php echo $empRank; ?>" id="tbxLeave"/></td>	
                    </tr>
                     <tr>
                      	<td/>
                      	<td id="comLabel2">Nature of Request: (Check 1 only)</td>
                        <td id="comLabel">Effective Date/s:</td>
                    </tr>
                    
                     <tr>
                     	<td/>
                       <td>
                            <table width="200">
                            <tr>
                                <td><input type="checkbox" size="50" name="sickLeave" value="Sick Leave"/></td>
                                <td id="comLabel2">Sick Leave</td>
                            </tr>	
                            </table>	
                       </td>	
                         <td id="comLabel">From:</td>
                        <td id="comTbx"><input type="date" size="50" name="dateFrom" value="<?php echo $dateFrom; ?>" id="tbxLeave"/></td>	
                    </tr>
                    
                    <tr>
                     <td/>
                       <td>
                            <table width="200">
                            <tr>
                                <td><input type="checkbox" size="50" name="maternityLeave" value="Maternity Leave"/></td>
                                <td id="comLabel2">Maternity Leave</td>
                            </tr>	
                            </table>	
                       </td>
                         <td id="comLabel">To:</td>
                        <td id="comTbx"><input type="text" size="50" name="dateTo" value="<?php echo $dateTo; ?>" id="tbxLeave"/></td>		
                    </tr>
                    
                    <tr>
                     <td/>
                       <td>
                            <table width="200">
                            <tr>
                                <td><input type="checkbox" size="50" name="paternityLeave" value="Paternity Leave"/></td>
                                <td id="comLabel2">Paternity Leave</td>                     
                            </tr>	
                            </table>	
                       </td>	
                         <td id="comLabel">Effective Hour/s:</td>
                    </tr>
                    
                    <tr>
                     <td/>
                       <td>
                            <table width="200">
                            <tr>
                                <td><input type="checkbox" size="50" name="vacationLeave" value="Scheduled Vacation Leave"/></td>
                                <td id="comLabel2">Scheduled Vacation Leave</td>
                            </tr>	
                            </table>	
                       </td>
                        <td id="comLabel">From:</td>
                        <td id="comTbx"><input type="text" size="50" name="hourFrom" value="<?php echo $hourFrom; ?>" id="tbxLeave"/></td>		
                    </tr>
                    
                     <tr>
                     <td/>
                       <td>
                            <table width="200">
                            <tr>
                                <td><input type="checkbox" size="50" name="leaveWithoutPay" value="Leave Without Pay"/></td>
                                <td id="comLabel2">Leave Without Pay</td>
                            </tr>	
                            </table>	
                       </td>	
                           <td id="comLabel">To:</td>
                        <td id="comTbx"><input type="text" size="50" name="hourTo" value="<?php echo $hourTo; ?>" id="tbxLeave"/></td>	
                    </tr>
                    
                     <tr>
                     <td/>
                       <td>
                            <table width="200">
                            <tr>
                                <td><input type="checkbox" size="50" name="undertime" value="Undertime"/></td>
                                <td id="comLabel2">Undertime</td>
                            </tr>	
                            </table>	
                       </td>	
                    </tr>
                    
                     <tr>
                     <td/>
                       <td>
                            <table width="200">
                            <tr>
                                <td><input type="checkbox" size="50" name="creditBack" value="Credit Back of Cancelled Leave/s for Official Reason/s"/></td>
                                <td id="comLabel2">Credit Back of Cancelled Leave/s for Official Reason/s</td>
                            </tr>	
                            </table>	
                       </td>	
                    </tr>
                    
                     <tr>
                     <td/>
                       <td>
                            <table width="200">
                            <tr>
                                <td><input type="checkbox" size="50" name="others" value="Others"/></td>
                                <td id="comLabel2">Others</td>
                            </tr>	
                            </table>	
                       </td>	
                    </tr>
                    
                     <tr>
                     <td/>
                       <td>
                            <table>
                            <tr>
                                <td><input type="text" size="50" name="othersDesc" value="<?php echo $othersDesc; ?>" id="tbxLeave"/></td>                            
                            </tr>	
                            </table>	
                       </td>	
                    </tr>
                    
                     <tr height="30">
                      	
                    </tr>
                  
                      <tr>
                      	<td id="comLabel">Leave Requested by:</td>
                        <td id="comTbx"><input type="text" size="50" name="leaveReqBy" value="<?php echo $leaveReqBy; ?>" id="tbxLeave"/></td>	
                    </tr>
                    <tr>
                     <td/>
                       <td>
                            <table width="200">
                            <tr>
                                <td><input type="checkbox" size="50" name="withPay"/></td>
                                <td id="comLabel2">With Pay</td>
                                
                                 <td><input type="checkbox" size="50" name="withoutPay"/></td>
                                <td id="comLabel2">Without Pay</td>
                            </tr>	
                            </table>	
                       </td>	
                    </tr>
                    
                     <tr>
                      	<td id="comLabel">Leave Credits:</td>
                        <td id="comTbx"><input type="text" size="50" name="leaveCredits" value="<?php echo $leaveCredits; ?>" id="tbxLeave"/></td>	
                    </tr>
                      <tr>
                      	<td id="comLabel">Leave Request:</td>
                        <td id="comTbx"><input type="text" size="50" name="leaveRequest" value="<?php echo $leaveRequest; ?>" id="tbxLeave"/></td>	
                    </tr>
                      <tr>
                      	<td id="comLabel">Leave Balance:</td>
                        <td id="comTbx"><input type="text" size="50" name="leaveBalance" value="<?php echo $leaveBalance; ?>" id="tbxLeave"/></td>	
                    </tr> 

                     <tr>
                      	<td id="comLabel">Posted By:</td>
                        <td id="comTbx"><input type="text" size="50" name="postedBy" value="<?php echo $postedBy; ?>" id="tbxLeave"/></td>	
                        <td id="comLabel">Date:</td>
                        <td id="comTbx"><input type="text" size="50" name="postedDate" value="<?php echo $postedDate; ?>" id="tbxLeave"/></td>	
                    </tr>
                   <tr>
                      	<td id="comLabel">Reviewed By:</td>
                        <td id="comTbx"><input type="text" size="50" name="companyId" value="<?php echo $employee; ?>" id="tbxLeave"/></td>	
                        <td id="comLabel">Date:</td>
                        <td id="comTbx"><input type="text" size="50" name="companyId" value="<?php echo $date; ?>" id="tbxLeave"/></td>	
                    </tr>
                     <tr>
                      	<td id="comLabel">Recommending Approval:</td>
                        <td id="comTbx"><input type="text" size="50" name="companyId" value="<?php echo $employee; ?>" id="tbxLeave"/></td>	
                        <td id="comLabel">Approved By:</td>
                        <td id="comTbx"><input type="text" size="50" name="companyId" value="<?php echo $date; ?>" id="tbxLeave"/></td>	
                    </tr>
               	</table>
           </td>
  		</tr>    
   </table>
   </table>
   </tr>
</table>

</form>

</body>
</html>
