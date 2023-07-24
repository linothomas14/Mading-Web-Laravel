<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite('resources/css/app.css')
    <title>Mading JeWePe | {{ $title }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="css/home.css" /> -->
</head>

<body>
    @include('partials.header')
    <main class="mt-32 mx-32 mb-40">
        <div class="flex pb-10 items-center border-b border-gray-200" id="hero">
            <div class="w-2/3">
                <h1 class="text-black text-4xl font-semibold mb-4">Mari membaca mading!</h1>
                <p class="max-w-2xl mb-5 text-xl leading-relaxed">Membaca mading bermanfaat dalam kehidupan sehari-hari.
                    Kita
                    akan mendapatkan informasi penting dan meningkatkan pengetahuan.<br> Jadi, luangkan waktumu untuk
                    membaca mading dan manfaatkan kegiatan ini untuk memperkaya pengalaman hidup kita.</p>

                <button
                    class="text-white text-xl bg-green-500 hover:bg-green-800 font-medium rounded-lg px-4 py-2 ">Baca
                    artikel 📝</button>
            </div>
            <div>
                <img src="img/hero.png" class="h-96" alt="Hero">
            </div>
        </div>
        <div class="flex justify-center" id="about">
            <div class="w-3/5 py-20">
                <h1 class="text-center font-semibold text-4xl text-gray-700 mb-5">Mading JeWePe</h1>
                <p class="text-xl text-justify leading-relaxed">Sekolah Tinggi JeWePe memiliki platform khusus untuk
                    siswa
                    menulis artikel
                    dari berbagai kategori. termasuk berita lingkungan sekolah, olahraga, hobi, dan berita terkini
                    lainnya. Update artikel baru setiap <span>Minggu pukul 19.00 WIB. </span></p>
            </div>
        </div>
    </main>

    @include('partials.footer')
</body>

</html>
