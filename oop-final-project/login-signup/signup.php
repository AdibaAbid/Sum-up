<?php

include('components/header.php');
require('validations.php');

if(isset($_POST['submit'])){
    //validate the entries
    $validation = new UserValidator($_POST); 
    $variable = $validation->db_connect();
    $errors = $validation->validateForm($variable);   
}

?>
<p class="text-gray-600 text-sm pt-2">Sign Up to your account.</p>
</section>
<!-- Registration Form  -->
<section class="mt-4">
    <form class="flex flex-col" method="POST" action="<?php $_SERVER['PHP_SELF']?>">
        <div class="mb-2 pt-2 rounded bg-gray-200">
            <!-- Name -->
            <label class="block text-gray-700 text-sm font-bold mb-1 ml-3" for="email">Name</label>
            <input type="text" name="username" value="<?php echo htmlspecialchars($_POST['username'] ?? "") ?>"
                class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-2">
        </div>
        <div class="error">
            <?php
                echo $errors['username'] ?? '';
            ?>
        </div>
        <div class="mb-2 pt-2 rounded bg-gray-200">
            <!-- Email -->
            <label class="block text-gray-700 text-sm font-bold mb-1 ml-3" for="email">Email</label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($_POST['email'] ?? "") ?>"
                class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-2">
        </div>
        <div class="error">
            <?php
                echo $errors['email'] ?? '';
            ?>
        </div>
        <div class="mb-2 pt-2 rounded bg-gray-200">
            <!-- Password -->
            <label class="block text-gray-700 text-sm font-bold mb-1 ml-3" for="password">Password</label>
            <input type="password" name="password" value="<?php echo htmlspecialchars($_POST['password'] ?? "") ?>"
                class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-2">
        </div>
        <div class="error">
            <?php
                echo $errors['password'] ?? '';
            ?>
        </div>
        <button
            class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-1 rounded shadow-lg hover:shadow-xl transition duration-200"
            type="submit" name='submit'>Sign In</button>
    </form>
</section>
</main>

<div class="max-w-lg mx-auto text-center mt-4 mb-2">
    <p class="text-white">Already have an account? <a href="../index.php" class="font-bold hover:underline">Login</a>.
    </p>
</div>

<?php include('components/footer.php'); ?>