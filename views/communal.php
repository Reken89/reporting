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
                url:"/reporting/communal/communal_back",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                     setKeydownmyForm()
                     
                }   
           });  
      } 
     fetch_data(); 
     
     
     
     
                           $(document).on('click', '#communal', function(){

       $.ajax({  
                url:"/reporting/communal/communal_back",  
                method:"POST",  
               
                data: $('#my-form').serialize(),
                dataType:"text",  
                success:function(data)  
                {  
                   //  alert(data);
                   //  fetch_data();  
                  $('#live_data').html(data);
                  setKeydownmyForm()
                }  

           })

        })
        
        
        
        
                     $(document).on('click', '#email', function(){

       $.ajax({  
                url:"/reporting/communal/email",   
                success:function(data)  
                {  
                     alert(data);
                     fetch_data();  
                }  

           })

        })
     
     
     
     
              $(document).on('click', '#update_status', function(){

           var tr = this.closest('tr');
           var id = $('.id', tr).val();
    
       $.ajax({  
                url:"/reporting/communal/update_status",  
                method:"POST",  
                data:{ id:id },
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

