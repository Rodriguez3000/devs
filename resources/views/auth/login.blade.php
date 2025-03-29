@extends('layouts.app')

@section('titulo')
Inicia Sesion en DevSta
@endsection

@section ('contenido')
    <div class="md:flex md:justify-center md:gap-4/2 md:items-center p-5">
        <div class="md:w-5/12 p-5" >
            <img src="{{ asset('img/login.jpg') }}" alt="Imagen
            login de usuario ">   
        </div>
        <div class="md:w-4/12  bg-white p-6 rounded-lg shadow-xl">
            {{-- action es a donde queremos enviar la info del formulario --}}
            <form method="POST" action="{{ route ('login')}}" novalidate>
                @csrf
                @if(session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg
                    text-sm p-2 text-center">
                    {{ session('mensaje')}}
                </p>
                @endif
                <div class="md-5">
                    {{-- diseño del lavel --}}
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">
                        Email
                    </label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        placeholder="Email de Registro"
                        class="border p-3 w-full rounded-lg
                        @error ('email') border-red-500
                        @enderror"
                        value="{{ old('email') }}"
                        />
                        @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg
                         text-sm p-2 text-center">{{$message}}</p>
                        @enderror
                </div><br/>
                <div class="md-5">
                    {{-- diseño del lavel --}}
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">
                        Contraseña
                    </label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="Contraseña de Registro"
                        class="border p-3 w-full rounded-lg
                        @error ('name') border-red-500
                        @enderror"
                        value="{{ old('name') }}"
                        />
                        @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg
                         text-sm p-2 text-center">{{$message}}</p>
                        @enderror
                </div><br/>
                <div class=mb-5>
                    <input type="checkbox" name="remember">
                        <label class="uppercase text-gray-500 text-sm">
                            Mantener sesión abierta
                        </label> 


                </div>
               
                <input
                type="submit"
                value="Iniciar Sesion"
                class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer
                uppercase font-bold w-full p-3 text-white rounded-lg"
                />

            </form>    

        </div>
    </div>
@endsection