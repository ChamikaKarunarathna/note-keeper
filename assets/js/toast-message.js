function showToast(type, message) {
  const toastColor = type === "success" ? "bg-green-500" : "bg-red-500";

  const toast = document.createElement("div");
  toast.className = `${toastColor} text-white px-6 py-3 rounded-lg shadow-lg mb-4 transition-opacity duration-300 opacity-0`;
  toast.innerHTML = `
        <div class="flex items-center">
            <span class="font-bold">${
              type === "success" ? "Success" : "Error"
            }:</span>
            <span class="ml-2">${message}</span>
        </div>
    `;

  const container = document.getElementById("toast-container");
  container.appendChild(toast);

  setTimeout(() => {
    toast.classList.add("opacity-100");
  }, 10);

  setTimeout(() => {
    toast.classList.remove("opacity-100");
    setTimeout(() => {
      container.removeChild(toast);
    }, 300);
  }, 3000);
}
