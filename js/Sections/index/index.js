$(document).ready(function(){

   $(".delete").on("click", function(e){
       
    e.preventDefault();

    if(confirm("Seguro qeu lo quieres eliminar?")){

        let id = $(this).data("id");
        window.location.href = "delete.php?id=" + id;
    }

   }); 
});