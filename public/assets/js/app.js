let allBanner = document.querySelectorAll('.banner-item');
window.onload = function () {
    if (allBanner.length > 1) {
        setInterval(() => {
            changeSlideShow();
        },4000);
    }
}

const bannerBox = document.querySelector('.banners');
function changeSlideShow() {
    // set css
    const allBannerChange = document.querySelectorAll('.banner-item');
    bannerBox.appendChild(allBannerChange[0]);
}

const btnMenuInMobile = document.querySelector(".box-menu-in-mobile i");

if(btnMenuInMobile) {
    const menuInMobile = document.querySelector(".navigation");
    btnMenuInMobile.addEventListener('click', function() {
        menuInMobile.classList.toggle('active');
        if(menuInMobile.classList.contains('active')) {
            btnMenuInMobile.setAttribute('class', "bx bx-x");
        } else {
            btnMenuInMobile.setAttribute('class',"bx bx-menu");
        }
    })
}

// validation form
const name = document.getElementById('name'),
    email = document.getElementById('email'),
    phone = document.getElementById('phone'),
    comment = document.getElementById('message'),
    submitBtn = document.querySelector('.btn.btn-primary');
const messageName = "Tên phải chứa ít nhất 2 kí tự và nhiều nhất 30 kí tự",
    messageEmail = "Email không hợp lệ",
    messagePhone = "Số điện thoại không hợp lệ",
    messageComment = "Nội dung tin nhắn phải ít nhất 20 kí tự.";
// array to save all input to check, message show error of each and a string regex to check 
const inputsToValidate = [
    { element: name, message: messageName, regex: /^.{2,30}$/, type: "text"},
    { element: phone, message: messagePhone, regex: /^(0|\+84)[0-9]{9}$/, type: "text"},
    { element: email, message: messageEmail, regex: /^[^\s@]+@[^\s@]+\.[^\s@]{2,4}$/, type: "text"},
    { element: comment, message: messageComment, regex: /^.{20,}$/, type: "text"}
];
validation(inputsToValidate, submitBtn);

// change
function goToPost(card) {
    const link = card.querySelector(".link-hidden");
    link.click();
}
// back to top
let backTop = document.querySelector('.back-to-top');

if (backTop) {
    window.onscroll = function () {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            backTop.classList.add("active");
        } else {
            backTop.classList.remove("active");
        }
        if (window.innerHeight + window.scrollY >= document.body.offsetHeight) {
            backTop.style.color = "white";
        } else {
            backTop.style.color = "#000";
        }
    }
    backTop.onclick = function () {
        document.body.scrollIntoView({
            behavior: "smooth",
        });
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
}

// dard mode
const DARK_MODE_NAME = "TanKimBlog_isDark";
let btn_change = document.querySelector(".change-btn"),
    box_dark = document.querySelector(".box-dark-mode")
    icon_dark_mode = document.querySelector(".change-btn i"),
    body_web = document.querySelector("body");
//  check isDark
let getDark = JSON.parse(localStorage.getItem(DARK_MODE_NAME));
if(getDark == true) {
    box_dark.classList.toggle("active");
    body_web.classList.toggle("active");
    icon_dark_mode.setAttribute("class", "bx bx-sun");
}
btn_change.onclick = function() {
    box_dark.classList.toggle("active");
    body_web.classList.toggle("active");
    let isDark = false;
    if(box_dark.classList.contains("active")){
        isDark = true;
        icon_dark_mode.setAttribute("class", "bx bx-moon");
    } else {
        icon_dark_mode.setAttribute("class", "bx bx-sun");
    }
    localStorage.setItem(DARK_MODE_NAME, JSON.stringify(isDark));
}

