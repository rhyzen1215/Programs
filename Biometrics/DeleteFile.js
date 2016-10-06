

		function FileDelete() {
					
					var EID = document.getElementById("EID").value;
					var FileName1 = document.getElementById("DocFile").value;
					EID = EID + FileName1;
					var txt;
    				var r = confirm("View Amortization Dates?");
    				if (r == true) {
        			document.location.href="DeleteFile.php?EID=" + EID + "";
    				}
		}
