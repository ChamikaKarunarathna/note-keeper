<?php
if (isset($_SESSION['user_id'])) {
    header('Location: index.php?page=dashboard');
    exit;
}
?>
<div class="bg-white max-h-screen">
    <div class="relative isolate px-6 pt-14 lg:px-8 max-h-screens">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-1155/678 w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="mx-auto max-w-3xl my-auto lg:py-56 w-full h-full max-md:mt-[120px]">
            <!-- <div class="hidden sm:mb-8 sm:flex sm:justify-center">
                <div class="relative rounded-full px-3 py-1 text-sm/6 text-gray-600 ring-1 ring-gray-900/10 hover:ring-gray-900/20">
                    Announcing our next round of funding. <a href="#" class="font-semibold text-indigo-600"><span class="absolute inset-0" aria-hidden="true"></span>Read more <span aria-hidden="true">&rarr;</span></a>
                </div>
            </div> -->
            <div class="text-center">
                <h1 class="text-5xl font-semibold tracking-tight text-balance text-gray-900 sm:text-7xl">Capture and Organize Your Notes with Ease</h1>
                <p class="mt-8 text-lg font-medium text-pretty text-gray-500 sm:text-xl/8">Take control of your thoughts, ideas, and important notes in one place. Accessible anytime, anywhere.</p>
                <div class="mt-10 flex items-center justify-center gap-x-6">
                    <a href="?page=login" class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Get started</a>
                    <!-- <a href="#" class="text-sm/6 font-semibold text-gray-900">Learn more <span aria-hidden="true">→</span></a> -->
                </div>
            </div>
        </div>
        <div class="absolute inset-x-0 -z-10 transform-gpu overflow-hidden blur-3xl bottom-0" aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-1155/678 w-[36.125rem] -translate-x-1/2 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
    </div>
</div>