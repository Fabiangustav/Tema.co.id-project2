// public/assets/admin/js/statistics.js

class StatisticsManager {
    constructor() {
        this.init();
        this.bindEvents();
    }

    init() {
        console.log("Statistics Manager initialized");
        this.animateCounters();
        this.animateProgressCircles();
        this.animateProgressBars();
    }

    bindEvents() {
        // Listen for refresh requests
        document.addEventListener("refresh-stats", () => {
            this.refreshStats();
        });
    }

    animateCounters() {
        // Animate stat numbers with counting effect
        const statNumbers = document.querySelectorAll(
            ".stat-number[data-target]"
        );

        statNumbers.forEach((element, index) => {
            const target = parseInt(element.dataset.target);

            // Delay animation based on card position
            setTimeout(() => {
                this.animateNumber(element, 0, target, 1500);
            }, index * 200);
        });
    }

    animateNumber(element, start, end, duration) {
        const range = end - start;
        const startTime = performance.now();

        function animate(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);

            // Use easing function for smooth animation
            const easeOutQuart = 1 - Math.pow(1 - progress, 4);
            const value = start + range * easeOutQuart;

            element.textContent = Math.floor(value);

            if (progress < 1) {
                requestAnimationFrame(animate);
            } else {
                element.textContent = end; // Ensure final value is exact
            }
        }

