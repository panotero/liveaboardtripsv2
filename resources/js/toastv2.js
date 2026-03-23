// toast.js
class ToastManager {
  constructor() {
    this.container = null;
    this.initContainer();
  }

  initContainer() {
    // Create container only once
    if (!document.getElementById("toast-container")) {
      const container = document.createElement("div");
      container.id = "toast-container";
      container.className = "fixed top-5 right-5 flex flex-col gap-3 z-50";
      document.body.appendChild(container);
      this.container = container;
    } else {
      this.container = document.getElementById("toast-container");
    }
  }

  show({
    title = "",
    description = "",
    button = null,
    onClick = null,
    type = "info",
    duration = 5000,
  }) {
    const toast = document.createElement("div");

    // Tailwind classes based on type
    let bgClass = "bg-blue-500 text-white";
    if (type === "success") bgClass = "bg-green-500 text-white";
    if (type === "warning") bgClass = "bg-yellow-500 text-gray-900";
    if (type === "error") bgClass = "bg-red-500 text-white";

    toast.className = `max-w-sm w-full p-4 rounded-lg shadow-lg flex flex-col border ${bgClass} animate-slide-in`;

    // Title + Description
    toast.innerHTML = `
            <div class="flex justify-between items-start">
                <div class="flex-1">
                    <p class="font-bold text-sm mb-1">${title}</p>
                    <p class="text-xs">${description}</p>
                </div>
                <button class="ml-2 text-white font-bold text-lg">&times;</button>
            </div>
        `;

    // Button (optional)
    if (button && typeof onClick === "function") {
      const btn = document.createElement("button");
      btn.className =
        "mt-3 bg-white text-black text-xs font-bold py-1 px-2 rounded hover:bg-gray-100 transition";
      btn.innerText = button;
      btn.addEventListener("click", () => {
        onClick();
        this.removeToast(toast);
      });
      toast.appendChild(btn);
    }

    // Close button
    const closeBtn = toast.querySelector("button");
    closeBtn.addEventListener("click", () => this.removeToast(toast));

    this.container.appendChild(toast);

    // Auto-remove after duration
    setTimeout(() => this.removeToast(toast), duration);
  }

  removeToast(toast) {
    if (toast) {
      toast.classList.add("opacity-0", "translate-x-4");
      toast.addEventListener("transitionend", () => toast.remove());
    }
  }
}

// Animation styles (Tailwind + custom)
const style = document.createElement("style");
style.innerHTML = `
@keyframes slide-in {
    from { opacity: 0; transform: translateX(20px); }
    to { opacity: 1; transform: translateX(0); }
}
.animate-slide-in { animation: slide-in 0.3s ease-out; }
`;
document.head.appendChild(style);

// Export global instance
window.toast = new ToastManager();
