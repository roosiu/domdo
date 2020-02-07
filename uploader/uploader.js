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
				   //// dodawanie a href do podglądu
				   $("img[src$='"+(data[i]["path"])+"']").wrap("<a target='_blank' rel='noopener noreferrer' href='" + (data[i]["path"]) + "'>");
				 ///sprawdzanie rozszezenia pliku
				   extension = (data[i]["name"]).substr( ((data[i]["name"]).lastIndexOf('.') +1) );
				switch(extension) {
					case 'jpg':
					case 'jpeg':
					case 'png':
					case 'gif':
					case 'bmp':
					break;
					case 'mp3':
					case 'wav':
					case 'flac':
						$("img[src$='"+(data[i]["path"])+"']").attr("src", "img/icon/music.svg");

					 // There's was a typo in the example where
					break;                         // the alert ended with pdf instead of gif.
					case 'mp4':
					case 'avi':
					case 'mpg':
					case 'mpeg':
						$("img[src$='"+(data[i]["path"])+"']").attr("src", "img/icon/video.svg");

					 // There's was a typo in the example where
					break;                         // the alert ended with pdf instead of gif.
					case 'zip':
					case 'rar':

					break;
					case 'pdf':
						$("img[src$='"+(data[i]["path"])+"']").attr("src", "img/icon/pdf.svg");

					break;
					case 'xlsx':
					case 'xls':

						$("img[src$='"+(data[i]["path"])+"']").attr("src", "img/icon/excel.svg");
					break;
					case 'doc':
					case 'docx':
					case 'odt':

						$("img[src$='"+(data[i]["path"])+"']").attr("src", "img/icon/word.svg");
					break;
					case 'txt':
					case 'xml':
					case 'csv':
						$("img[src$='"+(data[i]["path"])+"']").attr("src", "img/icon/txt.svg");

					break;
					default:

						$("img[src$='"+(data[i]["path"])+"']").attr("src", "img/icon/unknow.svg");
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