        requestAnimationFrame(animate);
    }

    animateProgressCircles() {
        // Animate circular progress indicators
        const progressCircles = document.querySelectorAll(
            ".progress-circle[data-progress]"
        );
        const circumference = 163.36;

        progressCircles.forEach((circle, index) => {
            const progress = parseInt(circle.dataset.progress);
            const progressCircle = circle.querySelector(
                ".progress-ring-circle"
            );

            if (progressCircle) {
                // Delay animation
                setTimeout(() => {
                    const offset =
                        circumference - (progress / 100) * circumference;
                    progressCircle.style.strokeDashoffset = offset;

                    // Add glow effect
                    progressCircle.style.filter = `drop-shadow(0 0 8px ${progressCircle.getAttribute(
                        "stroke"
                    )}40)`;
                }, (index + 1) * 300);
            }
        });
    }

    animateProgressBars() {
        // Animate regional progress bars
        const regionBars = document.querySelectorAll(
            ".region-progress-bar[data-target]"
        );

        regionBars.forEach((bar, index) => {
            const target = parseInt(bar.dataset.target);

            setTimeout(() => {
                bar.style.width = target + "%";
            }, index * 150);
        });

        // Animate system progress bars
        const systemBars = document.querySelectorAll(
            ".system-progress-bar[data-target]"
        );

        systemBars.forEach((bar, index) => {
            const target = parseInt(bar.dataset.target);

            setTimeout(() => {
                bar.style.width = target + "%";
            }, (index + 4) * 150); // Delay after region bars
        });

        // Animate uptime and response values
        this.animateSystemMetrics();
    }

    animateSystemMetrics() {
        const uptimeElement = document.getElementById("uptimeValue");
        const responseElement = document.getElementById("responseValue");

        if (uptimeElement) {
            const uptimeTarget = parseFloat(uptimeElement.dataset.target);
            setTimeout(() => {
                this.animateDecimal(uptimeElement, 0, uptimeTarget, 1000, "%");
            }, 1000);
        }

        if (responseElement) {
            const responseTarget = parseFloat(responseElement.dataset.target);
            setTimeout(() => {
                this.animateDecimal(
                    responseElement,
                    0,
                    responseTarget,
                    1000,
                    "s"
                );
            }, 1200);
        }
    }

    animateDecimal(element, start, end, duration, suffix = "") {
        const range = end - start;
        const startTime = performance.now();

        function animate(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const value = start + range * progress;

            element.textContent = value.toFixed(1) + suffix;

            if (progress < 1) {
                requestAnimationFrame(animate);
            }
        }

        requestAnimationFrame(animate);
    }

    refreshStats() {
        console.log("Refreshing statistics...");

        // Show loading state
        this.showLoadingState();

        // Fetch updated statistics
        fetch("/admin/api/dashboard-stats")
            .then((response) => response.json())
            .then((data) => {
                this.updateStatistics(data);
                this.hideLoadingState();
            })
            .catch((error) => {
                console.error("Failed to refresh stats:", error);
                this.hideLoadingState();
                this.showError("Failed to refresh statistics");
            });
    }

    updateStatistics(data) {
        // Update stat cards
        if (data.berita !== undefined) {
            this.updateStatCard("berita", data.berita);
        }
        if (data.blog !== undefined) {
            this.updateStatCard("blog", data.blog);
        }
        if (data.slider !== undefined) {
            this.updateStatCard("slider", data.slider);
        }
        if (data.regions !== undefined) {
            this.updateStatCard("regions", data.regions);
        }

        // Update regional performance
        if (data.regionalPerformance) {
            this.updateRegionalPerformance(data.regionalPerformance);
        }

        // Update system metrics
        if (data.systemMetrics) {
            this.updateSystemMetrics(data.systemMetrics);
        }
    }

    updateStatCard(type, newValue) {
        const statCard = document.querySelector(`[data-stat="${type}"]`);
        if (statCard) {
            const numberElement = statCard.querySelector(".stat-number");
            const currentValue = parseInt(numberElement.textContent);

            if (currentValue !== newValue) {
                // Animate to new value
                this.animateNumber(numberElement, currentValue, newValue, 1000);

                // Update data attribute
                numberElement.dataset.target = newValue;

                // Add update effect
                statCard.classList.add("stat-updated");
                setTimeout(() => {
                    statCard.classList.remove("stat-updated");
                }, 1000);
            }
        }
    }

    updateRegionalPerformance(regionData) {
        regionData.forEach((region) => {
            const regionItem = document.querySelector(
                `[data-region="${region.name}"]`
            );
            if (regionItem) {
                const progressElement =
                    regionItem.querySelector("[data-progress]");
                const progressBar = regionItem.querySelector(
                    ".region-progress-bar"
                );

                if (progressElement && progressBar) {
                    const currentProgress = parseInt(
                        progressElement.dataset.progress
                    );

                    if (currentProgress !== region.progress) {
                        // Update progress
                        progressElement.dataset.progress = region.progress;
                        progressElement.textContent = region.progress + "%";
                        progressBar.style.width = region.progress + "%";
                        progressBar.dataset.target = region.progress;
                    }
                }
            }
        });
    }

    updateSystemMetrics(metrics) {
        // Update server load
        if (metrics.serverLoad !== undefined) {
            this.updateSystemStat("server-load", metrics.serverLoad);
        }

        // Update memory usage
        if (metrics.memoryUsage !== undefined) {
            this.updateSystemStat("memory-usage", metrics.memoryUsage);
        }

        // Update storage
        if (metrics.storage !== undefined) {
            this.updateSystemStat("storage", metrics.storage);
        }

        // Update uptime
        if (metrics.uptime !== undefined) {
            const uptimeElement = document.getElementById("uptimeValue");
            if (uptimeElement) {
                uptimeElement.textContent = metrics.uptime + "%";
            }
        }

        // Update response time
        if (metrics.responseTime !== undefined) {
            const responseElement = document.getElementById("responseValue");
            if (responseElement) {
                responseElement.textContent = metrics.responseTime + "s";
            }
        }
    }

    updateSystemStat(statType, newValue) {
        const statElement = document.querySelector(`[data-stat="${statType}"]`);
        if (statElement) {
            const valueElement = statElement.querySelector(".system-value");
            const progressBar = statElement.querySelector(
                ".system-progress-bar"
            );

            if (valueElement && progressBar) {
                const currentValue = parseInt(valueElement.dataset.value);

                if (currentValue !== newValue) {
                    // Update value
                    valueElement.dataset.value = newValue;
                    valueElement.textContent = newValue + "%";

                    // Update progress bar
                    progressBar.style.width = newValue + "%";
                    progressBar.dataset.target = newValue;

                    // Update color based on value
                    this.updateStatColor(valueElement, progressBar, newValue);
                }
            }
        }
    }

    updateStatColor(valueElement, progressBar, value) {
        // Remove existing color classes
        valueElement.classList.remove(
            "text-success",
            "text-warning",
            "text-danger"
        );
        progressBar.classList.remove("bg-success", "bg-warning", "bg-danger");

        // Add appropriate color based on value
        if (value < 50) {
            valueElement.classList.add("text-success");
            progressBar.classList.add("bg-success");
        } else if (value < 80) {
            valueElement.classList.add("text-warning");
            progressBar.classList.add("bg-warning");
        } else {
            valueElement.classList.add("text-danger");
            progressBar.classList.add("bg-danger");
        }
    }

    showLoadingState() {
        const statsContainer = document.getElementById("statisticsContainer");
        if (statsContainer) {
            statsContainer.classList.add("loading");
        }
    }

    hideLoadingState() {
        const statsContainer = document.getElementById("statisticsContainer");
        if (statsContainer) {
            statsContainer.classList.remove("loading");
        }
    }

    showError(message) {
        // Show error notification
        if (window.DashboardManager) {
            window.DashboardManager.showNotification(message, "danger");
        }
    }

    // Add pulse animation to updated stats
    addUpdateAnimation(element) {
        element.classList.add("pulse");
        setTimeout(() => {
            element.classList.remove("pulse");
        }, 2000);
    }
}

// Initialize when DOM is ready
document.addEventListener("DOMContentLoaded", function () {
    window.StatisticsManager = new StatisticsManager();
    console.log("Statistics Manager loaded");
});

// Add CSS class for updated stats animation
const style = document.createElement("style");
style.textContent = `
    .stat-updated {
        animation: statUpdate 1s ease-out;
    }
    
    @keyframes statUpdate {
        0% {
            background-color: rgba(74, 222, 128, 0.2);
            transform: scale(1);
        }
        50% {
            background-color: rgba(74, 222, 128, 0.1);
            transform: scale(1.02);
        }
        100% {
            background-color: transparent;
            transform: scale(1);
        }
    }
`;
document.head.appendChild(style);