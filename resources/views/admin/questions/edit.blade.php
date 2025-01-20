<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/output.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />
</head>

<body class="font-poppins text-[#0A090B]">
    <section id="content" class="flex">
        <div id="sidebar"
            class="w-[270px] flex flex-col shrink-0 min-h-screen justify-between p-[30px] border-r border-[#EEEEEE] bg-[#FBFBFB]">
            <div class="w-full flex flex-col gap-[30px]">
                <a href="index.html" class="flex items-center justify-center">
                     <img class="w-[100px]" src="{{ asset('images/logo/logo-digisite.png') }}" alt="logo">
                </a>
                <ul class="flex flex-col gap-3">
                    <li>
                        <h3 class="font-bold text-xs text-[#A5ABB2]">DAILY USE</h3>
                    </li>
                    <!--<li>-->
                    <!--    <a href=""-->
                    <!--        class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">-->
                    <!--        <div>-->
                    <!--            <img src="{{ asset('/images/icons/home-hashtag.svg') }}" alt="icon">-->
                    <!--        </div>-->
                    <!--        <p class="font-semibold transition-all duration-300 hover:text-white">Overview</p>-->
                    <!--    </a>-->
                    <!--</li>-->
                    <li>
                        <a href="" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 bg-[#2B82FE] transition-all duration-300 hover:bg-[#2B82FE]">
                            <div>
                                <img src="{{asset('/images/icons/note-favorite.svg')}}" alt="icon">
                            </div>
                            <p class="font-semibold text-white transition-all duration-300 hover:text-white">Courses</p>
                        </a>
                    </li>
                    <li>
                        <a href="" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
                            <div>
                                <img src="{{asset('/images/icons/profile-2user.svg')}}" alt="icon">
                            </div>
                            <p class="font-semibold transition-all duration-300 hover:text-white">Students</p>
                        </a>
                    </li>
                    <li>
                        <a href="" class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
                            <div>
                                <img src="{{asset('/images/icons/chart-2.svg')}}" alt="icon">
                            </div>
                            <p class="font-semibold transition-all duration-300 hover:text-white">Analytics</p>
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="p-[10px_16px] flex items-center gap-[14px] rounded-full h-11 transition-all duration-300 hover:bg-[#2B82FE]">
                                <div>
                                    <img src="{{asset('images/icons/security-safe.svg')}}" alt="icon">
                                </div>
                                <p class="font-semibold transition-all duration-300 hover:text-white">Logout</p>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <div id="menu-content" class="flex flex-col w-full pb-[30px]">
            <div class="nav flex justify-between p-5 border-b border-[#EEEEEE]">
                <form
                    class="search flex items-center w-[400px] h-[52px] p-[10px_16px] rounded-full border border-[#EEEEEE]">
                    <input type="text"
                        class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none"
                        placeholder="Search by report, student, etc" name="search">
                    <button type="submit" class="ml-[10px] w-8 h-8 flex items-center justify-center">
                        <img src="{{ asset('/images/icons/search.svg') }}" alt="icon">
                    </button>
                </form>
                <div class="flex items-center gap-[30px]">
                    <div class="flex gap-[14px]">
                        <a href=""
                            class="w-[46px] h-[46px] flex shrink-0 items-center justify-center rounded-full border border-[#EEEEEE]">
                            <img src="{{ asset('/images/icons/receipt-text.svg') }}" alt="icon">
                        </a>
                        <a href=""
                            class="w-[46px] h-[46px] flex shrink-0 items-center justify-center rounded-full border border-[#EEEEEE]">
                            <img src="{{ asset('/images/icons/notification.svg') }}" alt="icon">
                        </a>
                    </div>
                    <div class="h-[46px] w-[1px] flex shrink-0 border border-[#EEEEEE]"></div>
                    <div class="flex gap-3 items-center">
                        <div class="flex flex-col text-right">
                            <p class="text-sm text-[#7F8190]">Howdy</p>
                            <p class="font-semibold">Fany Alqo</p>
                        </div>
                        <div class="w-[46px] h-[46px]">
                            <img src="{{ asset('/images/photos/default-photo.svg') }}" alt="photo">
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex flex-col gap-10 px-5 mt-5">
                <div class="breadcrumb flex items-center gap-[30px]">
                    <a href="#" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Home</a>
                    <span class="text-[#7F8190] last:text-[#0A090B]">/</span>
                    <a href="{{ route('dashboard.courses.index') }}"
                        class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Manage Courses</a>
                    <span class="text-[#7F8190] last:text-[#0A090B]">/</span>
                    <a href="{{ route('dashboard.courses.show', $course) }}"
                        class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Course Details</a>
                    <span class="text-[#7F8190] last:text-[#0A090B]">/</span>
                    <a href="#" class="text-[#7F8190] last:text-[#0A090B] last:font-semibold">Update
                        Question</a>
                </div>
            </div>
            <div class="header ml-[70px] pr-[70px] w-[940px] flex items-center justify-between mt-10">
                <div class="flex gap-6 items-center">
                    <div class="w-[150px] h-[150px] flex shrink-0 relative overflow-hidden">
                        <img src="{{ Storage::url($course->cover) }}" class="w-full h-full object-contain"
                            alt="icon">
                        <p
                            class="p-[8px_16px] rounded-full bg-[#FFF2E6] font-bold text-sm text-[#F6770B] absolute bottom-0 transform -translate-x-1/2 left-1/2 text-nowrap">
                            {{ $course->category->name }}</p>
                    </div>
                    <div class="flex flex-col gap-5">
                        <h1 class="font-extrabold text-[30px] leading-[45px]">{{ $course->name }}</h1>
                        <div class="flex items-center gap-5">
                            <div class="flex gap-[10px] items-center">
                                <div class="w-6 h-6 flex shrink-0">
                                    <img src="{{ asset('/images/icons/calendar-add.svg') }}" alt="icon">
                                </div>
                                <p class="font-semibold">
                                    {{ \Carbon\Carbon::parse($course->created_at)->format('F j, Y') }}</p>
                            </div>
                            <div class="flex gap-[10px] items-center">
                                <div class="w-6 h-6 flex shrink-0">
                                    <img src="{{ asset('/images/icons/profile-2user-outline.svg') }}" alt="icon">
                                </div>
                                <p class="font-semibold">{{ count($students) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @if ($errors->any())
                <ul>
                    @foreach ($errors as $error)
                        <li class="py-5 px-5 bg-red-700 text-white">
                            {{ $error }}
                        </li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" enctype="multipart/form-data"
                action="{{ route('dashboard.course_question.update', $courseQuestion) }}" id="edit-question"
                class="mx-[70px] mt-[30px] flex flex-col gap-5">
                @csrf
                @method('PUT')
                <h2 class="font-bold text-2xl">Edit Question</h2>
                <div class="flex flex-col gap-[10px]">

                    <!-- Question -->
                    <div class="flex items-center gap-6 flex-grow">
                        <p class="font-semibold">Question</p>
                        <label class="font-bold flex items-center gap-[10px]">
                            <input type="number" name="question[number]" min="0" max="500"
                                class="w-[70px] h-[40px] p-[5px] border border-[#EEEEEE] rounded-md text-center outline-none"
                                placeholder="NO" value="{{ $courseQuestion->number ?? 0 }}" />
                        </label>
                    </div>

                    <div class="flex items-center gap-2 flex-grow">
                        <!-- Text input -->
                        <div id="text-question"
                            class="flex items-center w-[500px] h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] focus-within:border-2 focus-within:border-[#0A090B] {{ $courseQuestion->type == 'image' ? 'hidden' : '' }}">
                            <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
                                <img src="{{ asset('/images/icons/note-text.svg') }}"
                                    class="h-full w-full object-contain" alt="icon">
                            </div>
                            <input type="text"
                                class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none"
                                placeholder="Write the question" name="question[text]"
                                value="{{ $courseQuestion->question ?? '' }}">
                        </div>

                        <!-- Image input -->
                        <input type="file" name="question[image]" id="icon-question" class="peer hidden"
                            onchange="previewFile('question')" data-empty="true">

                        <div id="image-preview-question"
                            class="{{ $courseQuestion->type == 'image' ? '' : 'hidden' }} relative w-[150px] h-[150px] overflow-hidden peer-data-[empty=true]:border-[3px] peer-data-[empty=true]:border-dashed peer-data-[empty=true]:border-[#EEEEEE]">
                            <div
                                class="relative file-preview z-10 w-full h-full {{ $courseQuestion->type == 'image' ? '' : 'hidden' }}">
                                @if ($courseQuestion->type == 'image' && $courseQuestion->question)
                                    <img src="{{ asset('storage/' . $courseQuestion->question) }}"
                                        class="thumbnail-icon w-full h-full object-cover" alt="thumbnail">
                                @endif
                            </div>
                        </div>

                        <button id="image-question" type="button"
                            class="{{ $courseQuestion->type == 'image' ? '' : 'hidden' }} flex shrink-0 p-[10px_15px] items-center rounded-full bg-[#0A090B] text-white text-base"
                            onclick="document.getElementById('icon-question').click()">
                            Add File
                        </button>

                        <!-- Dropdown text / image -->
                        <select name="question[type]" id="answer-type-question"
                            onchange="toggleQuestionType(this.value)" class="border border-[#EEEEEE] rounded-md p-2">
                            <option value="text" {{ $courseQuestion->type == 'text' ? 'selected' : '' }}>Text
                            </option>
                            <option value="image" {{ $courseQuestion->type == 'image' ? 'selected' : '' }}>Image
                            </option>
                        </select>
                    </div>
                </div>

                <!-- ANSWERS -->
                <div class="flex flex-col gap-[10px]">
                    <p class="font-semibold">Answers</p>

                    @foreach ($courseQuestion->answers as $i => $answer)
                        <div class="flex items-center gap-4">
                            <div class="flex items-center gap-2 flex-grow">
                                <!-- Text input area -->
                                <div id="text-answer-{{ $i }}"
                                    class="flex items-center w-[500px] h-[52px] p-[14px_16px] rounded-full border border-[#EEEEEE] focus-within:border-2 focus-within:border-[#0A090B] {{ $answer->type == 'image' ? 'hidden' : '' }}">
                                    <div class="mr-[14px] w-6 h-6 flex items-center justify-center overflow-hidden">
                                        <img src="{{ asset('/images/icons/edit.svg') }}"
                                            class="h-full w-full object-contain" alt="icon">
                                    </div>
                                    <input type="text"
                                        class="font-semibold placeholder:text-[#7F8190] placeholder:font-normal w-full outline-none"
                                        placeholder="Write better answer option"
                                        name="answers[{{ $i }}][text]"
                                        value="{{ $answer->answer ?? '' }}">
                                </div>

                                <!-- Image preview -->
                                <input type="file" name="answers[{{ $i }}][image]"
                                    id="icon-{{ $i }}" class="peer hidden"
                                    onchange="previewFile({{ $i }})" data-empty="true">

                                <div id="image-preview-{{ $i }}"
                                    class="{{ $answer->type == 'image' ? '' : 'hidden' }} relative w-[150px] h-[150px] overflow-hidden peer-data-[empty=true]:border-[3px] peer-data-[empty=true]:border-dashed peer-data-[empty=true]:border-[#EEEEEE]">
                                    <div
                                        class="relative file-preview z-10 w-full h-full {{ $answer->type == 'image' ? '' : 'hidden' }}">
                                        @if ($answer->type == 'image' && $answer->answer)
                                            <img src="{{ asset('storage/' . $answer->answer) }}"
                                                class="thumbnail-icon w-full h-full object-cover" alt="thumbnail">
                                        @endif
                                    </div>
                                </div>

                                <button id="image-answer-{{ $i }}" type="button"
                                    class="{{ $answer->type == 'image' ? '' : 'hidden' }} flex shrink-0 p-[10px_15px] items-center rounded-full bg-[#0A090B] text-white text-base"
                                    onclick="document.getElementById('icon-{{ $i }}').click()">Add
                                    File</button>

                                <!-- Dropdown text and image -->
                                <select name="answers[{{ $i }}][type]"
                                    id="answer-type-{{ $i }}"
                                    onchange="toggleAnswerType({{ $i }}, this.value)"
                                    class="border border-[#EEEEEE] rounded-md p-2">
                                    <option value="text" {{ $answer->type == 'text' ? 'selected' : '' }}>Text
                                    </option>
                                    <option value="image" {{ $answer->type == 'image' ? 'selected' : '' }}>Image
                                    </option>
                                </select>
                            </div>

                            <!-- Input Score -->
                            <label class="font-semibold flex items-center gap-[10px]">
                                <input type="number" name="answers[{{ $i }}][score]" min="0"
                                    max="100"
                                    class="w-[70px] h-[40px] p-[5px] border border-[#EEEEEE] rounded-md text-center outline-none"
                                    placeholder="Score" value="{{ $answer->score ?? 0 }}" />
                            </label>
                        </div>
                    @endforeach
                </div>


                <!-- QUESTION END -->
                <button type="submit"
                    class="w-[500px] h-[52px] p-[14px_20px] bg-[#6436F1] rounded-full font-bold text-white transition-all duration-300 hover:shadow-[0_4px_15px_0_#6436F14D] text-center">
                    Save Question</button>
            </form>

        </div>
    </section>
</body>

<script>
    function toggleQuestionType(type) {
        // Reset question input values
        document.querySelector(`input[name="question[text]"]`).value = ''; // Reset text input
        document.getElementById(`icon-question`).value = ''; // Reset file input
        document.querySelector(`#image-preview-question .file-preview`).classList.add('hidden'); // Hide image preview

        if (type === 'text') {
            document.getElementById(`text-question`).classList.remove('hidden');
            document.getElementById(`image-question`).classList.add('hidden');
            document.getElementById(`image-preview-question`).classList.add('hidden');
        } else {
            document.getElementById(`text-question`).classList.add('hidden');
            document.getElementById(`image-question`).classList.remove('hidden');
            document.getElementById(`image-preview-question`).classList.remove('hidden');
        }
    }

    function toggleAnswerType(id, type) {
        // Reset values when the answer type is changed
        document.querySelector(`input[name="answers[${id}][text]"]`).value = ''; // Reset text input
        document.querySelector(`input[name="answers[${id}][score]"]`).value = ''; // Reset score input
        document.getElementById(`icon-${id}`).value = ''; // Reset file input
        document.querySelector(`#image-preview-${id} .file-preview`).classList.add('hidden'); // Hide image preview

        if (type === 'text') {
            document.getElementById(`text-answer-${id}`).classList.remove('hidden');
            document.getElementById(`image-answer-${id}`).classList.add('hidden');
            document.getElementById(`image-preview-${id}`).classList.add('hidden');
        } else {
            document.getElementById(`text-answer-${id}`).classList.add('hidden');
            document.getElementById(`image-answer-${id}`).classList.remove('hidden');
            document.getElementById(`image-preview-${id}`).classList.remove('hidden');
        }
    }

    function previewFile(id) {
        var preview = document.querySelector(`#image-preview-${id} .file-preview`);
        var fileInput = document.querySelector(`#icon-${id}`);

        if (fileInput.files.length > 0) {
            var reader = new FileReader();
            var file = fileInput.files[0]; // Get the first file from the input

            reader.onloadend = function() {
                // Check if the thumbnail image element exists
                var img = preview.querySelector('.thumbnail-icon');

                if (!img) {
                    // Create img element if it doesn't exist
                    img = document.createElement('img');
                    img.classList.add('thumbnail-icon', 'w-full', 'h-full', 'object-cover');
                    preview.appendChild(img); // Append the newly created image element to the preview div
                }

                // Update src attribute with the uploaded file
                img.src = reader.result;

                // Remove the 'hidden' class to display the preview
                preview.classList.remove('hidden');
            }

            reader.readAsDataURL(file); // Convert file to base64
            fileInput.setAttribute('data-empty', 'false'); // Set data attribute for custom CSS
        } else {
            // Hide preview if no file is selected
            preview.classList.add('hidden');
            fileInput.setAttribute('data-empty', 'true');
        }
    }
</script>

</html>
