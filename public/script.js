
function openCloseNav() {
    var list = document.getElementById("menu-items");

    if (list.style.display === "none" ){
        list.style.display = "block";

    }else{
        list.style.display = "none";
    }
}

function confirmProfileDeletion(){
    swal({
        title: "Naozaj chcete vymazať profil?",
        icon: "warning",
        buttons: ["Zrušiť", "Áno,vymazať"],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                document.getElementById("delete-prof").click();
            } else {
                swal("Váš profil je v bezpečí :)","Profil sa nevymazal", "success");
            }
        });
}

function confirmBlogDeletion(id, element){

    swal({
        title: "Naozaj chcete vymazať tento blog?",
        icon: "warning",
        buttons: ["Zrušiť", "Áno,vymazať"],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: '?c=blog&a=delete&blogId=' + id,
                    method: 'GET',
                    success: function (result) {
                        $(element).closest('.box').remove();
                    },
                    error: function () {
                        swal("Pri mazani blogu vznikla chyba.","Blog sa nevymazal", "error");
                    }
                });
            } else {
                swal("Váš blog je v bezpečí :)","Blog sa nevymazal", "success");
            }
        });
}

function deleteProject(id, element){
    $.ajax({
        url: '?c=portfolio&a=deleteProject&id=' + id,
        method: 'GET',
        success: function (result) {
            $(element).closest('.grid-item').remove();
        },
        error: function () {
            alert("Pri mazaní projektu vznikla chyba!");
        }
    });
}

function deleteFile(id, element){
    $.ajax({
        url: '?c=portfolio&a=deleteFile&id=' + id,
        method: 'GET',
        success: function (result) {
            $(element).closest('.file').remove();
        },
        error: function () {
            alert("Pri mazaní projektu vznikla chyba!");
        }
    });
}

function addNew(url){
    var file_data = $('#project').prop('files')[0];
    var form_data = new FormData();
    form_data.append('project', file_data);
    var tit = document.getElementById('tit').value;
    $.ajax({
        url: url + '&title=' + tit,
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        method: 'POST',
        success: function(result){
            var div = document.createElement("div");
            div.innerHTML =
                '<div class="alert ale-success">\n' +
                '<span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span>\n'+
                '<p>Projekt sa úspešne pridal</p>\n'+
                '</div>\n';

            $("#pridaj").append(div);
            document.getElementById("myForm").reset();
        }
    });
}

function checkPassword(){

    var password = document.getElementById("reg-password-first").value;

    if (password.length !== 0){

        document.getElementById("err-title").innerHTML = "";

        if(!/[a-z]/.test(password)){
            document.getElementById("err-title").innerHTML = "Heslo musí obsahovať malé písmeno!";
        }
        if(!/[A-Z]/.test(password)){
            document.getElementById("err-title").innerHTML = "Heslo musí obsahovať veľké písmeno!";
        }

        if(!/[0-9]/.test(password)){
            document.getElementById("err-title").innerHTML = "Heslo musí obsahovať aspoň jedno číso!";
        }

        if(password.length < 8) {
            document.getElementById("err-title").innerHTML = "Heslo musí obsahovať aspoň 8 znakov!";
        }
    }else{
        document.getElementById("err-title").innerHTML = "";
    }
}