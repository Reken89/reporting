<?php
?>

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
                    var id = $('.id', tr).val();
           
                    var tr = this.closest('tr');
                    var heat_one = $('.heat_one', tr).val();
                    
                    var tr = this.closest('tr');
                    var heat_two = $('.heat_two', tr).val();
           
                    var tr = this.closest('tr');
                    var drainage_one = $('.drainage_one', tr).val();
                    
                    var tr = this.closest('tr');
                    var drainage_two = $('.drainage_two', tr).val();
           
                    var tr = this.closest('tr');
                    var negative_one = $('.negative_one', tr).val();
                    
                    var tr = this.closest('tr');
                    var negative_two = $('.negative_two', tr).val();
           
                    var tr = this.closest('tr');
                    var water_one = $('.water_one', tr).val();
                    
                    var tr = this.closest('tr');
                    var water_two = $('.water_two', tr).val();
           
                    var tr = this.closest('tr');
                    var electro_one = $('.electro_one', tr).val();
                    
                    var tr = this.closest('tr');
                    var electro_two = $('.electro_two', tr).val();
                    
                    var tr = this.closest('tr');
                    var trash_one = $('.trash_one', tr).val();
                    
                    var tr = this.closest('tr');
                    var trash_two = $('.trash_two', tr).val();
           
                    $.ajax({  
                        url:"/reporting/communal/update_tarif",  
                        method:"POST",  
                        data:{ id:id, heat_one:heat_one, heat_two:heat_two, drainage_one:drainage_one, drainage_two:drainage_two, negative_one:negative_one, negative_two:negative_two, water_one:water_one, water_two:water_two, electro_one:electro_one, electro_two:electro_two, trash_one:trash_one, trash_two:trash_two },
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

