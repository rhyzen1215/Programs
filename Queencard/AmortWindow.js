function NewAmort() {

			var LoanID = document.getElementById("LoanNumber").value;
			var BorrowerNo = document.getElementById("BorrowerNo").value;

    		var r1 = confirm("View Amortization Dates?");
		
			var newWin = window.open("Amortization.php?LoanID=" + LoanID + "&AmortDates=" + r1 + "", "name", "width=500, height=600, menubar=no, titlebar=no");
			}