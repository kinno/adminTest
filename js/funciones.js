$(window).load(
        
        function() {    
                        
                       
                        $.ajax({
                                        type: "POST",
                                        url: "catalogos/catPortal.php",
                                        data: {combo:'pilares'}
                                }).done(function(data) {
                                    $("#sbi_container").html(data);
                                         setTimeout(cargaProgramas(),500);
                                    setTimeout(function(){
                                        
                                                            $('#sbi_container').bgImageMenu({
                                                                    defaultBg	: 'images/default.jpg',
                                                                    menuSpeed	: 400,
                                                                    border		: 2,
                                                                    width           :1100,
                                                                    height          :500,
                                                                    type		: {
                                                                            mode		: 'verticalSlideAlt',
                                                                            speed		: 400,
                                                                            easing		: 'jswing',
                                                                            seqfactor	: 100
                                                                    }
                                                            });
                                                    },1000);
                                });
                                
                        /*setTimeout(function(){
                                $('#sbi_container').bgImageMenu({
					defaultBg	: 'images/default.jpg',
					menuSpeed	: 400,
					border		: 1,
                                        width           :1100,
                                        height          :500,
					type		: {
						mode		: 'verticalSlideAlt',
						speed		: 400,
						easing		: 'jswing',
						seqfactor	: 100
					}
				});
                        },1000);*/
			
                             
			}
                    
    );
function cargaProgramas(){
    
        muestraProgramas(1);
        muestraProgramas(2);
        muestraProgramas(3);
        muestraProgramas(4);
        muestraProgramas(5);
        muestraProgramas(6);
 
                                
}
function muestraInfo(idPlr,idPrg,li){

    var tituloPrograma =$(li).html();
    $("#sbi_container").fadeOut( "slow",function(){
        $("#dataContent").fadeIn("slow");
    
        $.ajax({
            type: "POST",
            url: "catalogos/catPortal.php",
            data: { combo: /*'buscaProyectos'*/'buscaIndicadores',idPlr:idPlr,idPrg:idPrg,tituloPrograma:tituloPrograma}
    }).done(function(data) {
        
        $("#dataContent").find(".data").html('').html(data);
        $("#dataContent").find("#slider").nivoSlider({
                effect: 'fade',
                animSpeed: 500,                 
                pauseTime: 3000,
                directionNav: false,             // Next & Prev navigation
                controlNav: false,
            });
        
        $("#dataContent").find("#dialog").dialog({
                    autoOpen: false,
                    width:1200,
                    height:700,
                    modal: true,
                    show: {
                      effect: "blind",
                      duration: 1000
                    },
                    hide: {
                      effect: "explode",
                      duration: 1000
                    },beforeClose: function( event, ui ) {$("#contenidoIdr").html('');}
                  });    
    });
    
        
    });
    
    //$("#dataContent").css("display","");
}
function menu(){
    $("#dataContent").fadeOut("slow",function(){
        $("#sbi_container").fadeIn("slow");
        
    })
}
var scrolled = 0;
function up(){
    
    scrolled=scrolled-300;		
    $(".p").animate({
                            scrollTop:  scrolled
                       });
}

function down(){
    scrolled=scrolled+300;
        
				$(".p").animate({
				        scrollTop:  scrolled
				   });
}

function muestraProgramas(nPilar){
    
    var pilar = "programasPilar";
    $.ajax({
            type: "POST",
            url: "catalogos/catPortal.php",
            data: { combo: pilar,nPilar:nPilar}
    }).done(function(data) {
        $("#plr"+nPilar).html(data);
         $("#plr"+nPilar).perfectScrollbar({wheelSpeed:30});
    });
}

function despliegaTableros(idIdr){

$("#dialog").dialog("open");
$(".ui-dialog").find(".ui-widget-header").css({"background-color":'#5b8032'}); 
$.ajax({
                type: "POST",
                url: "catalogos/catPortal.php",
                data: { combo: 'tableros',IdIdr:idIdr}
                }).done(function(data) {
                     $("#contenedorDialog").html(data);
                     $("#contenedorDialog").find("#menuIdr").find("input[type=radio]").each(function(){$(this).button();});
                     $("#menuIdr").buttonset();
                    
                     
                });
}

