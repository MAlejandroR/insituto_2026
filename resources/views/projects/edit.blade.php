<x-layouts.layout>
    <!-- Session Status -->
    <div class="bg-gray-200 min-h-full flex justify-center items-center">
        <x-auth-session-status class="mb-4" :status="session('status')" />
        <form method="POST" class="bg-white p-5 rounded-2xl"
              action="{{ route('projects.update', $project->id) }}" >
            @csrf
            @method("PUT")

            <!-- Email Address -->
            <div>
                <x-input-label for="name" :value="__('Nombre')" />
                <x-text-input id="name" class="block mt-1 w-full"
                              type="text" name="name"
                              value="{{$project->name}}" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')" />

                <x-text-input id="description" class="block mt-1 w-full"
                              type="text"
                              name="description"
                              value="{{$project->description}}"
                              />

                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>
  <div class="mt-4">
                <x-input-label for="hours" :value="__('Horas')" />

                <x-text-input id="hours" class="block mt-1 w-full"
                              type="text"
                              name="hours"
                              value="{{$project->hours}}"
                              />

                <x-input-error :messages="$errors->get('hours')" class="mt-2" />
            </div>
            <div class="mt-4">
                <x-input-label for="starting_date" :value="__('Fecha de comienzo')" />

                <x-text-input id="starting_date" class="block mt-1 w-full"
                              type="date"
                              value="{{$project->starting_date}}"
                              name="starting_date"
                              />

                <x-input-error :messages="$errors->get('starting_date')" class="mt-2" />
            </div>





                <x-primary-button class="ms-3">
                    {{ __('Guardar') }}
                </x-primary-button>
            </div>
        </form>
    </div>

</x-layouts.layout>
