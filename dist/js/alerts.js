$(function(){
      $('#login').click(function(e){
         var valid = this.form.checkValidity();
         if(valid){
            var dados = $('#login-form').val();
            e.preventDefault();
            $.ajax({
               type: 'POST',
               data: dados,
               success: function(data){
                  Swal.fire({
                  title: 'Success',
                  text: 'Você será direcionado para admin page!',
                  icon: 'success'
                  })
               }
            });
         }else{
                  Swal.fire({
                  title: 'Error',
                  text: 'Email e/ou Password wrong',
                  icon: 'error',
                  confirmButtonText: 'Confirmar',
                  confirmButtonColor: 'green'
                  })
               
         }

      });
      
   })