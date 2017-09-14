$(document).ready(function()
{
    // Show lightbox
    $('body').on('click', '.lightbox-message-open', function()
    {
        var lightbox = $(document).find("#lightbox-message");
        if(lightbox.length == 0) return false;

        lightbox.first().removeClass("hidden");
    });
    $('body').on('click', '.lightbox-review-open', function()
    {
        var lightbox = $(document).find("#lightbox-review");
        if(lightbox.length == 0) return false;

        lightbox.first().removeClass("hidden");
    });

    // Hide lightbox
    $('body').on('click', '.lightbox-close', function()
    {
        var lightboxes = $(document).find(".lightbox-container");
        if(lightboxes.length == 0) return false;

        lightboxes.addClass("hidden");
    });

    // Prevents the event from bubbling up the DOM tree, preventing any parent handlers from being notified of the event.
    $('body').on('click', '.stop-propagation', function()
    {
        event.stopPropagation();
        return false;
    });
});