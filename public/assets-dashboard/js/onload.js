// loading.js

// انتظر حتى يتم تحميل الصفحة بشكل كامل
window.addEventListener("load", function () {
    // اظهار العناصر بعد تحميل الصفحة بشكل كامل
    var elementsToShow = document.querySelectorAll("#content");
    elementsToShow.forEach(function (element) {
        element.style.display = "block";
    });

    // ابتعاد شاشة التحميل
    var loader = document.querySelector("#loading");
    loader.style.display = "none";
});
