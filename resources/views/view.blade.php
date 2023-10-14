@extends('layouts.app')

@section('title')
    Page Title
@endsection

@section('sidebar')
    @parent
    <p>this is append</p>
@endsection

@section('content')
    <p>this is content</p>
    <h1>{{ $name }}</h1>
    <h2>{{ time()  }}</h2>

    @if(count($json) === 0)
        <h1>JSON 无数据</h1>
    @elseif(count($json) > 0)
        <h1>JSON 有数据</h1>
    @endif

    @unless(false)
        unless 为 false 时显示数据
    @endunless

    @auth
        <h1>auth登录过</h1>
    @else
        <h1>auth登录没有过</h1>
    @endauth

{{--    @guest--}}
{{--        <h1>没有登录过</h1>--}}
{{--    @endguest--}}

    @foreach($json as $v)
        <div style="border: 1px solid red; margin-bottom: 12px">
            @if($loop -> first)
                this is first
            @endif
            @if($loop -> last)
                this is last
            @endif
            <p> {{ $loop->index }} {{ $loop -> iteration  }} {{ $loop -> remaining }} this value is {{ $v }}</p>
        </div>
    @endforeach

    @php
    echo '<h1>hello php</h1>'
    @endphp

@endsection

<script>
    const json = @json($json);
    console.log(json);
</script>
