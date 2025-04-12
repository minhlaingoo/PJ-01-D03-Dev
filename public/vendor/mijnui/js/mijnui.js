document.addEventListener("alpine:init", () => {
    Alpine.store("sidebar", {
        // Sidebar open/close state (persisted in localStorage)
        isOpen: JSON.parse(localStorage.getItem("mijnuiSidebarOpen")) ?? true,

        // Active content state (persisted in localStorage)
        activeContent: localStorage.getItem("mijnuiActiveContent") || null,

        // Toggle sidebar open/close
        toggle() {
            this.isOpen = !this.isOpen;
            localStorage.setItem("mijnuiSidebarOpen", this.isOpen);
        },

        // Set active content
        setActiveContent(contentId) {
            this.activeContent = contentId;
            localStorage.setItem("mijnuiActiveContent", contentId);

            // Open sidebar if it's closed
            if (!this.isOpen) {
                this.isOpen = true;
                localStorage.setItem("mijnuiSidebarOpen", true);
            }
        }
    });
});
