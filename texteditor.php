<html>
<head>
<script>
function iFrameOn(){
	richTextField.document.designMode = 'On';
}
function iBold(){
	richTextField.document.execCommand('bold',false,null); 
}
function iUnderline(){
	richTextField.document.execCommand('underline',false,null);
}
function iItalic(){
	richTextField.document.execCommand('italic',false,null); 
}
function iFontSize(){
	var size = prompt('Enter a size 1 - 7', '');
	richTextField.document.execCommand('FontSize',false,size);
}
function iForeColor(){
	var color = prompt('Define a basic color or apply a hexadecimal color code for advanced colors:', '');
	richTextField.document.execCommand('ForeColor',false,color);
}
function iHorizontalRule(){
	richTextField.document.execCommand('inserthorizontalrule',false,null);
}
function iUnorderedList(){
	richTextField.document.execCommand("InsertOrderedList", false,"newOL");
}
function iOrderedList(){
	richTextField.document.execCommand("InsertUnorderedList", false,"newUL");
}
function iLink(){
	var linkURL = prompt("Enter the URL for this link:", "http://"); 
	richTextField.document.execCommand("CreateLink", false, linkURL);
}
function iUnLink(){
	richTextField.document.execCommand("Unlink", false, null);
}
function iImage(){
	var imgSrc = prompt('Enter image location', '');
    if(imgSrc != null){
        richTextField.document.execCommand('insertimage', false, imgSrc); 
    }
}
function submit_form(){
	var theForm = document.getElementById("myform");
	theForm.elements["myTextArea"].value = window.frames['richTextField'].document.body.innerHTML;
	theForm.submit();
}
</script>
</head>
<body onLoad="iFrameOn();">

<form action="blog.php" name="myform" id="myform" method="post">

				<p>Blog Description:<br>
<div id="wysiwyg_cp" style="padding:8px; width:700px;">
  <input type="button" onClick="iBold()" value="B" style="height:30px; width:30px;color:white; background-color:black;"> 
  <input type="button" onClick="iUnderline()" value="U" style="height:30px; width:30px;color:white; background-color:black;">
  <input type="button" onClick="iItalic()" value="I" style="height:30px; width:30px;color:white; background-color:black;">
  <input type="button" onClick="iFontSize()" value="Text Size" style="height:30px; width:100px;color:white; background-color:black;">
  <input type="button" onClick="iForeColor()" value="Text Color" style="height:30px; width:100px;color:white; background-color:black;">
  <input type="button" onClick="iHorizontalRule()" value="HR" style="height:30px; width:30px;color:white; background-color:black;"> 
  <input type="button" onClick="iUnorderedList()" value="UL" style="height:30px; width:40px;color:white; background-color:black;">
  <input type="button" onClick="iOrderedList()" value="OL" style="height:30px; width:40px;color:white; background-color:black;">
 </div>
<!-- Hide(but keep)your normal textarea and place in the iFrame replacement for it -->
<textarea style="display:none;" name="myTextArea" id="myTextArea" cols="100" rows="14"></textarea>
<iframe name="richTextField" id="richTextField" style="border:#000000 1px solid; width:700px; height:300px;"></iframe>
<!-- End replacing your normal textarea -->
</p>

</form>