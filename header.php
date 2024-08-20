<?php 
    session_start();
    include 'baseurl.php'; 
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'head.php'; ?>
    <body class="bg-gray-50">
        <header class="sticky top-0 z-50">
            <section class="relative flex flex-wrap sm:justify-start sm:flex-nowrap w-full bg-gray-800 text-sm py-3 ">
                <nav class="container w-full mx-auto px-4 sm:flex sm:items-center sm:justify-between ">
                    <div class="flex items-center justify-between">
                        <a class="flex-none text-xl font-semibold  focus:outline-none focus:opacity-80" href="<?php echo $baseurl;?>" aria-label="Brand">
                            <img class="w-auto h-12" src="images/logo.png" alt="Logo">
                        </a>
                        <div class="sm:hidden">
                            <button type="button" class="hs-collapse-toggle relative size-7 flex justify-center items-center gap-x-2 rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none " id="hs-navbar-example-collapse" aria-expanded="false" aria-controls="hs-navbar-example" aria-label="Toggle navigation" data-hs-collapse="#hs-navbar-example">
                            <svg class="hs-collapse-open:hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
                            <svg class="hs-collapse-open:block hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
                            <span class="sr-only">Toggle navigation</span>
                            </button>
                        </div>
                    </div>
                    <div id="hs-navbar-example" class="hidden hs-collapse overflow-hidden transition-all duration-300 basis-full grow sm:block" aria-labelledby="hs-navbar-example-collapse">
                    <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:justify-end sm:mt-0 sm:ps-5 relative">
                        <a class="font-medium text-medium text-white focus:outline-none focus:text-custom-green hover:text-custom-green" href="#" aria-current="page">Organic Lemon</a>
                        <a class="font-medium text-medium text-white focus:outline-none focus:text-custom-green hover:text-custom-green " href="#">Organic Apple</a>
                        <a class="font-medium text-medium text-white focus:outline-none focus:text-custom-green hover:text-custom-green " href="#">Bread & Toast</a>
                        <a class="font-medium text-medium text-white focus:outline-none focus:text-custom-green hover:text-custom-green " href="#">Hazel Nut</a>
                        <a href="#" class="">
                            <i class="fa-solid fa-cart-plus text-white text-xl"></i>
                        </a>
                    </div>
                    </div>
                </nav>
            </section>
        </header>

        
