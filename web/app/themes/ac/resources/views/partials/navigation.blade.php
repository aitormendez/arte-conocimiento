@if ($navigation)
  <ul class="solapa">
    @foreach ($navigation as $item)
      <li class="my-menu-item {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }} font-bold">
        <a href="{{ $item->url }}">
          {{ $item->label }}
        </a>

        @if ($item->children)
          <ul class="my-child-menu">
            @foreach ($item->children as $child)
              <li class="my-child-item {{ $child->classes ?? '' }} {{ $child->active ? 'active' : '' }} font-normal">
                <a href="{{ $child->url }}">
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
