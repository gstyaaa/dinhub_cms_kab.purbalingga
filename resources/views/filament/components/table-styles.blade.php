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
</style>

