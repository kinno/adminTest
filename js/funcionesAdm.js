var area;
var banEditor=false;
var banMenu=false;
var map;
var banMapa=false;
var conter=1;
$(document).ready(function(){
    
    $("#panelPilar").dialog({
      autoOpen: false,
      width:600,
      height:150,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "explode",
        duration: 1000
      }
    });
    $("#panel").dialog({
      autoOpen: false,
      width:1200,
      height:400,
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "explode",
        duration: 1000
      }
    });
     $("#mnuContenido").dialog({
      autoOpen: false,
      width:1200,
      /*height:400,*/
      title:'Carga de evidencias',
      show: {
        effect: "blind",
        duration: 1000
      },
      hide: {
        effect: "explode",
        duration: 1000
      },
      open: function(){
         $("#acoEvidencia").accordion({active:0})
      }
      
    });
    
    $(".btn").button();
        
    



    //$(".admdata").find("span").button();
    $("#btns").buttonset(); 
    $( "#acoEvidencia" ).accordion({
      heightStyle: "content",
    });
    $("#acoEvidencia").on( "accordionactivate", function( event, ui ) {
                                                if($(this).find('.ui-state-active').next().attr('id')=='tabMap'){
                                                            if(!banMapa){
                                                                    creaMapa();
                                                                      banMapa=true;
                                                            }
                                                }
                                                                        } );
    
});

function verificaLogin(){
    var usuario = $("#NomEntUsu").val();
    var pass = $("#PwdEntUsu").val();
    $.ajax({
            type: "POST",
            url: "catalogos/log.php",
            data: {accion:'login',usuario:usuario,pass:pass}
    }).done(function(data) {
            //$("#error").html(data);
           if(data){
                 location.reload();
            }
            else{
                $("#error").html('<span style="color:red; font-weight:bold;">Error!. Verifique datos.</span>');
          }

    });
}

function logout(){
     $.ajax({
            type: "POST",
            url: "catalogos/log.php",
            data: {accion:'logout'}
    }).done(function(data) {
         location.reload();
    });
}

function despliegaPilaresAdm(){
    
    $.ajax({
            type: "POST",
            url: "catalogos/catPortal.php",
            data: { combo: 'pilaresADM'}
    }).done(function(data) {
            $('#pilar').html(data);
            $("#imgPlr").button();
    });
}

function cambiarContenidoPlr(){
     $("#conteinerContenido").fadeIn("fast");
    
    $.ajax({
            type: "POST",
            url: "catalogos/catPortal.php",
            data: { combo: 'tablaContenidoPlr'}
    }).done(function(data) {
            $('#conteinerContenido').html(data);
            $(".btnPlr").button();
            //$('#conteinerContenido').find("tr").buttonset();

    });
}

function buscaProgramasAdm(idPlr,obj){

   
    $("#proyecto").fadeOut("fast").html('<table><tr><td><span class="h1">Indicadores</span></td><td><button onclick="guardarOpciones()">Guardar</button></td></tr></table>');
    $(".tablaPilar").find("td").removeClass("active");
    $(obj).addClass("active");
    $.ajax({
            type: "POST",
            url: "catalogos/catPortal.php",
            data: { combo: 'programasADM',idPlr:idPlr}
    }).done(function(data) {
            $('#programa').fadeIn("fast").html(data).find(":checked").each(function(){
                $(this).click().prop("checked",true);
            });
            
    });
}

function buscaProyectosAdm(idPrg,input){
   
    //$(input).next().css("cursor","pointer").click(function(){configuraContenido(idPrg);});
    if($(input).attr("checked")!='checked'){
            $(input).next().css("cursor","default").unbind("click");
            $(input).next().find('.botonesConf').remove();
            $("#proyecto").find("#p"+idPrg).remove().find("#"+idPrg+"").remove();
            $("#proyecto").find("#"+idPrg+"").remove();
            
            return false;
    }
        
    
    var head=$(input).next("span").html();
   
       $.ajax({
            type: "POST",
            url: "catalogos/catPortal.php",
            data: { combo: 'proyectosADM',idPrg:idPrg,head:head}
    }).done(function(data) {
            $('#proyecto').fadeIn("fast").append(data).find('.botonesConf').find('span').button({icons: {
        primary: "ui-icon-gear"
      }});

    });
}

