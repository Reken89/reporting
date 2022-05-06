<?php

?>

    <head>          
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>            
    </head>
    
    <div id="live_data"></div>
    
          <script>  
       $(document).ready(function(){
           
           
           
           
       function fetch_data()  
      {  
           $.ajax({  
                url:"/reporting/editoruser/editor_user_back",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                     setKeydownmyForm()
                     
                }   
           });  
      } 
     fetch_data(); 
     
     
     
     
     
          $(document).on('click', '#editor_user', function(){

           var tr = this.closest('tr');
           var id = $('.id', tr).val();
    
           var tr = this.closest('tr');
           var login = $('.login', tr).val();
           
           var tr = this.closest('tr');
           var role = $('.role', tr).val();
             
       $.ajax({  
                url:"/reporting/editoruser/editor_user_update",  
                method:"POST",  
                data:{ id:id, login:login, role:role },
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);
                     fetch_data();  
                }  

           })

        })
     
     
     
               $(document).on('click', '#user_add', function(){

           var tr = this.closest('tr');
           var password = $('.password', tr).val();
    
           var tr = this.closest('tr');
           var login = $('.login', tr).val();
           
           var tr = this.closest('tr');
           var role = $('.role', tr).val();
             
       $.ajax({  
                url:"/reporting/editoruser/editor_user_add",  
                method:"POST",  
                data:{ password:password, login:login, role:role },
                dataType:"text",  
                success:function(data)  
                {  
                     alert(data);
                     fetch_data();  
                }  

           })

        })
     
     
     
     
     
           
                  }); 
       
       </script>

