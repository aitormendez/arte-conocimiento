@if ($navigation_desktop)
  <ul class="items-start hidden h-0 leading-tight desktop md:flex">
    @foreach ($navigation_desktop as $item)
      <li class="p-4 my-menu-item-desktop relative {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }} font-bold">
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
        <a href="#" class="text-black">
          {{ $item->label }}
        </a>
      </li>
    @endforeach
  </ul>
@endif