function muestraDiv(id){
    $("#"+id).toggle();
}

function configuraContenido(idPrg,obj){
    var nombre =$(obj).html();
    
    $("#nombrePrg").val(idPrg);
    $("#panel").find("button").button();
    $("#panel").find("#descripcionPrograma").val("");
    if(!banEditor)
        {
        area = new nicEditor().panelInstance('dscPrograma');
        banEditor = true;
        }
    $("#panel").dialog("open").dialog("option","title","Administración de contenido para el programa: "+nombre);
    var uploader = new qq.FileUploader({
    // pass the dom node (ex. $(selector)[0] for jQuery users)
    element: document.getElementById('file-uploader'),
    // path to server-side upload script
    action: 'server/php.php?&dir=img',
    debug: true,
    onComplete: function(id, fileName, response){
        var anterior;
       if($("#nombreFile").val()!='')
                     anterior = $("#nombreFile").val();
                    else
                        anterior = '';
                $("#nombreFile").val(anterior+","+fileName);
    }
    
}); 
}

function guardarOpciones(){
    var pry=[];
    var Datos=[]; 
    var nombre =$("#pilar").find(".active").attr('id');
    var nombrePrograma='';
    
    $("#proyecto").find(".pry").each(function(){
        pry=[];
        nombrePrograma=$(this).prev("h3").html();
        
       $(this).find(":checked").each(function(){
            
            pry.push($(this).val());
            
        });
        Datos.push({idPrg:$(this).attr("id"),nombrePrg:nombrePrograma,IdIdr:pry});
    });
    $.ajax({
            type: "POST",
            url: "catalogos/escribirjson.php",
            data: { combo:"guardarSeleccion",cadena:Datos,nombre:nombre}
    }).done(function(data) {
            $('#proyecto').fadeIn("fast").append(data);

    });
    
}

function guardarContenidoPlr(){
    var Datos=[]; 
    var imagenes=$("#nombreFilePlr").val();
    var pilar = $("#nombrePlr").val(); 
   
    Datos.push({idPlr:pilar,imagenes:imagenes});
    
    $.ajax({
                type: "POST",
                url: "catalogos/escribirjson.php",
                data: {combo:"guardarImagenesPlr",pilar:pilar,contenido:Datos}
        }).done(function(data) {
            $("#response").html(data);
            //$("#dscPrograma").val(data);
            /*if(data==true){
                $("#panel").dialog("close").find("input,textarea").val('');
                
            }
            else{
                $("#panel").dialog("close").find("input,textarea").val('');
               // alert("ocurrio un error");
            }*/
            
        });
        
}
function guardarContenido(){
    var Datos=[]; 
    var imagenes=$("#nombreFile").val();
    imagenes = imagenes.substr(1);
   var img=imagenes.split(",")
    var pilar = $("#nombrePilar").val(); 
    var prg = $("#nombrePrg").val();
    area.removeInstance('dscPrograma');
    var descripcion = $("#dscPrograma").val();
    Datos.push({idPrg:prg,imagenes:img,descripcion:descripcion});
    
    $.ajax({
                type: "POST",
                url: "catalogos/escribirjson.php",
                data: {combo:"guardarImagenes",pilar:pilar,prg:prg,contenido:Datos}
        }).done(function(data) {
            //$("#dscPrograma").val(data);
            if(data==true){
                $("#panel").dialog("close").find("#nombreFile,textarea").val('');
                
            }
            else{
                $("#panel").dialog("close").find("#nombreFile,textarea").val('');
               // alert("ocurrio un error");
            }
            
        });
        
}

function administrarInformacion(obj){
    $("#mnuBtn").find(".active").removeClass("active");
    $(obj).addClass("active");
    $(".admdata").fadeOut("fast",function(){
        $(".data").fadeIn("fast");
        
    })

}
function administrarContenido(obj){
    $("#mnuBtn").find(".active").removeClass("active");
    $(obj).addClass("active");
    $(".data").fadeOut("fast",function(){
        $(".admdata").fadeIn("fast");
        
    });
}

