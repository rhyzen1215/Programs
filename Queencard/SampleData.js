	

		function SampleD() {
					

					var empno = "600-232";
					var sqltxt = "Select * From Loans where employeeno='600-232'";
					var Name1 = "Name"
				
					var newWin = window.open("", "name", "width=500, height=600, menubar=no, titlebar=no");
					newWin.document.open();

					newWin.document.write("<?Php");
					
					newWin.document.write("$conn = odbc_connect('QueencardData','sa','P@ssw0rd');");
					newWin.document.write("$sql=Select * From Loans where employeeno='600-232'");
					newWin.document.write("$rs=odbc_exec($conn,$sql);");
					newWin.document.write("while (odbc_fetch_row($rs))");
					newWin.document.write("{echo odbc_result($rs,"+ Name1 + "); }");
					newWin.document.write("?>");

					newWin.document.close();
		}
