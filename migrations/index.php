<!-- tidak ada yang harus di rubah di sini -->

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/07d74fac69.js" crossorigin="anonymous"></script>
</head>

<style>
    * {
        transition: 0.2s;
    }

    .loading {
        background-size: 200% 200%;

        animation: gradient 5s linear infinite;
    }

    @keyframes gradient {
        0% {
            background-position: 0% 50%;
        }

        50% {
            background-position: 100% 50%;
        }

        100% {
            background-position: 0% 50%;
        }
    }
</style>

<body>
    <div class="w-100 h-auto position-fixed">
        <div style="height: 8px; background-image: linear-gradient(90deg,#212529 ,white, #212529,white); opacity: 0;"
            class="loading"></div>
    </div>
    <div class="container-xxl mode">
        <div aria-live="polite" aria-atomic="true" class="position-relative">
            <div class="toast-container top-0 end-0 p-3"
                style="height: 100vh;  overflow-y: scroll; scrollbar-width: none;">

                <!-- Then put toasts within -->

            </div>
        </div>
        <div class="w-100 d-flex mode align-items-center justify-content-center" style="height: 100vh;">
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

</html>