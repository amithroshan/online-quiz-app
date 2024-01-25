<?php
session_start();
require '../config.php';

if (!empty($_SESSION["id"])) {
    $teacher_id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM exam_category WHERE tid=$teacher_id");
} else {
    header("location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add and Edit Questions</title>
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

            <div class="container px-10 mx-auto">
                <h1 class="my-6 text-3xl font-semibold">Add and Edit Questions</h1>
                <div class="max-w-4xl p-5 bg-white rounded-lg shadow-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr>
                                <th scope="col" class="px-5 py-3 text-xs font-semibold tracking-wider text-center text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                    #
                                </th>
                                <th scope="col" class="px-1 py-3 text-xs font-semibold tracking-wider text-center text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                    Quiz Name
                                </th>
                                <th scope="col" class="px-1 py-3 text-xs font-semibold tracking-wider text-center text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                    Quiz Time(min)
                                </th>
                                <th scope="col" class="px-1 py-3 text-xs font-semibold tracking-wider text-center text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                    Select
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                                                        <?php
                                                            $count = 0;
                                                            while ($row = mysqli_fetch_array($result)) {
                                                                $count++;
                                                                ?>
                                                                <tr>
                                                                <th class="px-1 py-2 text-center" scope="row"><?php echo $count; ?></th>
                                                                <td class="px-1 py-2 text-center "><?php echo $row["category"]; ?></td>
                                                                <td class="px-1 py-2 text-center"><?php echo $row["exam_time_in_minutes"]; ?></td>
                                                                <td class="px-1 py-2 text-center"><a href="add_edit_questions.php?id=<?php echo $row["id"]; ?>" class="text-green-600 hover:text-green-900">Select</a></td>
                                                            </tr>
                                                                <?php
                                                            }
                                                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</body>
</html>
