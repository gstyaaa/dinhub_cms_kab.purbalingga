<style>
    /* =========================================================
       CUSTOM BLUE ACCENT & HIGH CONTRAST DARK MODE FOR FILAMENT
       ========================================================= */

    /* Top Blue Accent Bar & Soft Shadow on Table Containers & Section Cards */
    .fi-ta-ctn,
    .fi-ta-content,
    div.fi-ta-ctn,
    div.fi-ta-content,
    .kadis-card-container {
        border-top: 4px solid #0d6efd !important;
        box-shadow: 0 4px 18px rgba(13, 110, 253, 0.09) !important;
        border-radius: 0.75rem !important;
        overflow: hidden !important;
    }

    /* Table Header Blue Tint & Bottom Border - Light Mode */
    .fi-ta-header-cell,
    th.fi-ta-header-cell {
        background-color: rgba(13, 110, 253, 0.05) !important;
        border-bottom: 2px solid rgba(13, 110, 253, 0.2) !important;
    }

    .fi-ta-header-cell-label {
        color: #0b5ed7 !important;
        font-weight: 700 !important;
    }

    /* Table Row Blue Left Accent Indicator on Hover */
    .fi-ta-row {
        transition: all 0.2s ease-in-out !important;
    }

    .fi-ta-row:hover {
        background-color: rgba(13, 110, 253, 0.035) !important;
        box-shadow: inset 4px 0 0 #0d6efd !important;
    }

    /* Table Search & Filter Bar Top Container */
    .fi-ta-header-ctn {
        border-bottom: 1px solid rgba(13, 110, 253, 0.12) !important;
        background-color: rgba(13, 110, 253, 0.02) !important;
    }

    /* Alternating Row Tint */
    .fi-ta-row:nth-child(even) {
        background-color: rgba(248, 250, 252, 0.5);
    }

    /* =========================================================
       DARK MODE HIGH CONTRAST & LEGIBILITY FIXES
       ========================================================= */

    html.dark .fi-ta-header-cell,
    html.dark th.fi-ta-header-cell {
        background-color: rgba(15, 23, 42, 0.95) !important;
        border-bottom: 2px solid rgba(59, 130, 246, 0.3) !important;
    }

    html.dark .fi-ta-header-cell-label {
        color: #60a5fa !important; /* Soft bright blue for dark mode */
        font-weight: 700 !important;
    }

    html.dark .fi-ta-row:nth-child(even) {
        background-color: rgba(30, 41, 59, 0.35) !important;
    }

    html.dark .fi-ta-row:hover {
        background-color: rgba(30, 58, 138, 0.3) !important;
        box-shadow: inset 4px 0 0 #3b82f6 !important;
    }

    html.dark .fi-ta-header-ctn {
        background-color: rgba(15, 23, 42, 0.8) !important;
        border-bottom: 1px solid rgba(59, 130, 246, 0.2) !important;
    }

    /* Input & Textarea High Contrast in Dark Mode */
    html.dark .fi-fo-text-input input,
    html.dark .fi-fo-textarea textarea,
    html.dark .fi-fo-select select {
        color: #f8fafc !important;
    }

    /* Section & Card Description Text Legibility */
    html.dark .fi-section-header-description,
    html.dark .fi-header-subheading,
    html.dark .fi-ta-empty-state-description {
        color: #94a3b8 !important;
    }

    /* Table Cell High Contrast Text */
    html.dark .fi-ta-text-item-label {
        color: #f1f5f9 !important;
    }

    /* Portrait Photo Frame Aspect Ratio & Centered Text for FileUpload */
    .fi-fo-file-upload .filepond--root,
    .fi-fo-file-upload .fi-fo-file-upload-dropzone {
        aspect-ratio: 3 / 4 !important;
        max-height: 260px !important;
        border-radius: 0.75rem !important;
    }

    .fi-fo-file-upload .filepond--drop-label,
    .fi-fo-file-upload .fi-fo-file-upload-dropzone-content {
        display: flex !important;
        flex-direction: column !important;
        align-items: center !important;
        justify-content: center !important;
        text-align: center !important;
        height: 100% !important;
        min-height: 100% !important;
    }

    .fi-fo-file-upload .filepond--drop-label label,
    .fi-fo-file-upload .filepond--label-action {
        text-align: center !important;
        margin: auto !important;
        display: block !important;
        width: 100% !important;
    }

    /* =========================================================
       SIDEBAR NAVIGATION STYLING (WHITE BACKGROUND & COMPACT NO-SCROLL)
       ========================================================= */

    /* Set Sidebar Width CSS Variable Natively (17.25rem = ~276px) */
    :root,
    html,
    body,
    .fi-layout,
    .fi-sidebar,
    aside.fi-sidebar {
        --sidebar-width: 17.25rem !important; /* ~276px */
        --collapsed-sidebar-width: 4.5rem !important;
    }

    @media (min-width: 1024px) {
        :root,
        html,
        body,
        .fi-layout,
        .fi-sidebar,
        aside.fi-sidebar {
            --sidebar-width: 17.25rem !important; /* ~276px */
        }
    }

    /* Clean White Sidebar Background & Border */
    aside.fi-sidebar,
    .fi-sidebar,
    div.fi-sidebar {
        background-color: #ffffff !important;
        border-right: 1px solid #e2e8f0 !important;
    }

    html.dark aside.fi-sidebar,
    html.dark .fi-sidebar {
        background-color: #0f172a !important;
        border-right: 1px solid #1e293b !important;
    }

    /* Sidebar Header (Logo area) */
    .fi-sidebar-header {
        background-color: #ffffff !important;
        border-bottom: 1px solid #f1f5f9 !important;
        padding-top: 0.5rem !important;
        padding-bottom: 0.5rem !important;
    }

    html.dark .fi-sidebar-header {
        background-color: #0f172a !important;
        border-bottom: 1px solid #1e293b !important;
    }

    /* Compact Sidebar Nav & Group Spacing (Eliminating Vertical Scrollbar) */
    nav.fi-sidebar-nav,
    .fi-sidebar-nav {
        padding-top: 0.25rem !important;
        padding-bottom: 0.25rem !important;
        padding-left: 0.5rem !important;
        padding-right: 0.5rem !important;
    }

    ul.fi-sidebar-nav-groups,
    .fi-sidebar-nav-groups {
        gap: 0.35rem !important;
        margin: 0 !important;
        padding: 0 !important;
    }

    .fi-sidebar-group {
        margin-top: 0.35rem !important;
        margin-bottom: 0.1rem !important;
    }

    .fi-sidebar-group-label {
        font-size: 0.6875rem !important; /* 11px */
        font-weight: 700 !important;
        text-transform: uppercase !important;
        letter-spacing: 0.05em !important;
        color: #64748b !important;
        padding-left: 0.5rem !important;
        padding-right: 0.5rem !important;
        margin-bottom: 0.15rem !important;
    }

    html.dark .fi-sidebar-group-label {
        color: #94a3b8 !important;
    }

    ul.fi-sidebar-group-items,
    .fi-sidebar-group-items {
        gap: 0.15rem !important;
    }

    /* Sidebar Items & Buttons Sizing (36px height, 13px font) */
    .fi-sidebar-item-button {
        min-height: 36px !important;
        height: 36px !important;
        font-size: 0.8125rem !important; /* 13px */
        color: #334155 !important;
        border-radius: 0.375rem !important;
        padding-left: 0.65rem !important;
        padding-right: 0.65rem !important;
        gap: 0.5rem !important;
        white-space: nowrap !important;
        transition: all 0.15s ease-in-out !important;
    }

    .fi-sidebar-item-button .fi-sidebar-item-icon {
        color: #64748b !important;
        font-size: 1.1rem !important;
        width: 18px !important;
        height: 18px !important;
    }

    /* Active Navigation Item Styling (Light Blue Background with Solid Blue Text & Icon) */
    .fi-sidebar-item-button.fi-active,
    .fi-sidebar-item-active .fi-sidebar-item-button {
        background-color: #eff6ff !important;
        color: #0d6efd !important;
        font-weight: 600 !important;
    }

    .fi-sidebar-item-button.fi-active .fi-sidebar-item-icon,
    .fi-sidebar-item-active .fi-sidebar-item-icon {
        color: #0d6efd !important;
    }

    html.dark .fi-sidebar-item-button.fi-active,
    html.dark .fi-sidebar-item-active .fi-sidebar-item-button {
        background-color: rgba(30, 58, 138, 0.35) !important;
        color: #60a5fa !important;
    }

    html.dark .fi-sidebar-item-button.fi-active .fi-sidebar-item-icon,
    html.dark .fi-sidebar-item-active .fi-sidebar-item-icon {
        color: #60a5fa !important;
    }

    /* Hover Inactive State */
    .fi-sidebar-item-button:not(.fi-active):hover {
        background-color: #f8fafc !important;
        color: #0f172a !important;
    }

    html.dark .fi-sidebar-item-button:not(.fi-active):hover {
        background-color: rgba(30, 41, 59, 0.5) !important;
        color: #f1f5f9 !important;
    }

    /* Scoped Styles for Welcome Header Widget Card (Institutional White Card with Left Solid Blue Accent) */
    .fi-wi-widget:has(.fi-welcome-header-card),
    .fi-widget:has(.fi-welcome-header-card) {
        background: transparent !important;
        border: none !important;
        box-shadow: none !important;
        padding: 0 !important;
    }

    .fi-welcome-header-card {
        background-color: #ffffff !important;
        border: 1px solid #e5e7eb !important;
        border-left: 4px solid #0d6efd !important;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05) !important;
        padding: 1.5rem !important; /* 24px */
    }

    html.dark .fi-welcome-header-card {
        background-color: #0f172a !important;
        border: 1px solid #1e293b !important;
        border-left: 4px solid #3b82f6 !important;
    }

    .fi-welcome-header-card .welcome-container {
        display: flex !important;
        flex-direction: row !important;
        align-items: flex-start !important;
        justify-content: space-between !important;
        gap: 2.5rem !important;
    }

    .fi-welcome-header-card .welcome-content {
        flex: 1 1 0% !important;
        min-width: 0 !important;
    }

    .fi-welcome-header-card .welcome-actions {
        flex-shrink: 0 !important;
    }

    .fi-welcome-header-card .welcome-label {
        display: block !important;
        font-size: 12px !important;
        font-weight: 600 !important;
        letter-spacing: 0.05em !important;
        text-transform: uppercase !important;
        color: #0d6efd !important;
        margin-bottom: 12px !important;
    }

    .fi-welcome-header-card .welcome-title {
        display: block !important;
        font-size: 21px !important;
        font-weight: 700 !important;
        color: #111827 !important;
        line-height: 1.3 !important;
        margin-bottom: 8px !important;
    }

    html.dark .fi-welcome-header-card .welcome-title {
        color: #ffffff !important;
    }

    .fi-welcome-header-card .welcome-description {
        display: block !important;
        font-size: 14px !important;
        color: #64748b !important;
        line-height: 1.5 !important;
        margin-bottom: 8px !important;
    }

    html.dark .fi-welcome-header-card .welcome-description {
        color: #94a3b8 !important;
    }

    .fi-welcome-header-card .welcome-button {
        display: inline-flex !important;
        align-items: center !important;
        gap: 0.5rem !important;
        background-color: #0d6efd !important;
        color: #ffffff !important;
        font-size: 14px !important;
        font-weight: 600 !important;
        padding: 10px 16px !important;
        border-radius: 8px !important;
    }

    .fi-welcome-header-card .welcome-button svg {
        width: 16px !important;
        height: 16px !important;
        max-width: 16px !important;
        max-height: 16px !important;
        flex-shrink: 0 !important;
    }
</style>

