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
$exam_category='';
$res=mysqli_query($conn,"select * from exam_category where id=$id");
while($row=mysqli_fetch_array($res)){
    $exam_category=$row["category"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Questions</title>
<!-- Tailwind CSS -->
<link href="../../src/output.css" rel="stylesheet">
<!-- Google Font -->
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
<style>
  body {
    font-family: 'Open+Sans', sans-serif;
  }
</style>
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
    <div class="container max-w-6xl px-4 mx-auto sm:px-8">
        <div class="py-8">
                <div>
                <h2 class="text-2xl font-semibold leading-tight">Add Questions to <?php echo "<font color='green-100'>" .$exam_category. "</font>"; ?></h2>
                </div>
                <div class="px-4 py-2 my-2 bg-white rounded-lg shadow">
                        <div class="flex flex-col">
                            <form name="form1" action="" method="post">
                                <label class="leading-loose">Add New Question</label>
                                    <div class="flex flex-col md:flex-col">
                                    <input type="text" class="p-2 m-2 bg-gray-200 border border-gray-300 rounded" placeholder="Add Question" name="question">
                                    </div>
                                        <div class="flex flex-col md:flex-row">
                                        <input type="text" class="p-2 m-2 bg-gray-200 border border-gray-300 rounded" placeholder="Add option 1" name="opt1">
                                        <input type="text" class="p-2 m-2 bg-gray-200 border border-gray-300 rounded" placeholder="Add option 2" name="opt2">
                                        <input type="text" class="p-2 m-2 bg-gray-200 border border-gray-300 rounded" placeholder="Add option 3" name="opt3">
                                        <input type="text" class="p-2 m-2 bg-gray-200 border border-gray-300 rounded" placeholder="Add option 4" name="opt4">
                                        </div>
                                    <div class="flex flex-col md:flex-row">
                                    <input type="text" class="p-2 m-2 bg-gray-200 border border-gray-300 rounded" placeholder="Add Answer" name="answer">
                                    </div class="text-center">
                                <input type="submit" name="submit1" value="Add Question" class="max-w-xl py-2 mx-auto my-5 text-base font-medium text-white bg-green-500 rounded-md shadow-sm px-44 hover:bg-green-700">
                            </div>
                        </form>
                        </div>
                            <div class="flex flex-col my-12 sm:flex-row">
                            <div class="block w-full overflow-x-auto">
                                <table class="min-w-full leading-normal">
                                
                                    <tr>
                                    <th class="px-5 py-3 text-sm font-extrabold tracking-wider text-center text-gray-600 uppercase bg-gray-200">
                                        No
                                    </th>
                                    <th class="px-5 py-3 text-sm font-extrabold tracking-wider text-center text-gray-600 uppercase bg-gray-200">
                                        Question
                                    </th>
                                    <th class="px-5 py-3 text-sm font-extrabold tracking-wider text-center text-gray-600 uppercase bg-gray-200">
                                        Option 1
                                    </th>
                                    <th class="px-5 py-3 text-sm font-extrabold tracking-wider text-center text-gray-600 uppercase bg-gray-200">
                                        Option 2
                                    </th>
                                    <th class="px-5 py-3 text-sm font-extrabold tracking-wider text-center text-gray-600 uppercase bg-gray-200">
                                        Option 3
                                    </th>
                                    <th class="px-5 py-3 text-sm font-extrabold tracking-wider text-center text-gray-600 uppercase bg-gray-200">
                                        Option 4
                                    </th>
                                    <th class="px-5 py-3 text-sm font-extrabold tracking-wider text-center text-gray-600 uppercase bg-gray-200">
                                        Answer
                                    </th>
                                    <th class="px-5 py-3 text-sm font-extrabold tracking-wider text-center text-gray-600 uppercase bg-gray-200">
                                        Edit
                                    </th>
                                    <th class="px-5 py-3 text-sm font-extrabold tracking-wider text-center text-gray-600 uppercase bg-gray-200">
                                        Delete
                                    </th>
                                    </tr>
                                    <?php
                                    $res=mysqli_query($conn,"select * from questions where category='$exam_category' order by question_no asc") or die(mysqli_error($conn));
                                    while($row=mysqli_fetch_array($res)){
                                        echo "<tr>";
                                        echo "<td class='p-2 text-center'>"; echo $row["question_no"]; echo "</td>";
                                        echo "<td class='p-2 text-center'>"; echo $row["question"]; echo "</td>";
                                        echo "<td class='p-2 text-center'>"; echo $row["opt1"]; echo "</td>";
                                        echo "<td class='p-2 text-center'>"; echo $row["opt2"]; echo "</td>";
                                        echo "<td class='p-2 text-center'>"; echo $row["opt3"]; echo "</td>";
                                        echo "<td class='p-2 text-center'>"; echo $row["opt4"]; echo "</td>";
                                        echo "<td class='p-2 text-center'>"; echo $row["answer"]; echo "</td>";
                                        
                                        echo "<td class='text-center'>"; 
                                        ?>
                                        <a href="edit_option.php?id=<?php echo$row["id"]; ?>&id1=<?php echo $id ?>" class="text-center text-green-600 hover:text-green-900">Edit</a>
                                        <?php
                                        echo "</td>";

                                        echo "<td class='text-center'>"; 
                                        ?>
                                        <a href="delete_option.php?id=<?php echo$row["id"]; ?>&id1=<?php echo $id ?>" class="text-center text-red-600 hover:text-red-900">Delete</a>
                                        <?php
                                        echo "</td>";

                                        echo "</tr>";
                                    }
                                    ?>
                                
                                </table>
                            </div>
                            </div>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
<?php
if (isset($_POST["submit1"]))
{
    $loop=0;

        $count=0;
        $res=mysqli_query($conn,"select * from questions where category='$exam_category' order by id asc") or die(mysqli_error($conn));

        $count=mysqli_num_rows($res);
        if ($count==0) {
            
        }
        else {
            while($row=mysqli_fetch_array($res)){
                $loop=$loop+1;
                mysqli_query($conn,"update questions set question_no='$loop' where id=$row[id]");
            }
        }

        $loop=$loop+1;
        mysqli_query($conn,"insert into questions values(NULL,'$loop','$_POST[question]','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]','$_POST[opt4]','$_POST[answer]','$exam_category')") or die(mysqli_error($conn));
        
        ?>
        <script type="text/javascript">
            alert("Question Added Successfully");
            window.location.href=window.location.href;
        </script>
        
        <?php

}
?>