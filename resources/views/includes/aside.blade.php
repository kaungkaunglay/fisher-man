<!-- aside start -->

<ul class="sidebar-menu rounded fw-bold p-4 txt-primary">
    @foreach($subcategories as $subcategory)
        <li><a href="{{ route('sub_category') }}">{{ $subcategory->name }}</a></li>
    @endforeach
    <a href="{{ route('sub_category') }}" id="see-more-link" class="txt-primary mt-3 text-center">&lt;&lt; See more Product &gt;&gt;</a>
</ul>

<!-- aside end -->