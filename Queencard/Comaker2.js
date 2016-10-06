
function Comaker2() {
					
					var BorrowerName = document.getElementById("BName").value;
					var BorrowerName2 = document.getElementById("BrName").value;
					var BAdd = document.getElementById("BAdd").value;
					var CAdd1 = document.getElementById("BAdd1").value;
					
					var CNAME2 = document.getElementById("CNAME2").value;
					var CAGE2 = document.getElementById("CAGE2").value;
					var CSEX2 = document.getElementById("CSEX2").value;
					var CSTATUS2 = document.getElementById("CSTATUS2").value;
					var CADD2 = document.getElementById("CADD2").value;
					var CSPOUSE2 = document.getElementById("CSPOUSE2").value;
					var CTEL2 = document.getElementById("CTEL2").value;
					var CDEP2 = document.getElementById("CDEP2").value;
					var CCOMPADD2 = document.getElementById("CCOMPADD2").value;
					var COWNRES2 = document.getElementById("COWNRES2").value;
					var CRENTAL2 = document.getElementById("CRENTAL2").value;
					
					var CCOMP2 = document.getElementById("CCOMP2").value;
					var CSERVICE2 = document.getElementById("CSERVICE2").value;
					var CSAL2 = document.getElementById("CSAL2").value;
					var CPOS2 = document.getElementById("CPOS2").value;
					var CCURR2 = document.getElementById("CCURR2").value;
					var CSAV2 = document.getElementById("CSAV2").value;
					
					var COMREL2 = document.getElementById("COMREL2").value;
					var COMKNOWN2 = document.getElementById("COMKNOWN2").value;
					
					var TIN2 = document.getElementById("TIN2").value;
					var SSS2 = document.getElementById("SSS2").value;
					
					
					var TINSSS2 = "";
					if (TIN2 != "") { TINSSS2 = TIN2; }
					else { TINSSS2 = SSS2; }

					CADD2 = CADD2.substring(0,35);
					CCOMPADD4 = CCOMPADD2.substring(0,32);
					CCOMPADD3 = CCOMPADD2.substring(0,35);
					
					
					
					
					
					var month = new Array();
    				month[0] = "January";
    				month[1] = "February";
    				month[2] = "March";
    				month[3] = "April";
   					month[4] = "May";
    				month[5] = "June";
    				month[6] = "July";
    				month[7] = "August";
    				month[8] = "September";
    				month[9] = "October";
    				month[10] = "November";
    				month[11] = "December";
					var mdate = new Date();
    				var myMonth = month[mdate.getMonth()];
					var myDay = mdate.getDate();
					var myYear = mdate.getFullYear();
					
					var myDate = myMonth + " " + myDay + ", " + myYear; 
				

					var newWin = window.open("", "name", "width=800, height=700, menubar=no, titlebar=no");
					newWin.document.open();
					newWin.document.write("<style type='text/css'>");
				
					newWin.document.write("@media print {#Footer { display: none !important; }}");
					newWin.document.write("#Queencard {");
					newWin.document.write("font-family: 'Times New Roman', Times, serif; font-size:12px; font-weight: bold;");
					newWin.document.write("padding: 0px;");
					newWin.document.write("}");
					
					newWin.document.write("#Corproation {");
					newWin.document.write("font-family: 'Century Gothic'; font-size:14px; font-weight: bold;");
					newWin.document.write("padding: 0px;");
					newWin.document.write("}");
					
					newWin.document.write("p {");
					newWin.document.write("text-indent: 40px;");
					newWin.document.write("align: right;");
					newWin.document.write("}");
					
					
					newWin.document.write("#Address {");
					newWin.document.write("font-family: 'Times New Roman'; font-size:10px; font-weight: normal;");
					newWin.document.write("padding: 0px;");
					newWin.document.write("}");
					
					newWin.document.write("#UpperBody {");
					newWin.document.write("font-family: 'Times New Roman', Times, serif; font-size:12px; font-weight: normal;");
					newWin.document.write("padding: 0px;");
					newWin.document.write("}");
					
					newWin.document.write("#UpperBody2 {");
					newWin.document.write("font-family: 'Times New Roman', Times, serif; font-size:12px; font-weight: normal;");
					newWin.document.write("text-align: justify;");
					newWin.document.write("text-justify: inter-word;");
					newWin.document.write("padding: 0px;");
					newWin.document.write("}");
					
					newWin.document.write("#bb {");
     				newWin.document.write("border-bottom: 1px solid black !important;");
					newWin.document.write("font-family: 'Times New Roman', Times, serif; font-size:12px; font-weight: normal;");
					newWin.document.write("padding-left: 5px;");
    				newWin.document.write("}");
					
					newWin.document.write("#underL { text-decoration: underline;}");
					
					newWin.document.write("#BorrowerName {");
					newWin.document.write("font-family: 'Times New Roman', Times, serif; font-size:10px; font-weight: normal;");
					newWin.document.write("padding: 0px;");
					newWin.document.write("}");
					
					newWin.document.write("#tablemain {");
					newWin.document.write("border: 0px solid black; border-collapse: collapse;");
					newWin.document.write("font-family:'Century Gothic'; font-size:8px; font-weight: normal; border-spacing:inherit;")
					newWin.document.write("padding-left: 2px; padding-right: 2px; margin:0px; text-align: right; padding-top: 0px; padding-bottom: 0px")
					newWin.document.write("}");
					
					newWin.document.write("#tableTotal {");
					newWin.document.write("border: 1px; font-family:'Century Gothic'; font-size:10px; font-weight: bold; border-spacing:inherit;")
					newWin.document.write("padding-left: 2px; padding-right: 2px; margin: 2px; text-align: right; padding-top: 0px; padding-bottom: 0px")
					newWin.document.write("}");
					
					newWin.document.write("</style>");
					
					newWin.document.write("<table id='Queencard'>");
					newWin.document.write("<tr id='Queencard'><td id='Queencard' width='600' align='center'>QUEENCARD CORPORATION</td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table id='Queencard'>");
					newWin.document.write("<tr id='Queencard'><td id='Queencard' width='600' align='center'>Sky City Tower, Mapa Street, Iloilo City</td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td height='10'></td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='450'></td>");
					newWin.document.write("<td id='UpperBody' align='right' width='140'>" + myDate + "</td>");
					newWin.document.write("<tr><td height='20'></td></tr>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table id='Queencard'>");
					newWin.document.write("<tr id='Queencard'><td id='Queencard' width='600' align='center'>CO-MAKERS STATEMENT</td></tr>");
					newWin.document.write("<tr><td height='10'></td></tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody2' width='600'><p>I hereby agree to be the co-maker of applicant <label id='underL'>" + BorrowerName2.bold() + "</label> in signing the note that will evidence the loan he/she is applying for, if granted I am aware that in signing the note as a co-maker I become jointly and solidarily liable with the applicant. I am also aware that you will rely on the truth on the following statements in considering the credit risk relative to the requested loan of the above named applicant. </p></td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td height='10'></td></tr>");
					newWin.document.write("<tr id='UpperBody2'><td width='600' align='center'>(Kindly answer fully all questions below - if none state NONE)</td></tr>");
					newWin.document.write("<tr><td height='10'></td></tr>");
					newWin.document.write("</table>");
					

					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='60'>Name:</td>");
					newWin.document.write("<td id='bb' align='left' width='260'>" + CNAME2.bold() + "</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='20'>Age:</td>");
					newWin.document.write("<td id='bb' align='center' width='55'>" + CAGE2.bold() + "</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='20'>Sex:</td>");
					newWin.document.write("<td id='bb' align='center' width='55'>" + CSEX2.bold() + "</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='20'>Status:</td>");
					newWin.document.write("<td id='bb' align='center' width='55'>" + CSTATUS2.bold() + "</td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='60'>Residence:</td>");
					newWin.document.write("<td id='bb' align='left' width='260'>" + CADD2.bold() + "</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='100'>Name of Spouse:</td>");
					newWin.document.write("<td id='bb' align='center' width='160'>" + CSPOUSE2.bold() + "</td></tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='60'>Bus. Add.:</td>");
					newWin.document.write("<td id='bb' align='left' width='260'>" + CCOMPADD2.bold() + "</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='50'>Tel No.:</td>");
					newWin.document.write("<td id='bb' align='center' width='80'>" + CTEL2.bold() + "</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='100'>No. of Dependents:</td>");
					newWin.document.write("<td id='bb' align='center' width='20'>" + CDEP2.bold() + "</td></tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='150'>Do you own your residence:</td>");
					if (COWNRES1 == 1) {
						newWin.document.write("<td id='UpperBody' align='left' width='177'>[/]YES  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  [ ]NO</td>");
						newWin.document.write("<td id='UpperBody' align='left' width='110'>If not, monthly rental:</td>");
						newWin.document.write("<td id='bb' align='left' width='150'> NONE </td>");
						}
					else {
						newWin.document.write("<td id='UpperBody' align='left' width='177'>[ ]YES  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  [/]NO</td>");
						newWin.document.write("<td id='UpperBody' align='left' width='110'>If not, monthly rental:</td>");
						newWin.document.write("<td id='bb' align='left' width='150'> P " + CRENTAL2.bold() + "</td>");
						}
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='170'>Bank accounts where kept: Current:</td>");
					newWin.document.write("<td id='bb' align='left' width='150'></td>");
					newWin.document.write("<td id='UpperBody' align='left' width='60'>Savings:</td>");
					newWin.document.write("<td id='bb' align='left' width='200'> NONE </td>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='145'>Other Income: State Source:</td>");
					newWin.document.write("<td id='bb' align='left' width='445'></td>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td height='20'></td></tr>");
					newWin.document.write("<tr><td id='UpperBody' align='center' width='300'>IF EMPLOYED</td>");
					newWin.document.write("<td id='UpperBody' align='center' width='300'>IF IN BUSINESS FOR SELF</td>");
					newWin.document.write("<tr><td height='10'></td></tr>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='50'>Employer:</td>");
					newWin.document.write("<td id='bb' align='left' width='240'>" + CCOMP2.bold() + "</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='90'>Firm/Trade Name:</td>");
					newWin.document.write("<td id='bb' align='left' width='200'></td>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='90'>Length of Service:</td>");
					newWin.document.write("<td id='bb' align='left' width='200'>" + CSERVICE2.bold() + "</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='50'>Address:</td>");
					newWin.document.write("<td id='bb' align='left' width='240'></td>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='90'>Monthly Salary:</td>");
					newWin.document.write("<td id='bb' align='left' width='200'>" + CSAL2.bold() + "</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='100'>Nature of Business:</td>");
					newWin.document.write("<td id='bb' align='left' width='190'></td>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='50'>Position:</td>");
					newWin.document.write("<td id='bb' align='left' width='240'>" + CPOS2.bold() + "</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='120'>Sole Owner or Partner:</td>");
					newWin.document.write("<td id='bb' align='left' width='170'></td>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='50'>Address:</td>");
					newWin.document.write("<td id='bb' align='left' width='240'>" + CCOMPADD4.bold() + "</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='90'>Capital Invested:</td>");
					newWin.document.write("<td id='bb' align='left' width='200'></td>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td height='20'></td></tr>");
					newWin.document.write("<tr><td id='UpperBody' align='center' width='590'>OUTSTANDING OBLIGATIONS, IF ANY (AS PRINCIPAL OR GUARANTOR)</td>");
					newWin.document.write("<tr><td height='10'></td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='110'>Relation to Applicant::</td>");
					newWin.document.write("<td id='bb' align='left' width='180'>" + COMREL2.bold() + "</td>");
					newWin.document.write("<td id='UpperBody' align='left' width='160'>Length of time applicant known:</td>");
					newWin.document.write("<td id='bb' align='left' width='130'>" + COMKNOWN2.bold() + "</td>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td height='10'></td></tr>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody2' width='600'><p>The undersigned authorized the Firm to obtain such information as it may require concerning this application and agrees that this document shall remain the Firm's property whether or not the loan is granted.</p></td></tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td height='10'></td></tr>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody2' width='600'><p>The undersigned hereby certifies that the information stated is true and correct and agrees to notify the bank of any material change affecting any loan based on the information contained herein.</p></td></tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td height='10'></td></tr>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody2' width='600'><p>My Residence Certificates for the current year are as follows:</p></td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td height='10'></td></tr>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='10'>A</td>");
					newWin.document.write("<td id='bb' align='left' width='280'></td>");
					newWin.document.write("<td id='UpperBody' align='left' width='10'>B</td>");
					newWin.document.write("<td id='bb' align='left' width='280'></td>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='50'>Issued at</td>");
					newWin.document.write("<td id='bb' align='left' width='240'></td>");
					newWin.document.write("<td id='UpperBody' align='left' width='50'>Issued at</td>");
					newWin.document.write("<td id='bb' align='left' width='240'></td>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='10'>On</td>");
					newWin.document.write("<td id='bb' align='left' width='280'></td>");
					newWin.document.write("<td id='UpperBody' align='left' width='10'>On</td>");
					newWin.document.write("<td id='bb' align='left' width='270'></td>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td height='10'></td></tr>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='140'>TIN No./SSS No./GSIS No.</td>");
					newWin.document.write("<td id='bb' align='left' width='120'>" + TINSSS2.bold() + "</td>");
					newWin.document.write("<td id='UpperBody' align='left'>(if Residence Certificate not provided)</td>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td height='30'></td></tr>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='450'></td>");
					newWin.document.write("<td id='bb' align='left' width='140'></td>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' align='left' width='450'></td>");
					newWin.document.write("<td id='UpperBody' align='center' width='140'>Signature of Co-Maker</td>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
		
					

					newWin.document.close();
		}
