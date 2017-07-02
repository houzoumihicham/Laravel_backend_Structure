   /***************************************************
   ********************* Remove categorys *************
   ****************************************************/
  
    function RemoveProducts(){

   $("table").delegate(".remove_model","click", function() {
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
                    url: "/admin/products/"+id+"/delete",

                    type: "get",
                    success: function(response) {

                        if (response == "true") {

                            swal(
                                'Supprimer!',
                                'le produis a été bien supprimer',
                                'success'
                            ).then(function () {
                           
                                $('#dataTableBuilder').DataTable().draw(false)
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
   *************** Init on document ready ************
   ****************************************************/

    $(document).ready(function() {
       
     RemoveProducts();
        
    }); 