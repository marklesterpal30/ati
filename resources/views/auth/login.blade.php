<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Anton+SC&family=Bungee+Shade&family=Paytone+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<style>
    .poppins-medium {
  font-family: "Poppins", sans-serif;
  font-weight: 500;
  font-style: normal;
}
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div style="background-image: url('{{ asset('storage/images/loginbg.jpg') }}');" class="bg-cover h-screen relative w-full overflow-hidden">
        <div class="absolute bg-green-900 opacity-75 z-10 h-screen w-screen flex items-center justify-center"> </div>
        <div class="flex justify-center bg-pink-400">     
            <h1 class="z-50  absolute mt-32 md:mt-12  sm:mt-8  text-6xl sm:text-7xl text-center  font-bold text-white opacity-100">DocuTrack</h1>
        </div>
            <div class="flex items-center justify-center mt-9 sm:mt-6 px-6 py-8 w-screen mx-auto h-screen lg:py-0">
                        <div class="w-full  sm:w-1/3  z-50 bg-white opacity-95 rounded-lg shadow dark:border xl:p-0 ">
                            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                                <div class="flex justify-center  p-0">
                                    <img src="{{ asset('storage/images/atilogo.png') }}" class="h-36 text-center">
                                </div>

                                <form class="space-y-4 md:space-y-6" action="{{ url('/login') }}" method="POST">
                                    @csrf
                                    <div>
                                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
                                        <input type="email" name="email" id="email" class="bg-green-200 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="">
                                    </div>
                                    <div>
                                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                        <input type="password" name="password" id="password" placeholder="••••••••" class="bg-green-200 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-start">
                                            <div class="flex items-center h-5">
                                                <input id="remember" aria-describedby="remember" type="checkbox" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-primary-600 dark:ring-offset-gray-800" required="">
                                            </div>
                                            <div class="ml-3 text-sm">
                                                <label for="remember" class="text-gray-500 dark:text-gray-300">Remember me</label>
                                            </div>
                                        </div>
                                        <a href="#" class="text-sm font-medium text-primary-600 hover:underline dark:text-primary-500">Forgot password?</a>
                                    </div>
                                    <button type="submit" class="w-full opacity-95 text-white bg-green-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Sign in</button>
                                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                                        Don’t have an account yet? <a href="/signupForm" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Sign up</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                     
                        <div class="hidden md:w-1/3 md:block  p-8 sm:w-1/3 text-white   z-50   shadow-xl dark:border  dark:bg-gray-800 dark:border-gray-700">
                            <div class="mb-2">
                                 <h1 class="text-4xl font-bold  poppins-medium">AGRICULTURAL TRAINING INSTITUTE</h1>
                                 <p class="text-3XL font-semibold  poppins-medium">REGIONAL TRAINING CENTER IV(MIMAROPA)</p>
                            </div>
                            <p class="text-lg text-justify">Agricultural Training Institute is teh capcity builder, knowledge bank and catalyst of the Philippine Agriculture and Fisheries extension system</p>
                            <h1 class="text-2xl font-bold  mt-6 poppins-medium">ADDRESS</h1>
                            <p class="text-lg">Barcenaga, Naujan, Oriental Mindoro</p>
                            <h1 class="text-2xl font-bold font-sans mt-6">CONTACT</h1>
                            <p class="text-lg">Telephone: (02) 3591967</p>
                            <p class="text-lg mb-3">Email: director@ati.da.gov.ph</p>
                            <div class="space-y-2">
                                <div>
                                    <h1 class="text-2xl font-bold font-sans mt-6">CONNECT WITH US</h1>
                                </div>
                                <div class="flex space-x-4 text-4xl">
                                    <i class="fa-brands fa-facebook"></i>  
                                    <i class="fa-brands fa-square-instagram"></i>
                                    <i class="fa-brands fa-square-twitter"></i>
                                    <i class="fa-brands fa-youtube"></i>
                               </div>
                         </div>
            </div>
        </div>   
    </div>
</body>
</html>
