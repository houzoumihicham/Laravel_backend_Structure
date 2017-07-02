 function remove_model(id){
            swal({
                title: 'Êtes-vous sûr?',
                text: "Vous voulez vraiment supprimer!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Supprimer!',
                cancelButtonText: 'Annuler',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function () {
                $.ajax({
                    url: "/admin/slider/"+id+"/delete",

                    type: "get",
                    success: function(response) {

                        if (response == "true") {
                            $("#slides_contant").load(location.href + " #slides_contant");
                            swal(
                                'Supprimer!',
                                'le slider image a été bien supprimer',
                                'success'
                            )

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
        }



        function SliderOrder(){

             $("#test-list").sortable({
                tolerance: 'pointer',
                revert: 'invalid',
                placeholder: 'span2 well placeholder tile',
                forceHelperSize: true,
                handle : '.handle',
                update : function () {
                    var order = $('#test-list').sortable('serialize');
                    $.ajax({
                        type: "GET",
                        url: "/admin/slider/update_sort?"+order,
                        success: function(data) {
                            toastr.success(data);
                        }

                    });
                    
                }
            });

        }






        $(document).ready(function() {

            SliderOrder();
           
        });