<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="javascript">

var httpObject = null;

// Get the HTTP Object
function getHTTPObject(){
   if (window.ActiveXObject) return new ActiveXObject("Microsoft.XMLHTTP");
   else if (window.XMLHttpRequest) return new XMLHttpRequest();
   else {
      alert("Your browser does not support AJAX.");
      return null;
   }
}   

// Change the value of the outputText field
function setOutput(){
   if(httpObject.readyState == 4){
      document.getElementById('div_result').innerHTML = httpObject.responseText;
   }
}

// Implement business logic
function loadSite(page){
   httpObject = getHTTPObject();

   if (httpObject != null) {
      if(page=="category")
         httpObject.open("GET", "./category_list.php", true);
      else if(page =="product")
         httpObject.open("GET", "./product_list.php", true);
      httpObject.send(null);
      httpObject.onreadystatechange = setOutput;
   }
}
</script>
</head>
<body>
<table border=1 width="80%" height="50%" align="center">
	<tr>
		<td><a href="#" onClick="loadSite('category');">Categoey</a><br>
		<a href="#" onClick="loadSite('product');">Product</a></td>
		<td ><div id="div_result" ></div></td>
	</tr>
</table>
</body>
</html>
