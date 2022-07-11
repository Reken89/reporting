
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
           var glava = $('.glava', tr).val();
           
                               var tr = this.closest('tr');
           var adm = $('.adm', tr).val();
           
                               var tr = this.closest('tr');
           var sovet = $('.sovet', tr).val();
           
                               var tr = this.closest('tr');
           var kso = $('.kso', tr).val();
           
                               var tr = this.closest('tr');
           var cb = $('.cb', tr).val();
           
                               var tr = this.closest('tr');
           var zakupki = $('.zakupki', tr).val();
           
                               var tr = this.closest('tr');
           var aurinko = $('.aurinko', tr).val();
           
                               var tr = this.closest('tr');
           var berezka = $('.berezka', tr).val();
           
                               var tr = this.closest('tr');
           var zoloto = $('.zoloto', tr).val();
           
                               var tr = this.closest('tr');
           var korablik = $('.korablik', tr).val();
           
                               var tr = this.closest('tr');
           var gnomik = $('.gnomik', tr).val();
           
                               var tr = this.closest('tr');
           var skazka = $('.skazka', tr).val();
           
                               var tr = this.closest('tr');
           var solnishko = $('.solnishko', tr).val();
           
                               var tr = this.closest('tr');
           var id = $('.id', tr).val();
           
                               var tr = this.closest('tr');
           var dmsh = $('.dmsh', tr).val();
           
                               var tr = this.closest('tr');
           var dhsh = $('.dhsh', tr).val();
           
                               var tr = this.closest('tr');
           var vsosh_ds = $('.vsosh_ds', tr).val();
           
                              var tr = this.closest('tr');
           var vsosh_school = $('.vsosh_school', tr).val();
           
                              var tr = this.closest('tr');
           var kums = $('.kums', tr).val();
           
                              var tr = this.closest('tr');
           var uprava = $('.uprava', tr).val();
           
                              var tr = this.closest('tr');
           var edds = $('.edds', tr).val();
           
                              var tr = this.closest('tr');
           var marker_b = $('.marker_b', tr).val();
           
                      $.ajax({  
                url:"/reporting/budgetuser/update",  
                method:"POST",  
                data:{ id:id, marker_b:marker_b, glava:glava, adm:adm, sovet:sovet, kso:kso, cb:cb, zakupki:zakupki, aurinko:aurinko, berezka:berezka, zoloto:zoloto, korablik:korablik, gnomik:gnomik, skazka:skazka, solnishko:solnishko, dmsh:dmsh, dhsh:dhsh, vsosh_ds:vsosh_ds, vsosh_school:vsosh_school, kums:kums, uprava:uprava, edds:edds },
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
                url:"/reporting/budgetuser/budget_back",  
                method:"POST",  
                success:function(data){  
                     $('#live_data').html(data);  
                     setKeydownmyForm()
                     
                }   
           });  
      } 
     fetch_data(); 
            
            
            
            
            
            
        });
        
        </script>

