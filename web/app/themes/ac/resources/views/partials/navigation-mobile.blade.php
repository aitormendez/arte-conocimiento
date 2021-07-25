@if ($mobile_navigation)
  <ul class="leading-tight mobile lg:hidden">
    @foreach ($mobile_navigation as $item)
      @if ($item->children == false)
      <li class="my-menu-item {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }} font-bold" role="button">
        <div href="#" class="text-black">
          <a href="{{ $item->url }}" class="text-black">
            {{ $item->label }}
          </a>
        </div>
      </li>
      @else
      <li class="my-menu-item accordion-group {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }} font-bold" role="button">
        <div href="#" class="text-black accordion-menu">
          {{ $item->label }}
        </div>

        @if ($item->children)
          <ul class="h-0 overflow-hidden accordion-content">
            @foreach ($item->children as $child)
              <li class="my-3 {{ $child->classes ?? '' }} {{ $child->active ? 'active' : '' }} font-normal">
                <a href="{{ $child->url }}" class="text-black">
                  {{ $child->label }}
                </a>
              </li>
            @endforeach
          </ul>
        @endif
      </li>
      @endif
    @endforeach
  </ul>
@endif