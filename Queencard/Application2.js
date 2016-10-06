

		function Application() {
					
					var StrtDate = document.getElementById("strDate").value;
					var DueDate1 = document.getElementById("strDate1").value;
					var DueDate2 = document.getElementById("strDate2").value;
					
					var AmortValue = document.getElementById("Amortz").value;
					var ProdCode = document.getElementById("ProductCode").value;
					var IntR = document.getElementById("IntRate").value;
					var LoanAmt = document.getElementById("LoanAmnt").value;
					var Trms = document.getElementById("LTerms").value;
					var TDeduct = document.getElementById("TotalD").value;
					var NetProc = document.getElementById("NetP").value;
					var CompName = document.getElementById("ComName").value;
					var PrdName = document.getElementById("ProdName").value;
					var LoanNo = document.getElementById("LoanNumber").value;
					var payFreq = document.getElementById("payFrequency").value;
					var BorrowerName = document.getElementById("BName").value;
					var BorrowerName2 = document.getElementById("BrName").value;
					var ComakerName1 = document.getElementById("comName1").value;
					var ComakerName2 = document.getElementById("comName2").value;
					var BSpouse = document.getElementById("BSpouse").value;
					var BAdd = document.getElementById("BAdd").value;
					var CAdd1 = document.getElementById("BAdd1").value;
					
					
					var DeductM = document.getElementById("DeductM").value;
					var SCharge = document.getElementById("ServCharge").value;
					var ProcFee = document.getElementById("ProcFee").value;
					var MRI = document.getElementById("MRI").value;
					var DocStamp = document.getElementById("DocStamp").value;
					var NotFee = document.getElementById("NotFee").value;
					var APL = document.getElementById("APLFee").value;
					var EIRS = document.getElementById("EIRSample").value;
					
					var PRDName = document.getElementById("PRDName").value;
					var ComName = document.getElementById("ComName").value;
					
					var BDATE = document.getElementById("BDATE").value;
					var BPLACE = document.getElementById("BPLACE").value;
					var CSTATUS = document.getElementById("CSTATUS").value;
					var SPOUSE = document.getElementById("SPOUSE").value;
					var RADD = document.getElementById("RADD").value;
					var TELNO = document.getElementById("TELNO").value;
					var EDUC = document.getElementById("EDUC").value;
					var RESOWN = document.getElementById("RESOWN").value;
					var DEPOSITOR = document.getElementById("DEPOSITOR").value;
					var BACCOUNT = document.getElementById("BACCOUNT").value;
					var LATESTBAL = document.getElementById("LATESTBAL").value;
					var EMPLOYER = document.getElementById("EMPLOYER").value;
					var SALARY = document.getElementById("SALARY").value;
					var POSITION = document.getElementById("POSITION").value;
					var EMPLOYER = document.getElementById("EMPLOYER").value;
					var COMPADD = document.getElementById("COMPADD").value;
					var SERVICE = document.getElementById("SERVICE").value;
					var STATUS = document.getElementById("STATUS").value;
					var NOCHILDREN = document.getElementById("NOCHILDREN").value;
					var SUBCODE = document.getElementById("subCode").value;
					
					
					var BDATE1 = new Date(BDATE);
					var BDATE2 = new Date();
					
					var myAge = BDATE2.getFullYear() - BDATE1.getFullYear();
					myAge = myAge + " years old";
					
					SERVICE = SERVICE + " years";
					LATESTBAL = parseFloat(LATESTBAL);
					LATESTBAL = LATESTBAL.toFixed(2);
					
					SALARY = parseFloat(SALARY);
					SALARY = SALARY.toFixed(2);

					var DimAmount = LoanAmt;
					var DimintRate = IntR;
    				var DimVarE = IntR;
    				var DimTerms = Trms;
    				var DimVarB = Trms;
    				DimintRate = DimintRate / 12;
    				var DimVar0 = DimintRate + 1;
    				var DimVar1 = DimVar0;
    				var DimVar2 = 0;
    				DimVar1 = DimVar1 / DimVar0;
	
	
					var centum = IntR * 100;
					centum = centum / 12;
					var InterestValue = IntR * 100;
					
					var LoanAmntValue = DigitConvert(DimAmount) + " (P" + DimAmount + ")";
					var TermValue = NumberConvert(Trms) + " (" + Trms + ")";
					var CentValue = NumberConvert(centum) + " (" + centum + " %)";
					InterestValue = NumberConvert(InterestValue) + " (" + InterestValue + " %)";
					
					
					
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
					
			
					
					var FCharge = parseFloat(ProcFee) + parseFloat(SCharge) + parseFloat(MRI);
					var FCharges =  FCharge.toFixed(2);
					
					var NSCharge =  parseFloat(DocStamp) + parseFloat(NotFee) + parseFloat(APL);
					NSCharge =  NSCharge.toFixed(2);
					
					var TCharge =  parseFloat(FCharge) + parseFloat(NSCharge);
					TCharge =  TCharge.toFixed(2);
					

		
				
					var newWin = window.open("", "name", "width=500, height=600, menubar=no, titlebar=no");
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
					newWin.document.write("align: right; font-size: 12px;");
					newWin.document.write("}");
					
					newWin.document.write("#bgImage {");
					newWin.document.write("width:200px; height: 71px; background-image:url(images/GretchSig.jpg);");
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
					newWin.document.write("padding-left: 10px;");
    				newWin.document.write("}");
	
					newWin.document.write("#underL { text-decoration: underline;}");
					
					newWin.document.write("#BorrowerName {");
					newWin.document.write("font-family: 'Times New Roman', Times, serif; font-size:10px; font-weight: normal;");
					newWin.document.write("padding: 0px;");
					newWin.document.write("}");
					
					newWin.document.write("#underWord {");
					newWin.document.write("text-decoration: underline;");
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
					
					newWin.document.write("<table>");
					newWin.document.write("<tr id='Queencard'><td id='Queencard' width='600' align='center'>QUEENCARD CORPRATION</td></tr>");
					newWin.document.write("<tr id='UpperBody'><td id='Queencard' width='600' align='center'>Sky City Tower, Mapa Street, Iloilo City</td></tr>");
					newWin.document.write("</table>");

					newWin.document.write("<table>");
					newWin.document.write("<tr><td height='10'></td>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' width='600'><p>I hereby apply for a &nbsp;<label id='underWord'>&nbsp;&nbsp;&nbsp;&nbsp; " + PRDName.bold() + " &nbsp;&nbsp;&nbsp;&nbsp;</label>&nbsp; of &nbsp;<label id='underWord'> &nbsp;&nbsp;&nbsp;&nbsp;" + LoanAmntValue.bold() + "&nbsp;&nbsp;&nbsp;&nbsp;</label>&nbsp; Philippine Currency, repayable in &nbsp; <label id='underWord'> &nbsp;&nbsp;&nbsp;&nbsp;" + TermValue.bold() + "&nbsp;&nbsp;&nbsp;&nbsp; </label>&nbsp; equal monthly payments at the rate of &nbsp; <label id='underWord'> &nbsp;&nbsp;&nbsp;&nbsp;" + CentValue.bold() + "&nbsp;&nbsp;&nbsp;&nbsp; </label>&nbsp; per centum, &nbsp; <label id='underWord'> &nbsp;&nbsp;&nbsp;&nbsp;" + InterestValue.bold() + "&nbsp;&nbsp;&nbsp;&nbsp; </label>&nbsp; per annum, subject to the conditions contained in the Promissory Note and other supporting documents, to be used as follows:</p></td></tr>");
					newWin.document.write("</table>");
					

					newWin.document.write("<table>");
					newWin.document.write("<tr><td height='10'></td></tr>");
					newWin.document.write("<tr><td id='UpperBody' width='600'><p>I hereby submit the following information, which I certify to be true and correct.</p></td></tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td height='10'></td></tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody' width='270' align='left'>Name: " + BorrowerName.bold() + "</td>");
					newWin.document.write("<td id='UpperBody' width='400' align='left'>Date and Place of Birth: " + BDATE.bold() + " " + BPLACE.bold() + "</td>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody' width='270'>Age: " + myAge.bold() + " &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Marital Status: " + CSTATUS.bold() +"</td>");
					newWin.document.write("<td id='UpperBody' width='400'>Name of Spouse: " + SPOUSE.bold() + "</td>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody' width='270'>No. of Children & Ages: " + NOCHILDREN.bold() +"</td>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody' width='500'>Residence Address: " + RADD.bold() +"</td>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody' width='270'>Telephone Number: " + TELNO.bold() +"</td>");
					newWin.document.write("<td id='UpperBody' width='400'>Educational Background:" + EDUC.bold() + "</td>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody' width='270'>Do you own your residence?: " + RESOWN.bold() +"</td>");
					newWin.document.write("<td id='UpperBody' width='400'>If not, monthly Rental:" + BACCOUNT.bold() + "</td>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody' width='270'>Are you a depositor of the bank?: " + DEPOSITOR.bold() +"</td>");
					newWin.document.write("<td id='UpperBody' width='400'>If yes, Account Number:" + BACCOUNT.bold() + "</td>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody' width='270'>Latest Balance: " + LATESTBAL.bold() +"</td>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody' width='400'>Name of Employer: " + EMPLOYER.bold() +"</td>");
					newWin.document.write("<td id='UpperBody' width='100'>Position:" + POSITION.bold() + "</td>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody' width='400'>Business Address: " + COMPADD.bold() +"</td>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody' width='200'>Length of Service: " + SERVICE.bold() +"</td>");
					newWin.document.write("<td id='UpperBody' width='200'>Employment Status: " + STATUS.bold() +"</td>");
					newWin.document.write("<td id='UpperBody' width='200'>Monthly Salary:" + SALARY.bold() + "</td>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody' width='600' align='left'><hr size='2' width='600' color='#666666'/></td>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='Queencard' width='550'>OUTSTANDING OBLIGATIONS</td>");
					newWin.document.write("</tr>");
					newWin.document.write("<tr><td height='20'></td></tr>");
					newWin.document.write("</table>");


					newWin.document.write("<table>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='Queencard' width='350'>SIGNED IN THE PRESENCE OF:</td>");
					newWin.document.write("<td id='Queencard' width='350'>RESPECTFULLY SUBMITTED:</td>");
					newWin.document.write("<tr><td height='20'></td></tr>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='bb' width='170'></td>");
					newWin.document.write("<td width='165'></td>");
					newWin.document.write("<td id='bb' width='170'></td></tr>");
					newWin.document.write("<tr><td id='bb' width='170'></td>");
					newWin.document.write("<td width='165'></td>");
					newWin.document.write("<td width='170' align='center'><font size='2'>Signature of Applicant</font></td></tr>");
					newWin.document.write("</table>");
					
					
					var Xword = "x&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;x";
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td height='20'></td></tr>");
					newWin.document.write("<tr><td id='Queencard' width='350'>REPUBLIC OF THE PHILIPPINES)</td></tr>");
					newWin.document.write("<tr><td id='Queencard' width='350'>ILOILO CITY &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;) S.S.</td></tr>");
					newWin.document.write("<tr><td width='50'><label id='underWord'>" + Xword.bold() + "</label></td>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");

					newWin.document.write("<table>");
					newWin.document.write("<tr><td height='10'></td></tr>");
					newWin.document.write("<tr><td id='UpperBody' width='600'><p>SUBSCRIBED AND SWORN TO before me this _____ day of ______________ at _______________ Philippines, affiant exhibiting to me his/her TIN or SSS No. _________________ issued at _______________ on _______________. </p></td></tr>");
					newWin.document.write("<tr><td height='10'></td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr>");
					newWin.document.write("<td id='UpperBody' width='600' align='left'><hr size='2' width='600' color='#666666'/></td>");
					newWin.document.write("</tr>");
					newWin.document.write("</table>");
					
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr id='Queencard'><td id='Queencard' width='600' align='center'>ACTION ON LOAN APPLICATION</td></tr>");
					newWin.document.write("<tr><td height='10'></td>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td id='UpperBody' width='600'><p>I hereby apply for a &nbsp;<label id='underWord'>&nbsp;&nbsp;&nbsp;&nbsp; " + PRDName.bold() + " &nbsp;&nbsp;&nbsp;&nbsp;</label>&nbsp; of &nbsp;<label id='underWord'> &nbsp;&nbsp;&nbsp;&nbsp;" + LoanAmntValue.bold() + "&nbsp;&nbsp;&nbsp;&nbsp;</label>&nbsp; Philippine Currency, repayable in &nbsp; <label id='underWord'> &nbsp;&nbsp;&nbsp;&nbsp;" + TermValue.bold() + "&nbsp;&nbsp;&nbsp;&nbsp; </label>&nbsp; equal monthly payments at the rate of &nbsp; <label id='underWord'> &nbsp;&nbsp;&nbsp;&nbsp;" + CentValue.bold() + "&nbsp;&nbsp;&nbsp;&nbsp; </label>&nbsp; per centum, &nbsp; <label id='underWord'> &nbsp;&nbsp;&nbsp;&nbsp;" + InterestValue.bold() + "&nbsp;&nbsp;&nbsp;&nbsp; </label>&nbsp; per annum, subject to the conditions contained in the Promissory Note and other supporting documents, to be used as follows:</p></td></tr>");
					newWin.document.write("</table>");
					
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td height='10'></td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td></td></tr>");
					newWin.document.write("<tr><td width='350'>></label></td>");
					newWin.document.write("<td id='Queencard' width='200' align='center'>QUEENCARD CORPORATION <img src='images/GretchSig.jpg' style='width:130px; height: 50px;' /></td></tr>");
					newWin.document.write("</table>");
					
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td></td></tr>");
					newWin.document.write("<tr><td width='350'>Date Approved: <label id='bb'><strong>" + myDate.bold() + "</strong></label></td></tr>");
					newWin.document.write("<tr><td width='350'><label id='bb'><strong>" + ProdCode + "</strong></label> Account No.<label id='bb'><strong>" + SUBCODE + "</strong></label></td></tr>");
					newWin.document.write("</table>");
					
				
					
					newWin.document.write("<table>");
					newWin.document.write("<tr><td height='20'></td></tr>");
					newWin.document.write("<tr id='Queencard'><td id='Queencard' width='600' align='center'>APPROVED BY:</td></tr>");
					newWin.document.write("</table>");
					
					newWin.document.close();
		}
