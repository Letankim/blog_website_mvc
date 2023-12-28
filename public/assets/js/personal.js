// show box change input
const boxChangeInformation = document.querySelector(".change-information-user"),
    boxChangePassword = document.querySelector(".change-password"),
    btnOpenChangeInformation = document.querySelector(".open-box-update-information"),
    btnOpenChangePassword = document.querySelector(".open-box-update-password");

if(btnOpenChangeInformation) {
    btnOpenChangeInformation.addEventListener('click', function() {
        if(boxChangePassword.classList.contains('active')) {
            boxChangePassword.classList.remove('active');
        }
        boxChangeInformation.classList.toggle('active');
    })
}
if(btnOpenChangePassword) {
    btnOpenChangePassword.addEventListener('click', function() {
        if(boxChangeInformation.classList.contains('active')) {
            boxChangeInformation.classList.remove('active');
        }
        boxChangePassword.classList.toggle('active');
    })
}
