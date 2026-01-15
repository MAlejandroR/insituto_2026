<select onchange="window.location.href=this.value" class="bg-gray-300 p-2 m-2" name="lang" id="">
    <option value="" disabled selected>{{__("Selecciona idioma")}}</option>
    @foreach( config("languages") as $code => $content)
        <option value="{{route("set_lang", $code)}}">{{$content['name']}} {{$content['flag']}}</option>
{{--        <option value="/lang/{{$code}}">{{$content['name']}} {{$content['flag']}}</option>--}}
    @endforeach
</select>
