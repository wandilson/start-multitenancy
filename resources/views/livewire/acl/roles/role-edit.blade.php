<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Função') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('roles') }}" class="border bg-blue-400 text-white rounded-md px-4 py-2 transition duration-500 ease select-none hover:text-white hover:bg-blue-400 focus:outline-none focus:shadow-outline">
                Voltar
            </a>
        </div>
        <br>

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">

                <form method="POST" wire:submit.prevent="update">
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-1/4 px-3 mb-6 md:mb-0">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-first-name">
                                Nome
                            </label>
                            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-1" wire:model="name" type="text" placeholder="Danielle">
                            @error('name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                        <div class="md:w-3/4 px-3">
                            <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                                Descrição
                            </label>
                            <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4 mb-1" wire:model="label" type="text" placeholder="Gates chimitt">
                            @error('label') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>
                    </div>

                    <button type="submit" class="border border-green-500 bg-green-500 text-white rounded-md py-2 px-4 mt-6 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
