<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-black text-yellow-500 p-8 rounded-md w-full text-center flex flex-col items-center justify-center">
    <div class="bg-gray-700 p-8 rounded shadow-md w-full max-w-xl text-center">

        <h1 class="text-2xl mb-4 text-green-500 mx-auto">Please Signup</h1>

        <form method="post" action="<?php echo URLROOT ?>/Users/register" class="flex flex-col">

            <input type="hidden" name="type" value="register" class="hidden">

            <input type="text" name="username" placeholder="Full name..."
                class="p-2 mb-2 border rounded bg-gray-900 text-white">

            <input type="text" name="email" placeholder="Email..."
                class="p-2 mb-2 border rounded bg-gray-900 text-white">

            <input type="password" name="password" placeholder="Password..."
                class="p-2 mb-2 border rounded bg-gray-900 text-white">

            <input type="password" name="pwdRepeat" placeholder="Repeat password"
                class="p-2 mb-2 border rounded bg-gray-900 text-white">

            <!-- Select for Client and Artist -->
            <label for="clientArtist" class="text-white mb-2">Select Client or Artist:</label>
            <select name="role_type" id="clientArtist" class="p-2 mb-4 border rounded bg-gray-900 text-white">
                <option value="1">Artist</option>
                <option value="2">Client </option>

            </select>

            <button type="submit" name="submit" class="bg-green-600 text-white p-2 rounded cursor-pointer">Sign
                Up</button>
        </form>
    </div>
</body>

</html>