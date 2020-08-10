<section id="contact">
    <div class="main">
        <div class="head">
            <h2>تماس با ما</h2>
            <p>{{ isset($options['contact_desc']) ? $options['contact_desc'] : '' }}</p>
        </div>
        <div class="contactContainer">
            <div class="map">
                <iframe
                    src="{{ isset($options['contact_google_address']) ? $options['contact_google_address'] : ''}}"
                    width="600" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="contactForm">
                <form action="" method="get">
                    <input type="text" name="name" id="name" placeholder="نام شما">
                    <input type="email" name="email" id="email" placeholder="ایمیل شما">
                    <input type="tel" name="tel" id="tel" placeholder="تلفن همراه ( اختیاری )">
                    <textarea name="msg" id="msg" placeholder="پیام شما"></textarea>
                    <input type="submit" value="ارسال پیام">
                </form>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</section>
