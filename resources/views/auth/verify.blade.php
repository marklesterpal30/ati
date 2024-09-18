<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Document</title>
		<script src="https://cdn.tailwindcss.com"></script>
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Anton+SC&family=Bungee+Shade&family=Paytone+One&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
		<style>
			.poppins-medium {
				font-family: "Poppins", sans-serif;
				font-weight: 500;
				font-style: normal;
			}
		</style>
	</head>
	<body>
		@if(Session::has('error'))
			<script>
				toastr.error("{{ Session::get('error') }}");
			</script>
		@endif
		@if(Session::has('success'))
			<script>
				toastr.success("{{ Session::get('success') }}");
			</script>
		@endif
		<div style="background-image: url('{{ asset('storage/images/loginbg.jpg') }}');" class="bg-cover h-screen w-screen overflow-hidden relative">
			<div class="absolute bg-green-900 opacity-75 z-10 h-screen w-screen flex items-center justify-center"></div>
			<div class="flex justify-center bg-pink-400">
				<h1 class="z-50 absolute mt-32 md:mt-12 sm:mt-8 text-6xl sm:text-7xl text-center font-bold text-white opacity-100">DocuTrack</h1>
			</div>
			<div class="flex flex-row-reverse items-center justify-center px-6 py-8 w-screen mx-auto h-screen lg:py-0 mt-10 sm:mt-12">
				<div class="w-full sm:w-1/3 z-50 bg-white opacity-95 rounded-lg shadow dark:border xl:p-0 dark:bg-gray-800 dark:border-gray-700">
					<div class="p-6 space-y-4 md:space-y-6 sm:p-8">
						<div class="flex justify-center p-0">
							<img src="{{ asset('storage/images/atilogo.png') }}" class="h-36 text-center">
						</div>
						<form id="verifyForm" class="space-y-4 md:space-y-6" action="{{ url('/sendVerification') }}" method="POST" autocomplete="off">
							@csrf
							<div>
								<label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
								<input type="email" name="email" id="email" class="bg-green-200 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" autocomplete="off" required="">
							</div>
							<button type="submit" id="submitBtn" class="w-full opacity-95 text-white bg-green-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Send Verification</button>
							<p class="text-sm font-light text-gray-500 dark:text-gray-400">
								Already have an account? <a href="/login" class="font-medium text-primary-600 hover:underline dark:text-primary-500">Login</a>
							</p>
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
    <script>
          document.getElementById('verifyForm').addEventListener('submit', function (e) {
            var submitBtn = document.getElementById('submitBtn');
            
            // Change button text and disable it
            submitBtn.textContent = 'Loading...';
            submitBtn.disabled = true;
        });
    </script>
</html>
