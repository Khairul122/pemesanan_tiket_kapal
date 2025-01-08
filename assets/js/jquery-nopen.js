(function($) {
    // fungsi dijalankan setelah seluruh dokumen ditampilkan

    $(document).ready(function(e) {

  $(document).on("click", ".pesan", function(event) {
            
             var detail = "./pages/pesan-tiket.php";
       
            idbd = this.id;
         
            $.post(detail, {id: idbd}, function(data) {
             
            $("#myModalLabel").html("Detail Produk");
            $(".modal-body").html(data).show();
            });
        });
      
    });
})(jQuery);
