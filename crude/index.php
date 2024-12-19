<?php
//connect the data
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "todoapp";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//insert the data to the database

if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $sql = "DELETE FROM `todo` WHERE `todo`.`srno` = $sno";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "<script>alert('Your data has been removed')</script>";
    }

}
if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    if (isset($_POST['srnoEdit'])) {
        $srno = $_POST['srnoEdit'];
        $title = $_POST['titleUpdate'];
        $description = $_POST['descriptionUpdate']; // Correct variable assignment

        if (!empty($srno) && !empty($title) && !empty($description)) {
            // Prepare the SQL query
            $sql = "UPDATE `todo` SET `title` = '$title', `description` = '$description' WHERE `todo`.`srno` = $srno";
            $result = $conn->query($sql);

            if ($result) {
                echo "<script>alert('Updaedted succesfully')</script>";
                
            } else {
                echo "Error updating record: " . $conn->error;
            }
             
        } 
    } else {
        echo "st is empty";

        if ($_POST['title'] && $_POST['description']) {
            $title = $_POST['title'];
            $description = $_POST['description'];

            $sql = "INSERT INTO `todo` (`title`, `description`) VALUES ('$title','$description')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                echo "<script>alert('Data inserted successfully')</script>";
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            }
        }
    }
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>




    <!-- Main modal -->
    <div id="authentication-modal" tabindex="-1" 
        class=" hidden fixed inset-0 z-50 flex justify-center items-center w-full h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow light:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t light:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 light:text-white">
                        Update your Content
                    </h3>
                    <button type="button"
                        class="end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center light:hover:bg-gray-600 light:hover:text-white"
                        data-modal-hide="authentication-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5">
                    <form class="space-y-4" action="/project/crude/" method="post">
                        <input class="hidden" name="srnoEdit" id="srnoEdit" />
                        <div>
                            <label for="title"
                                class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Your title</label>
                            <input type="text" name="titleUpdate" id="titleUpdate"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 light:bg-gray-600 light:border-gray-500 light:placeholder-gray-400 light:text-white"
                                required />
                        </div>
                        <div>
                            <label for="content"
                                class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Your
                                Description</label>
                            <textarea name="descriptionUpdate" id="descriptionUpdate"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 light:bg-gray-600 light:border-gray-500 light:placeholder-gray-400 light:text-white" ></textarea>
                        </div>

                        <button type="submit" id="update"
                            class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 light:hover:bg-blue-700 light:focus:ring-blue-800">Update</button>

                    </form>
                </div>
            </div>
        </div>
    </div>



    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://static.thenounproject.com/png/4750856-200.png" class="h-8 invert"
                    alt="crude app logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">CRUD APP</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500"
                            aria-current="page">Home</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
                    </li>
                    <li>
                        <a href="#"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-10">
        <form class="max-w-sm mx-auto" action="/project/crude/" method="POST">
            <div class="mb-5">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                <input type="text" id="title" name="title"
                    class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required />
            </div>
            <div class="mb-5">
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                <textarea name="description" id="description"
                    class="shadow-sm bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                    required></textarea>
            </div>

            <button type="submit"
                class="flex items-center justify-center gap-3 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                <i class="fas fa-save"></i>
                <span>Save</span>
            </button>
        </form>
    </div>

    <div class="px-12 mt-12 py-4">
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 light:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 light:bg-gray-700 light:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">SerialNo</th>
                        <th scope="col" class="px-6 py-3">Title</th>
                        <th scope="col" class="px-6 py-3">Description</th>
                        <th scope="col" class="flex justify-center px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php


                    $sql = "SELECT * FROM todo";
                    $result = mysqli_query($conn, $sql);
                    $srNO = 1;
                    $num = mysqli_num_rows($result);
                    if ($num > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "
                            
                            
                            <tr
                        class='odd:bg-white odd:light:bg-gray-900 even:bg-gray-50 even:light:bg-gray-800 border-b light:border-gray-700'>
                         <td class='px-6 py-4'>
                            " . $srNO . "
                        </td>
                        <td scope='row' class='px-6 py-4 font-medium text-gray-900 whitespace-nowrap light:text-white'>
                           " . $row['title'] . "
                        </td>
                        <td class='px-6 py-4'>
                            " . $row['description'] . "
                        </td>
                        <td class='px-6 py-4 text-center'> <!-- Added text-center to center the buttons -->
                            <div class='flex justify-center gap-3'>
                                <!-- Added gap-3 for better spacing between buttons -->
                                <button type='button' id=" . $row['srno'] . " 
                                    class=' edit text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-1.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800'>
                                    <i class='fas fa-edit me-1'></i> Edit
                                </button>
                                <button type='button' id=d" . $row['srno'] . " 
                                    class='delet text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-xs px-3 py-1.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800'>
                                    <i class='fas fa-trash me-1'></i> Delete
                                </button>
                            </div>
                        </td>
                    </tr>";
                            $srNO++;
                        }
                    }

                    ?>

                </tbody>
            </table>
        </div>
    </div>

   

    <script>
        //to event edit button
        edit = document.querySelectorAll('.edit');
        delet = document.querySelectorAll('.delet');
        const modal = document.getElementById("authentication-modal");
        const closeModalButton = modal.querySelector("[data-modal-hide='authentication-modal']");
        titleUpdate = document.getElementById('titleUpdate');
        descriptionUpdate = document.getElementById('descriptionUpdate');
        edit.forEach(element => {
            element.addEventListener("click", (e) => {
                let row = e.target.closest("tr");
                let collection = row.children;
                let arr = [];


                for (let i = 0; i < collection.length; i++) {
                    arr[i] = collection[i].innerText

                }
                let rowData = arr;

                modal.classList.remove("hidden");
                titleUpdate.value = rowData[1];
                descriptionUpdate.value = rowData[2];
                srnoEdit.value = e.target.id
               




            })
            closeModalButton.addEventListener("click", () => {
                modal.classList.add("hidden");
            });
        //  let update =document.getElementById('update');
        //  update.addEventListener("click",(e)=>{
        //         e.preventDefault();
              
        //         console.log(titleUpdate.value,descriptionUpdate.value);
        //  })

        });

        delet.forEach(element => {
            element.addEventListener("click",(e)=>{
               
                let sno = e.target.id.split('d')[1];
                window.location = `/project/crude/index.php?delete=${sno}`
            })
        });

        const updateForm = modal.querySelector("form");
    updateForm.addEventListener("submit", (e) => {
        // Prevent default form submission
        e.preventDefault();

        // Validate fields
        if (!titleUpdate.value.trim() || !descriptionUpdate.value.trim() ) {
            alert("Please fill in all fields.");
            return;
        }

        // Slight delay to ensure all inputs are captured
        setTimeout(() => {
            updateForm.submit();
        }, 3000); // 100ms delay
    });


    </script>


</body>

</html>