<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reset Your Password</title>
    <link rel="stylesheet" href="dist/css/styles.css" />
  </head>
  <body class="bg-gray-100 flex_center py-6 min-h-screen">
    <!-- Row -->
    <div
      class="w-11/12 mx-auto sm:w-96 h-fit bg-white p-5 rounded-lg lg:rounded-l-none"
    >
      <h3 class="text-center">Forgot Your Password?</h3>
      <form class="pb-5 pt-10 mb-4 bg-white rounded">
        <div class="mb-4">
          <label class="block mb-2 text-sm font-bold text-gray-700" for="email">
            Email
          </label>
          <input
            class="w-full px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
            id="email"
            type="email"
            placeholder="Enter Email Address..."
          />
        </div>
        <div class="mb-6 text-center">
          <button
            class="btn w-full px-4 py-2 font-bold text-white bg-red-500 focus:bg-red-600 focus:ring rounded-full hover:bg-red-700 focus:outline-none focus:shadow-outline"
            type="button"
          >
            Reset Password
          </button>
        </div>
        <hr class="mb-6 border-t" />
        <div class="text-center">
          <a
            class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800"
            href="login.php"
          >
            Back to Login!
          </a>
        </div>
      </form>
    </div>
  </body>
</html>