function graficaPrograma(){
    var indicadores=[]; 
    var ids=[];
    var alcance=[];
    var dato='';
    var colores=[];
    var i=1;
    $(".indicadores").each(function(){
        indicadores.push($(this).html());
        ids.push(i);
        i++;
    });
    var j=0;
    $(".alcanceMetas").each(function(){
        
        dato=$(this).html();
        dato=dato.replace('%','');
        dato=parseFloat(dato);
        alcance.push(dato);
        
            
    });
     var j=0;    
   while(j<alcance.length){
       
    graficaAlcances(alcance,j);
    $("#pb0").delay(2000);
    
    j++;
   }
  
    $('#graficaPrograma').highcharts({
            chart: {
                type: 'column',
                margin: [ 50, 50, 100, 80]
            },
            
            title: {
                text: 'Avance de los indicadores',
                style: {color:'red',fontSize: '22px'}
            },
            xAxis: {
                categories: ids,
                labels: {
                    rotation: -45,
                    align: 'right',
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif'
                    }
                }
            },
            yAxis: {
                min: 0,
                max:100,
                title: {
                    text: 'Porcentaje de avance',
                    style: {color:'red'}
                }
            },
            legend: {
                enabled: false,
                maxHeight:200,
                
            },
            tooltip: {
               
                //headerFormat: ''+indicadores['{point.x}'],
                style:{
                    width:'300px'
                },
                pointFormat: 'Avance: <b>{point.y:.1f} %</b>',
            },
            series: [{
                name: 'Population',
                data: alcance,
                color:'#426719',
                dataLabels: {
                    enabled: true,
                    rotation: -90,
                    color: '#FFFFFF',
                    align: 'right',
                    x: 4,
                    y: 10,
                    style: {
                        fontSize: '13px',
                        fontFamily: 'Verdana, sans-serif',
                        textShadow: '0 0 3px black'
                    }
                }
            }],
        credits:{enabled:false}
        });
  
}

function graficaAlcances(datos,indice){
    //alert(datos[indice]);
            if(datos[indice]>100)
            var maximus = datos[indice];
            else
              var  maximus = 100;
            setTimeout(function(){$("#pb"+indice).progressbar({
                        value: false,
                        change: function() {
                        },
                                max: maximus
                       
                   });
                      if(datos[indice]<=50.9){
                         $("#pb"+indice).find(".ui-widget-header").css({"background-color":'red'}); 
                      }
                      if(datos[indice]>=51&&datos[indice]<=69.9){
                         $("#pb"+indice).find(".ui-widget-header").css({"background-color":'orange'}); 
                      }
                      if(datos[indice]>=70&&datos[indice]<=79.9){
                         $("#pb"+indice).find(".ui-widget-header").css({"background-color":'yellow'}); 
                      }
                      if(datos[indice]>=80&&datos[indice]<=110.9){
                         $("#pb"+indice).find(".ui-widget-header").css({"background-color":'#426719'}); 
                      }
                      if(datos[indice]>110.9){
                         $("#pb"+indice).find(".ui-widget-header").css({"background-color":'#6633CC'}); 
                         
                      }
                      function progress() {
                        var val = $("#pb"+indice).progressbar( "value" ) || 0;

                        $("#pb"+indice).progressbar( "value", parseFloat(val)+1 );
                        
                        if ( parseFloat(val) < parseFloat(datos[indice]) ) {
                            $("#pl"+indice).text(parseFloat($("#pb"+indice).progressbar( "value" )) + "%" );
                          setTimeout( progress, 10 );
                        }
                        else{
                             $("#pl"+indice).text(datos[indice]+"%");
                        }
                      }

                      setTimeout( progress, 1000 );
            },500);
            
        
    
}

function coloresTabla(){
    var ban='out';
    $("#tblInd").find("tr").each(function(){
        if($(this).attr('class')!='headerT'){
            if(ban=='out'){
            $(this).addClass('in');
            ban='in';
            }else{
                $(this).addClass('out');
            ban='out';
            }
            
        }
        
    });
}

function muestraArchivos(tipoArchivo,IdIdr){
    
    $("#contenidoIdr").fadeOut( "slow",function(){
        $("#contenidoIdr").fadeIn("slow");
    
        $.ajax({
            type: "POST",
            url: "catalogos/catPortal.php",
            data: { combo: tipoArchivo,IdIdr:IdIdr}
    }).done(function(data) {
        $("#contenidoIdr").html(data).removeClass('ui-widget-content');
        $('a.media').media({width:1000});
        $('#galery').nivoSlider({
                effect: 'fade',
                animSpeed: 500,                 
                pauseTime: 3000,
                directionNav: false,             // Next & Prev navigation
                controlNav: false,
            });
            
        
            
        });
    });
    
}

function obtenerMapa(){
var coordenadas=$("#coord").val();
coordenadas = coordenadas.replace("(","");
coordenadas = coordenadas.replace(")","");
var c = coordenadas.split(",")
console.log(c);
$("#map").width("100%").height("400px").gmap3({
                                                marker:{
                                                  latLng: [c[0],c[1]]
                                                },
                                                map:{
                                                  options:{
                                                    zoom: 15
                                                  }
                                                }
                                              });
}

function despliegaDocumento(lista,doc){
    $("#menuDocs").find('li').each(function(){
        $(this).removeClass('actual');
    });
    $(lista).addClass('actual');   
    $("#docContainer").html('<a class="embed" id="dc" href="http://www.giesal.com/'+doc+'"></a>');
    $("#dc").gdocsViewer({ width: 870}); 
    
}

