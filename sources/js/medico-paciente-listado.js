$("#li-pacientes").addClass("active");   
    $("#li-anterior").addClass("disabled");
    $("#li-primero").addClass("disabled");

    $(".mat-input").focus(function(){
    $(this).parent().addClass("is-active is-completed");
  });

  $(".mat-input").focusout(function(){
    if($(this).val() === "")
      $(this).parent().removeClass("is-completed");
      $(this).parent().removeClass("is-active");
    })

    listar_pacientes(1);
    function listar_pacientes(pagina){
        $("#funcion_principal").text("listar");
        $("#text_busqueda").text("");
        $("#bus_paciente").val("");
        $("#busqueda_msg").hide();

        if(pagina == 1){
            $("#item-act").text(1);
            $("#li-anterior").addClass("disabled");
            $("#li-primero").addClass("disabled");
        }
        cargando();
        var estado = $("#item_estado").text();
        var parametros = {
            "pagina" : pagina, 
            "estado" : estado
        };

        var url = '/apps/controller/paciente';
        var data = { funcion: "listar", parametros: parametros };

        fetch(url, {
            method: 'PUT', // or 'PUT'
            body: JSON.stringify(data), // data can be `string` or {object}!
            headers:{
                'Content-Type': 'application/json'
            },
            mode: 'cors'
        }).then(res => res.json())
        .catch(error =>  {
            console.log(error);
            swal("GoVista", "¡Se ha generado un error en el servidor, por favor contacte al administrador!", "error");
        })
        .then(resp => {
            var html = "";
            $("#item-max").text(resp.cant_max);

            if( (resp.cant_max == 1) || (pagina == resp.cant_max)){
                $("#li-siguiente").addClass("disabled");
                $("#li-ultimo").addClass("disabled");
            }else{
                $("#li-siguiente").removeClass("disabled");
                $("#li-ultimo").removeClass("disabled");
            }

            for(var i=0; i < resp.pacientes.length; i++){
                html+="<tr>";
                html+="<td>( "+resp.pacientes[i].tipodoc+" ) "+resp.pacientes[i].numdoc+"</td>";
                html+="<td>"+resp.pacientes[i].name1+" "+ ( resp.pacientes[i].name2 ? resp.pacientes[i].name2 : '' )+"</td>";
                html+="<td>"+resp.pacientes[i].surname1+" "+ ( resp.pacientes[i].surname2 ? resp.pacientes[i].surname2 : '' ) +"</td>";
                html+="<td>"+ ( resp.pacientes[i].munic ?  resp.pacientes[i].munic+" ( "+resp.pacientes[i].dpto+" )"  : '') +" </td>";
                html+="<td>"+resp.pacientes[i].state+"</td>";
                html+="<td class='pl-3'><a href='/apps/rol-medico/pacientes/ver/"+resp.pacientes[i].id+"' title='Ver Paciente'><i class='cl-azul fas fa-eye'></i></a><a href='/apps/rol-medico/pacientes/editar/"+resp.pacientes[i].id+"' title='Editar Paciente' class='ml-2'><i class='cl-morado fas fa-user-edit'></i></a></td>";
                html+="</tr>";
            }
            $("#tbody_pacientes").html("");
            $("#tbody_pacientes").html(html);
            setTimeout(() => {
                swal.close();
            }, 200);
        });
    }

    function buscar_pacientes(pagina){
        var texto = $("#bus_paciente").val();
        $("#item_estado").text("ALL");
        $("#busqueda_msg").show();
            texto = texto.trim();
        $("#funcion_principal").text("buscar");
        $("#text_busqueda").text(texto);
        if(pagina == 1){
            $("#item-act").text(1);
            $("#li-anterior").addClass("disabled");
            $("#li-primero").addClass("disabled");
        }
        cargando();

        var parametros = {
            "pagina" : pagina, 
            "texto"  : texto
        };

        var url = '/apps/controller/paciente';
        var data = {funcion: "buscar", parametros: parametros };
        var miInit = {  method: 'POST', body: JSON.stringify(data), headers:{ 'Content-Type': 'application/json' }};
        fetch(url, miInit).then(res => res.json()).catch(error =>  {
            console.log(error);
            swal("GoVista", "¡Se ha generado un error en el servidor, por favor contacte al administrador!", "error");
        }).then(resp => {
            var html = "";
            $("#item-max").text(resp.cant_max);

            if( (resp.cant_max == 1) || (pagina == resp.cant_max)){
                $("#li-siguiente").addClass("disabled");
                $("#li-ultimo").addClass("disabled");
            }else{
                $("#li-siguiente").removeClass("disabled");
                $("#li-ultimo").removeClass("disabled");
            }
            for(var i=0; i < resp.pacientes.length; i++){
                html+="<tr>";
                html+="<td>( "+resp.pacientes[i].tipodoc+" ) "+resp.pacientes[i].numdoc+"</td>";
                html+="<td>"+resp.pacientes[i].name1+" "+ ( resp.pacientes[i].name2 ? resp.pacientes[i].name2 : '' )+"</td>";
                html+="<td>"+resp.pacientes[i].surname1+" "+ ( resp.pacientes[i].surname2 ? resp.pacientes[i].surname2 : '' ) +"</td>";
                html+="<td>"+ ( resp.pacientes[i].munic ?  resp.pacientes[i].munic+" ( "+resp.pacientes[i].dpto+" )"  : '') +" </td>";
                html+="<td>"+resp.pacientes[i].state+"</td>";
                html+="<td class='pl-3'><a href='/apps/rol-medico/pacientes/ver/"+resp.pacientes[i].id+"' title='Ver Paciente'><i class='cl-azul fas fa-eye'></i></a><a href='/apps/rol-medico/pacientes/editar/"+resp.pacientes[i].id+"' title='Editar Paciente' class='ml-2'><i class='cl-morado fas fa-user-edit'></i></a></td>";
                html+="</tr>";
            }

            if(resp.pacientes.length == 0){  html = "<tr><td colspan='6'>No hay registros</td></tr>";  }
            $("#tbody_pacientes").html("");
            $("#tbody_pacientes").html(html);
            setTimeout(() => {
                swal.close();
            }, 200);
        });
    }

    function cargando(){
        swal('Cargando, espere un momento por favor ... ', {
            closeOnClickOutside: false,
            buttons: false,
            content: {
                element: "img",
                attributes: {
                title: "cargando",
                src: "/apps/img/cargando.gif",
                style: "width:25px; margin-bottom:20px;"
                },
            },
        });
    }


    function primero(){
        $("#li-anterior").addClass("disabled");
        $("#li-primero").addClass("disabled");
        var ultimo = $("#item-max").text();
        if(ultimo != 1){
            $("#li-siguiente").removeClass("disabled");
            $("#li-ultimo").removeClass("disabled");
        }
        $("#item-act").text(1);
        var fun = $("#funcion_principal").text();
        if(fun == "listar"){
            listar_pacientes(1);
        }else{
            $("#bus_paciente").val($("#text_busqueda").text());
            buscar_pacientes(1);
        }        
    }

    function anterior(){
        var num = $("#item-act").text();
        num = parseInt(num) - parseInt(1);        
        if( num == 1 ){
            $("#li-anterior").addClass("disabled");
            $("#li-primero").addClass("disabled");
        }
        if(ultimo != 1){
            $("#li-siguiente").removeClass("disabled");
            $("#li-ultimo").removeClass("disabled");
        }
        $("#item-act").text(num);

        var fun = $("#funcion_principal").text();
        if(fun == "listar"){
            listar_pacientes(num);
        }else{
            $("#bus_paciente").val($("#text_busqueda").text());
            buscar_pacientes(num);
        }   
    }

    function siguiente(){
        var num = $("#item-act").text();
        var ultimo = $("#item-max").text();
        num = parseInt(num) + parseInt(1);        
        if( num == ultimo ){
            $("#li-siguiente").addClass("disabled");
            $("#li-ultimo").addClass("disabled");
        }
        if(ultimo != 1){
            $("#li-anterior").removeClass("disabled");
            $("#li-primero").removeClass("disabled");
        }
        $("#item-act").text(num);

        var fun = $("#funcion_principal").text();
        if(fun == "listar"){
            listar_pacientes(num);
        }else{
            $("#bus_paciente").val($("#text_busqueda").text());
            buscar_pacientes(num);
        }   
    }

    function ultimo(){
        var ultimo = $("#item-max").text();
        $("#li-siguiente").addClass("disabled");
        $("#li-ultimo").addClass("disabled");
        if(ultimo != 1){
            $("#li-anterior").removeClass("disabled");
            $("#li-primero").removeClass("disabled");
        }
        $("#item-act").text(ultimo);

        var fun = $("#funcion_principal").text();
        if(fun == "listar"){
            listar_pacientes(ultimo);
        }else{
            $("#bus_paciente").val($("#text_busqueda").text());
            buscar_pacientes(ultimo);
        }   
    }