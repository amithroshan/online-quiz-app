<?php
require '../config.php';
if (!empty($_SESSION["id"])) {
    $id = $_SESSION["id"];
    $result = mysqli_query($conn, "SELECT * FROM student WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
} else {
    header("location: ../index.php");
}

$id=$_GET["id"];
$res=mysqli_query($conn,"select * from exam_category where id=$id");
while($row=mysqli_fetch_array($res)){
    $exam_category=$row["category"];
    $exam_time=$row["exam_time_in_minutes"];
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Quiz</title>
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
    
            
                    <div class="flex justify-center w-2/5 m-10 h-1/2">
                            <div class="w-full p-5 bg-white rounded-lg shadow-lg">
                            <form name="form1" action="" method="post">
                                        <div class="mb-4">
                                            <h2 class="text-2xl font-semibold text-gray-700">Edit Quiz</h2>
                                        </div>
                                        <div class="mb-4">
                                            <label for="company" class="block mb-2 text-sm font-bold text-gray-700">New Quiz Category</label>
                                            <input type="text" id="category" name="examname" value="<?php echo $exam_category ?>" class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" required>
                                        </div>
                                        <div class="mb-6">
                                            <label for="vat" class="block mb-2 text-sm font-bold text-gray-700">Quiz Time in Minutes</label>
                                            <input type="number" id="time" name="examtime" value="<?php echo $exam_time ?>" class="w-full px-3 py-2 mb-3 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline" required>
                                        </div>
                                        <div class="flex items-center justify-between">
                                        <input type="submit" name="submit1" value="Update Quiz" class="px-4 py-2 font-bold text-white bg-green-500 rounded hover:bg-green-700 focus:outline-none focus:shadow-outline">
                                        </div>
                                </form>
                            </div>
                    </div>
            
    </div>
</body>
</html>

<?php
if (isset($_POST["submit1"]))
{
    mysqli_query($conn,"update exam_category set category='$_POST[examname]',exam_time_in_minutes='$_POST[examtime]' where id=$id") or die(mysqli_error($conn));
    ?>
    <script type="text/javascript">
        window.location="exam_category.php";
    </script>
    <?php
}
?> 