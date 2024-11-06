<?php 
    include "../koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cari Laptop | Rekomendasi Laptop Terbaik!</title>
    <!-- Main Styles -->
    <link rel="stylesheet" href="../src/css/style.css">
    <link rel="stylesheet" href="../src/css/output.css">

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="../src/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../src/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../src/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="../src/img/favicon/site.webmanifest">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <style>
        .progress-bar::after {
          content: "";
          background-color: #b9cde9;
          height: 12px;
          width: 84%;
        }
    </style>

</head>
<body class="font-jakarta">
    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-30 bg-white border border-b-slate-300 w-full">
        <div class="container px-8 py-5 mx-auto flex flex-row justify-between items-center gap-5 lg:px-36">
            <!-- Back -->
            <a href="../index.php" class="py-2 px-0 lg:px-8 flex items-center gap-2 hover:underline">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill="none" stroke="#3f3e47" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="m6 8l-4 4m0 0l4 4m-4-4h20"/>
                </svg>
                <span>Kembali</span>
            </a>

            <!-- Heading -->
            <div>
                <h1 class="text-center font-bold text-xl">Survei Preferensi</h1>
            </div>
        </div>
    </nav>

    <!-- Guide Section -->
    <section id="guide">
      <div class="container mx-auto px-4 pt-28 lg:px-36">
        <div class="progress flex flex-row items-center mb-4">
            <div class="progress-bar bg-slate-200 w-[98%] h-3 flex justify-start gap-3 rounded-full overflow-hidden"></div>
            <p class="text-paragraph text-sm w-[2%] text-end">6/7</p>
        </div>
        <div class="guide bg-skyblue border border-slate-300 w-full flex flex-col items-start pt-8 px-5 pb-5 gap-5 rounded-lg">
            <div class="content w-full flex flex-col lg:flex-row items-start">
                <div class="text px-5 w-full lg:w-1/2 text-paragraph">
                    <h1 class="text-xl md:text-xl font-bold mb-2 lg:mb-5">Apakah ada jenis penyimpanan yang anda preferensikan?</h1>
                </div>
                <div class="option w-full lg:w-1/2 text-paragraph">
                    <form action="value-handler.php" method="POST">
                        <div class="space-y-3">
                            <label class="flex bg-gray-100 text-gray-700 rounded-md px-3 py-2 has-[:checked]:bg-darkblue has-[:checked]:text-white cursor-pointer">
                                <input type="radio" name="penyimpanan" class="hidden" value="ssd">
                                <span class="pl-2">SSD (lebih cepat)</span>
                            </label>
                            <label class="flex bg-gray-100 text-gray-700 rounded-md px-3 py-2 has-[:checked]:bg-darkblue has-[:checked]:text-white cursor-pointer">
                                <input type="radio" name="penyimpanan" class="hidden" value="hdd">
                                <span class="pl-2">HDD (lebih murah)</span>
                            </label>
                            <label class="flex bg-gray-100 text-gray-700 rounded-md px-3 py-2 has-[:checked]:bg-darkblue has-[:checked]:text-white cursor-pointer">
                                <input type="radio" name="penyimpanan" class="hidden" value="kombinasi">
                                <span class="pl-2">Kombinasi SSD + HDD</span>
                            </label>
                        </div>
                    </form>
                </div>
            </div>
            <div class="info bg-slate-400/40 flex flex-row items-center gap-3 w-full p-3 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-14 h-14 md:w-8 md:h-8 lg:w-5 lg:h-5" viewBox="0 0 24 24">
                    <path fill="#3f3e47" d="M11 17h2v-6h-2zm1-8q.425 0 .713-.288T13 8t-.288-.712T12 7t-.712.288T11 8t.288.713T12 9m0 13q-2.075 0-3.9-.788t-3.175-2.137T2.788 15.9T2 12t.788-3.9t2.137-3.175T8.1 2.788T12 2t3.9.788t3.175 2.137T21.213 8.1T22 12t-.788 3.9t-2.137 3.175t-3.175 2.138T12 22"/>
                </svg>
                <p class="text-xs md:text-sm text-paragraph">Jawab pertanyaan diatas sesuai dengan kebutuhan dan preferensi kamu, agar kami dapat memberikan rekomendasi yang tepat.</p>
            </div>
        </div>
      </div>
     </section>

     <!-- Button -->
     <section id="button">
        <div class="container mx-auto px-4 py-3 flex flex-row justify-between gap-5 items-center lg:px-36 mt-5">
            <!-- Next -->
            <a href="./survey-5.php" class="py-3 px-8 bg-white text-darkblue border border-darkblue w-1/2 text-center hover:bg-white/80 rounded-lg">
                Kembali
            </a>
            <a href="./survey-7.php" class="py-3 px-8 bg-darkblue text-white w-1/2 text-center hover:bg-darkblue/80 rounded-lg">
                Lanjutkan
            </a>
        </div>
    </section>

    <!-- Main Js -->
    <script src="../src/js/script.js"></script>
</body>
</html>