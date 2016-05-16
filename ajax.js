$("#form").validate();
$(document).ready(function () {
    $("#form").submit("click", function (e) {
        e.preventDefault();
        var name = $('.name').val();
        var email = $('.email').val();
        var url = $('.url').val();
        var text = $('.message').val();
        $.post("query.php", { userName: name, email: email, url: url, text:text}, function(data){
            $('#results').html(data);
	  });
    });
});


//document.querySelector('#file').addEventListener('change', function(e) {
//  var file = this.files[0];
//  var fd = new FormData();
//  fd.append("file", file);
//  var xhr = new XMLHttpRequest();
//  xhr.open('POST', 'upload.php', true);
//  
//  xhr.upload.onprogress = function(e) {
//    if (e.lengthComputable) {
//      var percentComplete = (e.loaded / e.total) * 100;
//      console.log(percentComplete + '% uploaded');
//    }
//  };
//  xhr.onload = function() {
//    if (this.status == 200) {
//      var resp = JSON.parse(this.response);
//      console.log('Server got:', resp);
//      var image = document.createElement('img');
//      image.src = resp.dataUrl;
//      document.body.appendChild(image);
//    };
//  };
//  xhr.send(fd);
//}, false);
//
