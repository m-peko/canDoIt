$(document).ready(function() {

    /**
     * By clicking on sidebar toggle
     * button, change icon (fa-angle-left
     * or fa-angle-right) and add or remove
     * class .sidebar-mini from body.
     */
    $("#sidebar-toggle-button").on("click", function(e) {
        e.preventDefault();
        $("#sidebar-toggle-button i").toggleClass("navigation-bar-icon-active");
        $("body").toggleClass("sidebar-mini");
    });

    /**
     * Collapse sidebar dropdown
     * when any item is clicked.
     */
    $(".sidebar-navigation > li > a").on("click", function(e) {
        $("#sidebar-dropdown-account").collapse("hide");
        $("#sidebar-dropdown-info").collapse("hide");
    });

    /**
     * Change icon on navigation
     * bar item depending on whether
     * dropdown is collapsed or not.
     */
    $("#sidebar-dropdown-account, #sidebar-dropdown-info")
        .on("show.bs.collapse", function(e) {
            $(this).parent().find("a > .sidebar-navigation-icon-right").addClass("sidebar-navigation-icon-down");
        })
        .on("hide.bs.collapse", function(e) {
            $(this).parent().find("a > .sidebar-navigation-icon-right").removeClass("sidebar-navigation-icon-down");
        });

    /**
     * Add class .active to currently
     * selected item and remove class
     * .active from previously selected
     * item.
     */
    const $sidebarItems = $(".sidebar-navigation > li > a");

    $sidebarItems.on("click", e => selectSidebarItem(e.currentTarget));

    function selectSidebarItem(selectedItem) {
        $(".sidebar-navigation > li > a.active").removeClass("active");
        $(selectedItem).addClass("active");
    }

});
