<!-- aside start -->

<ul class="sidebar-menu rounded fw-bold p-4 txt-primary">
    @foreach($subcategories as $subcategory)
        <li><a href="{{ route('sub_category') }}">{{ $subcategory->name }}</a></li>
    @endforeach
    <div class="d-flex">
        <a href="{{ route('sub_category') }}" id="see-more-link" class="txt-primary d-inline-block mt-3 mx-auto"> See more Product </a>
    </div>
</ul>

<!-- aside end -->