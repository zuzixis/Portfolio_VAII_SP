function openCloseNav() {
    var list = document.getElementById("menu-items");

    if (list.style.display === "none" ){
        list.style.display = "block";
        //document.getElementById("first-section").style.paddingTop = "300px";

    }else{
        list.style.display = "none";
        //document.getElementById("first-section").style.paddingTop = "0px";
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

function confirmBlogDeletion(id){
    swal({
        title: "Naozaj chcete vymazať tento blog?",
        icon: "warning",
        buttons: ["Zrušiť", "Áno,vymazať"],
        dangerMode: true,
    })
        .then((willDelete) => {
            if (willDelete) {
                document.getElementById("delete-blog").href="?c=blog&a=delete&blogId="+id;
                document.getElementById("delete-blog").click();
            } else {
                swal("Váš blog je v bezpečí :)","Blog sa nevymazal", "success");
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