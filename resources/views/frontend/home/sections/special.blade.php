<section id="specialities">
    <div class="mask posabsolute"></div>
    <div class="specialContainer">
        <div class="main">
            <div class="headBg">
                <h2>تخصص ما</h2>
                <p>{{ isset($options['special_desc']) ? $options['special_desc'] : '' }}</p>
            </div>
            <div class="specialContent">
                @foreach($specials as $special)
                    <div class="specialBox">
                        <a href="#"><img src="/img/{{ $special->file_name }}"></a>
                        <div class="spbFooter">
                            <span>{{ $special->name }}</span>
                            <span>{{ $special->price }} هزار تومان</span>
                            <div class="clear"></div>
                        </div>
                    </div>
                @endforeach
                <div class="clear"></div>
            </div>
        </div>
    </div>
</section>
