@extends('layouts.app')

@section('titulo')
Resgistrate en Dev
@endsection

@section ('contenido')
    <div class="md:flex md:justify-center md:gap-4/2 md:items-center p-5">
        <div class="md:w-5/12 p-5" >
            <img src="{{ asset('img/registrar.jpg') }}" alt="Imagen
            registro de usuario ">   
        </div>
        <div class="md:w-4/12  bg-white p-6 rounded-lg shadow-xl">
            {{-- action es a donde queremos enviar la info del formulario --}}
            <form action="/crear-cuenta" method="post">
                @csrf
                <div class="md-5">
                    {{-- diseño del lavel --}}
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre
                    </label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        placeholder="Tu Nombre"
                        class="border p-3 w-full rounded-lg
                        @error ('name') border-red-500
                        @enderror"
                        value="{{ old('name') }}""
                        />
                    @error('name')
                    <p class="bg-red-500 text-white my-2 rounded-lg
                     text-sm p-2 text-center">{{$message}}</p>
                    @enderror

                </div>
                <br/>
                <div class="md-5">
                    {{-- diseño del lavel --}}
                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold">
                        Nombre de usuario
                    </label>
                    <input
                        id="username"
                        name="username"
                        type="text"
                        placeholder="Tu Nombre de Usuario"
                        class="border p-3 w-full rounded-lg"
                        />
                </div><br/>
                <div class="md-5">
                    {{-- diseño del lavel --}}
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input
                        id="email"
                        name="email"
                        type="text"
                        placeholder="Email de Registro"
                        class="border p-3 w-full rounded-lg"
                        />
                </div><br/>
                <div class="md-5">
                    {{-- diseño del lavel --}}
                    <label for="pass" class="mb-2 block uppercase text-gray-500 font-bold">
                        Contraseña
                    </label>
                    <input
                        id="pass"
                        name="pass"
                        type="password"
                        placeholder="Contraseña de Registro"
                        class="border p-3 w-full rounded-lg"
                        />
                </div><br/>
                <div class="md-5">
                    {{-- diseño del lavel --}}
                    <label for="password_confirmation" class="mb-2 block uppercase
                     text-gray-500 font-bold">
                        Repetir Contraseña
                    </label>
                    <input
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        placeholder="Repite la contraseña"
                        class="border p-3 w-full rounded-lg"
                        />
                </div>
                <br/>
                <input
                type="submit"
                value="Crear Cuenta"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                uppercase font-bold w-full p-3 text-white rounded-lg"

                />

            </form>    

        </div>
    </div>
@endsection