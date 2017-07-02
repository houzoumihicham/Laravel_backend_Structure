
   /**

   * Function to change input by lang

   **/

   function ChangeInputLang(){

    $('#lang').on('change', function () 
    {
      if( $(this).val()==="fr")
      {
         $("#name").show();
         $("#name_en").hide();
      }
      else
      {

          $("#name_en").show();
          $("#name").hide();
      }
       
    });

   }



    /**

   * Init Functions
   
   **/ 

    $(document).ready(function () {

        ChangeInputLang();
               
     });