// public/assets/admin/js/activity-timeline.js

class ActivityTimelineManager {
    constructor() {
        this.currentPage = 1;
        this.isLoading = false;
        this.hasMore = true;
        this.init();
        this.bindEvents();
    }

    init() {
        console.log("Activity Timeline Manager initialized");
        this.initializeTimeline();
    }

    initializeTimeline() {
        // Add entrance animations to existing items
        const timelineItems = document.querySelectorAll(".activity-item");
        timelineItems.forEach((item, index) => {
            setTimeout(() => {
                item.classList.add("animate-in");
            }, index * 100);
        });
    }

    bindEvents() {
        // Refresh button
        const refreshBtn = document.getElementById("refreshActivityBtn");
        if (refreshBtn) {
            refreshBtn.addEventListener("click", () =>
                this.refreshActivities()
            );
        }

        // Load more button
        const loadMoreBtn = document.getElementById("loadMoreActivities");
        if (loadMoreBtn) {
            loadMoreBtn.addEventListener("click", () =>
                this.loadMoreActivities()
            );
        }

        // Activity item interactions
        document.addEventListener("click", (e) => {
            if (e.target.closest(".activity-item")) {
                this.handleActivityClick(e.target.closest(".activity-item"));
            }
        });

        // Listen for custom events
        document.addEventListener("new-activity", (e) => {
            this.addNewActivity(e.detail);
        });
    }

    refreshActivities() {
        console.log("Refreshing activities...");

        const refreshBtn = document.getElementById("refreshActivityBtn");
        if (refreshBtn) {
            refreshBtn.classList.add("refreshing");
        }

        this.isLoading = true;

        // Fetch latest activities
        fetch("/admin/api/recent-activities")
            .then((response) => response.json())
            .then((data) => {
                this.updateTimeline(data.activities);
                this.hideLoadingState();
            })
            .catch((error) => {
                console.error("Failed to refresh activities:", error);
                this.showError("Failed to refresh activities");
            })
            .finally(() => {
                this.isLoading = false;
                if (refreshBtn) {
                    refreshBtn.classList.remove("refreshing");
                }
            });
    }

    loadMoreActivities() {
        if (this.isLoading || !this.hasMore) return;

        console.log("Loading more activities...");

        const loadMoreBtn = document.getElementById("loadMoreActivities");
        if (loadMoreBtn) {
            loadMoreBtn.classList.add("loading");
            loadMoreBtn.textContent = "Loading...";
        }

        this.isLoading = true;
        this.currentPage++;

        // Fetch more activities
        fetch(`/admin/api/recent-activities?page=${this.currentPage}`)
            .then((response) => response.json())
            .then((data) => {
                this.appendActivities(data.activities);
                this.hasMore = data.hasMore;

                if (!this.hasMore && loadMoreBtn) {
                    loadMoreBtn.style.display = "none";
                }
            })
            .catch((error) => {
                console.error("Failed to load more activities:", error);
                this.showError("Failed to load more activities");
                this.currentPage--; // Revert page increment
            })
            .finally(() => {
                this.isLoading = false;
                if (loadMoreBtn) {
                    loadMoreBtn.classList.remove("loading");
                    loadMoreBtn.textContent = "Lihat Lebih Banyak";
                }
            });
    }

    updateTimeline(activities) {
        const timeline = document.getElementById("activityTimeline");
        if (!timeline) return;

        // Clear existing activities
        timeline.innerHTML = "";

        // Add new activities
        activities.forEach((activity, index) => {
            const activityElement = this.createActivityElement(activity);
            timeline.appendChild(activityElement);

            // Animate in
            setTimeout(() => {
                activityElement.classList.add("animate-in");
            }, index * 100);
        });

        // Reset pagination
        this.currentPage = 1;
        this.hasMore = activities.length >= 10; // Assuming 10 per page
    }

    appendActivities(activities) {
        const timeline = document.getElementById("activityTimeline");
        if (!timeline) return;

        activities.forEach((activity, index) => {
            const activityElement = this.createActivityElement(activity);
            timeline.appendChild(activityElement);

            // Animate in with delay
            setTimeout(() => {
                activityElement.classList.add("animate-in");
            }, index * 100);
        });
    }

    createActivityElement(activity) {
        const activityItem = document.createElement("div");
        activityItem.className = "activity-item";
        activityItem.dataset.activityId = activity.id;
        activityItem.dataset.activityType = activity.type || "info";

        const iconClass = this.getIconClass(activity.type);
        const colorClass = this.getColorClass(activity.type);
        const formattedTime = this.formatRelativeTime(activity.created_at);

        activityItem.innerHTML = `
            <div class="activity-icon bg-${colorClass}">
                <i class="bi bi-${iconClass}"></i>
            </div>
            <div class="activity-content">
                <h6>${this.escapeHtml(activity.title)}</h6>
                <p class="text-muted">${this.escapeHtml(
                    activity.description
                )}</p>
                <small class="text-muted">${formattedTime}</small>
            </div>
        `;

        return activityItem;
    }

    getIconClass(type) {
        const iconMap = {
            create: "plus-circle",
            update: "pencil",
            delete: "trash",
            info: "info-circle",
            warning: "exclamation-triangle",
            success: "check-circle",
            error: "x-circle",
        };
        return iconMap[type] || "circle";
    }

