<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Usuários') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{ route('users.create') }}" class="border bg-blue-400 text-white rounded-md px-4 py-2 transition duration-500 ease select-none hover:text-white hover:bg-blue-400 focus:outline-none focus:shadow-outline">
                Novo Registro
            </a>
        </div>
        <br>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                            <div class="flex bg-white px-4 py-3 sm:px-6">
                                <div class="form-inputmt-1 mr-6 block">
                                    <select wire:model="totalPages" class="block mt-1 rounded-md bg-gray-100 border-transparent focus:border-gray-300 focus:bg-white focus:ring-0" name="totalPages" id="totalPages">
                                        <option value="5">05</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                    </select>
                                </div>

                                <input wire:model="search" type="text" name="search" id="search" 
                                    class="mt-1 block w-full rounded-md bg-gray-100 border-transparent focus:border-gray-300 focus:bg-white focus:ring-0" placeholder="Pesquisar...">

                                @if ($search !== '')
                                    <button wire:click="clear" class="form-input rounded-md shadow-sm mt-1 ml-6 block">X</button>
                                @endif
                            </div>


                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                <tr>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nome
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        E-mail
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Data de Cadastro
                                    </th>                                    
                                    <th scope="col" class="px-6 py-3 bg-gray-50">
                                        <span class="sr-only">Ações</span>
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    
                                    @foreach ($users as $user)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="">
                                                        <div class="text-sm font-medium font-bold text-gray-900 uppercase">
                                                            {{ $user->name }} {{ $user->last_name }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $user->email }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $user->created_at }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('users.edit', $user->id) }}" class="border border-blue-300 bg-blue-300 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-blue-400 focus:outline-none focus:shadow-outline">
                                                    Permissões
                                                </a>
                                                <a href="{{ route('users.edit', $user->id) }}" class="border border-yellow-300 bg-yellow-300 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-yellow-400 focus:outline-none focus:shadow-outline">
                                                    Editar
                                                </a>
                                                <a href="javascript:void(0)" wire:click.prevent="destroy({{ $user->id }})" onclick="confirm('Deseja realmente remover esse registro? Todos os dados relacionados serão removidos!') || event.stopImmediatePropagation()" class="border border-red-400 bg-red-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline">
                                                    Deletar
                                                </a>
                                            </td>
                                        </tr> 
                                    @endforeach

                    
                                <!-- More rows... -->
                                </tbody>
                            </table>

                            @if ($users->count())
                                <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                                    {{ $users->links() }}
                                </div>
                            @else
                                <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
                                    Não há resultados para a busca.
                                </div>
                            @endif
                            
                        </div>
                    </div>
                    </div>
                </div>
  
            </div>
        </div>
    </div>
</div>
