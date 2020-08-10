<section id="menu">
    <div class="main">
        <div class="menuContainer">
            <div class="head">
                <h2>منوی رستوران</h2>
                <p>{{ isset($options['menu_desc']) ? $options['menu_desc'] : '' }}</p>
            </div>
            @foreach($categories as $category)
            <div class="collectionBox">
                <span class="collSubject">{{ $category->name }}</span>
                <ul>
                    @foreach($category->foods as $food)
                        <li data-foodid="{{ $food->id }}"
                            style="background-image: url('{{ \Illuminate\Support\Facades\URL::to("/") }}/img/{{ $food->file_name }}')">
                            <div class="foodInfo">
                                <h4>{{ $food->name }}</h4>
                                <p>{{ $food->compounds }}</p>
                            </div>
                            <span>{{ $food->price }} هزار تومان </span>
                        </li>
                    @endforeach
                </ul>
                <div class="clear"></div>
            </div>
            @endforeach
            <a href="{{ route('frontend.menu.index') }}">
                <button class="btn btnCream">نمایش همه منو</button>
            </a>
        </div>
    </div>
</section>
