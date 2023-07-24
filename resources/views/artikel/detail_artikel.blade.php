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
    <main class="flex justify-center">
        <div class="flex flex-col items-start pt-10 w-4/5" id="artikels">
            <div class="py-3 self-start" id="artikel">
                <h1 class="text-4xl font-bold text-gray-900 mb-2">{{ $artikel->judul }}</h1>
                <p class=" text-gray-400  mb-2 ">Author: {{$artikel->penulis}} -
                    {{$artikel->created_at->format('d/m/Y')}}
                </p>
                <p class="text-lg leading-relaxed text-gray-700 mb-3">{{ $artikel->isi_artikel}}</p>

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
                <hr>
            </div>

            <form class="flex flex-col self-start w-1/3 mb-5 pb-4 border-b-2 " action="{{route('komentar.save')}}"
                method="post">
                @csrf
                <input type="hidden" name="artikel_id" value="{{$artikel->id}}">
                <label for="nama" class="block mb-2 text-sm font-medium text-gray-800 ">Nama</label>
                <input type="nama" id="nama" name="nama"
                    class="mb-2 bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    placeholder="Nama" required>
                <label for="email" class="block mb-2 text-sm font-medium text-gray-800 ">Email</label>
                <input type="email" id="email" name="email"
                    class="mb-2 bg-gray-50 border border-gray-300 text-gray-800 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 "
                    placeholder="Email" required>

                <label for="isi_komentar" class="block mb-2 text-sm font-medium text-gray-800 ">Tulis
                    Komentar</label>
                <textarea class="mb-3" name="isi_komentar" id="isi_komentar" rows="4"
                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  "
                    placeholder="Tulis komentar..."></textarea>
                <a href=" {{ route('komentar.save') }}">
                    <button class="bg-green-300 px-4 py-2 rounded-md" type="submit">Kirim</button>
                </a>
            </form>
            <h2 class="text-xl mb-3">Komentar({{count($komentars)}})</h2>

            <!-- FIELD KOMENTAR -->
            @foreach($komentars as $komentar)
            <div class="w-3/5 mb-5 bg-gray-100 rounded-md p-5">
                <h2 class="text-lg font-semibold" id="penulis_komentar">{{$komentar->nama}} | <span
                        class="text-gray-400 italic ">
                        {{$komentar->email}}
                    </span></h2>
                <p class="text-xs text-gray-400 mb-2">{{$komentar->created_at->format('d/m/Y')}}</p>
                <p id="isi_komentar">
                    {{$komentar->isi_komentar}}
                </p>
                @auth

                <form action="/komentar/{{$komentar->id}}" onclick="return confirm('yakin?');" method="POST">
                    @method('DELETE')

                    @csrf
                    <input type="hidden" name="artikel_id" value="{{$artikel->id}}">
                    <a>
                        <button
                            class=" px-4 py-2 text-xs mb-3 bg-red-400 border-2 text-white  rounded-lg hover:bg-white hover:text-red-500 hover:border-red-500 ">
                            Hapus Komentar
                        </button type='submit'>
                    </a>
                    @endauth
                    <hr class="mt-2">
            </div>

            @endforeach
        </div>

    </main>
    @include('partials.footer')

</body>

</html>
