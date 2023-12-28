<?php
function footer() {
    echo "
    <div class='contact'>
        <div class='container'>
            <div class='row'>
                <div class='box-contact-title col-12 col-md-2 col-lg-2'>
                    <h3>Liên hệ </h3>
                    <h3>Với tôi </h3>
                </div>
                <div class='card contact-card border-0 col-sm-12 col-md-10 col-lg-10 col-12'>           
                    <form class = 'form-contact' method='post' action='./trangchu.html'>
                        <div class='group-contact'>
                            <div class='mb-3 form-group'>
                                <input type='text' class='form-control' id='name' name = 'name' placeholder='Họ tên'>
                                <span class = 'message_error'></span>
                            </div>
                            <div class='mb-3 form-group'>
                              <input type='email' class='form-control' id='email'  name = 'email'  placeholder='Email'>
                              <span class = 'message_error'></span>
                            </div>
                            <div class='mb-3 form-group'>
                              <input type='tel' class='form-control' id='phone' name = 'phone'  placeholder='Số điện thoại'>
                              <span class = 'message_error'></span>
                            </div>
                        </div>
                        <div class='group-contact'>
                            <div class='mb-3 form-group display-flex-column'>
                                <textarea name='message' id='message' cols='30' rows='10' placeholder='Tin nhắn'></textarea>
                                <span class = 'message_error'></span>
                            </div>
                            <button name='send-message' type='submit' class='btn btn-primary btn-submit-contact'>Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<footer>
    <div class='box-footer'>
        <ul class='list-social'>
            <li class='item-social'>
                <a href='https://www.facebook.com/profile.php?id=100029561799951' class='social-link'>
                    <i class='bx bxl-facebook-circle'></i>
                </a>
            </li>
            <li class='item-social'>
                <a href='https://www.facebook.com/profile.php?id=100029561799951' class='social-link'>
                    <i class='bx bxl-twitter' ></i>
                </a>
            </li>
            <li class='item-social'>
                <a href='https://www.facebook.com/profile.php?id=100029561799951' class='social-link'>
                    <i class='bx bxl-instagram-alt' ></i>
                </a>
            </li>
        </ul>
        <p class='copyright'>&copy; 
        <script>
            const date = new Date();
            document.write(date.getFullYear());
        </script> 
        Copyright by Letankim</p>
    </div>
</footer>
<div class='back-to-top'>
    <i class='bx bx-chevron-up'></i>
</div>
<div class='dark-mode'>
    <div class='box-dark-mode' title='Dark mode'>
        <span class='change-btn'>
            <i class='bx bx-sun'></i>
        </span>
    </div>
</div>
<script src='./public/assets/js/validator.js'></script>
<script src='./public/assets/js/app.js'></script>
";
}
?>