<?php
include "db/_dbConnect.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex flex-col min-h-screen">
    <!-- Header Section -->
    <div class="p-5 ">
        <?php
        require "components/_navbar.php";
        ?>
    </div>



    <!-- Main Content Section -->
    <div class="flex-grow container mx-auto mt-4 p-4 ">

        <div>

            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                <!-- Carousel wrapper -->
                <div class="relative z-10 h-56 overflow-hidden rounded-lg md:h-96">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://www.shutterstock.com/image-photo/hands-typing-on-laptop-programming-600nw-2480023489.jpg"
                            class="absolute z-10 block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="...">
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT9Q4dZwFKNJkXqIotgYEfk6ZDHFfF1E_is-w&s"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://miro.medium.com/v2/resize:fit:1400/0*7VyEZgzwUhQMeBqb"
                            class="absolute z-10 block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="...">
                    </div>
                    <!-- Item 4 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR9gSW3x98_hl7R2hl_nR5YcAwtmQ_68HCq4Q&s"
                            class="absolute z-10 block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="...">
                    </div>
                    <!-- Item 5 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS17wwfCCMgyrsgefE3CDJP4zRxlAH99RXy0w&s"
                            class="absolute z-10 block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="...">
                    </div>
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-10 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                        data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                        data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                        data-carousel-slide-to="2"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                        data-carousel-slide-to="3"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                        data-carousel-slide-to="4"></button>
                </div>
                <!-- Slider controls -->
                <button type="button "
                    class="absolute top-0 start-0 z-10 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 light:bg-gray-800/30 group-hover:bg-white/50 light:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white light:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white light:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 1 1 5l4 4" />
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 end-0 z-10 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 light:bg-gray-800/30 group-hover:bg-white/50 light:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white light:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg class="w-4 h-4 text-white light:text-gray-800 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>
        </div>
        <h1 class="text-2xl font-bold text-center mt-4">All Category are here</h1>


        <div class="mt-8 px-3 grid sm:grid-cols-2 lg:grid-cols-4 gap-8 justify-center">

            <?php

            include "components/_card.php";

            //fetch data from the database 
            $sql = "SELECT * FROM `catagory`";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $numRow = mysqli_num_rows($result);
                if ($numRow > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        // echo ;
                        renderCard($row['category_name'], $row['category_description'],$row['category_id']);
                    }
                } else {
                    echo "<h3>No categories available</h3>";
                }

            }
            ?>
        </div>


    </div>

    <div>
        <?php
        require "components/_footer.php";
        ?>
    </div>

    <script>
        function checkSignupLoginSuccess() {
            // Get the URL parameters
            const urlParams = new URLSearchParams(window.location.search);

            // Check if 'signup' parameter exists and is equal to 'success'
            if (urlParams.get('signup') === 'success') {
                console.log('Signup was successful!');
                // You can replace the console.log with any other action
                alert('Signup was successful!');
                window.location.href = '/project/fourm/index.php';
            }
            if (urlParams.get('login') === 'true') {

                window.location.href = '/project/fourm/index.php';
            }
        }

        // Call the function when the script loads
        checkSignupLoginSuccess();


    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>