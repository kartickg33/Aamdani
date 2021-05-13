    <?php
    if(isset($_POST['footer'])){
        echo "hello";
    }
    ?>
    <div class = "footer" id="footer">
        <div class="footerleft">
            <h2>Aamdani</h2>
            <div class="footerlefttop">
                <img src="images/fb.png" alt="">
                <img src="images/twitter.png" alt="">
            </div>
            <div class="footerleftbottom">
                <img src="images/insta.png" alt="">
                <img src="images/whatsapp.png" alt="">
            </div>
        </div>
        <div class = "footercenter">
            <h2>Get In Touch</h2>
            <form action='' method="">
                <div class="footercentertop">
                    <input type="text" name="name" id = "footername" placeholder="Name"/>
                    <input type="text" name="email" id ="footermail" placeholder="Email ID"/>
                </div>
                <input type="text" name="message" id = "footermsg" placeholder="Your Message">
                <button type="submit" id="footerbutton" name='footer'>Send</button>
            </form>
        </div>
        <div class="footerright">
            <h2>Address</h2>
            <div class="footerrighttop">
                <p>B28, L-5,<br>Sakshi,<br>Jamshedpur - 831001</p>
            </div>
            <div class="footerrightcenter">
                <img src="images/circle-cropped.png" alt="">
                <p> <br>- 6666677777</p>
            </div>
            <br>
            <div class="footerrightbottom">
                <img src="images/gmail.png" alt="">
                <p> <br>- aamdani@gmail.com</p>
            </div>
        </div>
        <div class="footerbottom">
            <p>Copyright © 2020 Aamdani. All rights reserved</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script src="https://kit.fontawesome.com/42276ea553.js" crossorigin="anonymous"></script>