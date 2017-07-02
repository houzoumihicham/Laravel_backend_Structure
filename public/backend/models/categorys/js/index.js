   /***************************************************
   ********************* Remove categorys *************
   ****************************************************/
  
    function RemoveCategorys(){

    $(".remove_model" ).on( "click", function(){
            var id=$(this).data("loc-subject");
            swal({
                title: 'Êtes-vous sûr?',
                text: "Vous voulez vraiment supprimer!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function () {
                $.ajax({
                    url: "/admin/categorys/"+id+"/delete",

                    type: "get",
                    success: function(response) {

                        if (response == "true") {

                            swal(
                                'Supprimer!',
                                'la Catégorie a été bien supprimer',
                                'success'
                            ).then(function () {
                                location.reload();
                            });


                        } else {
                            swal(
                                'No pas supprimer',
                                'il a une erreur',
                                'error'
                            )
                        }
                    }

                });
            }, function (dismiss) {
                // dismiss can be 'cancel', 'overlay',
                // 'close', and 'timer'
                if (dismiss === 'cancel') {
                    swal(
                        'Annulé',
                        'Operation annulée :)',
                        'error'
                    )
                }
            })
        } );
 
    } 

   /***************************************************
   *************** Update categorys Orders ************
   ****************************************************/


   function UpdateOrder(){

    $("#categorie-sort-list").sortable({ 
             tolerance: 'pointer',
        revert: 'invalid',
        placeholder: 'span2 well placeholder tile',
        forceHelperSize: true,
            handle : '.handle', 
            update : function () { 
              var order = $('#categorie-sort-list').sortable('serialize'); 
              $.ajax({
                   type: "GET",
                   url: "/admin/categorys/update_sort?"+order,
                   success: function(data) {
                        toastr.success(data);
                    }
                });
            
            } 
        }); 
   }




   /***************************************************
   *************** Init on document ready ************
   ****************************************************/

    $(document).ready(function() {
       
     RemoveCategorys();
     UpdateOrder();

        
    }); 