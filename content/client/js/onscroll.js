window.onscroll = function() {
    console.info(document.documentElement.scrollTop);
    var header = document.getElementById('header');
    if (document.documentElement.scrollTop > 100 || document.body.scrollTop > 100) {

        header.style.position = "fixed";
        header.style.left = 0;
        header.style.right = 0;
        header.style.top = 0;
        header.style.zIndex = 100;

    } else {
        header.style.position = "relative";
    }


}