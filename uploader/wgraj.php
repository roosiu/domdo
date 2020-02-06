<html>
<head>
<<<<<<< HEAD
<link href="uploadfile.css" rel="stylesheet">
<script src="../js/jquery.min.js"></script>
=======
<script src="../js/jquery.min.js"></script>
<link href="uploadfile.css" rel="stylesheet">
>>>>>>> 5d0294d994e511bc0756624c54726a85f1a010f6
<script src="jquery.uploadfile.min.js"></script>
</head>
<body>
<div id="fileuploader">Upload</div>
<script>
$(document).ready(function() {
<<<<<<< HEAD
=======
	var subfolder = "test";  //// subfolder do download, upload, load, delete
>>>>>>> 5d0294d994e511bc0756624c54726a85f1a010f6
	$("#fileuploader").uploadFile({
		url:"upload.php",
		fileName:"myfile",
		returnType: "json",
<<<<<<< HEAD
=======
		formData: {"subfolder":subfolder}, ////subfolder np. id
>>>>>>> 5d0294d994e511bc0756624c54726a85f1a010f6
showDelete: true,
showDownload:true,
statusBarWidth:600,
dragdropWidth:600,
<<<<<<< HEAD
maxFileSize:200*1024,
=======
maxFileSize:5000*1024,
>>>>>>> 5d0294d994e511bc0756624c54726a85f1a010f6
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
<<<<<<< HEAD
uploadStr: "Pobierz",
=======
uploadStr: "Przeglądaj",
>>>>>>> 5d0294d994e511bc0756624c54726a85f1a010f6
deleteStr:"Usuń",
downloadStr:"Pobierz",
onLoad:function(obj)
   {
   	$.ajax({
	    	cache: false,
		    url: "load.php",
<<<<<<< HEAD
	    	dataType: "json",
=======
			dataType: "json",
			method      : "post",
			data: {"subfolder":subfolder}, /// subfolder
>>>>>>> 5d0294d994e511bc0756624c54726a85f1a010f6
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
<<<<<<< HEAD
        $.post("delete.php", {op: "delete",name: data[i]},
=======
        $.post("delete.php", {op: "delete",name: data[i], "subfolder":subfolder}, ///// subfolder
>>>>>>> 5d0294d994e511bc0756624c54726a85f1a010f6
            function (resp,textStatus, jqXHR) {
                //Show Message
                alert("File Deleted");
            });
    }
    pd.statusbar.hide(); //You choice.

},
downloadCallback:function(filename,pd)
	{
<<<<<<< HEAD
		location.href="../uploads/"+filename;
=======
		location.href="../uploads/"+subfolder+"/"+filename;
>>>>>>> 5d0294d994e511bc0756624c54726a85f1a010f6
	}
	});
});
</script>
</body>
</html>