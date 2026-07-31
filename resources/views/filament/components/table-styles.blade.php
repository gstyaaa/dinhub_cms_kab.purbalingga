<style>
    /* =========================================================
       CUSTOM BLUE LIST ACCENT FOR ALL FILAMENT ADMIN TABLES
       ========================================================= */

    /* Top Blue Accent Bar & Soft Shadow on Table Containers */
    .fi-ta-ctn,
    .fi-ta-content,
    div.fi-ta-ctn,
    div.fi-ta-content {
        border-top: 4px solid #0d6efd !important;
        box-shadow: 0 4px 18px rgba(13, 110, 253, 0.09) !important;
        border-radius: 0.75rem !important;
        overflow: hidden !important;
    }

    /* Table Header Blue Tint & Bottom Border */
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
</style>
