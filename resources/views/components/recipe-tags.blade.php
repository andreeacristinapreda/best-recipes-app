@props(['tagsCsv'])

@php
  $tags = explode(',', $tagsCsv);
@endphp

<ul class="flex">
  @foreach($tags as $tag)
    @php $tag = strtolower(trim($tag)); @endphp
    <li class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs 
      {{request('tag') == $tag ? 'bg-green-500 text-white' : ''}}">
      <a href="{{url()->current()}}/?{{http_build_query(array_merge(request()->except('tag'), (request()->tag != $tag ? ['tag' => trim($tag)] : [])))}}">
        {{$tag}}
      </a>
    </li>
  @endforeach
</ul>