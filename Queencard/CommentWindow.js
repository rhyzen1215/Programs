function NewComment() {

			var LoanID = document.getElementById("LoanNumber").value;
			var MUser = document.getElementById("MUser").value;
			
			var newWin = window.open("AddComment.php?LoanID=" + LoanID + "&OffUser=" + MUser + "", "name", "width=400, height=350, menubar=no, titlebar=no, resizable=no, location=no");
			}