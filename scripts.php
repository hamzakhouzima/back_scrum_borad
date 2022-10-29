<?php
    //INCLUDE DATABASE FILE
    include('database.php');
    //SESSSION IS A WAY TO STORE DATA TO BE USED ACROSS MULTIPLE PAGES
    session_start();

    //ROUTING
    if(isset($_POST['save']))        saveTask();
    if(isset($_POST['update']))      updateTask();
    if(isset($_POST['delete']))      deleteTask();
    

    function getTasks($task_status)
    {
        //CODE HERE
        //SQL SELECT
        require "database.php";
        
        
        $request="SELECT tasks.*,statuses.name AS status_name , types.name AS types_name , priorities.name AS priority_name INNER join statuses on statuses.id=tasks.status_id INNER join priorities on priorities.id=tasks.priority_id INNER join types on types.id=tasks.type_id WHERE tasks.status_id=$task_status";
        $execution=mysqli_query($connect,$request);
        //  $data = mysqli_fetch_assoc($execution);

        // print_r($data);
        // while($data = sqli_fetch_assoc($execution)){
        //     $id=$data['id'];
        //     echo $id;
        // }
        // foreach ($execution as  $data) {
        //     # code...
        //     echo ($data['title']);
        // }
        
        

        echo "Fetch all tasks";
         return $execution;
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
      
    
      require 'database.php';
      $request="INSERT INTO tasks(title,type_id, priority_id, status_id, task_datetime, description) VALUES('$title','$task_type','$selected_priority','$status','$date','$description')";
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
