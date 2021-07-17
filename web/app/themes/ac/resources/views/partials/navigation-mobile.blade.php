@if ($mobile_navigation)
  <ul class="mobile md:hidden">
    @foreach ($mobile_navigation as $item)
      <li class="my-menu-item {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }} font-bold cerrado" role="button">
        <a href="#" class="text-black">
          {{ $item->label }}
        </a>

        @if ($item->children)
          <ul class="my-child-menu">
            @foreach ($item->children as $child)
              <li class="my-child-item {{ $child->classes ?? '' }} {{ $child->active ? 'active' : '' }} font-normal">
                <a href="{{ $child->url }}" class="text-black">
                  {{ $child->label }}
                </a>
              </li>
            @endforeach
          </ul>
        @endif
      </li>
    @endforeach
  </ul>
@endif