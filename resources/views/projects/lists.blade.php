<x-layouts.layout>
    <div class="overflow-x-auto h-96 w-1/2 ">
        @if (session("success"))
            <div role="alert" class="alert alert-success">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{session("success")}}</span>
            </div>
        @endif
            <a href="{{route("projects.create")}}">
                <button class="btn btn-primary">
                    Agregar Project
                </button>
            </a>

        <table class="table table-xs table-pin-rows table-pin-cols max-w-full">
            <thead>
            <tr>
                @foreach($fields as $field)
                    <th>{{$field}}</th>
                @endforeach
                <th></th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            @foreach($projects as $project)
                <tr>
                    <td>{{$project->name}}</td>
                    <td>{{$project->description}}</td>
                    <td>{{$project->hours}}</td>
                    <td>{{$project->starting_date}}</td>
                    <td>
                    <a href="{{route("projects.edit",$project->id)}}">
                        <button class=" btn btn-primary cursor-pointer">Editar</button>
                    </a>
                    </td>
                    <td>
                        <form  action="{{route("projects.destroy", $project->id)}}" method="POST">
{{--                        Esta es otra forma de especificiar la ruta
            <form  action="/projects/{{$projects->id}}" method="POST">
            --}}
                            @csrf
                            @method('DELETE')
                            <button onclick= confirmar(event)
                                        type=submit class="btn btn-sm btn-secondary"> Borrar</button>
                        </form>
                    </td>

                </tr>
            @endforeach
            {{--            contenido o filas (recursos)--}}
            </tbody>
        </table>
    </div>
    <script>
        function confirmar(e ){
            e.preventDefault();
            const button = e.currentTarget;
            const form = button.closest("form")
            Swal.fire({
                title:"Confirmar Borrado",
                text:"Seguro que quieres borrar",
                icon:"warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Si, borrar"
            })
                .then((response)=>{
                    if (response.isConfirmed){
                        form.submit();
                    }
                });

        }
    </script>
</x-layouts.layout>
