// public/assets/admin/js/dashboard.js

class DashboardManager {
    constructor() {
        this.init();
        this.bindEvents();
        this.startAutoRefresh();
    }

    init() {
        console.log('Dashboard Manager initialized');
        this.initializeComponents();
        this.loadInitialData();
    }

    initializeComponents() {
        // Initialize tooltips
        this.initTooltips();
        
        // Initialize modals
        this.initModals();
        
        // Initialize dropdowns
        this.initDropdowns();
    }

    initTooltips() {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    }

    initModals() {
        // Initialize any modals needed for dashboard
        const modalElements = document.querySelectorAll('.modal');
        modalElements.forEach(modal => {
            new bootstrap.Modal(modal);
        });
    }

    initDropdowns() {
        // Initialize Bootstrap dropdowns
        const dropdownElementList = [].slice.call(document.querySelectorAll('.dropdown-toggle'));
        dropdownElementList.map(function (dropdownToggleEl) {
            return new bootstrap.Dropdown(dropdownToggleEl);
        });
    }

    bindEvents() {
        // Export button
        const exportBtn = document.getElementById('exportBtn');
        if (exportBtn) {
            exportBtn.addEventListener('click', () => this.handleExport());
        }

        // Quick action tracking
        document.querySelectorAll('.quick-action-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const action = e.currentTarget.dataset.action;
                this.trackQuickAction(action);
            });
        });

        // Overview card interactions
        document.querySelectorAll('.overview-card').forEach(card => {
            card.addEventListener('mouseenter', () => this.handleCardHover(card));
            card.addEventListener('mouseleave', () => this.handleCardLeave(card));
        });

        // Window resize handling
        window.addEventListener('resize', () => this.handleResize());
    }

    loadInitialData() {
        // Load any initial data needed for the dashboard
        this.checkSystemStatus();
        this.loadRecentNotifications();
    }

    handleExport() {
        // Show loading state
        const exportBtn = document.getElementById('exportBtn');
        const originalText = exportBtn.innerHTML;
        exportBtn.innerHTML = '<i class="bi bi-hourglass-split me-1"></i>Exporting...';
        exportBtn.disabled = true;

        // Simulate export process
        setTimeout(() => {
            // In real implementation, this would make an AJAX call
            this.showNotification('Export completed successfully!', 'success');
            exportBtn.innerHTML = originalText;
            exportBtn.disabled = false;
        }, 2000);
    }

    trackQuickAction(action) {
        console.log(`Quick action clicked: ${action}`);
        
        // Add visual feedback
        const button = document.querySelector(`[data-action="${action}"]`);
        if (button) {
            button.style.transform = 'scale(0.95)';
            setTimeout(() => {
                button.style.transform = '';
            }, 150);
        }

        // Track analytics (if needed)
        if (typeof gtag !== 'undefined') {
            gtag('event', 'quick_action_click', {
                'action': action,
                'page': 'dashboard'
            });
        }
    }

    handleCardHover(card) {
        // Add any hover effects or load additional data
        const module = card.dataset.module;
        
        // Add subtle animation
        card.style.transform = 'translateY(-5px) scale(1.02)';
        
        // Load quick stats if needed
        this.loadQuickStats(module);
    }

    handleCardLeave(card) {
        // Reset hover effects
        card.style.transform = '';
    }

    loadQuickStats(module) {
        // Load quick statistics for the hovered module
        // This could make AJAX calls to get real-time data
        console.log(`Loading quick stats for module: ${module}`);
    }

    handleResize() {
        // Handle responsive adjustments
        if (window.innerWidth < 768) {
            document.body.classList.add('mobile-view');
        } else {
            document.body.classList.remove('mobile-view');
        }
    }

    checkSystemStatus() {
        // Check system status and update indicators
        fetch('/admin/api/system-status')
            .then(response => response.json())
            .then(data => {
                this.updateSystemStatus(data);
            })
            .catch(error => {
                console.warn('Could not load system status:', error);
                // Set default values or show offline status
            });
    }

    updateSystemStatus(data) {
        const statusBadge = document.getElementById('systemStatusBadge');
        if (statusBadge) {
            statusBadge.textContent = data.status || 'Online';
            statusBadge.className = `badge bg-${data.status === 'online' ? 'success' : 'warning'} ms-2`;
        }
    }

    loadRecentNotifications() {
        // Load recent notifications or alerts
        fetch('/admin/api/notifications')
            .then(response => response.json())
            .then(data => {
                this.displayNotifications(data);
            })
            .catch(error => {
                console.warn('Could not load notifications:', error);
            });
    }

    displayNotifications(notifications) {
        // Display notifications in the UI
        if (notifications && notifications.length > 0) {
            // Create notification dropdown or toast
            console.log('Notifications loaded:', notifications);
        }
    }

    startAutoRefresh() {
        // Auto refresh dashboard data every 30 seconds
        this.refreshInterval = setInterval(() => {
            this.refreshDashboardData();
        }, 30000);
    }

    refreshDashboardData() {
        console.log('Refreshing dashboard data...');
        
        // Refresh statistics
        if (window.StatisticsManager) {
            window.StatisticsManager.refreshStats();
        }
        
        // Refresh activity timeline
        if (window.ActivityTimelineManager) {
            window.ActivityTimelineManager.refreshActivities();
        }
        
        // Update system status
        this.checkSystemStatus();
    }

    showNotification(message, type = 'info') {
        // Create and show notification
        const notification = document.createElement('div');
        notification.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
        notification.style.cssText = 'top: 20px; right: 20px; z-index: 9999; min-width: 300px;';
        notification.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        `;
        
        document.body.appendChild(notification);
        
        // Auto remove after 5 seconds
        setTimeout(() => {
            if (notification.parentNode) {
                notification.remove();
            }
        }, 5000);
    }

    destroy() {
        // Clean up intervals and event listeners
        if (this.refreshInterval) {
            clearInterval(this.refreshInterval);
        }
        
        // Remove event listeners
        window.removeEventListener('resize', this.handleResize);
    }
}

// Utility functions
class DashboardUtils {
    static formatNumber(num) {
        if (num >= 1000000) {
            return (num / 1000000).toFixed(1) + 'M';
        }
        if (num >= 1000) {
            return (num / 1000).toFixed(1) + 'K';
        }
        return num.toString();
    }

    static formatTime(date) {
        const now = new Date();
        const diff = now - new Date(date);
        const seconds = Math.floor(diff / 1000);
        const minutes = Math.floor(seconds / 60);
        const hours = Math.floor(minutes / 60);
        const days = Math.floor(hours / 24);

        if (days > 0) return `${days} hari yang lalu`;
        if (hours > 0) return `${hours} jam yang lalu`;
        if (minutes > 0) return `${minutes} menit yang lalu`;
        return 'Baru saja';
    }

    static animateValue(element, start, end, duration = 1000) {
        const range = end - start;
        const startTime = performance.now();
        
        function animate(currentTime) {
            const elapsed = currentTime - startTime;
            const progress = Math.min(elapsed / duration, 1);
            const value = start + (range * progress);
            
            element.textContent = Math.floor(value);
            
            if (progress < 1) {
                requestAnimationFrame(animate);
            }
        }
        
        requestAnimationFrame(animate);
    }

    static debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }
}

// Initialize dashboard when DOM is ready
document.addEventListener('DOMContentLoaded', function() {
    // Initialize dashboard manager
    window.DashboardManager = new DashboardManager();
    
    // Make utils available globally
    window.DashboardUtils = DashboardUtils;
    
    console.log('Dashboard initialized successfully');
});

// Handle page unload
window.addEventListener('beforeunload', function() {
    if (window.DashboardManager) {
        window.DashboardManager.destroy();
    }
});