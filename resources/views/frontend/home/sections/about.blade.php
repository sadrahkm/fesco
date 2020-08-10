<section id="about">
    <div class="main">
        <div class="aboutContent">
            <div class="aboutText">
                <h2>درباره ما</h2>
                <p>{!!  isset($options['about_text']) ? nl2br($options['about_text']) : '' !!}</p>
            </div>
            <div class="aboutAside">
                <div class="contactBox">
                    <h3>تماس با ما</h3>
                    <p>{{ isset($options['header_contact_desc']) ? nl2br($options['header_contact_desc']) : '' }}</p>
                    <div class="address">
                        <span>آدرس</span>
                        <p>{{ isset($options['header_address']) ? nl2br($options['header_address']) : '' }}</p>
                        <a href="{{ isset($options['header_map_url']) ? nl2br($options['header_map_url']) : '' }}">نمایش نقشه</a>
                    </div>
                    <div class="openHours">
                        <span>ساعت های کاری</span>
                        <ul>
                            <li><span class="days">شنبه - دوشنبه</span><span
                                    class="hours">8.00 صبح - 12.00 ظهر</span></li>
                            <li><span class="days">سه شنبه - پنج شنبه</span><span
                                    class="hours">5.00 عصر -12.00  شب</span></li>
                        </ul>
                    </div>
                </div>
                <img
                    src="{{ isset($options['about_pic'])?\Illuminate\Support\Facades\URL::to('/').'/img/admin/'.$options['about_pic'] : '' }}"
                    alt="">
            </div>
            <div class="clear"></div>
        </div>
    </div>
</section>
<div class="clear"></div>
