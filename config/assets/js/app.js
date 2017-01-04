
$(document).ready(load);

function load(e) {
    console.log("welcom to events ready");

    var directorios = '/exchange/scaner.php';

    loaddir();

    //diparadores especiales
    function loaddir()
    {
        $.post(directorios,{ url:'dirs',act:'list'},responseseldir,'json');
    }

    //eventos de respuestas
    function responseseldir(data,success,XHR) {
        if(data.success==='OK'){
           console.log("los directorios estan cargando");
           setdirs(data);
        }else{
           console.log("los directorios no cargaron");
        }
     }

    function setdirs(data)
    {

       console.log(data);

       var htmlstr="" ;
       for(i=0;i<data.data.length;i++)
       {
          name =data.data[i].dir;

          htmlstr+='<a class="list-group-item" href="'+directorios+'?url=dirs&act=download&file='+data.data[i].dir+'" > <span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span> '+name+' <span class="glyphicon glyphicon-download pull-right" aria-hidden="true"></span></a>';

       }

       $("#listaArchivos").html(htmlstr);
        console.log("los directorios estan setiados");
    }
}
