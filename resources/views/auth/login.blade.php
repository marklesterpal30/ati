<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div style="background-image: url('{{ asset('storage/images/loginbg.jpg') }}');" class="bg-cover h-screen relative w-full">
        <div class="absolute bg-green-900 opacity-85 z-10 h-screen w-screen flex items-center justify-center"> </div>
        <div class="flex justify-center bg-pink-400">     
            <h1 class="z-50  absolute mt-12  sm:mt-8  text-5xl sm:text-7xl text-center  font-bold text-white opacity-100"><span class="text-green-600 text-6xl">A</span>griculturals <span class="text-green-600 text-6xl">T</span>raining <span class="text-green-600 text-6xl">I</span>nstitute</h1>
        </div>
                <div class="flex flex-row-reverse items-center justify-center mt-6 sm:mt-0 px-6 py-8 w-screen mx-auto h-screen lg:py-0">
                    <div class="w-full  sm:w-1/3  z-50 bg-white opacity-95  rounded-lg shadow dark:border xl:p-0 ">
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
                    <!-- <div class="w-full h-3/4 p-8 sm:w-1/3 text-white  z-50 bg-green-600 opacity-100  shadow dark:border  dark:bg-gray-800 dark:border-gray-700">
                         <h1 class="text-5xl font-bold font-sans mb-4 ">About ATI</h1>
                         <p class="text-xl">Agricultural Training Institute is teh capcity builder, knowledge bank and catalyst of the Philippine Agriculture and Fisheries extension system</p>
                         <h1 class="text-3xl font-bold font-sans mb-4 mt-12">ADDRESS</h1>
                         <p class="text-xl">ATI Building, Eliptical Road, Diliman Quezon City 1100 Philippines</p>
                         <h1 class="text-3xl font-bold font-sans mb-4 mt-12">CONTACT</h1>
                         <p class="text-xl">Trunkline:</p>
                         <p class="text-xl">+639 89298541 to 49</p>
                         <p class="text-xl">Email:director@ati.da.gov.ph</p>
                     </div> -->
                </div>
         </div>
    </div>
</body>
</html>
