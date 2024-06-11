$(document).ready(function () {


    function check(image, imagemodal, modalcheck) {

        $(image).on("click", function () {
            $(modalcheck).attr("src", $(image).attr("src"));
            $(imagemodal).removeClass("hidden").addClass("flex");
        });

        $(imagemodal).on("click", function (e) {
            if (!$(e.target).closest(".max-w-sm").length) {
                $(imagemodal).addClass("hidden").removeClass("flex");
            }
        });
    };

    check('#checkimg', '#imageModal', '#modalcheck');
    check('#checkimg2', '#imageModal2', '#modalcheck2');



});