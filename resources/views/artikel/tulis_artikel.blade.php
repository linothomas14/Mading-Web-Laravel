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
        <div class=" pt-10 w-4/5" id="artikels">

            <form method="post" action="{{route('artikel.save')}}" class="mx-auto">
                @csrf
                <div class="mb-4 " style=" width: 50rem;">
                    <label for="penulis" class="block text-gray-700 text-sm font-bold mb-2">Penulis Artikel:</label>
                    <input type="text" id="penulis" name="penulis" required
                        class="w-full shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4 " style=" width: 50rem;">
                    <label for="judul" class="block text-gray-700 text-sm font-bold mb-2">Judul Artikel:</label>
                    <input type="text" id="judul" name="judul" required
                        class="w-full shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4 " style=" width: 50rem;">
                    <label for="isi_artikel" class="block text-gray-700 text-sm font-bold mb-2">Isi Artikel:</label>
                    <textarea id="isi_artikel" name="isi_artikel" rows="15" required
                        class="w-full shadow appearance-none border rounded  py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                </div>
                <!-- <input type="text" name="judul" id="judul"> -->

                <button type="submit" class="p-10 bg-green-400  text-white font-bold py-2 px-4 rounded ">
                    Submit

            </form>
        </div>
    </main>
    @include('partials.footer')

</body>

</html>
