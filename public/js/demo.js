type = ['','info','success','warning','danger'];
    	

demo = {
    initPickColor: function(){
        $('.pick-class-label').click(function(){
            var new_class = $(this).attr('new-class');  
            var old_class = $('#display-buttons').attr('data-class');
            var display_div = $('#display-buttons');
            if(display_div.length) {
            var display_buttons = display_div.find('.btn');
            display_buttons.removeClass(old_class);
            display_buttons.addClass(new_class);
            display_div.attr('data-class', new_class);
            }
        });
    },
    
	showSaveNotification: function(elemento){
    	
    	$.notify({
        	icon: "fa fa-plus",
        	message: "<b>" + elemento + "</b> creado correctamente."
        	
        },{
            type: type[2],
            timer: 4000,
            placement: {
                from: 'top',
                align: 'right'
            }
        });
	},

  showUpdateNotification: function(elemento){
      
      $.notify({
          icon: "fa fa-pencil",
          message: "<b>" + elemento + "</b> actualizado correctamente."
          
        },{
            type: type[3],
            timer: 4000,
            placement: {
                from: 'top',
                align: 'right'
            }
        });
  },

  showDeleteNotification: function(elemento, nombre){
      
      $.notify({
          icon: "fa fa-trash",
          message: "El " + elemento + " con el Nombre: <b>" + nombre + "</b> se elimino correctamente."
          
        },{
            type: type[4],
            timer: 4000,
            placement: {
                from: 'top',
                align: 'right'
            }
        });
  },
    
}

