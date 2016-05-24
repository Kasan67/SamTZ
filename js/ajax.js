var image = null;

//таблица. Сортировка, поиск, пагинация
$(document).ready( function () {
    $('#myTable').DataTable({
        "info": false,
        "lengthChange": false,
        "columnDefs": [
    { "orderable": false, "targets": 2 }
  ]
    });
});


//Валидация формы отправки нового сообщения. 
$("#form").validate();
$(document).ready(function () {
    $("#form").submit("click", function (e) {
        e.preventDefault();
        var name = $('.name').val();
        var email = $('.email').val();
        var url = $('.url').val();
        var text = $('.message').val();
        //Ajax отправка данных на query.php 
        $.post("query.php", {
            userName: name,
            email: email,
            url: url,
            text: text
        }, function (data) {
            $('#results').html(data);
        });
    });
    
});

$('#file').change(function (img) {
    image = img.target.files[0];
    upload(image);
   
});

function upload(file) {
    if (!file || !file.type.match(/image.*/)) return;
    var fd = new FormData();
    var email = $('.email').val();
    fd.append("image", file);
    fd.append("name", email);
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "upload.php");
    xhr.send(fd);
}