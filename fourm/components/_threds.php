<?php
include "../db/_dbConnect.php";
$title = "";
$description = "";

$id=$_GET['card'];
$sql = "SELECT * FROM `catagory` where `category_id`=$id";
$result = mysqli_query($conn,$sql);
$rowNum = mysqli_num_rows($result);
if($rowNum==1){
    $row = mysqli_fetch_assoc($result);
    $title = $row['category_name'];
    $description = $row['category_description'];
 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body >
    <div class="container mx-auto pl-8 py-4">
        <button onclick="goBack()" class="px-4 py-2 bg-indigo-500 text-white rounded hover:bg-indigo-600">Back</button>
    </div>

    <section class="text-gray-600 body-font bg-gray-50 border border-gray-200">
    <div class="container px-5 py-24 mx-auto flex flex-col">
        <div class="lg:w-4/6 mx-auto bg-white border border-gray-300 rounded-lg shadow-lg p-6">
            <div class="flex flex-col gap-4 sm:flex-row mt-10">
                <div class="sm:w-1/3 text-center sm:pr-8 sm:py-8 bg-gray-100 border border-gray-300 rounded-lg p-4">
                
                    <div class="flex flex-col items-center text-center justify-center">
                        <h2 class="font-medium title-font mt-4 text-gray-900 text-lg"><?php echo $title; ?></h2>
                        <div class="w-12 h-1 bg-indigo-500 rounded mt-2 mb-4"></div>
                        <p class="text-base text-gray-700">Raclette knausgaard hella meggs normcore williamsburg enamel pin
                            sartorial venmo tbh hot chicken gentrify portland.</p>
                    </div>
                </div>
                <div class="sm:w-2/3 sm:pl-8 sm:py-8 sm:border-l border-gray-300 sm:border-t-0 border-t mt-4 pt-4 sm:mt-0 text-center sm:text-left bg-gray-50 border border-gray-300 rounded-lg p-4">
                    <p class="leading-relaxed text-lg mb-4 text-gray-700"><?php echo $description; ?></p>
                    <a class="text-indigo-500 inline-flex items-center">Learn More
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>



    <!-- Comments Section -->
    <section class="text-gray-600 body-font bg-white">
        <div class="container px-5 py-24 mx-auto">
            <h2 class="text-2xl font-bold text-gray-900 mb-4">Comments</h2>

            <!-- Comment Form -->
            <div class="flex items-start space-x-4 mb-6">
                <img class="w-10 h-10 rounded-full" src="https://dummyimage.com/40x40" alt="User avatar">
                <div class="flex-grow">
                    <textarea id="comment" name="comment" rows="8"
                        class="w-full px-3 py-2 text-sm text-gray-900 bg-gray-100 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Add a comment..."></textarea>
                    <div class="mt-2 flex justify-end">
                        <button
                            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 hover:bg-blue-800">
                            Post comment
                        </button>
                    </div>
                </div>
            </div>

            <!-- Comments List -->
            <div class="space-y-4">
                <!-- Comment 1 -->
                <div class="flex">
                    <div class="flex-shrink-0 mr-3">
                        <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="https://dummyimage.com/40x40"
                            alt="User avatar">
                    </div>
                    <div class="flex-grow">
                        <div class="flex items-center mb-1">
                            <span class="font-semibold text-gray-900 mr-2">Holden Caulfield</span>
                            <span class="text-sm text-gray-600">2 days ago</span>
                        </div>
                        <p class="text-gray-700 mb-2">Synth chartreuse iPhone lomo cray raw denim brunch everyday carry
                            neutra before they sold out fixie 90's microdosing. Tacos pinterest fanny pack venmo,
                            post-ironic heirloom try-hard pabst authentic iceland.</p>
                        <div class="flex items-center space-x-4">
                            <button class="flex items-center text-sm text-gray-500 hover:text-blue-600">
                                <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 5h5M5 8h2m8-3h-2.5M15 8h-5.5m4.5 4h-4.5m-6 3h7.5m-2.5-3h2.5m-9-8h14v12a1 1 0 0 1-1 1h-12a1 1 0 0 1-1-1V4Z" />
                                </svg>
                                Reply
                            </button>
                            <button class="flex items-center text-sm text-gray-500 hover:text-blue-600">
                                <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 21 21">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m6.072 10.072 2 2 6-4m3.586 4.314.9-.9a2 2 0 0 0 0-2.828l-.9-.9a2 2 0 0 1-.586-1.414V5.072a2 2 0 0 0-2-2H13.8a2 2 0 0 1-1.414-.586l-.9-.9a2 2 0 0 0-2.828 0l-.9.9a2 2 0 0 1-1.414.586H5.072a2 2 0 0 0-2 2v1.272a2 2 0 0 1-.586 1.414l-.9.9a2 2 0 0 0 0 2.828l.9.9a2 2 0 0 1 .586 1.414v1.272a2 2 0 0 0 2 2h1.272a2 2 0 0 1 1.414.586l.9.9a2 2 0 0 0 2.828 0l.9-.9a2 2 0 0 1 1.414-.586h1.272a2 2 0 0 0 2-2V13.8a2 2 0 0 1 .586-1.414Z" />
                                </svg>
                                Like
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Comment 2 -->
                <div class="flex">
                    <div class="flex-shrink-0 mr-3">
                        <img class="mt-2 rounded-full w-8 h-8 sm:w-10 sm:h-10" src="https://dummyimage.com/40x40"
                            alt="User avatar">
                    </div>
                    <div class="flex-grow">
                        <div class="flex items-center mb-1">
                            <span class="font-semibold text-gray-900 mr-2">Alper Kamu</span>
                            <span class="text-sm text-gray-600">1 week ago</span>
                        </div>
                        <p class="text-gray-700 mb-2">Synth chartreuse iPhone lomo cray raw denim brunch everyday carry
                            neutra before they sold out fixie 90's microdosing. Tacos pinterest fanny pack venmo,
                            post-ironic heirloom try-hard pabst authentic iceland.</p>
                        <div class="flex items-center space-x-4">
                            <button class="flex items-center text-sm text-gray-500 hover:text-blue-600">
                                <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5 5h5M5 8h2m8-3h-2.5M15 8h-5.5m4.5 4h-4.5m-6 3h7.5m-2.5-3h2.5m-9-8h14v12a1 1 0 0 1-1 1h-12a1 1 0 0 1-1-1V4Z" />
                                </svg>
                                Reply
                            </button>
                            <button class="flex items-center text-sm text-gray-500 hover:text-blue-600">
                                <svg class="mr-1.5 w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 21 21">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="m6.072 10.072 2 2 6-4m3.586 4.314.9-.9a2 2 0 0 0 0-2.828l-.9-.9a2 2 0 0 1-.586-1.414V5.072a2 2 0 0 0-2-2H13.8a2 2 0 0 1-1.414-.586l-.9-.9a2 2 0 0 0-2.828 0l-.9.9a2 2 0 0 1-1.414.586H5.072a2 2 0 0 0-2 2v1.272a2 2 0 0 1-.586 1.414l-.9.9a2 2 0 0 0 0 2.828l.9.9a2 2 0 0 1 .586 1.414v1.272a2 2 0 0 0 2 2h1.272a2 2 0 0 1 1.414.586l.9.9a2 2 0 0 0 2.828 0l.9-.9a2 2 0 0 1 1.414-.586h1.272a2 2 0 0 0 2-2V13.8a2 2 0 0 1 .586-1.414Z" />
                                </svg>
                                Like
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
</body>

</html>