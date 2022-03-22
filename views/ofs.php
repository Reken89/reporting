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
           var lbo = $('.lbo', tr).val();
           
                               var tr = this.closest('tr');
           var credit_year_all = $('.credit_year_all', tr).val();
           
                               var tr = this.closest('tr');
           var credit_year_term = $('.credit_year_term', tr).val();
           
                               var tr = this.closest('tr');
           var debit_year_all = $('.debit_year_all', tr).val();
           
                               var tr = this.closest('tr');
           var debit_year_term = $('.debit_year_term', tr).val();
           
                               var tr = this.closest('tr');
           var fact_all = $('.fact_all', tr).val();
           
                               var tr = this.closest('tr');
           var fact_mounth = $('.fact_mounth', tr).val();
           
                               var tr = this.closest('tr');
           var kassa_all = $('.kassa_all', tr).val();
           
                               var tr = this.closest('tr');
           var kassa_mounth = $('.kassa_mounth', tr).val();
           
                               var tr = this.closest('tr');
           var credit_end_all = $('.credit_end_all', tr).val();
           
                               var tr = this.closest('tr');
           var credit_end_term = $('.credit_end_term', tr).val();
           
                               var tr = this.closest('tr');
           var debit_end_all = $('.debit_end_all', tr).val();
           
                               var tr = this.closest('tr');
           var debit_end_term = $('.debit_end_term', tr).val();
           
                                          var tr = this.closest('tr');
           var id = $('.id', tr).val();
           
                                          var tr = this.closest('tr');
           var marker_b = $('.marker_b', tr).val();
           
                                                     var tr = this.closest('tr');
           var return_old = $('.return_old', tr).val();
           
                                                     var tr = this.closest('tr');
           var prepaid = $('.prepaid', tr).val();
           
                      $.ajax({  
                url:"/reporting/table/update",  
                method:"POST",  
                data:{ id:id, debit_end_term:debit_end_term, debit_end_all:debit_end_all, credit_end_term:credit_end_term, credit_end_all:credit_end_all, kassa_mounth:kassa_mounth, kassa_all:kassa_all, fact_mounth:fact_mounth, fact_all:fact_all, debit_year_term:debit_year_term, debit_year_all:debit_year_all, credit_year_term:credit_year_term, credit_year_all:credit_year_all, lbo:lbo, marker_b:marker_b, return_old:return_old, prepaid:prepaid },
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
                url:"/reporting/table/back",  
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
                url:"/reporting/table/back",  
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
     
     
     
     
                           $(document).on('click', '#reset', function(){

           var tr = this.closest('tr');
           var id = $('.id', tr).val();
           
           var tr = this.closest('tr');
           var marker_b = $('.marker_b', tr).val();
           
                                          var tr = this.closest('tr');
           var lbo = $('.lbo', tr).val();
           
                               var tr = this.closest('tr');
           var credit_year_all = $('.credit_year_all', tr).val();
           
                               var tr = this.closest('tr');
           var credit_year_term = $('.credit_year_term', tr).val();
           
                               var tr = this.closest('tr');
           var debit_year_all = $('.debit_year_all', tr).val();
           
                               var tr = this.closest('tr');
           var debit_year_term = $('.debit_year_term', tr).val();
                                                    
                               var tr = this.closest('tr');
           var credit_end_all = $('.credit_end_all', tr).val();
           
                               var tr = this.closest('tr');
           var credit_end_term = $('.credit_end_term', tr).val();
           
                               var tr = this.closest('tr');
           var debit_end_all = $('.debit_end_all', tr).val();
           
                               var tr = this.closest('tr');
           var debit_end_term = $('.debit_end_term', tr).val();
           
                                          var tr = this.closest('tr');
           var id_name = $('.id_name', tr).val();
           
                                          var tr = this.closest('tr');
           var return_old = $('.return_old', tr).val();
           
                                         var tr = this.closest('tr');
           var prepaid = $('.prepaid', tr).val();

       $.ajax({  
                url:"/reporting/table/reset",  
                method:"POST",  
               
                data:{id:id, marker_b:marker_b, debit_end_term:debit_end_term, debit_end_all:debit_end_all, credit_end_term:credit_end_term, credit_end_all:credit_end_all, debit_year_term:debit_year_term, debit_year_all:debit_year_all, credit_year_term:credit_year_term, credit_year_all:credit_year_all, lbo:lbo, id_name:id_name, return_old:return_old, prepaid:prepaid},
                dataType:"text",  
                success:function(data)  
                {  

                   fetch_data();  

                }  

           })

        })
     
     
     
     
     
     
                           $(document).on('click', '#btn2', function(){
                                          

       $.ajax({  
                url:"/reporting/table/dispatch",  

                success:function(data)  
                {  
                     alert(data);
                     fetch_data();  
                   //$('#live_data').html(data);
                   //setKeydownmyForm()
                }  

           })

        })
     
     
     
     
     
                                $(document).on('click', '#btn3', function(){

       $.ajax({  
                url:"/reporting/table/editing1",  

                success:function(data)  
                {  
                     alert(data);
                     fetch_data();  
                   //$('#live_data').html(data);
                   //setKeydownmyForm()
                }  

           })

        })
        
        
        
                                 $(document).on('click', '#btn4', function(){

       $.ajax({  
                url:"/reporting/table/editing2",  

                success:function(data)  
                {  
                     alert(data);
                     fetch_data();  
                   //$('#live_data').html(data);
                   //setKeydownmyForm()
                }  

           })

        })
     
     
     
     
                                      $(document).on('click', '#filling', function(){

       $.ajax({  
                url:"/reporting/table/filling",  

                success:function(data)  
                {  
                     alert(data);
                     fetch_data();  
                }  

           })

        })
     
     
     
     
           }); 
       
       </script>