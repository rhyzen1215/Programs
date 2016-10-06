

		function ViewCIF() {

					var Countr = document.getElementById("BrCount").value;
					var BrCode = document.getElementById("BranchCode2").value;
					
					var newWin = window.open("", "name", "width=500, height=600, menubar=no, titlebar=no");
					newWin.document.open();
					newWin.document.write("<style type='text/css'>");
					newWin.document.write("#tablemain {");
					newWin.document.write("border: 0px solid black; border-collapse: collapse;");
					newWin.document.write("font-family:'Century Gothic'; font-size:8px; font-weight: normal; border-spacing:inherit;")
					newWin.document.write("Spadding-left: 2px; padding-right: 2px; margin:2px; text-align: right; padding-top: 0px; padding-bottom: 0px")
					newWin.document.write("}");
					
					newWin.document.write("#tableTotal {");
					newWin.document.write("border: 0px; font-family:'Century Gothic'; font-size:10px; font-weight: bold; border-spacing:inherit;")
					newWin.document.write("Spadding-left: 2px; padding-right: 2px; margin: 2px; text-align: right; padding-top: 0px; padding-bottom: 0px")
					newWin.document.write("}");
					
					newWin.document.write("</style>");
					
					
					newWin.document.write("<?Php");
					newWin.document.write("include 'CIFconnect.php';");
					newWin.document.write("$BranchCode = $_REQUEST['BranchCode2'];");
					newWin.document.write("$sql1='SELECT * FROM CIF_UPLOAD where BranchCode = '.$BranchCode.'';");
					newWin.document.write("$rs1=odbc_exec($conn,$sql1);");
					newWin.document.write("while (odbc_fetch_row($rs1)) {");
					newWin.document.write("$Cntr = $Cntr + 1; }");	
					newWin.document.write("echo $BranchCode;");
					newWin.document.write("?>");

					newWin.document.write(BrCode);
					
				}


				function UpdateImages() {

					var Countr = document.getElementById("BrCount").value;
					var BrCode = document.getElementById("BranchCode2").value;
					
					var newWin = window.open("", "name", "width=200, height=400, menubar=no, titlebar=no");
					newWin.document.open();
					newWin.document.write("<style type='text/css'>");
					newWin.document.write("#tablemain {");
					newWin.document.write("border: 0px solid black; border-collapse: collapse;");
					newWin.document.write("font-family:'Century Gothic'; font-size:8px; font-weight: normal; border-spacing:inherit;")
					newWin.document.write("Spadding-left: 2px; padding-right: 2px; margin:2px; text-align: right; padding-top: 0px; padding-bottom: 0px")
					newWin.document.write("}");
					newWin.document.write("#tableTotal {");
					newWin.document.write("border: 0px; font-family:'Century Gothic'; font-size:10px; font-weight: bold; border-spacing:inherit;")
					newWin.document.write("Spadding-left: 2px; padding-right: 2px; margin: 2px; text-align: right; padding-top: 0px; padding-bottom: 0px")
					newWin.document.write("}");
					newWin.document.write("</style>");
				
  					newWin.document.write("var loadFileImg = function(event) {");
    				newWin.document.write("var reader = new FileReader();");
    				newWin.document.write("reader.onload = function(){");
      				newWin.document.write("var outputImg = document.getElementById('outputImg');");
      				newWin.document.write("outputImg.src = reader.result;};");
    				newWin.document.write("reader.readAsDataURL(event.target.files[0]);};");
					
					newWin.document.write("var loadFileSig = function(event) {");
    				newWin.document.write("var reader = new FileReader();");
    				newWin.document.write("reader.onload = function(){");
      				newWin.document.write("var outputSig = document.getElementById('outputSig');");
      				newWin.document.write("outputSig.src = reader.result;};");
    				newWin.document.write("reader.readAsDataURL(event.target.files[0]);};");
					
					
					
					newWin.document.write('<table width="750">');
					newWin.document.write('<tr>');
		newWin.document.write('<td width = "120" align="right" id="editCIF">Client Image:</td>');
		newWin.document.write('<td width = "120" align="left" id="editCIF"><input name="sm" id="sm" type="file" accept="image/*" onchange="loadFileImg(event)" value="browse" /></td>');
		newWin.document.write('<td width = "120" align="right" id="editCIF">Signature Image:</td>');
		newWin.document.write('<td width = "120" align="left" id="editCIF"><input name="sigFile" id="sigFile" type="file" accept="image/*" onchange="loadFileSig(event)" value="browse" /></td>');
		newWin.document.write('</tr>');
		
		newWin.document.write('<tr>');
		newWin.document.write('<td align="right" id="editCIF"></td>');
		newWin.document.write('<td><img id="outputImg" style=" max-width: 100px; max-height: 100px; border: medium;"/></td>');
		newWin.document.write('<td align="right" id="editCIF"></td>');
		newWin.document.write('<td><img id="outputSig" style=" max-width: 100px; max-height: 100px; border: medium;"/></td>');
		newWin.document.write('</tr>');
	
		newWin.document.write('</table>');
					
					
				}