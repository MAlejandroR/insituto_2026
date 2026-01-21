<header class="h-header bg-header flex justify-between items-center">
    <img src="{{ asset("img/logo.png") }}" alt="logo" class="max-h-full">
    <h1 class="text-4xl text-blue-900">{{__("GESTION DEL INSTITUTO")}}</h1>
    <div>
        <div>

            @auth
                <p>hola {{auth()->user()->name}}</p>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary cursor-pointer">{{__("Logout")}}</button>
                </form>
            @endauth
            @guest
                <div>
                    <a href="{{route("login")}}">
                        <button type="submit" class="btn btn-primary cursor-pointer">{{__("Login")}}</button>
                    </a>
                    <a href="{{route("register")}}">
                        <button type="submit" class="btn btn-primary cursor-pointer">{{__("Register")}}</button>
                    </a>
                    @endguest
                    <x-lang/>
                </div>
</header>