function cambiarContenido(){
    $("#conteinerContenido").fadeIn("fast");
    
    $.ajax({
            type: "POST",
            url: "catalogos/catPortal.php",
            data: { combo: 'tablaContenido'}
    }).done(function(data) {
            $('#conteinerContenido').html(data);
            $(".btnPlr").button();
            //$('#conteinerContenido').find("tr").buttonset();

    });
}
function showpanelPlr(obj){
    $("#nombrePlr").val($(obj).attr('id'));
    $("#response").html('');
    $("#panelPilar").dialog("open").dialog("option","title","Carga de imágenes para el pilar");
    $("#nombreFilePlr").val('');
    var uploader = new qq.FileUploader({
    // pass the dom node (ex. $(selector)[0] for jQuery users)
    element: document.getElementById('file-uploader-plr'),
    // path to server-side upload script
    action: 'server/php.php?&dir=imgplr',
    debug: true,
    onComplete: function(id, fileName, response){
          
          $("#nombreFilePlr").val(fileName);
    }
});
}
function showProgramas(obj){
    var id=$(obj).attr('id');
    $("#panel").find("#nombrePilar").val(id);
    $(".menuPilares").find("td").each(function(){$(this).slideUp("slow");});
    $("#p"+id).slideDown("slow").position({of:$(obj),my:'left top',at:'left bottom'});
}

function cambiarContenidoIndicador(){
     $("#conteinerContenido").fadeIn("fast");
     $.ajax({
            type: "POST",
            url: "catalogos/catPortal.php",
            data: { combo: 'tablaContenidoIndicador'}
    }).done(function(data) {
            $('#conteinerContenido').html(data);
             $(".nav").navgoco({ caret: '<span class="caret"></span>',
              accordion: true,
              //openClass: 'open',
              save: false,
              cookie: {
                  name: 'navgoco',
                  expires: false,
                  path: '/'
              },
              slide: {
                  duration: 400,
                  easing: 'swing'
              }
             });
             //$(".nav").find("li").each(function(){$(this).removeClass('open')});
            //$(".btnPlr").button();
            //$('#conteinerContenido').find("tr").buttonset();

    });
}

function agregaContenidoIndicador(idPlr,idPrg,IdIdr){
    $("#respCont").html('');
    $("#mnuContenido").dialog("open").dialog("option","title","Cargar evidencias para indicador: "+$("#"+IdIdr).html());
    $("#mnuContenido").find("#IdPlr").val(idPlr);
    $("#mnuContenido").find("#IdPrg").val(idPrg);
    $("#mnuContenido").find("#IdIdr").val(IdIdr);
    $("#mnuContenido").find("#RtaDoc").val('');
    $("#mnuContenido").find("#RtaImg").val('');
    $("#mnuContenido").find("#RtaVdo").val('');
    $("#mnuContenido").find("#Georef").val('');
    var uploader = new qq.FileUploader({
    // pass the dom node (ex. $(selector)[0] for jQuery users)
    element: document.getElementById('file-uploader-doc'),
    // path to server-side upload script
    action: 'server/php.php?&dir=doc',
    debug: true,
    onComplete: function(id, fileName, response){
       var anterior;
                if($("#RtaDoc").val()!='')
                        var anterior = $("#RtaDoc").val();
                    else
                        anterior = '';
                $("#RtaDoc").val(anterior+","+fileName);
    }
});
var uploader = new qq.FileUploader({
    // pass the dom node (ex. $(selector)[0] for jQuery users)
    element: document.getElementById('file-uploader-img'),
    // path to server-side upload script
    action: 'server/php.php?&dir=img',
    debug: true,
    onComplete: function(id, fileName, response){
       var anterior;
                if($("#RtaImg").val()!='')
                        var anterior = $("#RtaImg").val();
                    else
                        anterior = '';
                $("#RtaImg").val(anterior+","+fileName);
    }
});
/*var uploader = new qq.FileUploader({
    // pass the dom node (ex. $(selector)[0] for jQuery users)
    element: document.getElementById('file-uploader-vdo'),
    // path to server-side upload script
    action: 'server/php.php?&dir=vdo',
    debug: true,
    onComplete: function(id, fileName, response){
       var anterior;
                if($("#RtaVdo").val()!='')
                        var anterior = $("#RtaVdo").val();
                    else
                        anterior = '';
                $("#RtaVdo").val(anterior+","+fileName);
    }
});*/
$("#vid").html('').html('<span class="btn" onclick="clonar()">+</span><div id="divrvideo">http://<input type="text"  style="width:300px;" id="rvideo" title="Agregue liga del video" onchange="agregaVideos(this)"/><br></div>');
$(".btn").button();
conter=1;
}

