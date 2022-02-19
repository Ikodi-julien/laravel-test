<a href="{{url($link)}}">
    <span class="link {{request()->is($link) ? 'is-active' : ''}}">{{$text}}</span>
</a>