    getColorClass(type) {
        const colorMap = {
            create: "success",
            update: "primary",
            delete: "danger",
            info: "info",
            warning: "warning",
            success: "success",
            error: "danger",
        };
        return colorMap[type] || "primary";
    }

    formatRelativeTime(dateString) {
        if (window.DashboardUtils && window.DashboardUtils.formatTime) {
            return window.DashboardUtils.formatTime(dateString);
        }

        // Fallback formatting
        const date = new Date(dateString);
        const now = new Date();
        const diff = now - date;
        const seconds = Math.floor(diff / 1000);
        const minutes = Math.floor(seconds / 60);
        const hours = Math.floor(minutes / 60);
        const days = Math.floor(hours / 24);

        if (days > 0) return `${days} hari yang lalu`;
        if (hours > 0) return `${hours} jam yang lalu`;
        if (minutes > 0) return `${minutes} menit yang lalu`;
        return "Baru saja";
    }

    escapeHtml(text) {
        const div = document.createElement("div");
        div.textContent = text;
        return div.innerHTML;
    }

    handleActivityClick(activityElement) {
        const activityId = activityElement.dataset.activityId;
        const activityType = activityElement.dataset.activityType;

        console.log(`Activity clicked: ${activityId} (${activityType})`);

        // Add click feedback
        activityElement.style.transform = "scale(0.98)";
        setTimeout(() => {
            activityElement.style.transform = "";
        }, 150);

        // Handle specific activity types
        this.handleActivityAction(activityId, activityType);
    }

    handleActivityAction(activityId, activityType) {
        // Route to appropriate action based on activity type
        switch (activityType) {
            case "create":
            case "update":
                // Could open edit modal or navigate to edit page
                this.showActivityDetails(activityId);
                break;
            case "delete":
                // Show confirmation or undo action
                this.showDeleteConfirmation(activityId);
                break;
            default:
                this.showActivityDetails(activityId);
        }
    }

    showActivityDetails(activityId) {
        // Show activity details in a modal or sidebar
        console.log(`Showing details for activity: ${activityId}`);

        // In a real implementation, this would show a modal with activity details
        if (window.DashboardManager) {
            window.DashboardManager.showNotification(
                "Activity details loaded",
                "info"
            );
        }
    }

    showDeleteConfirmation(activityId) {
        // Show confirmation for delete actions
        const confirmed = confirm(
            "Are you sure you want to proceed with this action?"
        );
        if (confirmed) {
            console.log(`Confirmed action for activity: ${activityId}`);
        }
    }

    addNewActivity(activityData) {
        console.log("Adding new activity:", activityData);

        const timeline = document.getElementById("activityTimeline");
        if (!timeline) return;

        // Create new activity element
        const newActivityElement = this.createActivityElement(activityData);

        // Add highlight class for new activities
        newActivityElement.classList.add("new-activity");

        // Insert at the beginning of timeline
        timeline.insertBefore(newActivityElement, timeline.firstChild);

        // Animate in
        setTimeout(() => {
            newActivityElement.classList.add("animate-in");
        }, 100);

        // Remove highlight after animation
        setTimeout(() => {
            newActivityElement.classList.remove("new-activity");
        }, 3000);
    }

    showLoadingState() {
        const timeline = document.getElementById("activityTimeline");
        if (timeline) {
            timeline.classList.add("loading");
        }
    }

    hideLoadingState() {
        const timeline = document.getElementById("activityTimeline");
        if (timeline) {
            timeline.classList.remove("loading");
        }
    }

    showError(message) {
        if (window.DashboardManager) {
            window.DashboardManager.showNotification(message, "danger");
        }
    }

    // Method to simulate real-time updates
    simulateRealTimeUpdates() {
        // This would typically connect to WebSocket or Server-Sent Events
        setInterval(() => {
            if (Math.random() < 0.1) {
                // 10% chance every 30 seconds
                const mockActivity = {
                    id: Date.now(),
                    type: "info",
                    title: "System Update",
                    description: "Automatic system maintenance completed",
                    created_at: new Date().toISOString(),
                };
                this.addNewActivity(mockActivity);
            }
        }, 30000);
    }
}

// Initialize when DOM is ready
document.addEventListener("DOMContentLoaded", function () {
    window.ActivityTimelineManager = new ActivityTimelineManager();
    console.log("Activity Timeline Manager loaded");

    // Uncomment to enable real-time simulation
    // window.ActivityTimelineManager.simulateRealTimeUpdates();
});

// Add CSS for new activity highlighting
const style = document.createElement("style");
style.textContent = `
    .activity-item.new-activity {
        background: rgba(34, 197, 94, 0.1);
        border: 1px solid rgba(34, 197, 94, 0.3);
        border-radius: 8px;
        padding: 15px;
        margin: -15px -15px 10px -15px;
        animation: newActivityPulse 3s ease-out;
    }
    
    @keyframes newActivityPulse {
        0% {
            background: rgba(34, 197, 94, 0.2);
            transform: scale(1.02);
        }
        50% {
            background: rgba(34, 197, 94, 0.15);
            transform: scale(1.01);
        }
        100% {
            background: rgba(34, 197, 94, 0.05);
            transform: scale(1);
        }
    }
`;
document.head.appendChild(style);
