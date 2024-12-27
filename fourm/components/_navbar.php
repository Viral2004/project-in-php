<?php
session_start();
$sessionend = false;


if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
  $sessionend = true;
}

echo '<nav class="bg-white dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-3">
    <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
      <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo">
      <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Flowbite</span>
    </a>
    <div class="flex gap-3 md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">';

// Show Login/Sign Up buttons if not logged in, otherwise show Logout button
if (!$sessionend) {
  echo '<button type="button"
      data-modal-target="login-modal" data-modal-toggle="login-modal"
        class="text-white hidden md:block bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
      <button type="button"
      data-modal-target="signUp-modal" data-modal-toggle="signUp-modal"
        class="text-white hidden md:block bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign
        Up</button>';
} else {
  echo '<a href="/project/fourm/api/logout.php"
        class="text-white hidden md:block bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Logout</a>
        
        
        <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" class="hidden md:block w-10 h-10 rounded-full cursor-pointer" src="img/avtar.svg" alt="User dropdown">


        <div id="userDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 light:bg-gray-700 light:divide-gray-600">
            <div class="px-4 py-3 text-sm text-gray-900 light:text-white">
              <div>'.$_SESSION['username'].'</div>
              <div class="font-medium truncate">name@flowbite.com</div>
            </div>
           <!-- <ul class="py-2 text-sm text-gray-700 light:text-gray-200" aria-labelledby="avatarButton">
            
            </ul>-->
            
        </div>
        
        
        
        
        ';
}

echo '<button data-collapse-toggle="navbar-sticky" type="button"
        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
        aria-controls="navbar-sticky" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M1 1h15M1 7h15M1 13h15" />
        </svg>
      </button>
    </div>
    <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-sticky">
      <ul
        class="flex flex-col p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
          <a href="#"
            class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500"
            aria-current="page">Home</a>
        </li>
        <li>
          <a href="#"
            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">About</a>
        </li>
        <li>
          <a href="#"
            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Services</a>
        </li>
        <li>
          <a href="#"
            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-blue-500 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Contact</a>
        </li>
        <li class="flex flex-col gap-3">';

// Show Login/Sign Up buttons in mobile view if not logged in, otherwise show Logout button
if (!$sessionend) {
  echo '<button type="button"
         data-modal-target="login-modal" data-modal-toggle="login-modal"
        class="text-white w-full block md:hidden bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button>
      <button type="button"
        data-modal-target="signUp-modal" data-modal-toggle="signUp-modal"
        class="text-white block w-full md:hidden bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Sign
        Up</button>';
} else {
  echo '<a href="/project/fourm/api/logout.php"
        class="text-white block w-full md:hidden bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Logout</a>
        <div class="flex justify-center">
        <img id="avatarButton" type="button" data-dropdown-toggle="userDropdown" data-dropdown-placement="bottom-start" class=" md:hidden block w-10 h-10 rounded-full cursor-pointer" src="img/avtar.svg" alt="User dropdown">


        <div id="userDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 light:bg-gray-700 light:divide-gray-600">
            <div class="px-4 py-3 text-sm text-gray-900 light:text-white">
              <div>Bonnie Green</div>
              <div class="font-medium truncate">name@flowbite.com</div>
            </div>
            <ul class="py-2 text-sm text-gray-700 light:text-gray-200" aria-labelledby="avatarButton">
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 light:hover:bg-gray-600 light:hover:text-white">Dashboard</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 light:hover:bg-gray-600 light:hover:text-white">Settings</a>
              </li>
              <li>
                <a href="#" class="block px-4 py-2 hover:bg-gray-100 light:hover:bg-gray-600 light:hover:text-white">Earnings</a>
              </li>
            </ul>
            <div class="py-1">
              <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 light:hover:bg-gray-600 light:text-gray-200 light:hover:text-white">Sign out</a>
            </div>
        </div>
        </div>
        
        ';
}

echo '</li>
      </ul>
    </div>
  </div>
</nav>';

include "components/_loginModal.php";
include "components/_signUpModal.php";

?>