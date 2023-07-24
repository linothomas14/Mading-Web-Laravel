<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mading JeWePe | {{ $title }}</title>
    @vite('resources/css/app.css')
</head>

<body>

    @include('partials.header')
    <main class="flex justify-center ">
        <div class="flex flex-col items-center pt-10 w-4/5 mb-3" id="artikels">
            <!-- SEARCH BAR -->
            <form class="flex items-center w-96 mb-5">
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 " fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="simple-search"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  "
                        placeholder="Search" required>
                </div>
                <button type="submit"
                    class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 ">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </form>

            <!-- BUTTON TULIS ARTIKEL BARU -->
            @auth

            <a href="{{ route('artikel.add') }}" class="self-start mb-3">
                <button type="button" class=" bg-green-400 text-white py-2 px-3 rounded-md font-semibold">Tulis
                    artikel</button>
            </a>
            @endauth

            @foreach($artikels as $artikel)

            @php
            $explode_string = explode(".", $artikel->isi_artikel)
            @endphp
            <div class="pb-3 self-start rounded-md " id="artikel">
                <a href=" {{ route('artikel.detail', $artikel->id) }}">
                    <h1 class="text-3xl font-bold text-gray-700 mb-2">{{ $artikel->judul }}</h1>
                </a>
                <p class=" text-gray-400 mb-2 ">Author: {{$artikel->penulis}} -
                    {{$artikel->created_at->format('d/m/Y')}}
                </p>
                <p class="text-lg leading-relaxed text-gray-700 mb-3">{{ $explode_string[0] }}</p>

                @auth

                <form action="/artikel/{{$artikel->id}}" onclick="return confirm('yakin?');" method="POST">

                    @method('DELETE')

                    @csrf
                    <a>
                        <button
                            class=" px-4 py-2 mb-3 bg-red-400 border-2 text-white  rounded-lg hover:bg-white hover:text-red-500 hover:border-red-500 ">
                            Delete
                        </button>
                    </a>
                </form>


                @endauth
                <hr class="border-1">
            </div>

            @endforeach


        </div>
    </main>
    @include('partials.footer')

</body>

</html>
