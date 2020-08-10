<section id="book">
    <div class="mask posabsolute"></div>
    <div class="bookContainer">
        <div class="main">
            <div class="headBg">
                <h2>رزرو کنید</h2>
                <p>{{ isset($options['reserve_desc']) ? $options['reserve_desc'] : '' }}</p>
            </div>
            <form action="{{ route("frontend.reserve") }}" method="post">
                {{ csrf_field() }}
                <input type="date" name="date" id="date">
                <input name="people_count" type="number"  class="bookSelect" placeholder="تعداد نفرات ( به عدد )">
                <input name="time" type="number" class="bookSelect" placeholder="ساعت رزرو ( به عدد )">
                <input type="submit" value="رزرو کنید" class="btn btnCream">
            </form>
        </div>
    </div>
</section>
