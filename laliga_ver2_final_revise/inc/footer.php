


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

  <footer class="py-5 bg-black">
            <div class="container px-5"><p class="m-0 text-center text-white small">Copyright &copy; Laliga Pilipinas 2022</p></div>
        </footer>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript">
let userIdno = "<?php echo $userIdno; ?>";


 function load_unseen_notification(view = '') {
  $.ajax({
   url:"fetch_notif.php",
   method:"POST",
   data:{
    view:view,
    userIdnos: userIdno,
  },
   dataType:"json",
   success:function(data)
   {
    $('.dropdown-menu').html(data.notification);
    if(data.unseen_notification > 0)
    {
     $('.count').html(data.unseen_notification);
    }
   }
  });
 } // end of load_unseen_notification


 $(document).on('click', '.dropdown-toggle', function(){
  $('.count').html('');
  load_unseen_notification('yes');
 });

 setInterval(function(){ 
 console.log(load_unseen_notification());
 }, 2000);
 
 
</script>


</body>
</html>