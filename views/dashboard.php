<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php?page=home');
    exit;
}
?>
<div class="bg-white max-h-screen">
    <div class="relative isolate px-6 pt-14 lg:px-8 max-h-screens">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-1155/678 w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="mx-auto max-w-screen-xl my-auto w-full h-full relative">
            <div class="max-h-[calc(100vh-80px)] flex flex-col items-center justify-start py-6 px-4 mx-auto w-full h-screen">
                <div class="flex flex-row flex-wrap items-start justify-between gap-6 w-full max-h-[calc(100vh-80px)] overflow-y-auto">

                    <?php
                    for ($i = 0; $i < 3; $i++) {
                    ?>
                        <!-- A card design for show a note -->
                        <div class="w-full min-h-[160px] max-w-[350px] border border-solid border-black rounded-2xl p-4 hover:shadow-[0_2px_22px_-4px_rgba(93,96,127,0.2)] flex flex-col items-start align-start gap-2 bg-[rgba(255,255,255,0.4)] relative">
                            <span class="text-xl font-semibold line-clamp-1">Note Title</span>
                            <div class="text-[12px] line-clamp-5 mb-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor nisi accusantium quibusdam ducimus officiis consequuntur explicabo minima. Eos ullam tenetur aperiam! Cumque veniam, omnis nam eum repellat aliquam illo dolorum! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor nisi accusantium quibusdam ducimus officiis consequuntur explicabo minima. Eos ullam tenetur aperiam! Cumque veniam, omnis nam eum repellat aliquam illo dolorum!</div>

                            <button
                                type="button"
                                id="noteMenuBtn<?php echo $i; ?>"
                                class="absolute bottom-2 right-2 hover:bg-gray-200 rounded-full p-1.5 cursor-pointer"
                                onclick="toggleNoteMenu(<?php echo $i; ?>)">
                                <img src="./assets/images/icons/menu_dots.svg" alt="Note Menu Icon" class="w-4 h-4" />
                            </button>

                            <button
                                type="button"
                                id="editNoteBtn<?php echo $i; ?>"
                                class="absolute bottom-19 right-2 rounded-full bg-indigo-100 px-2.5 py-1.5 text-[12px] font-semibold text-black hover:bg-indigo-200 cursor-pointer flex flex-row gap-2 items-center hidden">
                                <img src="./assets/images/icons/edit.svg" alt="Edit Note Icon" class="w-3 h-3" />
                                <span>Edit Note</span>
                            </button>

                            <button
                                type="button"
                                id="deleteNoteBtn<?php echo $i; ?>"
                                class="absolute bottom-10 right-2 rounded-full bg-red-500 px-2.5 py-1.5 text-[12px] font-semibold text-white hover:bg-red-600 cursor-pointer flex flex-row gap-2 items-center hidden">
                                <img src="./assets/images/icons/delete.svg" alt="Delete Note Icon" class="w-3 h-3" />
                                <span>Delete Note</span>
                            </button>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
            <a href="?page=create-note">
                <button
                    type="button"
                    class="absolute bottom-0 right-0 rounded-full bg-indigo-600 p-3.5 md:px-3.5 md:py-2.5 text-sm font-semibold text-white hover:bg-indigo-500 cursor-pointer flex flex-row gap-2 items-center shadow-xl">
                    <img src="./assets/images/icons/add.svg" alt="Create a Note Icon" class="w-4 h-4" />
                    <span class="max-md:hidden">Create a Note</span>
                </button>
            </a>
        </div>
        <div class="absolute inset-x-0 -z-10 transform-gpu overflow-hidden blur-3xl bottom-0" aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-1155/678 w-[36.125rem] -translate-x-1/2 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
    </div>
</div>

<script>
    const toggleNoteMenu = (id) => {
        editNoteBtn = document.getElementById(`editNoteBtn${id}`);
        deleteNoteBtn = document.getElementById(`deleteNoteBtn${id}`);
        editNoteBtn.classList.toggle('hidden');
        deleteNoteBtn.classList.toggle('hidden');
    }
</script>