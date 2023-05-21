// Changes colour based on availability
function setStatusColor() {
    const statusContainers = document.getElementsByClassName("status-container");

    for (var i = 0; i < statusContainers.length; i++) {
        let container = statusContainers[i];
        let statusText = container.innerText;

        if (statusText === "Available") {
            container.style.color = "rgb(100, 250, 128)";
        } else if (statusText === "Currently out on hire") {
            container.style.color = "rgb(250, 170, 100)";
        } else if (statusText === "Currently not available") {
            container.style.color = "rgb(250, 100, 100)";
        }
    }
}

window.onload = function() {
    setStatusColor();
};
