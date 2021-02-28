function validar() {
    let name, phone, email, adress;

    name = document.getElementById('name-contact').value;
    phone = document.getElementById('phone-contact').value;
    email = document.getElementById('email-contact').value;
    adress = document.getElementById('adress-contact').value;

    var emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

    if (name === '' || !phone === '' ||  !email === '' || adress === ''){
        swal('Ups','you must fill all the fields','error');
        return false;
    }
    else if (!emailRegex.test(email)){
        swal('Ups','Invalid email','error');
        return false;
    }

}
