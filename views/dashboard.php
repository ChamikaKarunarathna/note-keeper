<?php
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php?page=home');
    exit;
}

// fetching the notes
$user_id = $_SESSION['user_id'];
$noteModel = new Note($db);
$notes = $noteModel->getUserNotes($user_id);
?>
<div class="bg-white max-h-screen">
    <div class="relative isolate px-6 pt-14 lg:px-8 max-h-screens">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-1155/678 w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="mx-auto max-w-screen-xl my-auto w-full h-full relative">
            <div class="max-h-[calc(100vh-80px)] flex flex-col items-center justify-start py-6 px-4 mx-auto w-full h-screen">
                <div class="flex flex-row flex-wrap items-start justify-around gap-6 w-full max-h-[calc(100vh-80px)] overflow-y-auto">

                    <?php
                    if ($notes) {
                        foreach ($notes as $note) {
                    ?>
                            <!-- Note Card -->
                            <div class="relative z-10 w-full min-h-[160px] max-w-[350px] border border-solid border-black rounded-2xl p-4 hover:shadow-md flex flex-col items-start gap-2 bg-[rgba(255,255,255,0.4)]">
                                <a href="index.php?page=view-note&id=<?php echo $note['id']; ?>" class="w-full h-full block">
                                    <span class="text-xl font-semibold line-clamp-1"><?php echo htmlspecialchars($note['title']); ?></span>
                                    <div class="text-[12px] line-clamp-5 mb-6"><?php echo nl2br(htmlspecialchars($note['content'])); ?></div>
                                </a>

                                <button
                                    type="button"
                                    id="noteMenuBtn<?php echo $note['id']; ?>"
                                    class="absolute bottom-2 right-2 hover:bg-gray-200 rounded-full p-1.5 cursor-pointer z-20"
                                    onclick="toggleNoteMenu(<?php echo $note['id']; ?>, event)">
                                    <img src="./assets/images/icons/menu_dots.svg" alt="Note Menu Icon" class="w-4 h-4" />
                                </button>

                                <!-- Hidden Menu Buttons -->
                                <div id="noteMenu<?php echo $note['id']; ?>" class="absolute bottom-12 right-2 hidden flex flex-col gap-2 bg-transparent">
                                    <button
                                        type="button"
                                        class="rounded-full bg-indigo-100 p-1.5 md:px-2.5 md:py-1.5 text-[12px] font-semibold text-black hover:bg-indigo-200 cursor-pointer flex flex-row gap-2 items-center"
                                        onclick="editNote(<?php echo $note['id']; ?>)">
                                        <img src="./assets/images/icons/edit.svg" alt="Edit Note Icon" class="w-3 h-3" />
                                        <span class="max-md:hidden">Edit Note</span>
                                    </button>

                                    <button
                                        type="button"
                                        class="rounded-full bg-red-500 p-1.5 md:px-2.5 md:py-1.5 text-[12px] font-semibold text-white hover:bg-red-600 cursor-pointer flex flex-row gap-2 items-center"
                                        onclick="deleteNote(<?php echo $note['id']; ?>)">
                                        <img src="./assets/images/icons/delete.svg" alt="Delete Note Icon" class="w-3 h-3" />
                                        <span class="max-md:hidden">Delete Note</span>
                                    </button>
                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <p class='text-gray-500 text-lg'>No notes found. Click <span class="md:hidden">'+'</span> <span class="max-md:hidden">'Create a Note'</span> to add your first note.</p>
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
    const toggleNoteMenu = (id, event) => {
        event.stopPropagation(); // Stop click event from bubbling to <a>

        let noteMenu = document.getElementById(`noteMenu${id}`);
        if (noteMenu) {
            noteMenu.classList.toggle('hidden');
        }
    };
</script>