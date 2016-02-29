function validate_form(){
    var form = document.form;

    if(!form.lastname.value.match(/\S\D/i)) {
        document.getElementById("lastname_err").className = "errorValid show";
        document.getElementById("lastname_err").innerHTML = "Введите пожалуйста свою фамилию!";
        return false;
    }
    if(form.lastname.value.match(/\S\D/i)) {
        document.getElementById("lastname_err").className = "errorValid";
    }

    if(!form.firstname.value.match(/\S\D/i)) {
        document.getElementById("firstname_err").className = "errorValid show";
        document.getElementById("firstname_err").innerHTML = "Введите пожалуйста своё имя!";
        return false;
    }
    if(form.firstname.value.match(/\S\D/i)) {
        document.getElementById("firstname_err").className = "errorValid";
    }

    if(!form.sex.value) {
        document.getElementById("sex_err").className = "errorValid show";
        document.getElementById("sex_err").innerHTML = "Введите пожалуйста своё пол!";
        return false;
    }
    if(form.sex.value) {
        document.getElementById("sex_err").className = "errorValid";
    }

    if(!form.email.value.match(/\S\w+@\S\w+\.[a-z]{2,5}/i)) {
        document.getElementById("email_err").className = "errorValid show";
        document.getElementById("email_err").innerHTML = "Введите пожалуйста свой email!";
        return false;
    }
    if(form.email.value.match(/\S\w+@\S\w+\.[a-z]{2,5}/i)) {
        document.getElementById("email_err").className = "errorValid";
    }

    if(!form.phone.value.match(/\d/i)) {
        document.getElementById("phone_err").className = "errorValid show";
        document.getElementById("phone_err").innerHTML = "Введите пожалуйста свой контактный телефон!";
        return false;
    }
    if(form.phone.value.match(/\d/i)) {
        document.getElementById("phone_err").className = "errorValid";
    }
}