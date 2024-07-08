<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
    Empleados
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                    <div class="flex">
                        <div>
                            <p class="text-sm">{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            

            
            @if($isOpen)
                @include('livewire.Empleado.createempleado')
            @endif
    
            


<div class="relative overflow-x-auto  sm:rounded-lg">
    <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
        <div>
            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Nuevo</button>
        
        </div>
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input wire:model.live="search" type="text" id="table-search-users" class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Buscar...">
        </div>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
            <tr>
                
                <th scope="col" class="px-6 py-3">
                    No.
                </th>
                <th scope="col" class="px-6 py-3">
                    Empleado
                </th>
                <th scope="col" class="px-6 py-3">
                    Codigo
                </th>
                <th scope="col" class="px-6 py-3">
                Estado
                </th>
                <th scope="col" class="px-6 py-3">
                    DNI
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Apellido
                </th>
                <th scope="col" class="px-6 py-3">
                    Fecha Nacimiento
                </th>
                <th scope="col" class="px-6 py-3">
                    Sexo
                </th>
                <th scope="col" class="px-6 py-3">
                    Dirección
                </th>
                <th scope="col" class="px-6 py-3">
                    Telefono
                </th>
                <th scope="col" class="px-6 py-3">
                    Nacionalidad
                </th>
                <th scope="col" class="px-6 py-3">
                    Estado Civil
                </th>
                <th scope="col" class="px-6 py-3">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach($empleados as $empleado)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">{{ $empleado->id }}</th>
                        <th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                    <img class="w-10 h-10 rounded-full" src="https://th.bing.com/th/id/OIP.DyNgRQ_QqXuo818MZZqLyQAAAA?w=450&h=450&rs=1&pid=ImgDetMain" alt="Jese image">
                    <div class="ps-3">
                        <div class="text-base font-semibold">{{ $empleado->Nombre }} {{ $empleado->Apellido }}</div>
                        <div class="font-normal text-gray-500">{{ $empleado->Correo }}</div>
                    </div>  
                </th>               
                        <td class="px-6 py-4">{{ $empleado->CodigoEmpleado }}</td>
                        <td class="px-6 py-4">{{ $empleado->EstadoEmpleado }}</td>
                        <td class="px-6 py-4">{{ $empleado->DNI }}</td>
                        <td class="px-6 py-4">{{ $empleado->Nombre }}</td>
                        <td class="px-6 py-4">{{ $empleado->Apellido }}</td>
                        <td class="px-6 py-4">{{ $empleado->FechaNacimiento }}</td>
                        <td class="px-6 py-4">{{ $empleado->Sexo }}</td>
                        <td class="px-6 py-4">{{ $empleado->Direccion }}</td>
                        <td class="px-6 py-4">{{ $empleado->Telefono }}</td>
                        <td class="px-6 py-4">{{ $empleado->nacionalidad->NombreNacionalidad }}</td>
                        <td class="px-6 py-4">{{ $empleado->estadocivil->NombreEstadoCivil }}</td>
                        <td class="px-6 py-4">
                        <button wire:click="edit({{ $empleado->id }})" class="font-medium text-blue-600 hover:underline">Editar</button>
                            <button wire:click="delete({{ $empleado->id }})" class="font-medium text-red-600 hover:underline">Borrar</button>
                        </td>
                    </tr>
                    @endforeach
            
        </tbody>
    </table>
    <br>
    {{ $empleados->links()}}
    <br>
    </div>




        </div>
        
    </div>
    
</div>


