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
        <div class="guide-info bg-darkblue w-[95%] p-2 flex items-center justify-center gap-3 m-auto rounded-t-lg">
            <div class="ping relative bg-[#63738A] w-[18px] h-[18px] rounded-full flex items-center justify-center">
              <div class="absolute w-[10px] h-[10px] bg-skyblue/70 rounded-full animate-ping"></div>
              <div class="w-[10px] h-[10px] bg-skyblue rounded-full"></div>
            </div>
            <p class="text-white text-sm mb-0">Disarankan untuk dibaca terlebih dahulu!</p>
        </div>
        <div class="guide bg-skyblue border border-slate-300 w-full flex flex-col lg:flex-row items-start pt-8 px-5 pb-5 rounded-lg">
            <div class="text px-5 w-full lg:w-1/3 text-paragraph">
                <h1 class="text-xl md:text-2xl font-bold mb-2 lg:mb-5">Panduan Pengguna</h1>
                <p class="mb-7 text-sm">Selamat datang di fitur Survei Preferensi aplikasi rekomendasi laptop kami! Fitur ini dirancang untuk membantu kamu dalam memilih laptop yang sesuai dengan kebutuhan dan preferensi kamu. Sebelum memulai, harap perhatikan panduan berikut:</p>
            </div>
            <div class="image w-full lg:w-1/3 rounded-lg my-4 lg:my-0">
                <img src="../src/img/guide-img.png" alt="Rekomendasi Laptop Terbaik!" class="w-[22rem] m-auto">
            </div>
            <div class="text px-5 w-full lg:w-1/3 text-paragraph">
              <h1 class="text-xl md:text-2xl font-bold mb-2 lg:mb-5">Jawab sesuai kebutuhan</h1>
              <p class="mb-7 text-sm">Mohon jawab pertanyaan sesuai dengan kebutuhan dan preferensi kamu untuk hasil survei yang lebih akurat. Hasilnya akan sangat bergantung pada jawaban yang kamu berikan</p>
            </div>
        </div>
      </div>
     </section>

     <!-- Button -->
     <section id="button">
        <div class="container mx-auto px-4 py-3 flex flex-row justify-between items-center lg:px-36 mt-5">
            <!-- Next -->
            <a href="./survey-1.php" class="py-3 px-8 bg-darkblue text-white w-full text-center gap-2 hover:bg-darkblue/80 rounded-lg">
                Lanjutkan
            </a>
        </div>
    </section>

    <!-- Main Js -->
    <script src="../src/js/script.js"></script>
</body>
</html>