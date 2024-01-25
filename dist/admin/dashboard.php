<?php
session_start();
require '../config.php';
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM student WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
} else {
    header("location: ../index.php");
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link href="../../src/output.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen bg-gray-100">
        <!-- Sidebar -->
        <div class="absolute inset-y-0 left-0 w-64 px-2 space-y-6 text-white transition duration-200 ease-in-out transform -translate-x-full bg-green-900 py-7 md:relative md:translate-x-0">
            <a href="#" class="flex items-center px-4 space-x-2 text-white">
                
                <span class="text-2xl font-extrabold">Admin Panel</span>
            </a>
            <nav>
                <a href="Dashboard.php"                           class=" block py-2.5 px-4 rounded transition duration-200 hover:bg-green-700 hover:text-white">Dashboard</a>
                <a href="exam_category.php"           class="block py-2.5 px-4 rounded transition duration-200 hover:bg-green-700 hover:text-white">Add & Edit Quiz</a>
                <a href="add_edit_exam_questions.php" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-green-700 hover:text-white">Add & Edit Questions</a>
                <a href="../logout.php"          class="block py-2.5 px-4 rounded transition duration-200 hover:bg-green-700 hover:text-white">Log Out</a>
            </nav>
        </div>
         <div class="w-full p-4">

            <?php
            $count = 0;
            $res = mysqli_query($conn, "select * from exam_result order by id desc");
            $count = mysqli_num_rows($res);

            if ($count == 0) {
                ?>
                <center><h2 class="mb-4 text-xl font-semibold">No Results Found</h2></center>

                <?php
            } else {
                echo '<div class="w-full px-4 mt-6 lg:mt-3">';
                echo '<div class="p-5 bg-white rounded-lg shadow-lg">';
                echo '<h2 class="mb-6 text-xl font-semibold">Quizzes Result</h2>';
                echo '<div class="overflow-x-auto">';
                echo '<table class="min-w-full leading-normal">';
                echo '<thead>';
                echo '<tr>';
                echo '<th class="px-3 py-3 text-xs font-semibold tracking-wider text-center text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">Username</th>';
                echo '<th class="px-5 py-3 text-xs font-semibold tracking-wider text-center text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">Quiz Type</th>';
                echo '<th class="px-5 py-3 text-xs font-semibold tracking-wider text-center text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">Total Questions</th>';
                echo '<th class="px-5 py-3 text-xs font-semibold tracking-wider text-center text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">Correct Answers</th>';
                echo '<th class="px-5 py-3 text-xs font-semibold tracking-wider text-center text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">Wrong Answers</th>';
                echo '<th class="px-5 py-3 text-xs font-semibold tracking-wider text-center text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">Quiz Time</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';
                

                while ($row = mysqli_fetch_array($res)) {
                    echo '<tr>';
                    echo '<td class="text-center">' . $row["username"] . '</td>';
                    echo '<td class="text-center">' . $row["exam_type"] . '</td>';
                    echo '<td class="text-center">' . $row["total_question"] . '</td>';
                    echo '<td class="text-center">' . $row["correct_answer"] . '</td>';
                    echo '<td class="text-center">' . $row["wrong_answer"] . '</td>';
                    echo '<td class="text-center">' . $row["exam_time"] . '</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>

    </div>
</body>
</html>

