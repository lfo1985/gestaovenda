/**
 * Função que exibe o alerta de sucesso do SweetAlert
 * @param {string} message 
 * @param {*} callback 
 */
function alertaSucesso(message, callback = null){
    Swal.fire({
      icon: 'success',
      title: 'OK!',
      text: message
    }).then(result => {
      if(callback != null){
        callback();
      }
    });
}
  
  /**
   * Função para exibir o alerta de erro do SweetAlert
   * @param {string} message 
   * @param {*} callback 
   */
  function alertaErro(message, callback = null){
    Swal.fire({
      icon: 'error',
      title: 'Ops...',
      text: message
    }).then(result => {
      if(callback != null){
        callback();
      }
    });
  }

  /**
   * Função que exibe o alerta de confirmação do SweetAlert
   * @param {string} title 
   * @param {string} message 
   * @param {*} callback 
   */
  function alertaConfirmacao(title, message, callback = null){
    Swal.fire({
      title: title,
      text: message,
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'ok',
      cancelButtonText: 'cancelar'
    }).then((result) => {
      if(callback != null && result.isConfirmed){
        callback();
      }
    })
  }

  /**
   * Função para exibir o loader utilizando o blockUI
   */
  function exibeLoader(){
    $.blockUI({
      message:  '<p>'+
                '   <div class="spinner-border text-light" role="status">'+
                '     <span class="visually-hidden">Loading...</span>'+
                '   </div>'+
                '<p>',
      css: { border: 'none', color: 'green', backgroundColor: 'transparent' }
    });
  }

  /**
   * Função para ocultar o loader utilizando o blockUI
   */
  function ocultaLoader(){
    $.unblockUI();
  }

  /**
   * Função padrão para gravações utilizando a lib do jQuery.form
   * 
   * @param {string} form 
   * @param {*} success 
   * @param {*} validate 
   */
  function salvar(form, success, validate = null){

    $(form).on('submit', function(e){
      
      e.preventDefault();
  
      if(validate != null) {
  
        if(validate() == false){
          return false;
        }
  
      }
      
      $(this).ajaxSubmit({
        type: 'POST',
        dataType: 'JSON',
        beforeSubmit: function(){ exibeLoader(); },
        success: function(response){
          if(response.cod == 1){
            ocultaLoader();
            alertaSucesso(response.mensagem, function(){
              success(response);
            });
          } else if(response.cod == 2){
            ocultaLoader();
            alertaErro(response.mensagem);
          }
        },
        error: function(xhr){ 
          ocultaLoader();
          alertaErro(xhr.responseText); 
        }
      });
      
      return false;
  
    });
  
  }

  /**
   * Função para redirecionar as telas
   * 
   * @param {string} url 
   */
  function redir(url){
    window.location = url;
  }

  /**
   * Função para redirecionar as telas
   * 
   * @param {string} url 
   */
  function atualiza(){
    location.reload();
  }

  /**
   * 
   * @param {string} route 
   * @param {int} id 
   */
  function apagar(rota){

    alertaConfirmacao('Deseja apagar este registro?', 'Esta ação pode ser irreversível!', function(){
  
      exibeLoader();
      
      $.get(rota, {}, function(response){
        if(response.cod == 1){
          atualiza();
        } else if(response.cod == 2){
          ocultaLoader();
          alertaErro(response.message);
        }
      }, 'json').fail(function(xhr){
        ocultaLoader();
        alertaErro(xhr.responseText); 
      });
  
    });
  
  }

  /**
   * Calendário padrão para utilização de forma global
   * @param {string} el 
   */
  function calendario(el){
    $(el).datepicker({
      dateFormat: 'dd/mm/yy',
      dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
      dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
      dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
      monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
      monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
      nextText: 'Próximo',
      prevText: 'Anterior'
    });
  }