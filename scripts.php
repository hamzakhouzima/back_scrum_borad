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
        
        
        $request="SELECT tasks.*,statuses.name AS status_name , types.name AS types_name , priorities.name AS priority_name  FROM tasks INNER join statuses on statuses.id=tasks.status_id INNER join priorities on priorities.id=tasks.priority_id INNER join types on types.id=tasks.type_id WHERE tasks.status_id=$task_status";
        $execution=mysqli_query($connect,$request);
        while($data= mysqli_fetch_assoc($execution)){
            ?>
            <button id="<?php echo$data["id"]; ?>" data-status="<?php echo$data['status_id']; ?>" type="button" data-bs-toggle="modal" data-bs-target="#modal-task" class="w-100 border-0 mb-1 bg-white d-flex " onclick="showmodal(<?php echo$data['id']; ?>)">
									<div class="p-2">
										<i class="bi bi-question-circle text-green-500 fs-4"></i>
									</div>
									<div class="d-flex flex-column text-start py-2">
										<div data="<?php echo $data["title"]; ?>" class="fw-bolder h5 mb-1 "> <?php echo$data["title"]; ?> </div>
										<div class="d-flex flex-column text-start">
											<div data="<?php echo$data['task_datetime']; ?>" class="text-gray-600 mb-1">#<?php echo$data['id'];?> created in <?php echo$data['task_datetime']; ?> </div>
											<div data="<?php echo$data['description']; ?> " class="mb-2 text-truncate" style="max-width: 16rem;" title=""><?php echo$data['description']; ?> </div>
										</div>
										<div class="">
											<span data="<?php echo$data['priority_id']; ?>" class="btn rounded px-2 py-1 text-white bg-cyan-600"> <?php echo$data['priority_name']; ?> </span>
											<span data="<?php echo$data['type_id']; ?>" class="btn btn-secondary rounded px-2 py-1"><?php echo$data['types_name']; ?> </span>
										</div>
									</div>
								</button>
<?php 
}?>
<?php
        

        

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
     
    
      include('database.php');
      $request="INSERT INTO `tasks`( `title`, `task_datetime`, `description`, `type_id`, `priority_id`, `status_id`) VALUES('$title','$date','$description',$task_type,$selected_priority,$status)";
      //
      $query=mysqli_query($connect,$request);
            if($query){
                $_SESSION['message'] = "Task has been added successfully !";
                header('location: index.php');
            }else{
                echo 'error';
            }
      
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
        include ('database.php');
        $id = $_POST['id'];
       
        $request="DELETE FROM tasks WHERE id=$id";

        $query=mysqli_query($connect,$request);

        if($query){
            $_SESSION['message'] = "Task has been deleted successfully !";
		header('location: index.php');
        }
        

       
    }



    //bring data from the database and check the status of the task and make a condition , if status== todo 
    //and make a variable with the html code to put it in the right place , 
?>
