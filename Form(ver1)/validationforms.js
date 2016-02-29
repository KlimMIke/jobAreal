function validate_form(){
    var form = document.form;

    if(!form.lastname.value.match(/\S\D/i)) {
        alert("Введите пожалуйста свою фамилию!");
        return false;
    }

    if(!form.firstname.value.match(/\S\D/i)) {
        alert("Введите пожалуйста свое имя!");
        return false;
    }

    if(!form.sex.value) {
        alert("Выберете пожалуйста свой пол!");
        return false;
    }

    if(!form.email.value.match(/\S\w+@\S\w+\.[a-z]{2,5}/i)) {
        alert("Введите пожалуйста свой e-mail");
        return false;
    }

    if(!form.phone.value.match(/\d/i)) {
        alert("Введите пожалуйста свой телефон!");
        return false;
    }


}