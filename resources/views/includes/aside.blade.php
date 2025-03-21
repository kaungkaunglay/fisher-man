<!-- aside start -->
{{-- @dd($category) --}}
<ul class="sidebar-menu rounded fw-bold p-4 txt-primary">
    @if (Request::routeIs(patterns: 'category'))
        @foreach ($category->subCategories->take(9) as $subcategory)
            @if ($subcategory->isCategory($menu_category_id))
                <li>
                    <a href="{{ route('sub-category.show', $subcategory->id) }}" class="menu-category">
                        {{ $subcategory->name }}
                    </a>
                </li>
            @endif
        @endforeach
    @elseif(Request::routeIs(patterns: 'sub-category.show'))
        @foreach ($subCategories->take(9) as $subcategory)
            @if ($subcategory->isCategory($menu_category_id))
                <li>
                    <a href="{{ route('sub-category.show', $subcategory->id) }}" class="menu-category">
                        {{ $subcategory->name }}
                    </a>
                </li>
            @endif
        @endforeach
    @else
        @foreach ($subcategories->take(9) as $subcategory)
            <li><a href="{{ route('sub-category.show', $subcategory->id) }}">{{ $subcategory->name }}</a></li>
        @endforeach
    @endif

    <div class="d-flex">
        <a href="{{ route('sub-category.show', $subcategory->id) }}" id="see-more-link"
            class="txt-primary d-inline-block mt-3 mx-auto"> {{ trans_lang('see_more_product') }} </a>
    </div>
</ul>
<!-- aside end -->