function guardarEvidencias(){
    var IdPlr = $("#IdPlr").val();
    var IdPrg = $("#IdPrg").val();
    var IdIdr = $("#IdIdr").val();
    var documentos='';
    var imagenes='';
    var videos='';
    var referencias='';
    
    if($("#RtaDoc").val()!=''){
     documentos = $("#RtaDoc").val().substr(1);
    }
    if($("#RtaImg").val()!=''){
     imagenes = $("#RtaImg").val().substr(1);
    }
    if($("#RtaVdo").val()!=''){
     videos = $("#RtaVdo").val().substr(1);
    }
    if($("#Georef").val()!=''){
     referencias = $("#Georef").val();
    }
   
   
    $.ajax({
            type: "POST",
            url: "catalogos/catPortal.php",
            data: { combo: 'evidenciasADM',IdPlr:IdPlr,IdPrg:IdPrg,IdIdr:IdIdr,documentos:documentos,imagenes:imagenes,videos:videos,referencias:referencias}
    }).done(function(data) {
            $("#respCont").fadeIn().html(data).fadeOut(4500);
            banMapa=false;
    });
    
}

function creaMapa(){
$("#map").width("100%").height("400px").gmap3( {
                                                clear:{name:["marker"]},
                                                map:{
                                                  options:{
                                                          center:[19.294441737665995,-99.63970699999999],
                                                          zoom:9,
                                                          navigationControl: true,
                                                          scrollwheel: true,
                                                          streetViewControl: true
                                                         },
                                                             
                                                }
                                              });
}

function agregaVideos(elemento){
    var anterior;
                if($("#RtaVdo").val()!='')
                        anterior = $("#RtaVdo").val();
                    else
                        anterior = '';
                    
                $("#RtaVdo").val(anterior+","+$(elemento).val());
}

function clonar(){
    $("#divrvideo").clone().appendTo("#vid").attr('id','dirvideo'+conter).children('input').attr('id','rvideo'+conter);
    conter++;
}

function buscaMapa(){
 var addr = $('#address').val();
 var coor;
 if ( !addr || !addr.length ) return;
 
 $("#map").gmap3({
            getlatlng:{
              address:  addr,
              callback: function(results){
                  coor=results[0].geometry.location;
                  $("#Georef").val(coor);
                if ( !results ) return;
                $(this).gmap3({
                  marker:{
                    latLng:coor,
                    options:{draggable:true},
                    map:{center: true},
                     events:{
                            dragend: function(marker){
                                
                              $(this).gmap3({
                                getaddress:{
                                  latLng:marker.getPosition(),
                                  callback:function(results){
                                      console.log(results[1].address_components);
                                    var map = $(this).gmap3("get"),
                                      infowindow = $(this).gmap3({get:"infowindow"}),
                                      content = results && results[1] ? results && results[1].formatted_address : "ST_NAME NEIGHBH CITY STATE";
                                    if (infowindow){
                                      infowindow.open(map, marker);
                                      infowindow.setContent(content);
                                    } else {
                                      $(this).gmap3({
                                        infowindow:{
                                          anchor:marker, 
                                          options:{content: content}
                                        }
                                      });
                                    }
                                    
                                  }
                                }
                              });
                              $("#Georef").val(marker.getPosition());
                            }
                          }
                          
                  },
                  map:{
                    options:{
                            center:results[0].geometry.location,
                            zoom:15,
                            navigationControl: true,
                            scrollwheel: true,
                            streetViewControl: true,
                            
                           },
                    }
                 
                });
              }
            },
               
          });
        
}

