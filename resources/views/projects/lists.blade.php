<x-layouts.layout>
    <div class="overflow-x-auto h-96 w-1/2 ">
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
                    <td>Editar</td>
                    <td>
                        <form onsubmit ="confirmar" action="{{route("projects.destroy", $project->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-secondary"> Borrar</button>
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
            e.prevent.default
            const respuesta = confirm ("Seguro que quieres borrar");
            if (respuesta){
                const form = closest(form);
                form.submit();
            }
        }
    </script>
</x-layouts.layout>
