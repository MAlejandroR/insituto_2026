<x-layouts.layout>
    <div class="max-h-screen flex  justify-center p-2">
    <div class="overflow-x-auto h-96 w-1/2 bg-green-50">
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{-- Traducimos el mensaje por si viene en clave de traducción --}}
                {{ __(session('success')) }}
            </div>
        @endif
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
                <tr class="hover:bg-gray-200">
                    <td>{{$project->name}}</td>
                    <td>{{$project->description}}</td>
                    <td>{{$project->hours}}</td>
                    <td>{{$project->starting_date}}</td>
                    <td>Editar</td>
                    <td>
                        <form action="{{route("projects.destroy", $project->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button onclick="confirmar(event)"  class="btn btn-sm btn-secondary"> Borrar</button>
                        </form>
                    </td>

                </tr>
            @endforeach
            {{--            contenido o filas (recursos)--}}
            </tbody>
        </table>
    </div>
    </div>
    <script>
        function confirmar(e){
            e.preventDefault();
            button = e.currentTarget;
            form = button.closest('form');
            Swal.fire({
                title: 'Estás seguro!',
                text: 'Confirmar borrar proyecto',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                // confirmButtonText: "Borrar!"
            }).then((result)=>{
                if (result.isConfirmed){
                    Swal.fire({
                        title:"Borrado",
                        text:"El usuario ha sido borrado",
                        icon:"success"
                    }).then(()=>form.submit());
                }
            })


        }
    </script>
</x-layouts.layout>
