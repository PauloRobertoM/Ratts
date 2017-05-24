$('div.bgParallax').each(function(){
   var $obj = $(this);
   $(window).scroll(function() {
      var yPos = -($(window).scrollTop() / $obj.data('speed')); 
      var bgpos = '50% '+ yPos + 'px';
      $obj.css('background-position', bgpos );
   }); 
});


;(function($, window) {

   var $preloader = $("#preloader");

   /*--------------%
   mascaras
   %-------*/
   VMasker($(".input_telefone")).maskPattern("(99) 99999-9999");

	/*--------------%
	ATENDIMENTO
	%-------*/
	$("#_form_atendimento").on("submit", function( event ) {
         event.preventDefault();
         
         var $callbacks = $("#_atendimentos_callbacks");
         var formData = new FormData();
         
         formData.append("action", "atendimento");
         formData.append("nome", $("#atendimento_nome").val());
         formData.append("empresa", $("#atendimento_empresa").val());
         formData.append("site", $("#atendimento_site").val());
         formData.append("funcao", $("#atendimento_funcao").val());
         formData.append("fone_endereco", $("#atendimento_fone_endereco").val());
         formData.append("email", $("#atendimento_email").val());
         formData.append("telefone", $("#atendimento_telefone").val());
         
         formData.append("especificacoes", $("#atendimento_especificacoes").val());

         $.ajax({
            type: "post",
            url: theme.ajax_url,
            data: formData,
            processData: false,
            contentType: false,
            dataType: 'json',
            beforeSend: function() {
               $preloader.toggleClass("off");
               $callbacks.find(".alert").remove();
            },
            success: function(res) {

               if ( res.erros ) {

                  $callbacks.prepend(createAlert('danger', res.erros[0]));
               
               } else {

                  clearValues(["#atendimento_nome", "#atendimento_empresa", "#atendimento_site", "#atendimento_funcao", "#atendimento_fone_endereco", "#atendimento_email", "#atendimento_telefone", "#atendimento_anexo", "#atendimento_especificacoes"]);
                  $("#atendimento_arquivo").val("Nenhum projeto selecionado");

                  $callbacks.prepend(createAlert('success', 'Atendimento salvo com sucesso! Aguarde retorno!'));
               
               }

            },
            error: function(res) {
               $callbacks.prepend(createAlert('success', 'Enviado com sucesso!'));
            },
            complete: function(res) {
               console.log("complete");
               $("html, body").animate({ scrollTop: $("#_form_atendimento").offset().top-100 }, 600);

               $preloader.toggleClass("off");
            }
         });

	});

   function clearValues(elements) {
      for (var i = elements.length - 1; i >= 0; i--) {
         $(elements[i]).val("");
      };
   }

   $("#toggleAtendimento").on("click", function( event ) {
      event.preventDefault();
      $(this).toggleClass("active");
      $("#_form_atendimento").toggleClass("off");

      if ( !$("#_form_atendimento").hasClass("off") ) {
         $("html, body").animate({ scrollTop: $("#_form_atendimento").offset().top-100 }, 600);
      }

   });

   $("#fecharAtendimento").on("click", function( event ) {
      event.preventDefault();
      $("#_form_atendimento").addClass("off");
      $("#toggleAtendimento").removeClass("active");
   });

   $("#_form_contato").on("submit", function( event ) {
      event.preventDefault();
         
   });


   function createAlert(type, text) {
      var $html = '<div class="alert alert-'+type+' alert-dismissible fade in" role="alert">';
            $html += '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>';
            $html += text;
          $html += '</div>';

      return $html;
   }


   $("#_form_contato").on("submit", function( event ) {

      event.preventDefault();
      
      var $callbacks = $("#_contato_callbacks");
      var formData = new FormData();
      
      formData.append("security", $("#contato_security").val());
      formData.append("nonce", $("#contato_nonce").val());
      formData.append("action", "contato");
      formData.append("nome", $("#contato_nome").val());
      formData.append("email", $("#contato_email").val());
      formData.append("assunto", $("#contato_assunto").val());
      formData.append("anexo", document.querySelector("#contato_anexo").files[0]);
      formData.append("mensagem", $("#contato_mensagem").val());

      $.ajax({
         type: "post",
         url: theme.ajax_url,
         data: formData,
         processData: false,
         contentType: false,
         dataType: 'json',
         beforeSend: function() {
            $preloader.toggleClass("off");
            $callbacks.find(".alert").remove();
         },
         success: function(res) {

            if ( res.erros ) {

               $callbacks.prepend(createAlert('danger', res.erros[0]));
            
            } else {

               clearValues(["#contato_nome", "#contato_email", "#contato_assunto", "#contato_anexo", "#contato_mensagem"]);
               $("#atendimento_arquivo").val("Nenhum projeto selecionado");

               $callbacks.prepend(createAlert('success', 'contato enviado com sucesso. em breve entraremos em contato através dos dados informados no formulário.'));
            
            }

         },
         error: function(res) {
            $callbacks.prepend(createAlert('danger', 'ops, estamos com problemas em nosso servidor. tente de novo mais tarde.'));
         },
         complete: function(res) {
            console.log("complete");
            $("html, body").animate({ scrollTop: $("#_form_contato").offset().top-100 }, 600);

            $preloader.toggleClass("off");
         }
      });

   });

   /*--------------%
   anexo
   %-------*/
   $(".anexo").on("change", function() {
      var fReader = new FileReader();
      var file = $(this)[0].files[0];
      var prefix = $(this).siblings('.prefix').val();
      fReader.readAsDataURL(file);

      fReader.onloadend = function(event){
         $("#"+prefix+"_arquivo").val(file.name);
      }
   });

   $recentes = $("#postsRecentes .content");
   $recentes.owlCarousel({
      items: 1,
      dots: false,
      loop: true
   });

   $recentes.find('.prev').on("click", function(event) {
      event.preventDefault();
      $recentes.trigger('prev.owl.carousel');
   });

   $recentes.find('.next').on("click", function(event) {
      event.preventDefault();
      $recentes.trigger('next.owl.carousel');
   });

   $('#produtoVitrines .indicadores').owlCarousel({
      items: 5,
      dots: false,
      rtl: true,
      responsiveClass: true,
      responsive: {
         0: {
            items: 3,
         },
         750: {
            items: 4,
         },
         970: {
            items: 5,
         }
      }
   });


   $('#produtoVitrines').on('slid.bs.carousel', function() {
      var currentIndex = $('#produtoVitrines .carousel-inner .item.active').index();

      var $indicadores = $(".indicadores .indicador");

      $indicadores.removeClass("active");

      $indicadores.each(function(index) {

         if ( $(this).attr("data-slide-to") == currentIndex ) {
            $(this).addClass("active");

            $("#produtoVitrines .indicadores").trigger("to.owl.carousel", [currentIndex, 200, true]);
         }
      });
   });


   $outrosProdutos = $("#contentOutrosProdutos .content");

   $outrosProdutos.owlCarousel({
      items: 4,
      dots: false,
      responsiveClass: true,
      responsive: {
         0: {
            items: 1,
         },
         750: {
            items: 2,
         },
         1140: {
            items: 4,
         }
      }
   });

   $('#contentOutrosProdutos .prev').click(function() {
      $outrosProdutos.trigger('prev.owl.carousel');
   });

   $('#contentOutrosProdutos .next').click(function() {
      $outrosProdutos.trigger('next.owl.carousel');
   });


   var currentParceirosPage = 1;

   $("#maisParceiros").on("click", function( event ) {
      event.preventDefault();

      currentParceirosPage++;

      var numeroPaginas = $(this).attr("data-count");
      var proximaPagina = currentParceirosPage+1;

      if ( currentParceirosPage <= numeroPaginas ) {
         
         $.ajax({
            url: "page/"+currentParceirosPage,
            type: "get",
            beforeSend: function() {
               $preloader.toggleClass("off");
            },
            success: function( res ) {
               $("#contentParceiros .row").append(res);
            },
            complete: function() {
               $preloader.toggleClass("off");
            }
         });

      }

      if ( proximaPagina > numeroPaginas ) {
         $(this).remove();
      }

   });

})(jQuery, window);