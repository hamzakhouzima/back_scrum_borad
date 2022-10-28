<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

    //ROUTING
    if(isset($_POST['save']))        saveTask();
    if(isset($_POST['update']))      updateTask();
    if(isset($_POST['delete']))      deleteTask();
    

    function getTasks()
    {
        //CODE HERE
        //SQL SELECT
        echo "Fetch all tasks";
    }


    function saveTask()
    {
        //CODE HERE
        //SQL INSERT
      $title=$_POST['title_input'];
      $task_type=$_POST['task-type'];
      $selected_priority = $_POST['priority'];  //we can use extract function 
      $status=$_POST['status'];
      $date=$_POST['date'];
      $description=$_POST['description'];
      // $checkbox=$_POST['task-type'];
      
    
      // require 'database.php';
      $request="INSERT INTO tasks(title,type_id, priority_id, status_id, task_datetime`, `description`) VALUES('$title','$task_type','$selected_priority','$status','$date','$description')";
      //
      $query=mysqli_query($connect,$request);

      $_SESSION['message'] = "Task has been added successfully !";
		  header('location: index.php');
    }

    function updateTask()
    {
        //CODE HERE
        //SQL UPDATE
        $_SESSION['message'] = "Task has been updated successfully !";
		header('location: index.php');
    }

    function deleteTask()
    {
        //CODE HERE
        //SQL DELETE
        $_SESSION['message'] = "Task has been deleted successfully !";
		header('location: index.php');
    }



    //bring data from the database and check the status of the task and make a condition , if status== todo 
    //and make a variable with the html code to put it in the right place , 
?>
