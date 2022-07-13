
    <head>          
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>            
    </head>
    
    <div id="live_data"></div>
    
    <script> 
        
        $(document).ready(function(){
            
            
            
                           function setKeydownmyForm() {
	    $('input').keydown(function(e) {
	        if (e.keyCode === 13) {
                    
           
                               var tr = this.closest('tr');
           var id_tarif = $('.id_tarif', tr).val();
           
                              var tr = this.closest('tr');
           var tarif1 = $('.tarif1', tr).val();
           
                              var tr = this.closest('tr');
           var tarif2 = $('.tarif2', tr).val();
           
                              var tr = this.closest('tr');
           var id = $('.id', tr).val();
           
                              var tr = this.closest('tr');
           var volume1 = $('.volume1', tr).val();
           
                              var tr = this.closest('tr');
           var volume2 = $('.volume2', tr).val();
           
                      $.ajax({  
                url:"/reporting/prognoz/update",  
                method:"POST",  
                data:{ id:id, id_tarif:id_tarif, tarif1:tarif1, tarif2:tarif2, volume1:volume1, volume2:volume2 },
                dataType:"text",  
                success:function(data)  
                {  
                     //alert(data);
                     fetch_data();  
                }  


           })  
      } 

      })  

     }  
            
            
            
            
            
            
            
            
            
                   function fetch_data()  
      {  
           $.ajax({  
                url:"/reporting/prognoz/prognoz_back",  
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
                url:"/reporting/prognoz/prognoz_back",  
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


