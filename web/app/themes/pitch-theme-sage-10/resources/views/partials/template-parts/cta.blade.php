@if($item['link_title'])
  @switch($item['link_type'])
    @case('internal')
      <a href="{{ $item['link_internal_url'] }}" aria-label="{!! $item['link_title'] !!}" class="btn {{ $class }} {{ $item['link_additional_class'] }}"
         target="_{{ $item['link_target'] }}">
        <span>{!! $item['link_title'] !!}</span>
      </a>
      @break
    @case('external')
      <a href="{{ $item['link_external_url'] }}" aria-label="{!! $item['link_title'] !!}"  class="btn {{ $class }} {{ $item['link_additional_class'] }}"
         target="_{{ $item['link_target'] }}">
        <span>{!! $item['link_title'] !!}</span>
      </a>
      @break
    @case('pdf')
      <a href="{{ $item['link_file_url']['url'] }}" aria-label="{!! $item['link_title'] !!}" class="btn {{ $class }} {{ $item['link_additional_class'] }}"
         target="_blank">
        <span>{!! $item['link_title'] !!}</span>
      </a>
      @break
  @endswitch
@endif
