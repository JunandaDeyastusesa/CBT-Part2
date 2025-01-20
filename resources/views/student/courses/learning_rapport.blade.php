<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/output.css') }} " rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-poppins text-[#0A090B] px-5">
    <section id="content" class="flex w-full">
        {{-- <div id="sidebar"
            class="w-[270px] flex flex-col shrink-0 min-h-screen justify-between p-[30px] border-r border-[#EEEEEE] bg-[#FBFBFB]">
            <div class="w-full flex flex-col gap-[30px]">
                <a href="index.html" class="flex items-center justify-center">
                    <img src="{{ asset('/images/logo/logo.svg') }}" alt="logo">
                </a>
                <ul class="flex flex-col gap-3">
                    <li>
                        <h3 class="font-bold text-xs text-[#A5ABB2]">DAILY USE</h3>
                    </li>
                    <li>
                        <a href=""
                            class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
                            <div>
                                <img src="{{ asset('/images/icons/home-hashtag.svg') }}" alt="icon">
                            </div>
                            <p class="font-semibold transition-all duration-300 hover:text-white">Overview</p>
                        </a>
                    </li>
                    <li>
                        <a href=""
                            class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 bg-[#2B82FE] transition-all duration-300 hover:bg-[#2B82FE]">
                            <div>
                                <img src="{{ asset('/images/icons/note-favorite.svg') }}" alt="icon">
                            </div>
                            <p class="font-semibold text-white transition-all duration-300 hover:text-white">Courses</p>
                        </a>
                    </li>
                    <li>
                        <a href=""
                            class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
                            <div>
                                <img src="{{ asset('/images/icons/crown.svg') }}" alt="icon">
                            </div>
                            <p class="font-semibold transition-all duration-300 hover:text-white">Certificates</p>
                        </a>
                    </li>
                    <li>
                        <a href=""
                            class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
                            <div>
                                <img src="{{ asset('/images/icons/sms-tracking.svg') }}" alt="icon">
                            </div>
                            <p class="font-semibold transition-all duration-300 hover:text-white">Messages</p>
                            <div
                                class="notif w-5 h-5 flex shrink-0 rounded-full items-center justify-center bg-[#F6770B]">
                                <p class="font-bold text-[10px] leading-[15px] text-white">12</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href=""
                            class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
                            <div>
                                <img src="{{ asset('/images/icons/profile-2user.svg') }}" alt="icon">
                            </div>
                            <p class="font-semibold transition-all duration-300 hover:text-white">Portfolio</p>
                        </a>
                    </li>
                </ul>
                <ul class="flex flex-col gap-3">
                    <li>
                        <h3 class="font-bold text-xs text-[#A5ABB2]">OTHERS</h3>
                    </li>
                    <li>
                        <a href=""
                            class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
                            <div>
                                <img src="{{ asset('/images/icons/3dcube.svg') }}" alt="icon">
                            </div>
                            <p class="font-semibold transition-all duration-300 hover:text-white">Rewards</p>
                        </a>
                    </li>
                    <li>
                        <a href=""
                            class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
                            <div>
                                <img src="{{ asset('/images/icons/code.svg') }}" alt="icon">
                            </div>
                            <p class="font-semibold transition-all duration-300 hover:text-white">A.I Plugins</p>
                        </a>
                    </li>
                    <li>
                        <a href=""
                            class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
                            <div>
                                <img src="{{ asset('/images/icons/setting-2.svg') }}" alt="icon">
                            </div>
                            <p class="font-semibold transition-all duration-300 hover:text-white">Settings</p>
                        </a>
                    </li>
                    <li>
                        <a href="signin.html"
                            class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
                            <div>
                                <img src="{{ asset('/images/icons/security-safe.svg') }}" alt="icon">
                            </div>
                            <p class="font-semibold transition-all duration-300 hover:text-white">Logout</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Tambahkan overlay setelah sidebar -->
        <div id="overlay" class="fixed inset-0 bg-black opacity-50 hidden z-40"></div> --}}

        <!-- CONTENT  -->
        <div id="menu-content" class="flex flex-col w-full md:w-full lg:w-full pb-[30px]">
            <div class="nav flex justify-between p-5 border-b border-[#EEEEEE]">

                <!-- Menu Hamburger -->
                {{-- <button id="hamburger" class="md:hidden block p-4 focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg')}}" class="w-6 h-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button> --}}


                <div>
                    <a href="index.html" class="flex items-center justify-center">
                        <img class="w-[100px]" src="{{ asset('images/logo/Logo-Mec.png') }}" alt="logo">
                    </a>
                </div>
                <div class="flex items-center gap-[30px]">
                    <div class="flex gap-3 items-center">
                        <div class="flex flex-col text-right">
                            <p class="font-semibold">{{Auth::user()->name}}</p>
                        </div>
                        <div class="w-[46px] h-[46px]">
                            <img src="{{ asset('/images/photos/default-photo.svg') }}" alt="photo">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-10 px-5 mt-5">
                <div class="breadcrumb flex items-center gap-[30px] ml-auto bg-gray-200 p-2 rounded-xl hover:bg-[#ff9c9c] hover:text-black">
                    <a href="{{ route('dashboard.learning.index') }}" class="text-[#7F8190] hover:text-white">
                        < Kelas Saya</a>
                </div>
            </div>
            <div class="header px-5 text-center justify-between mt-5">
                <div class=" gap-6 px-5 items-center">
                    <div class="gap-5">
                        <h1 class="font-extrabold text-[24px] md:text-[30px] leading-[45px]">{{ $course->name }}</h1>
                    </div>
                </div>
                <div class="text-center mt-5">
                    <p
                        class="p-[16px_20px] mx-auto rounded-[10px] bg-[#06BC65] text-center font-bold text-lg text-white outline-[#06BC65] outline-dashed outline-[3px] outline-offset-[7px] w-[120px]">
                        {{ $totalScore }}
                    </p>
                </div>
            </div>

            <div class="result flex flex-col gap-5 mt-[50px] px-[20px]">
            @forelse ($studentAnswers as $answer)
                <div class="question-card w-full flex items-start justify-between p-4 border border-[#EEEEEE] rounded-[20px]">
                    <div class="flex flex-col gap-[6px] w-full">
                        <!-- Menampilkan pertanyaan jika tipe adalah text -->
                        <p class="font text-sm md:text-md {{ $answer->question->type == 'text' ? '' : 'hidden' }}">
                            {{ $answer->question->number }}. {{ $answer->question->question }}
                        </p>
                        
                        <!-- Menampilkan gambar pertanyaan jika tipe adalah image -->
                        <div id="image-preview-question" class="{{ $answer->question->type == 'image' ? 'flex justify-end' : 'hidden' }} relative w-full overflow-hidden peer-data-[empty=true]:border-[3px] peer-data-[empty=true]:border-dashed peer-data-[empty=true]:border-[#EEEEEE]">
                            <div class="relative file-preview z-10 w-full h-auto">
                                @if ($answer->question->question)
                                    <img src="{{ asset('storage/' . $answer->question->question) }}" class="thumbnail-icon w-auto h-auto max-h-[400px] object-contain" alt="thumbnail">
                                @endif
                            </div>
                        </div>
        
                        <!-- Menampilkan jawaban siswa -->
                        @php
                            $selectedAnswer = $answer->question->answers->where('id', $answer->answer_id)->first();
                        @endphp
                        <p class="font text-sm md:text-md p-[6px_10px] text-black font-medium">
                            Jawaban Siswa: {{ $selectedAnswer ? $selectedAnswer->answer : 'Tidak ada jawaban' }}
                        </p>
        
                        <hr class="my-2"> <!-- Garis horizontal pemisah -->
        
                        <!-- Menampilkan semua jawaban dari pertanyaan -->
                        <p class="font-bold text-sm md:text-md">Pembahasan:</p>
                        <ul class="list-disc pl-5">
                            @foreach ($answer->question->answers as $questionAnswer)
                                <li class="flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        @if ($questionAnswer->type == 'text')
                                            <span class="text-sm md:text-md">{{ $questionAnswer->answer }}</span>
                                        @elseif ($questionAnswer->type == 'image' && $questionAnswer->answer)
                                            <img class="w-[50px] h-[50px] object-cover" src="{{ asset('storage/' . $questionAnswer->answer) }}" alt="image-answer">
                                        @endif
                                    </div>
                                    <span class="ml-4 text-sm md:text-md">{{ $questionAnswer->score }}</span> <!-- Skor di sebelah kanan -->
                                </li>
                            @endforeach
                        </ul>
                    </div>
        
                    <!-- Menampilkan nilai setiap jawaban -->
                    <div class="flex items-center gap-[14px]">
                        <p class="{{ $selectedAnswer && $selectedAnswer->score > 0 ? 'bg-[#06BC65]' : 'bg-[#bc0606]' }} p-[6px_10px] text-white font-medium text-sm">
                            {{ $selectedAnswer ? $selectedAnswer->score : 0 }}
                        </p>
                    </div>
                </div>
            @empty
                <p>
                    Belum ada Jawabannya
                </p>
            @endforelse
        </div>
    </section>

    <!-- Javascript for Responsive Hamburger Menu -->
    <script>
        document.getElementById('hamburger').addEventListener('click', function(e) {
            var sidebar = document.getElementById('sidebar');
            var overlay = document.getElementById('overlay');

            sidebar.classList.toggle('active');

            // Tampilkan atau sembunyikan overlay dengan animasi
            if (overlay.classList.contains('show')) {
                overlay.classList.remove('show');
                setTimeout(function() {
                    overlay.style.display = 'none'; // Sembunyikan setelah animasi selesai
                }, 300); // Waktu sesuai dengan durasi transition (0.3s)
            } else {
                overlay.style.display = 'block'; // Tampilkan segera
                setTimeout(function() {
                    overlay.classList.add('show'); // Mulai animasi fade-in
                }, 0); // Penundaan kecil untuk memulai transisi
            }

            // Cegah event bubbling ke document saat hamburger diklik
            e.stopPropagation();
        });

        // Deteksi klik di luar sidebar dan tutup sidebar serta overlay
        document.addEventListener('click', function(e) {
            var sidebar = document.getElementById('sidebar');
            var overlay = document.getElementById('overlay');
            var isClickInsideSidebar = sidebar.contains(e.target);
            var isHamburgerClicked = document.getElementById('hamburger').contains(e.target);

            // Jika sidebar aktif dan klik terjadi di luar sidebar dan bukan hamburger
            if (sidebar.classList.contains('active') && !isClickInsideSidebar && !isHamburgerClicked) {
                sidebar.classList.remove('active');
                overlay.classList.remove('show');
                setTimeout(function() {
                    overlay.style.display = 'none';
                }, 300);
            }
        });

        // Tutup sidebar dan overlay jika overlay di klik
        document.getElementById('overlay').addEventListener('click', function() {
            var sidebar = document.getElementById('sidebar');
            var overlay = document.getElementById('overlay');

            sidebar.classList.remove('active');
            overlay.classList.remove('show');
            setTimeout(function() {
                overlay.style.display = 'none';
            }, 300);
        });
    </script>
    <script>
        function toggleMaxHeight(button) {
            const menuDropdown = button.parentElement;
            menuDropdown.classList.toggle('max-h-fit');
            menuDropdown.classList.toggle('shadow-[0_10px_16px_0_#0A090B0D]');
            menuDropdown.classList.toggle('z-10');
        }

        document.addEventListener('click', function(event) {
            const menuDropdowns = document.querySelectorAll('.menu-dropdown');
            const clickedInsideDropdown = Array.from(menuDropdowns).some(function(dropdown) {
                return dropdown.contains(event.target);
            });

            if (!clickedInsideDropdown) {
                menuDropdowns.forEach(function(dropdown) {
                    dropdown.classList.remove('max-h-fit');
                    dropdown.classList.remove('shadow-[0_10px_16px_0_#0A090B0D]');
                    dropdown.classList.remove('z-10');
                });
            }
        });
    </script>

</body>

</html>
