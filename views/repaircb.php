
    <head>          
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>            
    </head>
    
    <div id="live_data"></div>
    
    <script>
    
    $(document).ready(function(){
        
        
        function fetch_data()  
      {  
           $.ajax({  
                url:"/reporting/repaircb/repaircb_back",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                     setKeydownmyForm()
                     
                }   
           });  
      } 
     fetch_data();
     
     
     
                                     $(document).on('click', '#btn1', function(){

       $.ajax({  
                url:"/reporting/repaircb/repaircb_back",  
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
        
        
    });
    
</script>

