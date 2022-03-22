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
                url:"/reporting/editor/editor_back",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                     setKeydownmyForm()
                     
                }   
           });  
      } 
     fetch_data(); 
     
     
     
     
     
          $(document).on('click', '#editor', function(){

           var tr = this.closest('tr');
           var id = $('.id', tr).val();
    
           var tr = this.closest('tr');
           var name = $('.name', tr).val();
           
           var tr = this.closest('tr');
           var ekr = $('.ekr', tr).val();
             
       $.ajax({  
                url:"/reporting/editor/rewriting",  
                method:"POST",  
                data:{ id:id, name:name, ekr:ekr },
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
