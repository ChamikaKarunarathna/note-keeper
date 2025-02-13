<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once 'models/Note.php';
require_once 'includes/connection.php';

if (!isset($_SESSION['user_id'])) {
    $_SESSION['toast'] = ['type' => 'error', 'message' => 'Please log in to view notes.'];
    header('Location: index.php?page=home');
    exit;
}

// Get the note ID from the URL
if (!isset($_GET['id']) || empty($_GET['id'])) {
    $_SESSION['toast'] = ['type' => 'error', 'message' => 'Invalid note ID.'];
    header('Location: index.php?page=dashboard');
    exit;
}

$note_id = $_GET['id'];
$user_id = $_SESSION['user_id'];

$noteModel = new Note($db);
$note = $noteModel->getNoteById($note_id, $user_id);

if (!$note) {
    $_SESSION['toast'] = ['type' => 'error', 'message' => 'Note not found.'];
    header('Location: index.php?page=dashboard');
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
                <div class="w-full max-h-[calc(100vh-80px)] overflow-y-auto">

                    <div class="flex flex-col items-start justify-start gap-6 w-full mt-8">
                        <h2 class="text-2xl font-bold mb-4"><?php echo htmlspecialchars($note['title']); ?></h2>
                        <p class="text-gray-700 whitespace-pre-line"><?php echo nl2br(htmlspecialchars($note['content'])); ?></p>

                        <div class="flex flex-row max-md:flex-col-reverse items-start justify-between w-full gap-6">
                            <a href="?page=dashboard">
                                &larr; Back to Dashboard
                            </a>
                            <div class="w-full max-w-max flex flex-row gap-2">
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
                    </div>

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


<!-- <div class="bg-white max-h-screen">
    <div class="relative isolate px-6 pt-14 lg:px-8 max-h-screens">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-1155/678 w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
        <div class="mx-auto max-w-screen-xl my-auto w-full h-full relative">
            <div class="max-h-[calc(100vh-80px)] flex flex-col items-start justify-start py-6 px-4 mx-auto w-full h-screen">
                <a href="?page=dashboard">
                    &larr; Back to Dashboard
                </a>

                <div class="flex flex-col items-start justify-start gap-6 w-full mt-8">
                    <div class="flex flex-row items-start justify-between w-full gap-6">
                        <h2 class="text-2xl font-bold mb-4"><?php echo htmlspecialchars($note['title']); ?></h2>
                        <button
                            type="button"
                            id="noteMenuBtn<?php echo $note['id']; ?>"
                            class="hover:bg-gray-200 rounded-full p-1.5 cursor-pointer min-w-[28px]"
                            onclick="toggleNoteMenu(<?php echo $note['id']; ?>, event)">
                            <img src="./assets/images/icons/menu_dots.svg" alt="Note Menu Icon" class="w-4 h-4" />
                        </button>
                    </div>
                    <p class="text-gray-700 whitespace-pre-line"><?php echo nl2br(htmlspecialchars($note['content'])); ?></p>
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
</div> -->