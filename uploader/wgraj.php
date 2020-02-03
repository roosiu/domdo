<html>
<head>
<link href="uploadfile.css" rel="stylesheet">
<script src="../js/jquery.min.js"></script>
<script src="jquery.uploadfile.min.js"></script>
</head>
<body>
<div id="fileuploader">Upload</div>
<script>
$(document).ready(function() {
	$("#fileuploader").uploadFile({
		url:"upload.php",
		fileName:"myfile",
		returnType: "json",
showDelete: true,
showDownload:true,
statusBarWidth:600,
dragdropWidth:600,
maxFileSize:200*1024,
showPreview:true,
previewHeight: "100px",
previewWidth: "100px",
	dragDropStr: "<span> <b> Przeciągnij i upuść pliki </b> </span>",
abortStr: "anuluj",
cancelStr: "anuluj",
doneStr: "gotowe",
multiDragErrorStr: "Wiele plików Drag & Drop jest niedozwolonych.",
extErrorStr: "nie jest dozwolone. Dozwolone rozszerzenia:",
sizeErrorStr: "nie jest dozwolony. Maksymalny dozwolony rozmiar:",
uploadErrorStr: "Przesyłanie nie jest dozwolone",
uploadStr: "Pobierz",
deleteStr:"Usuń",
downloadStr:"Pobierz",
onLoad:function(obj)
   {
   	$.ajax({
	    	cache: false,
		    url: "load.php",
	    	dataType: "json",
		    success: function(data)
		    {
			    for(var i=0;i<data.length;i++)
   	    	{
       			obj.createProgress(data[i]["name"],data[i]["path"],data[i]["size"]);
       		}
	        }
		});
  },
deleteCallback: function (data, pd) {
    for (var i = 0; i < data.length; i++) {
        $.post("delete.php", {op: "delete",name: data[i]},
            function (resp,textStatus, jqXHR) {
                //Show Message
                alert("File Deleted");
            });
    }
    pd.statusbar.hide(); //You choice.

},
downloadCallback:function(filename,pd)
	{
		location.href="../uploads/"+filename;
	}
	});
});
</script>
</body>
</html>