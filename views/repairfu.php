
    <head>          
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>            
    </head>
    
    <div id="live_data"></div>
    
    <script>
        
        $(document).ready(function(){
            
            
                               function fetch_data()  
      {  
           $.ajax({  
                url:"/reporting/repairfu/repairfu_back",  
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
                url:"/reporting/repairfu/repairfu_back",  
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
        
        
        
                                $(document).on('click', '#edit', function(){
                 
           var tr = this.closest('tr');
           var marker_b = $('.marker_b', tr).val();
           
           var tr = this.closest('tr');
           var id = $('.id', tr).val();
           
           var tr = this.closest('tr');
           var ekr = $('.ekr', tr).val();
           
           var tr = this.closest('tr');
           var title = $('.title', tr).val();
           
           var tr = this.closest('tr');
           var fu = $('.fu', tr).val();

       $.ajax({  
                url:"/reporting/repairfu/update", 
                method:"POST",  
                data:{ id:id, marker_b:marker_b, ekr:ekr, title:title, fu:fu },
                dataType:"text",

                success:function(data)  
                {  
                    // alert(data);
                     fetch_data();  

                }  

           })

        })
        
        
        
        
        $(document).on('click', '#add', function(){
                 
           var tr = this.closest('tr');
           var marker_b = $('.marker_b', tr).val();
           
           var tr = this.closest('tr');
           var ekr = $('.ekr', tr).val();
           
           var tr = this.closest('tr');
           var title = $('.title', tr).val();
           
           var tr = this.closest('tr');
           var fu = $('.fu', tr).val();

       $.ajax({  
                url:"/reporting/repairfu/add", 
                method:"POST",  
                data:{ marker_b:marker_b, ekr:ekr, title:title, fu:fu },
                dataType:"text",

                success:function(data)  
                {  
                     alert(data);
                     fetch_data();  

                }  

           })

        })
        
        
        
        
        
        $(document).on('click', '#delete', function(){
                 
           var tr = this.closest('tr');
           var marker_b = $('.marker_b', tr).val();
           
           var tr = this.closest('tr');
           var ekr = $('.ekr', tr).val();
           
           var tr = this.closest('tr');
           var id = $('.id', tr).val();
           

       $.ajax({  
                url:"/reporting/repairfu/delete", 
                method:"POST",  
                data:{ marker_b:marker_b, ekr:ekr, id:id },
                dataType:"text",

                success:function(data)  
                {  
                     //alert(data);
                     fetch_data();  

                }  

           })

        })
        
        
        
        $(document).on('click', '#open', function(){
                                          

       $.ajax({  
                url:"/reporting/repairfu/update_status",  

                success:function(data)  
                {  
                    // alert(data);
                     fetch_data();  
                   //$('#live_data').html(data);
                   //setKeydownmyForm()
                }  

           })

        })
        
        
        
     
            
        }); 
        
        </script>

