$(document).ready(function() {
	var subfolder = $("#id_z").val();  //// subfolder do download, upload, load, delete
	$("#fileuploader").uploadFile({
		url:"uploader/upload.php",
		fileName:"myfile",
		allowedTypes: "jpg,png,gif,doc,docx,pdf,odt,txt,jpeg,bmp,xls,xlsx,csv,xml,mp3,mp4,avi,wav,mpg,mpeg",
		acceptFiles: "image/*, text/plain, video/*, audio/*, .pdf, .doc, .docx, .odt, .xls, .xlsx, .csv, .xml",
		returnType: "json",
		formData: {"subfolder":subfolder}, ////subfolder np. id
showDelete: true,
showDownload:true,
statusBarWidth:135,
dragdropWidth:"auto",
maxFileSize:5000*1024,
showPreview:true,
previewHeight: "100px",
previewWidth: "100px",
	dragDropStr: "<span> <b><i class='fa fa-upload' aria-hidden='true'></i> Przeciągnij i upuść pliki </b> </span>",
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
onSuccess:function(files,data,xhr,pd)
{

},
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
				   extension = (data[i]["name"]).substr( ((data[i]["name"]).lastIndexOf('.') +1) );

				switch(extension) {
					case 'jpg':
					case 'png':
					case 'gif':

						alert('was jpg png gif');  // There's was a typo in the example where
					break;                         // the alert ended with pdf instead of gif.
					case 'zip':
					case 'rar':
						alert('was zip rar');
					break;
					case 'pdf':
						alert('was ghpdf');
						alert(data[i]["path"]);
						$('.ajax-file-upload-preview').find('img[src$="/'+data[i]["path"]+'"]').attr("src","https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg");
						///this.preview.attr("src","https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg");
					break;
					default:
						alert('who knows');
				}
				   $("div.ajax-file-upload-progress").remove();

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