window.initModal = function initModal({ modalId }) {
  const modal = document.getElementById(modalId);
  const closeBtn = modal?.querySelector(".modal-close");

  if (!modal || !closeBtn) {
    console.warn("Missing modal elements. Check your IDs.");
    return;
  }

  // Save current scroll position
  const scrollY = window.scrollY;

  // Show modal
  modal.classList.remove("hidden");
  let openmodalcount = checkopenmodal();
  // Disable background scrolling
  document.body.style.position = "fixed";
  document.body.style.top = `-${scrollY}px`;
  document.body.style.left = "0";
  document.body.style.right = "0";
  document.body.style.overflow = "hidden";

  closeBtn.addEventListener("click", () => {
    modal.classList.add("hidden");

    openmodalcount = checkopenmodal();
    if (openmodalcount > 0) {
      return;
    } else {
      // Restore scroll position and allow scrolling
      document.body.style.position = "";
      document.body.style.top = "";
      document.body.style.left = "";
      document.body.style.right = "";
      document.body.style.overflow = "";
      window.scrollTo(0, scrollY);
    }
  });
};

function checkopenmodal() {
  const opennedmodal = document.querySelectorAll(".modal");
  let openmodalcount = 0;
  opennedmodal.forEach((mdl) => {
    if (!mdl.classList.contains("hidden")) {
      openmodalcount++;
    }
  });
  return openmodalcount;
}

async function fetchAuthUser() {
  try {
    const data = await fetchWithRetry("/api/user_info", {
      headers: {
        Accept: "application/json",
      },
    });

    if (data.isLoggedIn) {
      window.authUser = data.user;
    } else {
      window.authUser = null;
      console.error("User is not logged in");
    }
    return data;
  } catch (error) {
    console.error("Failed to fetch user info:", error);
    window.authUser = null;
  }
}
fetchAuthUser();

window.initPasswordToggle = function initPasswordToggle(
  toggle,
  password,
  Icon,
) {
  const toggleBtn = document.getElementById(toggle);
  const passwordField = document.getElementById(password);
  const eyeIcon = document.getElementById(Icon);

  const eyeOpen = `
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M2.036 12.322a1.012 1.012 0 010-.644C3.423 7.51
                   7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431
                   0 .638C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>`;

  const eyeClosed = `
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M3.98 8.223A10.477 10.477 0 001.934 12c1.832
                4.068 5.728 7 10.066 7 1.676 0 3.285-.37
                4.712-1.034M6.228 6.228A10.45 10.45 0 0112
                5c4.38 0 8.293 2.953 10.07 7.063a10.522
                10.522 0 01-4.517 4.92M6.228 6.228L3 3m3.228
                3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0
                0a3 3 0 10-4.243-4.243m4.242 4.242L9.878
                9.878" />`;

  toggleBtn.addEventListener("click", () => {
    const type = passwordField.type === "password" ? "text" : "password";
    passwordField.type = type;

    eyeIcon.innerHTML = type === "password" ? eyeOpen : eyeClosed;
  });
};
//function for populating operators dropdown menu
