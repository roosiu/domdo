$(document).ready(function() {
	var subfolder = $("#id_z").val();  //// subfolder do download, upload, load, delete
	$("#fileuploader").uploadFile({
		url:"uploader/upload.php",
		fileName:"myfile",
		returnType: "json",
		formData: {"subfolder":subfolder}, ////subfolder np. id
showDelete: true,
showDownload:true,
statusBarWidth:600,
dragdropWidth:600,
maxFileSize:5000*1024,
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
uploadStr: "Przeglądaj",
deleteStr:"Usuń",
downloadStr:"Pobierz",
onLoad:function(obj)
   {
   	$.ajax({
	    	cache: false,
		    url: "uploader/load.php",
			dataType: "json",
			method      : "post",
			data: {"subfolder":subfolder}, /// subfolder
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
        $.post("uploader/delete.php", {op: "delete",name: data[i], "subfolder":subfolder}, ///// subfolder
            function (resp,textStatus, jqXHR) {
                //Show Message
                alert("File Deleted");
            });
    }
    pd.statusbar.hide(); //You choice.

},
downloadCallback:function(filename,pd)
	{
		location.href="uploads/"+subfolder+"/"+filename;
	}
	});
});