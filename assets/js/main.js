function showmodal(modal_id){
    //we select the value of the element with id="task-id" and affect modal_id as a value , we set modal_id as showmodal() parametre;
    document.getElementById("task-id").value=modal_id;
    }




        function editTask(id){
        //    
            document.getElementById("task-id").value = id;
        
            document.getElementById('task-save-btn').style.display   = "none";
            document.getElementById('task-update-btn').style.display = "block";
            document.getElementById('task-delete-btn').style.display = "block";
            
            document.getElementById('task-title').value = document.getElementById(id).getAttribute("title");
            document.getElementById('task-priority').value = document.getElementById(id).getAttribute("priority");
            document.getElementById('task-description').value = document.getElementById(id).getAttribute("description");
            document.getElementById('task-status').value = document.getElementById(id).getAttribute("status");
            document.getElementById('task-date').value = document.getElementById(id).getAttribute("date");
            if(document.getElementById(id).getAttribute("type") == '1'){
                type_feature.checked = true;
            }
            else{
                type_bug.checked = true;
            }
        }


        function card_infos(id){
          //  get the data saved in the attributes
        
            let title       = document.getElementById(id).children[1].children[0].getAttribute("data") 
            let date        = document.getElementById(id).children[1].children[1].children[0].getAttribute("data") 
            let description = document.getElementById(id).children[1].children[1].children[1].getAttribute("data")
            let priority    = document.getElementById(id).children[1].children[2].children[0].getAttribute("data")
            let type        = document.getElementById(id).children[1].children[2].children[1].getAttribute("data")
            let status      = document.getElementById(id).getAttribute("data-status")
            
            document.getElementById("task-title").value = title;
            document.getElementById("task-priority").value= priority;
            document.getElementById("task-status").value= status;
            document.getElementById("task-date").value= date;
            document.getElementById("task-description").value= description;
            document.getElementById("task-id").value=id;
            if(type == 1){document.getElementById("task-type-feature").checked = true};
            if(type == 2){document.getElementById("task-type-bug").checked = true};

            document.getElementById("task-save-btn").style.display="none";

            // let title = documentGetElementById(id).children[1].children[0].getAttribute("data")
            // let  date = documentGetElementById(id).children[1].children[1].children[0].getAttribute("data")
            // let description= documentGetElementById(id).children[1].children[1].children[1].getAttribute("data")
            // let priority =documentGetElementById(id).children[1].children[2].children[0].getAttribute("data")
            // let type =document.getElementById(id).children[1].children[2].children[1].getAttribute("data")
        
        }
// function validat(){

// let validation=document.forms["form-name"]["title_input"].value;
// if(validation==""){

// alert("hahia khdama");
// return false;

// }


// }


    