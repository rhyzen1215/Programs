function NewApp() {

			var LoanID = document.getElementById("LoanNumber").value;
			var BorrowerNo = document.getElementById("BorrowerNo").value;
			
			var newWin = window.open("ApplicationForm.php?LoanID=" + LoanID + "&BorrowerNo=" + BorrowerNo + "", "name", "width=500, height=600, menubar=no, titlebar=no");
			}