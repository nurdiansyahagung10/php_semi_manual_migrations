<!-- tidak ada yang harus di rubah di sini -->

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>bootstrap demo</title>
    <link rel="stylesheet" href="assets/css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/fontawesome.min.js"></script>
</head>

<body>

    <div class="w-100 h-auto position-fixed">
        <div class="loading"></div>
    </div>
    <div class="container-xxl mode">
        <div aria-live="polite" aria-atomic="true" class="position-relative">
            <div class="toast-container top-0 end-0 p-3">

                <!-- Then put toasts within -->

            </div>
        </div>
        <div class="w-100 d-flex mode align-items-center justify-content-center box-button">
            <div class="w-50 p-3 shadow rounded-3 border d-flex flex-column align-items-center">
                <div class="d-flex gap-4 flex-wrap align-items-center" id="buttongroup">
                    <button onclick="create()" class="btn border flex-fill bg-white">create</button>
                    <button onclick="drop()" class="btn border flex-fill bg-white">drop</button>
                    <button onclick="fresh()" class="btn border flex-fill bg-white">fresh</button>
                    <button onclick="modenight()" class="btn border flex-fill bg-white"><i
                            class="fa-regular fa-moon"></i></button>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap/popper.min.js"></script>
    <script src="assets/js/scripts.js"></script>
</body>

</html>