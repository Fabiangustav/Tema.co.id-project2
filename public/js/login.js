// Initialize AOS
AOS.init();

// Create particles
function createParticles() {
    const particles = document.getElementById("particles");
    const particleCount = 50;

    for (let i = 0; i < particleCount; i++) {
        const particle = document.createElement("div");
        particle.className = "particle";

        // Random size
        const size = Math.random() * 4 + 1;
        particle.style.width = size + "px";
        particle.style.height = size + "px";

        // Random position
        particle.style.left = Math.random() * 100 + "%";
        particle.style.top = "100%";

        // Random animation delay
        particle.style.animationDelay = Math.random() * 6 + "s";
        particle.style.animationDuration = Math.random() * 3 + 3 + "s";

        particles.appendChild(particle);
    }
}

// Password toggle
function togglePassword() {
    const passwordField = document.getElementById("passwordField");
    const toggleIcon = document.getElementById("passwordToggleIcon");

    if (passwordField.type === "password") {
        passwordField.type = "text";
        toggleIcon.className = "bi bi-eye-slash";
    } else {
        passwordField.type = "password";
        toggleIcon.className = "bi bi-eye";
    }
}

// Show forgot password
function showForgotPassword() {
    alert("Please contact your system administrator to reset your password.");
}

// Form submission
document.getElementById("loginForm").addEventListener("submit", function (e) {
    e.preventDefault();

    const btn = document.getElementById("loginBtn");
    const errorAlert = document.getElementById("errorAlert");
    const successAlert = document.getElementById("successAlert");
    const successAnimation = document.getElementById("successAnimation");

    // Hide alerts
    errorAlert.classList.add("d-none");
    successAlert.classList.add("d-none");

    // Show loading
    btn.classList.add("loading");

    // Get form data
    const formData = new FormData(this);

    // Simulate API call
    setTimeout(() => {
        const email = formData.get("email");
        const password = formData.get("password");

        // Demo credentials
        if (email === "admin@tema.com" && password === "admin123") {
            // Success
            btn.classList.remove("loading");
            successAlert.classList.remove("d-none");

            // Show success animation
            successAnimation.style.display = "flex";

            // Redirect after animation
            setTimeout(() => {
                window.location.href = "/admin/dashboard";
            }, 2000);
        } else {
            // Error
            btn.classList.remove("loading");
            errorAlert.classList.remove("d-none");

            // Shake animation
            document.querySelector(".login-card").style.animation =
                "shake 0.5s";
            setTimeout(() => {
                document.querySelector(".login-card").style.animation = "";
            }, 500);
        }
    }, 1500);
});

// Shake animation
const shakeKeyframes = `
            @keyframes shake {
                0%, 100% { transform: translateX(0); }
                10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
                20%, 40%, 60%, 80% { transform: translateX(5px); }
            }
        `;

const style = document.createElement("style");
style.textContent = shakeKeyframes;
document.head.appendChild(style);

// Initialize particles when page loads
window.addEventListener("load", () => {
    createParticles();
});

// Auto-focus on email field
document.addEventListener("DOMContentLoaded", () => {
    document.querySelector('input[name="email"]').focus();
});

// Real-time validation
const emailField = document.querySelector('input[name="email"]');
const passwordField = document.querySelector('input[name="password"]');

emailField.addEventListener("input", function () {
    if (this.validity.typeMismatch) {
        this.style.borderColor = "#ff6b6b";
    } else {
        this.style.borderColor = "var(--border-color)";
    }
});

passwordField.addEventListener("input", function () {
    if (this.value.length < 6) {
        this.style.borderColor = "#ffc107";
    } else {
        this.style.borderColor = "var(--border-color)";
    }
});

// Keyboard shortcuts
document.addEventListener("keydown", function (e) {
    if (e.ctrlKey && e.key === "Enter") {
        document.getElementById("loginForm").dispatchEvent(new Event("submit"));
    }
});

// Prevent right click (optional security)
document.addEventListener("contextmenu", function (e) {
    e.preventDefault();
});

// Console message for developers
console.log(
    "%c🔐 PT. TEMA Admin Panel",
    "color: #4facfe; font-size: 16px; font-weight: bold;"
);
console.log("%cDemo Credentials:", "color: #8892b0; font-size: 12px;");
console.log("%cEmail: admin@tema.com", "color: #8892b0; font-size: 12px;");
console.log("%cPassword: admin123", "color: #8892b0; font-size: 12px;");
