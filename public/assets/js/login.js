// validation form
const name = document.getElementById('name'),
    email = document.getElementById('email'),
    password = document.getElementById('password'),
    submitBtn = document.querySelector('.btn.btn-primary');
const messageName = "Tên phải chứa ít nhất 2 kí tự và nhiều nhất 30 kí tự",
    messageEmail = "Email không hợp lệ",
    messagePassword = "Mật khẩu gồm ít nhất 8 kí tự không cách";
// array to save all input to check, message show error of each and a string regex to check 
if(submitBtn) {
    const inputsToValidate = [
        { element: name, message: messageName, regex: /^[a-zA-Z0-9#@$&*!]{2,30}$/},
        { element: password, message: messagePassword, regex: /^[a-zA-Z0-9#@$&*!]{8,}$/},
        { element: email, message: messageEmail, regex: /^[^\s@]+@[^\s@]+\.[^\s@]{2,4}$/},
    ];
    
    // for each item in array input check when blur and when enter in input again clear show error
    inputsToValidate.forEach(function(item) {
        if(item.element) {
            item.element.addEventListener('blur', function() {
                checkInput(item.element, item.message, item.regex);
            })
            item.element.addEventListener('input', function() {
                const parentNode = item.element.parentElement;
                if(parentNode.querySelector('.message_error')) {
                    parentNode.querySelector('.message_error').innerHTML = "";
                }
            })
        }
    })
    
    // check error of element if no match with regex call function show error and return false
    // else return true and call function show success
    function checkInput(ele, message, regex) {
        let messageError = '';
        if(ele.value.trim() == "") {
            messageError = `${ele.name} là bắt buộc`;
        } else if(!ele.value.match(regex)) {
            messageError = message;
        } else {
            messageError = "";
        }
    
        if(messageError.trim().length != 0) {
            showErrorMessage(ele,messageError);
            return false;
        } else {
            handleSuccess(ele);
            return true;
        }
    }
    
    //  function show message on each input when have a error
    function showErrorMessage(element, message) {
        const parentNode = element.parentElement;
        const allSpan = parentNode.querySelector("span");
        if(allSpan) {
            parentNode.removeChild(allSpan);
        }
        const currentError = document.createElement('span');
        currentError.setAttribute('class', "message_error");
        currentError.innerText = message;
        parentNode.appendChild(currentError);
    }
    //  function handle message when input is valid
    function handleSuccess(element) {
        const parentNode = element.parentElement;
        const allSpan = parentNode.querySelector("span");
        if(allSpan) {
            parentNode.removeChild(allSpan);
        }
    }
    //  handle submit event check if all input pass. send data else not send
    submitBtn.addEventListener('click', function(e) {
        let isValid = true;
        inputsToValidate.forEach(function(item) {
            if(!checkInput(item.element, item.message, item.regex)){
                isValid = false;
            }
        });
        const passwordConfirm = document.querySelector('#confirm-password');
        if(password.value !=  passwordConfirm.value) {
            const parentNode = passwordConfirm.parentElement;
            const allSpan = parentNode.querySelector("span");
            if(allSpan) {
                parentNode.removeChild(allSpan);
            }
            const currentError = document.createElement('span');
            currentError.setAttribute('class', "message_error");
            currentError.innerText = "Xác nhận mật khẩu không hợp lệ";
            parentNode.appendChild(currentError);
            e.preventDefault();
        }
        if(!isValid) {
            e.preventDefault();
        }
    })
}