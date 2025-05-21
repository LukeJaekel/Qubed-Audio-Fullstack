// Changes colour based on availability
function setStatusColor() {
    const statusContainers = document.getElementsByClassName("status-container");

    for (var i = 0; i < statusContainers.length; i++) {
        $productStatusID = $row["AssetStatusID"];
        if ($productStatusID == 1) {
            $statusText = "Asset Booked";
            $statusColor = "rgb(250, 170, 100)"; // orange
        } else if ($productStatusID == 0) {
            $statusText = "In Warehouse";
            $statusColor = "rgb(100, 250, 128)"; // green
        } else {
            $statusText = "Unknown Status";
            $statusColor = "white";
        }
    }
}

window.onload = function() {
    setStatusColor();
};
