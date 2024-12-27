<?php
function renderCard($title, $description,$id) {
    ?>
    <div
        class="max-w-xs bg-gray-100 border border-gray-200 rounded-md shadow-md hover:shadow-lg transition-all duration-300 hover:scale-105 light:bg-gray-800 light:border-gray-700">
        <a href="#">
            <img class="rounded-t-md"
                src="https://repository-images.githubusercontent.com/260096455/47f1b200-8b2e-11ea-8fa1-ab106189aeb0"
                alt="" />
        </a>
        <div class="p-3">
            <a href="/project/fourm/components/_threds.php">
                <h5 class="mb-1 text-lg font-semibold tracking-tight text-gray-900 light:text-white">
                    <?php echo $title; ?>
                </h5>
            </a>
            <p class="mb-2 text-sm font-normal text-gray-700 light:text-gray-400">
                <?php echo $description; ?>
            </p>
            <a id='<?php echo $id?>' 
            href="/project/fourm/components/_threds.php?card=<?php echo $id?>"
                class="inline-flex items-center px-2 py-1 text-xs font-medium text-white bg-blue-700 rounded-md hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 light:bg-blue-600 light:hover:bg-blue-700 light:focus:ring-blue-800">
                Read more
                <svg class="rtl:rotate-180 w-3 h-3 ms-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
    </div>
   
    <?php
}
?>