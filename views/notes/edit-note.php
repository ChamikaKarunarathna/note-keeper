<?php
require_once 'models/Note.php';
require_once 'includes/connection.php';

if (!isset($_SESSION['user_id'])) {
    $_SESSION['toast'] = ['type' => 'error', 'message' => 'Please log in to edit notes.'];
    header('Location: index.php?page=login');
    exit;
}

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
            <div class="max-h-[calc(100vh-80px)] flex flex-col items-start justify-start py-6 px-4 mx-auto w-full h-screen">
                <a href="?page=dashboard">
                    &larr; Back to Dashboard
                </a>
                <form action="index.php?page=edit-note" method="post" class="w-full flex flex-col gap-4 mt-8">
                    <input type="hidden" name="note_id" value="<?php echo $note['id']; ?>">
                    <input
                        name="note_title"
                        type="text"
                        required
                        class="w-full text-sm text-gray-800 border border-gray-300 pl-4 pr-10 py-3 rounded-lg outline-blue-600"
                        placeholder="Title"
                        value="<?php echo htmlspecialchars($note['title']); ?>"
                        maxlength="255" />

                    <textarea
                        name="note_content"
                        required
                        rows="5"
                        class="w-full text-sm text-gray-800 border border-gray-300 pl-4 pr-10 py-3 rounded-lg outline-blue-600"
                        placeholder="Take a note..."><?php echo htmlspecialchars($note['content']); ?></textarea>

                    <div class="!mt-8 flex flex-col gap-2">
                        <button
                            type="submit"
                            class="rounded-md bg-indigo-600 px-3.5 py-2.5 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 w-full cursor-pointer">
                            Update Note
                        </button>
                        <a href="index.php?page=dashboard">
                            <button
                                type="button"
                                class="rounded-md bg-indigo-100 px-3.5 py-2.5 text-sm font-semibold text-black shadow-xs hover:bg-indigo-200 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 w-full cursor-pointer">
                                Cancel
                            </button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
        <div class="absolute inset-x-0 -z-10 transform-gpu overflow-hidden blur-3xl bottom-0" aria-hidden="true">
            <div class="relative left-[calc(50%+3rem)] aspect-1155/678 w-[36.125rem] -translate-x-1/2 bg-linear-to-tr from-[#ff80b5] to-[#9089fc] opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>
    </div>
</div>