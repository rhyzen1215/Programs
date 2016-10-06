function DateSample() {
					
					
					var newWin = window.open("", "name", "width=800, height=700, menubar=no, titlebar=no");
					newWin.document.open();
					
					var StrtDate = "10/5/2016";
					var strDate = new Date(StrtDate);
					var strDay = strDate.getDate();
					var strMonth = (strDate.getMonth() + 2);
					var strYear = strDate.getFullYear();
					
				
					var endDate = new Date(strDate.getFullYear(), strDate.getMonth() + 2, 0);
					strMonth = strDate.getMonth() + 2;
					
					StrtDate = strMonth + "/" + strDay + "/" + strYear;
					strDate = new Date(StrtDate);
					newWin.document.write(strDate);
					newWin.document.write(endDate);

					newWin.document.close();
}// JavaScript Document